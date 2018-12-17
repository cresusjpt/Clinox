<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Patient;

/**
 * PatientSearch represents the model behind the search form about `backend\models\Patient`.
 */
class PatientSearch extends Patient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpatient', 'idassurance','age', 'tauxassu'], 'integer'],
            [['nompatient', 'prenompatient', 'photopatient', 'datenaisspatient', 'sexpatient', 'tel1patient', 'tel2patient', 'proffesionpatient', 'statutmatripatient', 'gsphpatient', 'personneaprevenir', 'datecreation','age', 'datemodification'], 'safe'],
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
        $query = Patient::find();

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
            'idpatient' => $this->idpatient,
            'idassurance' => $this->idassurance,
            'datenaisspatient' => $this->datenaisspatient,
            'datecreation' => $this->datecreation,
            'datemodification' => $this->datemodification,
        ]);

        $query->andFilterWhere(['like', 'nompatient', $this->nompatient])
            ->andFilterWhere(['like', 'prenompatient', $this->prenompatient])
            ->andFilterWhere(['like', 'photopatient', $this->photopatient])
            ->andFilterWhere(['like', 'sexpatient', $this->sexpatient])
            ->andFilterWhere(['like', 'tel1patient', $this->tel1patient])
            ->andFilterWhere(['like', 'age', $this->age])
            ->andFilterWhere(['like', 'tel2patient', $this->tel2patient])
            ->andFilterWhere(['like', 'proffesionpatient', $this->proffesionpatient])
            ->andFilterWhere(['like', 'statutmatripatient', $this->statutmatripatient])
            ->andFilterWhere(['like', 'gsphpatient', $this->gsphpatient])
            ->andFilterWhere(['like', 'personneaprevenir', $this->personneaprevenir]);

        return $dataProvider;
    }
}
