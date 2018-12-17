<?php
$listeDetailAnalyse =Yii:: $app->db->createCommand("SELECT analysemedicale.libanalysemedicale,detailanalyse.libdetailanalyse, detailanalyse.norme, detailanalyse.normesF, detailanalyse.normesB FROM detailanalyse, analysemedicale WHERE detailanalyse.idanalysemedicale = analysemedicale.idanalysemedicale AND detailanalyse.idanalysemedicale=$model->idanalysemedicale ")->query();
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Analysemedicale */

$this->title = 'Détail de l\'analyse N°'.$model->idanalysemedicale;
$this->params['breadcrumbs'][] = ['label' => 'Analyse médicales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analysemedicale-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idanalysemedicale], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idanalysemedicale], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idsoustypeanalysemedicale0.idtypeanalysemedicale0.libtypeanalysemedicale',
           // 'idsoustypeanalysemedicale0.libsoustypeanalysemedicale',
            'libanalysemedicale',
            'normes',
            [
                'attribute' => 'coutanalyse',
                'value' => function ($model) {
                    return $model->coutanalyse . ' F CFA';
                },
            ],
            [
                'attribute' => 'assure',
                'value' => function ($model) {
                    return $model->assure == '0' ? 'Non' : 'Oui';
                },
            ],
//            'iduser',
        ],
    ]) ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Détails analyses</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <th style="width: 10px">#</th>

                    <th>Détail analyse</th>

                    <th>Homme</th>
                    <th>Femme</th>
                    <th>Enfant</th>


                </tr>

                <?php
                $i = 1;


                foreach ($listeDetailAnalyse as $ligne) {
                    ?>
                    <tr>
                        <td><?= $i ?></td>

                        <td><?= $ligne['libdetailanalyse']  ?></td>
                        <td><?= $ligne['norme'] ?></td>
                        <td>  <?= $ligne['normesF'] ?></td>
                        <td>   <?= $ligne['normesB'] ?></td>

                    </tr>
                    <?php
                    $i++;


                }
                ?>



                </tbody>
            </table>

            <?php
            if ($i <= 1)
                echo 'Aucun soin enregistré !';
            ?>
        </div>
        <!-- /.box-body -->
    </div>

</div>

<!--@TODO: Ajouter les détails des assurances associés-->