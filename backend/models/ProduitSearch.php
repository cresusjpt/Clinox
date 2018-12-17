<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Produit;

/**
 * ProduitSearch represents the model behind the search form about `backend\models\Produit`.
 */
class ProduitSearch extends Produit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idproduit', 'assure'], 'integer'],
            [['libproduit'], 'safe'],
            [['prixproduit'], 'number'],
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
        $query = Produit::find();

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
            'idproduit' => $this->idproduit,
            'prixproduit' => $this->prixproduit,
            'assure' => $this->assure,
        ]);

        $query->andFilterWhere(['like', 'libproduit', $this->libproduit]);

        return $dataProvider;
    }
}
