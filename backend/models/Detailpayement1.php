<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detailpayement".
 *
 * @property integer $idpayement
 * @property string $prestation
 * @property string $codeprestation
 * @property string $montant
 * @property string $montantpatient
 * @property string $montanttotal
 * @property Demanderanalyse $iddemandeanalyse0

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
            [['idpayement'], 'integer'],
            [['montant','montantpatient', 'montanttotal'], 'number'],
            [['prestation'], 'string', 'max' => 150],
            [['codeprestation'], 'string', 'max' => 70],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpayement' => 'Idpayement',
            'prestation' => 'Prestation',
            'codeprestation' => 'Codeprestation',
            'montant' => 'Montant',
            'montantpatient' => 'Montantpatient',
            'montanttotal' => 'Montanttotal',
            //'fraisachatpatient' => 'Fraisachatpatient',
            //'fraisachatassurance' => 'Fraisachatassurance',
        ];
    }
}
