<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Consultation;

/**
 * ConsultationSearch represents the model behind the search form about `backend\models\Consultation`.
 */
class ConsultationSearch extends Consultation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idconsultation', 'idtypeconsultation', 'assure', 'iduser'], 'integer'],
            [['libconsultation', 'rdv'], 'safe'],
            [['coutconsultation'], 'number'],
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
        $query = Consultation::find();

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
            'idconsultation' => $this->idconsultation,
            'idtypeconsultation' => $this->idtypeconsultation,
            'coutconsultation' => $this->coutconsultation,
            'assure' => $this->assure,
            'rdv' => $this->rdv,
            'iduser' => $this->iduser,
        ]);

        $query->andFilterWhere(['like', 'libconsultation', $this->libconsultation]);

        return $dataProvider;
    }
}
