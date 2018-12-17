<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Antecedant1;

/**
 * Antecedant1Search represents the model behind the search form about `backend\models\Antecedant1`.
 */
class Antecedant1Search extends Antecedant1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idancedant1', 'idtypeantecedant'], 'number'],
            [['libelleantecant1'], 'safe'],
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
        $query = Antecedant1::find();

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
            'idancedant1' => $this->idancedant1,
            'idtypeantecedant' => $this->idtypeantecedant,
        ]);

        $query->andFilterWhere(['like', 'libelleantecant1', $this->libelleantecant1]);

        return $dataProvider;
    }
}
