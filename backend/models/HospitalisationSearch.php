<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Hospitalisation;

/**
 * HospitalisationSearch represents the model behind the search form about `backend\models\Hospitalisation`.
 */
class HospitalisationSearch extends Hospitalisation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idhospitalisation'], 'integer'],
            [['libhospitalisation','idchbre0.nomchbre','etat'], 'safe'],
            [['idpatient0.fullName','idpatient0.idassurance0.libassurance'], 'safe'],
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
        return array_merge(parent::attributes(),['idpatient0.fullName'],['idpatient0.idassurance0.libassurance']);
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
        //$query = Hospitalisation::find();
        //jointure entre les tables hospitilisations ,assurance et patients
        $query = Hospitalisation::find()->joinWith(['idpatient0','idpatient0.idassurance0']);

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

        $query->orFilterWhere(['LIKE','Assurance.libassurance',$this->getAttribute('idpatient0.idassurance0.libassurance')]);

        // grid filtering conditions
        $query->andFilterWhere([
            'idhospitalisation' => $this->idhospitalisation,
        ]);

        $query->andFilterWhere(['like', 'libhospitalisation', $this->libhospitalisation]);

        return $dataProvider;
    }
}
