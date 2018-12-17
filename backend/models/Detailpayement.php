<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detailpayement".
 *
 * @property integer $idpayement
 * @property integer $statutassur
 * @property string $prestation
 * @property string $codeprestation
 * @property string $montant

 * @property string $montanttotal
 * @property string detailprestation

 */
class Detailpayement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailpayement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpayement', 'prestation', 'codeprestation', 'montant'], 'required'],
            [['idpayement','statutassur'], 'integer'],
            [['montant', 'montanttotal'], 'number'],
            [['prestation'], 'string', 'max' => 150],
            [['detailprestation'], 'string', 'max' =>255],
            [['codeprestation'], 'string', 'max' => 70],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpayement' => 'Id Payement',
            'prestation' => 'Prestation',
            'detailprestation' => 'Detail Prestation',
            'codeprestation' => 'Code prestation',
            'montant' => 'Montant',
            'montantassurance'=>'Montant Assurance',
            'montantpatient' => 'Montant Patient',
            'montanttotal' => 'Montant Total',
            'statutassur'=> 'Statut Assurance',
            //'fraisachatpatient' => 'Fraisachatpatient',
            //'fraisachatassurance' => 'Fraisachatassurance',
        ];
    }

    function getPrestation()
    {
        return $this->detailprestation ;
    }

}
