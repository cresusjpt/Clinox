<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Examenobstetrical]].
 *
 * @see Examenobstetrical
 */
class ExamenobstetricalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Examenobstetrical[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Examenobstetrical|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
