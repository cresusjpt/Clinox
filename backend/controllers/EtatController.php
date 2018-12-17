<?php

namespace backend\controllers;

use Yii;
use backend\models\Profil;
use backend\models\ProfilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



class EtatController extends \yii\web\Controller
{

    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }

    public function actionIndex()
    {
        $totalmensuel = Yii:: $app->db->createCommand("select SUM(montantrecu) as totalMensuel from payement where datepayement like '2018-02-%'")->queryColumn();


        return $this->render('index', [
            'totalMensuel' => $totalmensuel,
        ]);
    }

}
