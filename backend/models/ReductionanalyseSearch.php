<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Reductionanalyse;

/**
 * ReductionanalyseSearch represents the model behind the search form about `backend\models\Reductionanalyse`.
 */
class ReductionanalyseSearch extends Reductionanalyse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idassurance', 'idsoustypeanalysemedicale'], 'integer'],
            [['taux'], 'number'],
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
        $query = Reductionanalyse::find();

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
            'idsoustypeanalysemedicale' => $this->idsoustypeanalysemedicale,
            'taux' => $this->taux,
        ]);

        return $dataProvider;
    }
}
