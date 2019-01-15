<?php

namespace backend\models;

use app\models\Decaissement;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Payement;

/**
 * PayementSearch represents the model behind the search form about `backend\models\Payement`.
 */
class PayementSearch extends Payement
{
    public $from_date;
    public $to_date;
    public $datePayement_range;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpayement', 'idpatient', 'iduser', 'from_date', 'to_date'], 'integer'],
            [['refpayement', 'datepayement', 'idpatient0.fullName', 'idpatient0.idassurance0.sigleassurance', 'datePayement_range'], 'safe'],
            [['montantrecu'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    //création du champ de saisi
    public function attributes()
    {
        return array_merge(parent::attributes(), ['idpatient0.fullName'], ['idpatient0.idassurance0.sigleassurance']);
    }

    public function getTotalCaisse($params)
    {

        $query = Payement::find()->sum('montantrecu');

        $query2 = Decaissement::find()->sum('montant');

        $query3 = $query-$query2;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            /* 'sort'=>[

             ]*/
        ]);

        $this->load($params);

        $dataProvider->query;
        return $query3;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        //$query = Payement::find();
        // JOINTURE
        $query = Payement::find()->joinWith(['idpatient0', 'idpatient0.idassurance0']);

        $query->orderBy('datepayement DESC');


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            /* 'sort'=>[

             ]
            */
        ]);

        $this->load($params);


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        //requete de filtre
        $query->orFilterWhere(['LIKE', 'Patient.nompatient', $this->getAttribute('idpatient0.fullName')])
            ->orFilterWhere(['LIKE', 'Patient.prenompatient', $this->getAttribute('idpatient0.fullName')]);
        //->andFilterWhere(['>=', 'datepayement', $this->createTimeStart])
        //->andFilterWhere(['<', 'datepayement', $this->createTimeEnd]);
        // grid filtering conditions
        $query->orFilterWhere(['LIKE', 'Assurance.sigleassurance', $this->getAttribute('idpatient0.idassurance0.sigleassurance')]);
        $query->andFilterWhere([
            'idpayement' => $this->idpayement,
            'idpatient' => $this->idpatient,
            'montantrecu' => $this->montantrecu,
            'datepayement' => $this->datepayement,
            'iduser' => $this->iduser,
        ]);

        $query->andFilterWhere(['like', 'refpayement', $this->refpayement]);

        if (!empty($this->datePayement_range) && strpos($this->datePayement_range, '-')) {
            $this->datePayement_range = str_replace('/', '-', $this->datePayement_range);
            list($start_date, $end_date) = explode(' - ', $this->datePayement_range);
            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = date('Y-m-d', strtotime($end_date));

            $query->andFilterWhere(['between', 'datepayement', $start_date, $end_date]);
        }

        return $dataProvider;
    }
}
