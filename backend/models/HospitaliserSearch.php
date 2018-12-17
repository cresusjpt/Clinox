<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Hospitaliser;
use backend\models\Hospitalisation;

/**
 * HospitaliserSearch represents the model behind the search form about `backend\models\Hospitaliser`.
 */
class HospitaliserSearch extends Hospitaliser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpatient', 'idhospitalisation', 'idchbre', 'payer', 'indigeant', 'autorisation'], 'integer'],
            [['datedebut', 'datefin', 'echeance','idchbre0.nomchbre','idpatient0.fullName','idpatient0.idassurance0.libassurance'], 'safe'],


        ];
    }

    public function attributes(){
        return array_merge(parent::attributes(),['idpatient0.fullName'],['idpatient0.idassurance0.libassurance'],['idchbre0.nomchbre']);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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
        //$query = Hospitaliser::find();
        // JOINTURE ENTRE LES TABLE HOSPITALISER,ASSURANCE ET CHAMBRE
        $query = Hospitaliser::find()->joinWith(['idpatient0','idpatient0.idassurance0','idchbre0']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere(['LIKE','Patient.nompatient',$this->getAttribute('idpatient0.fullName')])
            ->orFilterWhere(['LIKE','Patient.prenompatient',$this->getAttribute('idpatient0.fullName')]);

        $query->orFilterWhere(['LIKE','Assurance.libassurance',$this->getAttribute('idpatient0.idassurance0.libassurance')]);
        $query->orFilterWhere(['LIKE','Chambre.nomchbre',$this->getAttribute('idchbre0.nomchbre')]);

        // grid filtering conditions
        $query->andFilterWhere([
            'idpatient' => $this->idpatient,
            'idhospitalisation' => $this->idhospitalisation,
            'idchbre' => $this->idchbre,
            'datedebut' => $this->datedebut,
            'datefin' => $this->datefin,
            'payer' => $this->payer,
            'indigeant' => $this->indigeant,
            'autorisation' => $this->autorisation,
            'echeance' => $this->echeance,
        ]);

        return $dataProvider;
    }
}
