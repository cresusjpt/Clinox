<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Analysemedicale;

/**
 * AnalysemedicaleSearch represents the model behind the search form about `backend\models\Analysemedicale`.
 */
class AnalysemedicaleSearch extends Analysemedicale
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idanalysemedicale', 'idsoustypeanalysemedicale', 'assure', 'iduser'], 'integer'],
            [['libanalysemedicale', ], 'safe'],
            [['coutanalyse'], 'number'],
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
        $query = Analysemedicale::find();

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
            'idanalysemedicale' => $this->idanalysemedicale,
            'idsoustypeanalysemedicale' => $this->idsoustypeanalysemedicale,
            'coutanalyse' => $this->coutanalyse,
            'assure' => $this->assure,
            'iduser' => $this->iduser,
        ]);

        $query->andFilterWhere(['like', 'libanalysemedicale', $this->libanalysemedicale]);

        return $dataProvider;
    }
}
