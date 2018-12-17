<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jeanpaul Tossou
 * Date: 17/12/2018
 * Time: 16:43
 */

use kartik\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Payement');
?>
<div class="utilisateur-index">

    <?php Pjax::begin() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'codeprestation',
            'prestation',
            'detailprestation',
            'montant:integer',
            'montanttotal:integer',
            'montantassurance:integer',
            'statutassur',
        ],
    ]); ?>
    <?php Pjax::end() ?>
</div>

