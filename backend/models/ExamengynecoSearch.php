<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Examengyneco;

/**
 * ExamengynecoSearch represents the model behind the search form about `backend\models\Examengyneco`.
 */
class ExamengynecoSearch extends Examengyneco
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idexamengyneco', 'idpatient', 'createdby', 'updatedby', 'deletedby'], 'integer'],
            [['seins', 'abdomen', 'perineetvulve', 'speculum', 'tv', 'tr', 'resume', 'hypothese', 'examencomplementaire', 'traitement', 'consigne', 'dateentree', 'datesortie', 'adresseepar', 'pour', 'hbpatient', 'createdat', 'updatedat', 'deletedat','idpatient0.fullName'], 'safe'],
            //[['idpatient0.fullName'], 'safe'],
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
        return array_merge(parent::attributes(),['idpatient0.fullName']);
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
       // $query = Examengyneco::find();

        $query = Examengyneco::find()->joinWith(['idpatient0']);

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
        // grid filtering conditions
        $query->andFilterWhere([
            'idexamengyneco' => $this->idexamengyneco,
            'idpatient' => $this->idpatient,
            'dateentree' => $this->dateentree,
            'datesortie' => $this->datesortie,
            'createdat' => $this->createdat,
            'updatedat' => $this->updatedat,
            'deletedat' => $this->deletedat,
            'createdby' => $this->createdby,
            'updatedby' => $this->updatedby,
            'deletedby' => $this->deletedby,
        ]);

        $query->andFilterWhere(['like', 'seins', $this->seins])
            ->andFilterWhere(['like', 'abdomen', $this->abdomen])
            ->andFilterWhere(['like', 'perineetvulve', $this->perineetvulve])
            ->andFilterWhere(['like', 'speculum', $this->speculum])
            ->andFilterWhere(['like', 'tv', $this->tv])
            ->andFilterWhere(['like', 'tr', $this->tr])
            ->andFilterWhere(['like', 'resume', $this->resume])
            ->andFilterWhere(['like', 'hypothese', $this->hypothese])
            ->andFilterWhere(['like', 'examencomplementaire', $this->examencomplementaire])
            ->andFilterWhere(['like', 'traitement', $this->traitement])
            ->andFilterWhere(['like', 'consigne', $this->consigne])
            ->andFilterWhere(['like', 'adresseepar', $this->adresseepar])
            ->andFilterWhere(['like', 'pour', $this->pour])
            ->andFilterWhere(['like', 'hbpatient', $this->hbpatient]);

        return $dataProvider;
    }
}
