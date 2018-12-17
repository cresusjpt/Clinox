<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Soustypeanalysemedicale;

/**
 * SoustypeanalysemedicaleSearch represents the model behind the search form about `backend\models\Soustypeanalysemedicale`.
 */
class SoustypeanalysemedicaleSearch extends Soustypeanalysemedicale
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsoustypeanalysemedicale', 'idtypeanalysemedicale', 'istypeanalysemedicale'], 'integer'],
            [['libsoustypeanalysemedicale'], 'safe'],
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
        $query = Soustypeanalysemedicale::find();

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
            'idsoustypeanalysemedicale' => $this->idsoustypeanalysemedicale,
            'idtypeanalysemedicale' => $this->idtypeanalysemedicale,
            'istypeanalysemedicale' => $this->istypeanalysemedicale,
        ]);

        $query->andFilterWhere(['like', 'libsoustypeanalysemedicale', $this->libsoustypeanalysemedicale]);

        return $dataProvider;
    }
}
