<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Conjoint;

/**
 * ConjointSearch represents the model behind the search form about `backend\models\Conjoint`.
 */
class ConjointSearch extends Conjoint
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idconj', 'idpatient', 'ageconj'], 'integer'],
            [['nomconj', 'prenomconj', 'datenaissconj', 'nationaliteconj', 'professionconj', 'adresseconj', 'telconj', 'gsrhconj', 'hbconj'], 'safe'],
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

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Conjoint::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'idconj' => $this->idconj,
            'idpatient' => $this->idpatient,
            'datenaissconj' => $this->datenaissconj,
            'ageconj' => $this->ageconj,
        ]);

        $query->andFilterWhere(['like', 'nomconj', $this->nomconj])
            ->andFilterWhere(['like', 'prenomconj', $this->prenomconj])
            ->andFilterWhere(['like', 'nationaliteconj', $this->nationaliteconj])
            ->andFilterWhere(['like', 'professionconj', $this->professionconj])
            ->andFilterWhere(['like', 'adresseconj', $this->adresseconj])
            ->andFilterWhere(['like', 'telconj', $this->telconj])
            ->andFilterWhere(['like', 'gsrhconj', $this->gsrhconj])
            ->andFilterWhere(['like', 'hbconj', $this->hbconj]);

        return $dataProvider;
    }
}
