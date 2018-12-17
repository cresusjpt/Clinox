<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Prelevement;

/**
 * PrelevementSearch represents the model behind the search form about `backend\models\Prelevement`.
 */
class PrelevementSearch extends Prelevement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idprelevement', 'idnature', 'idaspectprelevement', 'idpatient', 'idanalysemedicale', 'iddemandeanalyse'], 'integer'],
            [['preleveur', 'dateprelev','datereception', 'conforme', 'Urgent'], 'safe'],
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
    public function attributes(){
        return array_merge(parent::attributes(),['idpatient0.fullName']);
    }
    /**
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
       // $query = Prelevement::find();
        $query = Prelevement::find()->joinWith(['idpatient0']);

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
            'idprelevement' => $this->idprelevement,
            'dateprelev' => $this->dateprelev,
            'datereception' => $this->datereception,
            'idnature' => $this->idnature,
            'idaspectprelevement' => $this->idaspectprelevement,
            'idpatient' => $this->idpatient,
            'idanalysemedicale' => $this->idanalysemedicale,
            'iddemandeanalyse' => $this->iddemandeanalyse,
        ]);

        $query->andFilterWhere(['like', 'preleveur', $this->preleveur])
            ->andFilterWhere(['like', 'conforme', $this->conforme])
            ->andFilterWhere(['like', 'Urgent', $this->Urgent]);

        return $dataProvider;
    }
}
