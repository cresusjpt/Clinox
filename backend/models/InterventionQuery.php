<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Intervention]].
 *
 * @see Intervention
 */
class InterventionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Intervention[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Intervention|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
