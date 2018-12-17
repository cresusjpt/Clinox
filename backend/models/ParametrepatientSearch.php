<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Parametrepatient;

/**
 * ParametrepatientSearch represents the model behind the search form about `backend\models\Parametrepatient`.
 */
class ParametrepatientSearch extends Parametrepatient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idparametre', 'idpatient', 'nbreenfant'], 'integer'],
            [['tention', 'dateprelev', 'pouls', 'etatgeneral', 'muqueuses', 'coeur', 'appdigest', 'ddr', 'autrappareil', 'datecreation', 'datemodification'], 'safe'],
            [['temperature', 'poids', 'taille'], 'number'],
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
        $query = Parametrepatient::find();

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
            'idparametre' => $this->idparametre,
            'idpatient' => $this->idpatient,
            'temperature' => $this->temperature,
            'poids' => $this->poids,
            'nbreenfant' => $this->nbreenfant,
            'dateprelev' => $this->dateprelev,
            'taille' => $this->taille,
            'ddr' => $this->ddr,
            'datecreation' => $this->datecreation,
            'datemodification' => $this->datemodification,
        ]);

        $query->andFilterWhere(['like', 'tention', $this->tention])
            ->andFilterWhere(['like', 'pouls', $this->pouls])
            ->andFilterWhere(['like', 'etatgeneral', $this->etatgeneral])
            ->andFilterWhere(['like', 'muqueuses', $this->muqueuses])
            ->andFilterWhere(['like', 'coeur', $this->coeur])
            ->andFilterWhere(['like', 'appdigest', $this->appdigest])
            ->andFilterWhere(['like', 'autrappareil', $this->autrappareil]);

        return $dataProvider;
    }
}
