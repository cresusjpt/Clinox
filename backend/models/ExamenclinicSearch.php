<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Examenclinic;

/**
 * ExamenclinicSearch represents the model behind the search form about `backend\models\Examenclinic`.
 */
class ExamenclinicSearch extends Examenclinic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idexamen', 'idpatient', 'createdby', 'updatedby', 'deletedby'], 'integer'],
            [['hdm', 'motifconsultation', 'dateexamen', 'coeur', 'poumon', 'abdomen', 'urogenital', 'locomoteur', 'autres', 'diagnostic', 'paraclinic', 'cat', 'createdat', 'updatedat', 'deletedat'], 'safe'],
            [['idpatient0.fullName'], 'safe'],
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


    //Création du champ de saisi
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
        //$query = Examenclinic::find();
        $query = Examenclinic::find()->joinWith(['idpatient0']);

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
            'idexamen' => $this->idexamen,
            'idpatient' => $this->idpatient,
            'dateexamen' => $this->dateexamen,
            'createdat' => $this->createdat,
            'updatedat' => $this->updatedat,
            'deletedat' => $this->deletedat,
            'createdby' => $this->createdby,
            'updatedby' => $this->updatedby,
            'deletedby' => $this->deletedby,
        ]);

        $query->andFilterWhere(['like', 'hdm', $this->hdm])
            ->andFilterWhere(['like', 'motifconsultation', $this->motifconsultation])
            ->andFilterWhere(['like', 'coeur', $this->coeur])
            ->andFilterWhere(['like', 'poumon', $this->poumon])
            ->andFilterWhere(['like', 'abdomen', $this->abdomen])
            ->andFilterWhere(['like', 'urogenital', $this->urogenital])
            ->andFilterWhere(['like', 'locomoteur', $this->locomoteur])
            ->andFilterWhere(['like', 'autres', $this->autres])
            ->andFilterWhere(['like', 'diagnostic', $this->diagnostic])
            ->andFilterWhere(['like', 'paraclinic', $this->paraclinic])
            ->andFilterWhere(['like', 'cat', $this->cat]);

        return $dataProvider;
    }
}
