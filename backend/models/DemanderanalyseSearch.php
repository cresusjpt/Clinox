<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Demanderanalyse;

/**
 * DemanderanalyseSearch represents the model behind the search form about `backend\models\Demanderanalyse`.
 */
class DemanderanalyseSearch extends Demanderanalyse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddemandeanalyse', 'idpatient', 'idanalysemedicale', 'payer', 'indigeant', 'autorisation'], 'integer'],
            [['libdemandeanalyse', 'degre', 'datedemande', 'diagnostic', 'echeance','idpatient0.fullName'], 'safe'],
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
       // $query = Demanderanalyse::find();
        $query = Demanderanalyse::find()->joinWith(['idpatient0']);

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
            'iddemandeanalyse' => $this->iddemandeanalyse,
            'datedemande' => $this->datedemande,
            'idpatient' => $this->idpatient,
            'idanalysemedicale' => $this->idanalysemedicale,
            'payer' => $this->payer,
            'indigeant' => $this->indigeant,
            'autorisation' => $this->autorisation,
            'echeance' => $this->echeance,
        ]);

        $query->andFilterWhere(['like', 'libdemandeanalyse', $this->libdemandeanalyse])
            ->andFilterWhere(['like', 'degre', $this->degre])
            ->andFilterWhere(['like', 'diagnostic', $this->diagnostic]);

        return $dataProvider;
    }
}
