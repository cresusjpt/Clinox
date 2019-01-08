<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Decaissement;

/**
 * DecaissementSearch represents the model behind the search form of `app\models\Decaissement`.
 */
class DecaissementSearch extends Decaissement
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_decaiss'], 'integer'],
            [['reference_decaiss', 'date_decaiss', 'ressource', 'motif_decaiss'], 'safe'],
            [['montant'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Decaissement::find();

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
            'id_decaiss' => $this->id_decaiss,
            'montant' => $this->montant,
            'date_decaiss' => $this->date_decaiss,
        ]);

        $query->andFilterWhere(['like', 'reference_decaiss', $this->reference_decaiss])
            ->andFilterWhere(['like', 'ressource', $this->ressource])
            ->andFilterWhere(['like', 'motif_decaiss', $this->motif_decaiss]);

        return $dataProvider;
    }
}
