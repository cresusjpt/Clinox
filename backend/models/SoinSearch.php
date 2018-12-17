<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Soin;

/**
 * SoinSearch represents the model behind the search form about `backend\models\Soin`.
 */
class SoinSearch extends Soin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsoin'], 'integer'],
            [['libsoin'], 'safe'],
            [['coutsoin'], 'number'],
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
        $query = Soin::find();

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
            'idsoin' => $this->idsoin,
            'coutsoin' => $this->coutsoin,
        ]);

        $query->andFilterWhere(['like', 'libsoin', $this->libsoin]);

        return $dataProvider;
    }
}
