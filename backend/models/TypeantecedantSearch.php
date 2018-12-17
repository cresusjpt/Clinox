<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Typeantecedant;

/**
 * TypeantecedantSearch represents the model behind the search form about `backend\models\Typeantecedant`.
 */
class TypeantecedantSearch extends Typeantecedant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtypeantecedant'], 'number'],
            [['libelletypeAntecedant'], 'safe'],
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
        $query = Typeantecedant::find();

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
            'idtypeantecedant' => $this->idtypeantecedant,
        ]);

        $query->andFilterWhere(['like', 'libelletypeAntecedant', $this->libelletypeAntecedant]);

        return $dataProvider;
    }
}
