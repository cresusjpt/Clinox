<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Detailanalyseintervention]].
 *
 * @see Detailanalyseintervention
 */
class DetailanalyseinterventionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Detailanalyseintervention[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Detailanalyseintervention|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
