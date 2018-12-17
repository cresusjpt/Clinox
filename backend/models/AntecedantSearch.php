<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Antecedant;

/**
 * AntecedantSearch represents the model behind the search form about `backend\models\Antecedant`.
 */
class AntecedantSearch extends Antecedant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idantecedant', 'idpatient', 'agepremregle'], 'integer'],
            [['descripantec', 'typeavortement', 'familiaux', 'medicaux', 'chirurgicaux', 'obsteriques', 'gestite', 'parite', 'avortement', 'dysmenorrhe', 'syndromeintmenstru', 'doulpelvienne', 'dyspareunie', 'leucorrhees', 'trtsterilite', 'contrception', 'methcontracep', 'durecontrac', 'autreaffectgyne', 'datedebut', 'datefin'], 'safe'],
            [['idpatient0.fullName'], 'safe'],
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

//Création du champ de saisi
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
        //$query = Antecedant::find();
        //effectuer la jointure entre la table antécédant et la table patient
        $query = Antecedant::find()->joinWith(['idpatient0']);

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
        //Requête de filtrage
        $query->orFilterWhere(['LIKE','Patient.nompatient',$this->getAttribute('idpatient0.fullName')])
            ->orFilterWhere(['LIKE','Patient.prenompatient',$this->getAttribute('idpatient0.fullName')]);


        // grid filtering conditions
        $query->andFilterWhere([
            'idantecedant' => $this->idantecedant,
            'idpatient' => $this->idpatient,
            'agepremregle' => $this->agepremregle,
            'datedebut' => $this->datedebut,
            'datefin' => $this->datefin,
        ]);

        $query->andFilterWhere(['like', 'descripantec', $this->descripantec])
            ->andFilterWhere(['like', 'familiaux', $this->familiaux])
            ->andFilterWhere(['like', 'medicaux', $this->medicaux])
            ->andFilterWhere(['like', 'chirurgicaux', $this->chirurgicaux])
            ->andFilterWhere(['like', 'obsteriques', $this->obsteriques])
            ->andFilterWhere(['like', 'gestite', $this->gestite])
            ->andFilterWhere(['like', 'parite', $this->parite])
            ->andFilterWhere(['like', 'avortement', $this->avortement])
            ->andFilterWhere(['like', 'dysmenorrhe', $this->dysmenorrhe])
            ->andFilterWhere(['like', 'syndromeintmenstru', $this->syndromeintmenstru])
            ->andFilterWhere(['like', 'doulpelvienne', $this->doulpelvienne])
            ->andFilterWhere(['like', 'dyspareunie', $this->dyspareunie])
            ->andFilterWhere(['like', 'leucorrhees', $this->leucorrhees])
            ->andFilterWhere(['like', 'typeavortement', $this->typeavortement])
            ->andFilterWhere(['like', 'trtsterilite', $this->trtsterilite])
            ->andFilterWhere(['like', 'contrception', $this->contrception])
            ->andFilterWhere(['like', 'methcontracep', $this->methcontracep])
            ->andFilterWhere(['like', 'durecontrac', $this->durecontrac])
            ->andFilterWhere(['like', 'autreaffectgyne', $this->autreaffectgyne]);

        return $dataProvider;
    }
}
