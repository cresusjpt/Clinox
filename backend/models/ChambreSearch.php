<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Chambre;

/**
 * ChambreSearch represents the model behind the search form about `backend\models\Chambre`.
 */
class ChambreSearch extends Chambre
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idchbre', 'idcategoriechbr', 'nbrelit', 'assure'], 'integer'],
            [['nomchbre'], 'safe'],
            [['coutchbre'], 'number'],
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
        $query = Chambre::find();

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
            'idchbre' => $this->idchbre,
            'idcategoriechbr' => $this->idcategoriechbr,
            'nbrelit' => $this->nbrelit,
            'coutchbre' => $this->coutchbre,
            'assure' => $this->assure,
        ]);

        $query->andFilterWhere(['like', 'nomchbre', $this->nomchbre]);

        return $dataProvider;
    }
}
