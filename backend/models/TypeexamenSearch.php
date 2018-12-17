<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Typeexamen;

/**
 * TypeexamenSearch represents the model behind the search form about `backend\models\Typeexamen`.
 */
class TypeexamenSearch extends Typeexamen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtypeexamen'], 'integer'],
            [['libtypeexamen'], 'safe'],
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
        $query = Typeexamen::find();

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
            'idtypeexamen' => $this->idtypeexamen,
        ]);

        $query->andFilterWhere(['like', 'libtypeexamen', $this->libtypeexamen]);

        return $dataProvider;
    }
}
