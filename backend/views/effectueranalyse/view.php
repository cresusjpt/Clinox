<?php
$listeDetailAnalyse =Yii:: $app->db->createCommand("SELECT analysemedicale.libanalysemedicale,detailanalyse.libdetailanalyse, detailanalyse.norme, detailanalyse.normesF, detailanalyse.normesB FROM detailanalyse, analysemedicale WHERE detailanalyse.idanalysemedicale = analysemedicale.idanalysemedicale AND detailanalyse.idanalysemedicale=$model->idanalysemedicale ")->query();
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Effectueranalyse */

$this->title = 'Analyse du patient '.$model->idpatient0->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Effectuer des analyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="effectueranalyse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'idpatient' => $model->idpatient, 'idanalysemedicale' => $model->idanalysemedicale, 'ideffectueanalyse' => $model->ideffectueanalyse], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'idpatient' => $model->idpatient, 'idanalysemedicale' => $model->idanalysemedicale, 'ideffectueanalyse' => $model->ideffectueanalyse], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\'enregistrement courant ?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Imprimer', ['print',  'idpatient' => $model->idpatient,'idanalysemedicale' => $model->idanalysemedicale,'ideffectueanalyse' => $model->ideffectueanalyse], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpatient0.fullName',
            'idanalysemedicale0.libanalysemedicale',
            'dateanalyse:datetime',
            'payer:boolean',
            'coutanalyse',
            'indigeant:boolean',
            'autorisation:boolean',
            'echeance:date',
            'rdv:date',
            'libresultat',
            'normes',
            'descriptionresultat:ntext',
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

                    <th>Normes H</th>
                    <th>Normes F</th>
                    <th>Normes B</th>


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
                echo 'Aucun resultat enregistré !';
            ?>
        </div>
        <!-- /.box-body -->
    </div>

</div>
