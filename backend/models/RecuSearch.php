<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Recu;

/**
 * RecuSearch represents the model behind the search form about `backend\models\Recu`.
 */
class RecuSearch extends Recu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idrecu'], 'integer'],
            [['refrecu', 'daterecu'], 'safe'],
            [['montantrecu'], 'number'],
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
        $query = Recu::find();

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
            'idrecu' => $this->idrecu,
            'montantrecu' => $this->montantrecu,
            'daterecu' => $this->daterecu,
        ]);

        $query->andFilterWhere(['like', 'refrecu', $this->refrecu]);

        return $dataProvider;
    }
}
