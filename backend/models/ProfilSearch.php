<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Profil;

/**
 * ProfilSearch represents the model behind the search form about `backend\models\Profil`.
 */
class ProfilSearch extends Profil
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idprof', 'gespat', 'createpat', 'createparampat', 'readpat', 'updatepat', 'deletepat', 'gescons', 'createcons', 'updatecons', 'readcons', 'printcons', 'deletecons', 'geshos', 'createhos', 'updatehos', 'readhos', 'deletehos', 'printhos', 'gessoin', 'createsoin', 'updatesoin', 'readsoin', 'deletesoin', 'printsoin', 'gesord', 'createord', 'updateord', 'readord', 'printord', 'gesexamed', 'createexamed', 'updateexamed', 'readexamed', 'deleteexamed', 'gesana', 'createana', 'updateana', 'readana', 'deleteana', 'printana', 'gesuser', 'createuser', 'updateuser', 'readuser', 'deleteuser', 'gescaisse', 'createpaye', 'readpaye', 'updatepaye', 'deletepaye', 'gesprofil', 'createprof', 'readprof', 'updateprof', 'deleteprof', 'gespharma', 'createachaprod', 'readachaprod', 'updateachaprod', 'deleteachaprod', 'gesetat', 'gesstat'], 'integer'],
            [['nomprof'], 'safe'],
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
        $query = Profil::find();

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
            'idprof' => $this->idprof,
            'gespat' => $this->gespat,
            'createpat' => $this->createpat,
            'createparampat' => $this->createparampat,
            'readpat' => $this->readpat,
            'updatepat' => $this->updatepat,
            'deletepat' => $this->deletepat,
            'gescons' => $this->gescons,
            'createcons' => $this->createcons,
            'updatecons' => $this->updatecons,
            'readcons' => $this->readcons,
            'printcons' => $this->printcons,
            'deletecons' => $this->deletecons,
            'geshos' => $this->geshos,
            'createhos' => $this->createhos,
            'updatehos' => $this->updatehos,
            'readhos' => $this->readhos,
            'deletehos' => $this->deletehos,
            'printhos' => $this->printhos,
            'gessoin' => $this->gessoin,
            'createsoin' => $this->createsoin,
            'updatesoin' => $this->updatesoin,
            'readsoin' => $this->readsoin,
            'deletesoin' => $this->deletesoin,
            'printsoin' => $this->printsoin,
            'gesord' => $this->gesord,
            'createord' => $this->createord,
            'updateord' => $this->updateord,
            'readord' => $this->readord,
            'printord' => $this->printord,
            'gesexamed' => $this->gesexamed,
            'createexamed' => $this->createexamed,
            'updateexamed' => $this->updateexamed,
            'readexamed' => $this->readexamed,
            'deleteexamed' => $this->deleteexamed,
            'gesana' => $this->gesana,
            'createana' => $this->createana,
            'updateana' => $this->updateana,
            'readana' => $this->readana,
            'deleteana' => $this->deleteana,
            'printana' => $this->printana,
            'gesuser' => $this->gesuser,
            'createuser' => $this->createuser,
            'updateuser' => $this->updateuser,
            'readuser' => $this->readuser,
            'deleteuser' => $this->deleteuser,
            'gescaisse' => $this->gescaisse,
            'createpaye' => $this->createpaye,
            'readpaye' => $this->readpaye,
            'updatepaye' => $this->updatepaye,
            'deletepaye' => $this->deletepaye,
            'gesprofil' => $this->gesprofil,
            'createprof' => $this->createprof,
            'readprof' => $this->readprof,
            'updateprof' => $this->updateprof,
            'deleteprof' => $this->deleteprof,
            'gespharma' => $this->gespharma,
            'createachaprod' => $this->createachaprod,
            'readachaprod' => $this->readachaprod,
            'updateachaprod' => $this->updateachaprod,
            'deleteachaprod' => $this->deleteachaprod,
            'gesetat' => $this->gesetat,
            'gesstat' => $this->gesstat,
        ]);

        $query->andFilterWhere(['like', 'nomprof', $this->nomprof]);

        return $dataProvider;
    }
}
