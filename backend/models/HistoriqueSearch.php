<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Historique;

/**
 * HistoriqueSearch represents the model behind the search form about `backend\models\Historique`.
 */
class HistoriqueSearch extends Historique
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idhistorique', 'iduser'], 'integer'],
            [['action', 'date', 'description'], 'safe'],
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
        $query = Historique::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [ 'idhistorique' => SORT_DESC]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idhistorique' => $this->idhistorique,
            'iduser' => $this->iduser,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'action', $this->action])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
