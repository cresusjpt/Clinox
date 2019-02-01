<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Examenobstetrical;

/**
 * ExamenobstetricalSearch represents the model behind the search form of `backend\models\Examenobstetrical`.
 */
class ExamenobstetricalSearch extends Examenobstetrical
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idexamenobstetrical'], 'integer'],
            [['date', 'auteur', 'plainte', 'maf', 'tapouls', 'urinesa', 'uriness', 'omi', 'muqueuses', 'hu', 'bdc', 'speculum', 'tv', 'presentation', 'analyses', 'traitements', 'rdv'], 'safe'],
            [['temperature', 'poids', 'bassin'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Examenobstetrical::find();

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
            'idexamenobstetrical' => $this->idexamenobstetrical,
            'date' => $this->date,
            'temperature' => $this->temperature,
            'poids' => $this->poids,
            'bassin' => $this->bassin,
            'rdv' => $this->rdv,
        ]);

        $query->andFilterWhere(['like', 'auteur', $this->auteur])
            ->andFilterWhere(['like', 'plainte', $this->plainte])
            ->andFilterWhere(['like', 'maf', $this->maf])
            ->andFilterWhere(['like', 'tapouls', $this->tapouls])
            ->andFilterWhere(['like', 'urinesa', $this->urinesa])
            ->andFilterWhere(['like', 'uriness', $this->uriness])
            ->andFilterWhere(['like', 'omi', $this->omi])
            ->andFilterWhere(['like', 'muqueuses', $this->muqueuses])
            ->andFilterWhere(['like', 'hu', $this->hu])
            ->andFilterWhere(['like', 'bdc', $this->bdc])
            ->andFilterWhere(['like', 'speculum', $this->speculum])
            ->andFilterWhere(['like', 'tv', $this->tv])
            ->andFilterWhere(['like', 'presentation', $this->presentation])
            ->andFilterWhere(['like', 'analyses', $this->analyses])
            ->andFilterWhere(['like', 'traitements', $this->traitements]);

        return $dataProvider;
    }
}
