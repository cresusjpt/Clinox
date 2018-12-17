<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Assurance;

/**
 * AssuranceSearch represents the model behind the search form about `backend\models\Assurance`.
 */
class AssuranceSearch extends Assurance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idassurance'], 'integer'],
            [['sigleassurance', 'libassurance', 'adrassurance', 'telassurance'], 'safe'],
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
        $query = Assurance::find();

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
            'idassurance' => $this->idassurance,
        ]);

        $query->andFilterWhere(['like', 'sigleassurance', $this->sigleassurance])
            ->andFilterWhere(['like', 'libassurance', $this->libassurance])
            ->andFilterWhere(['like', 'adrassurance', $this->adrassurance])
            ->andFilterWhere(['like', 'telassurance', $this->telassurance]);

        return $dataProvider;
    }
}
