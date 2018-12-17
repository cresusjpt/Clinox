<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Ordonnance;

/**
 * OrdonnanceSearch represents the model behind the search form about `backend\models\Ordonnance`.
 */
class OrdonnanceSearch extends Ordonnance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idordonnance',  'iduser'], 'integer'],
            [['observation', 'datecreation', 'datemodification',], 'safe'],
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
        //$query = Ordonnance::find();
        $query = Ordonnance::find()->joinWith(['idpatient0']);

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
            'idordonnance' => $this->idordonnance,
            'datecreation' => $this->datecreation,
            'datemodification' => $this->datemodification,
            'iduser' => $this->iduser,
        ]);

        $query->andFilterWhere(['like', 'observation', $this->observation]);

        return $dataProvider;
    }
}
