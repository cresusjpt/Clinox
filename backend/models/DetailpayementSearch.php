<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Demanderanalyse;
use yii\db\Query;

/**
 * DemanderanalyseSearch represents the model behind the search form about `backend\models\Demanderanalyse`.
 */
class DetailpayementSearch extends Detailpayement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpayement', 'statutassur'], 'integer'],
            [['montant', 'montanttotal', 'prestation', 'detailprestation', 'codeprestation'], 'safe'],
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

   /* public function attributes()
    {
        return array_merge(parent::attributes(), ['idpatient0.fullName']);
    }*/

    public function searchByPayement($id_payement, $params)
    {
        $query = Detailpayement::find();
        $query->where(['idpayement'=>$id_payement])->all();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            //$query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idpayement' => $this->idpayement,
        ]);

        $query->andFilterWhere(['like', 'prestation', $this->prestation])
            ->andFilterWhere(['like', 'codeprestation', $this->codeprestation])
            ->andFilterWhere(['like', 'montant', $this->montant])
            ->andFilterWhere(['like', 'statutassur', $this->statutassur])
            ->andFilterWhere(['like', 'montanttotal', $this->montanttotal])
            ->andFilterWhere(['like', 'detailprestation', $this->detailprestation]);

        //var_dump($dataProvider);
        //die();
        return $dataProvider;
    }
}
