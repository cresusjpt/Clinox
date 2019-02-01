<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Detailsoinintervention]].
 *
 * @see Detailsoinintervention
 */
class DetailsoininterventionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Detailsoinintervention[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Detailsoinintervention|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
