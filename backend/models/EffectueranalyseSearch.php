<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Effectueranalyse;

/**
 * EffectueranalyseSearch represents the model behind the search form about `backend\models\Effectueranalyse`.
 */
class EffectueranalyseSearch extends Effectueranalyse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpatient', 'idanalysemedicale', 'payer', 'indigeant', 'autorisation'], 'integer'],
            [['dateanalyse', 'echeance', 'rdv', 'libresultat', 'normes','descriptionresultat','idpatient0.fullName','idanalysemedicale0.libanalysemedicale'], 'safe'],
            [['coutanalyse'], 'number'],
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
    public function attributes(){
        return array_merge(parent::attributes(),['idpatient0.fullName'],['idanalysemedicale0.libanalysemedicale']);
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
        //$query = Effectueranalyse::find();
        //FAIRE DES JOINTURES ENTRE EFECTUERANALYSE,PATIENT ET ANALYSE
        $query = Effectueranalyse::find()->joinWith(['idpatient0','idanalysemedicale0']);

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

        $query->orFilterWhere(['LIKE','Analysemedicale.libanalysemedicale',$this->getAttribute('idanalysemedicale0.libanalysemedicale')]);

        // grid filtering conditions
        $query->andFilterWhere([
            'idpatient' => $this->idpatient,
            'idanalysemedicale' => $this->idanalysemedicale,
            'dateanalyse' => $this->dateanalyse,
            'payer' => $this->payer,
            'coutanalyse' => $this->coutanalyse,
            'indigeant' => $this->indigeant,
            'autorisation' => $this->autorisation,
            'echeance' => $this->echeance,
            'rdv' => $this->rdv,
        ]);

        $query->andFilterWhere(['like', 'libresultat', $this->libresultat])
            ->andFilterWhere(['like', 'normes', $this->normes])
            ->andFilterWhere(['like', 'descriptionresultat', $this->descriptionresultat]);

        return $dataProvider;
    }
}
