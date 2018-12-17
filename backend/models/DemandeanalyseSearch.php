<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Demandeanalyse;

/**
 * DemandeanalyseSearch represents the model behind the search form about `backend\models\Demandeanalyse`.
 */
class DemandeanalyseSearch extends Demandeanalyse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddemandeanalyse', 'idpatient','idanalysemedicale', 'idaspectprelevement', 'idnature', 'idnatureprelev'], 'integer'],
            [['libdemandeanalyse', 'degre', 'natureprelevement', 'aspectprelev', 'datereception', 'conforme', 'diagnostic','idpatient0.fullName'], 'safe'],
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
        //$query = Demandeanalyse::find();
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

        // grid filtering conditions
        $query->andFilterWhere([
            'iddemandeanalyse' => $this->iddemandeanalyse,
            'datereception' => $this->datereception,
            'idpatient' => $this->idpatient,
            'idanalysemedicale' => $this->idanalysemedicale,
            'idaspectprelevement' => $this->idaspectprelevement,
            'idnature' => $this->idnature,
            'idnatureprelev' => $this->idnatureprelev,
        ]);

        $query->andFilterWhere(['like', 'libdemandeanalyse', $this->libdemandeanalyse])
            ->andFilterWhere(['like', 'degre', $this->degre])
            ->andFilterWhere(['like', 'natureprelevement', $this->natureprelevement])
            ->andFilterWhere(['like', 'aspectprelev', $this->aspectprelev])
            ->andFilterWhere(['like', 'conforme', $this->conforme])
            ->andFilterWhere(['like', 'diagnostic', $this->diagnostic]);

        return $dataProvider;
    }
}
