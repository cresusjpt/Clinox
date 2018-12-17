<?php

use yii\widgets\Breadcrumbs;
use yii\widgets\AlertLte;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use common\widgets\Alert;


?>
<!-- Content Wrapper. Contains page content -->
<?php
NavBar::begin();
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right', 'style' => 'margin-bottom:0px'],
    //'items' => $menuItems,
]);
NavBar::end();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1><?= $this->blocks['content-header'] ?></h1>

        <?php } else { ?>
            <div class="box-body">
                <div class="container">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>
                </div>
            </div>
            <!--<h1>
					<?php
            /*					if ($this->title !== null) {
                                    echo \yii\helpers\Html::encode($this->title);
                                } else {
                                    echo \yii\helpers\Inflector::camel2words(
                                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                                    );
                                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                                } */ ?>
				</h1>-->
        <?php } ?>

        <?=
        Breadcrumbs::widget([
            //'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </section>

    <!-- Main content -->
    <section class="container table table-bordered" style="margin-bottom: 0px">
        <?php if (isset($_GET['message'])) { ?>
            <div class="alert alert-<?= $_GET['messageType'] ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4> <?= $_GET['messageTitle'] ?></h4>
                <?= $_GET['message'] ?>
            </div>
        <?php } ?>
        <?php if (isset($_POST['message'])) { ?>
            <div class="alert alert-<?= $_POST['messageType'] ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4> <?= $_POST['messageTitle'] ?></h4>
                <?= $_POST['message'] ?>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-md-11" style="margin-left: 30px;">

                <?= $content ?>
            </div>
        </div>
    </section><!-- /.content -->


</div><!-- /.content-wrapper -->
