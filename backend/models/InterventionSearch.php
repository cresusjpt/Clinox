<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * InterventionSearch represents the model behind the search form of `app\models\Intervention`.
 */
class InterventionSearch extends Intervention
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idintervention'], 'integer'],
            [['nomintervention'], 'safe'],
            [['kopchir', 'kanest', 'kaide', 'kbloc', 'pharmacie', 'hosp'], 'number'],
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
        $query = Intervention::find();

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
            'idintervention' => $this->idintervention,
            'kopchir' => $this->kopchir,
            'kanest' => $this->kanest,
            'kaide' => $this->kaide,
            'kbloc' => $this->kbloc,
            'pharmacie' => $this->pharmacie,
            'hosp' => $this->hosp,
        ]);

        $query->andFilterWhere(['like', 'nomintervention', $this->nomintervention]);

        return $dataProvider;
    }
}
