<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Achat;

/**
 * AchatSearch represents the model behind the search form about `backend\models\Achat`.
 */
class AchatSearch extends Achat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idachat', 'idpatient', 'payer', 'autorisation'], 'integer'],
            [['echeance','idpatient0.fullName'], 'safe'],
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

    public function attributes(){
        return array_merge(parent::attributes(),['idpatient0.fullName']);
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
       // $query = Achat::find();

        $query = Achat::find()->joinWith(['idpatient0']);
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

        $query->orFilterWhere(['LIKE','Patient.nompatient',$this->getAttribute('idpatient0.fullName')])
            ->orFilterWhere(['LIKE','Patient.prenompatient',$this->getAttribute('idpatient0.fullName')]);

        // grid filtering conditions
        $query->andFilterWhere([
            'idachat' => $this->idachat,
            'idpatient' => $this->idpatient,
            'payer' => $this->payer,
            'autorisation' => $this->autorisation,
            'echeance' => $this->echeance,
        ]);

        return $dataProvider;
    }
}
