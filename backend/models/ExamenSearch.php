<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Examen;

/**
 * ExamenSearch represents the model behind the search form about `backend\models\Examen`.
 */
class ExamenSearch extends Examen
{

    public function getEffectuerexamens0()
    {
        return $this->hasMany(Effectuerexamen::className(), ['idexamen' => 'idexamen'])->one();
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idexamen', 'idtypeexamen', 'iduser'], 'integer'],
            [['libexamen', 'dateexamen', 'motifexamen', 'abdomen', 'perinetevulve', 'speculum', 'touchevaginal', 'tr', 'resume', 'hypothesediagnostic', 'examcomplementaire', 'traitement', 'consigne', 'ddr', 'terme', 'plaintes', 'maf', 'tepouls', 'urines', 'omi', 'hu', 'bdg', 'tv', 'presentation', 'bassin', 'analyses', 'rdv'], 'safe'],
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
        $query = Examen::find();

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
            'idexamen' => $this->idexamen,
            'idtypeexamen' => $this->idtypeexamen,
            'dateexamen' => $this->dateexamen,
            'ddr' => $this->ddr,
            'rdv' => $this->rdv,
            'iduser' => $this->iduser,
        ]);

        $query->andFilterWhere(['like', 'libexamen', $this->libexamen])
            ->andFilterWhere(['like', 'motifexamen', $this->motifexamen])
            ->andFilterWhere(['like', 'abdomen', $this->abdomen])
            ->andFilterWhere(['like', 'perinetevulve', $this->perinetevulve])
            ->andFilterWhere(['like', 'speculum', $this->speculum])
            ->andFilterWhere(['like', 'touchevaginal', $this->touchevaginal])
            ->andFilterWhere(['like', 'tr', $this->tr])
            ->andFilterWhere(['like', 'resume', $this->resume])
            ->andFilterWhere(['like', 'hypothesediagnostic', $this->hypothesediagnostic])
            ->andFilterWhere(['like', 'examcomplementaire', $this->examcomplementaire])
            ->andFilterWhere(['like', 'traitement', $this->traitement])
            ->andFilterWhere(['like', 'consigne', $this->consigne])
            ->andFilterWhere(['like', 'terme', $this->terme])
            ->andFilterWhere(['like', 'plaintes', $this->plaintes])
            ->andFilterWhere(['like', 'maf', $this->maf])
            ->andFilterWhere(['like', 'tepouls', $this->tepouls])
            ->andFilterWhere(['like', 'urines', $this->urines])
            ->andFilterWhere(['like', 'omi', $this->omi])
            ->andFilterWhere(['like', 'hu', $this->hu])
            ->andFilterWhere(['like', 'bdg', $this->bdg])
            ->andFilterWhere(['like', 'tv', $this->tv])
            ->andFilterWhere(['like', 'presentation', $this->presentation])
            ->andFilterWhere(['like', 'bassin', $this->bassin])
            ->andFilterWhere(['like', 'analyses', $this->analyses]);

        return $dataProvider;
    }
}
