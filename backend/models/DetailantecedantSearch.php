<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Detailantecedant;

/**
 * DetailantecedantSearch represents the model behind the search form about `backend\models\Detailantecedant`.
 */
class DetailantecedantSearch extends Detailantecedant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddetailantecedant', 'idancedant1'], 'number'],
            [['familiaux', 'chirurgicaux', 'medicaux'], 'safe'],
            [['idpatient'], 'integer'],
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
        $query = Detailantecedant::find();

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
            'iddetailantecedant' => $this->iddetailantecedant,
            'idancedant1' => $this->idancedant1,
            'idpatient' => $this->idpatient,
        ]);

        $query->andFilterWhere(['like', 'familiaux', $this->familiaux])
            ->andFilterWhere(['like', 'chirurgicaux', $this->chirurgicaux])
            ->andFilterWhere(['like', 'medicaux', $this->medicaux]);

        return $dataProvider;
    }
}
