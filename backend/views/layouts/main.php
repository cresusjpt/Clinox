<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use app\assets\AppAsset;
use backend\assets\AdminLteAsset;

//AppAsset::register($this);
$asset = AdminLteAsset::register($this);
$baseUrl = $asset->baseUrl;

include Yii::$app->basePath. "/views/layouts/gestion_menu.php";

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<?php //var_dump($admenugespat); ?>
<?php //var_dump($menu);  ?>

<div class="wrapper">
    <?= $this->render('header.php', ['baserUrl' => $baseUrl, 'title' => Yii::$app->name]) ?>
    <?php if (!Yii::$app->user->isGuest) { ?>
        <?= $this->render('leftside.php', ['baserUrl' => $baseUrl, 'menu' => $menu]) ?>
    <?php } else { ?>
        <?= $this->render('leftside.php', ['baserUrl' => $baseUrl]) ?>
    <?php } ?>
    <?= $this->render('content.php', ['content' => $content]) ?>
    <?= $this->render('footer.php', ['baserUrl' => $baseUrl]) ?>
    <?= $this->render('rightside.php', ['baserUrl' => $baseUrl]) ?>
</div>

<!--footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <? //= date('Y') ?></p>

        <p class="pull-right"><? //= Yii::powered() ?></p>
    </div>
</footer-->


<?php $this->endBody() ?>
</body>
<?php if( isset(Yii::$app->session['alert-message-text']) && isset(Yii::$app->session['alert-message-type']) ) { ?>
<script>
    $(function(){
//        $div = '<div class="alert alert-success" style="margin-top: 10px;">'+
//            '<button aria-hidden="true" data-dismiss="alert" class="close" type="button" id="alert-close-button">×</button>'+
//        '{!! Session::get(success Ce champ est vide!!!) !!}'+
//        '</div>';

        $div = $('<div>', {
            class: 'alert <?= Yii::$app->session['alert-message-type'] ?> alert-message',
        }).appendTo('.content-header');

        $button = $('<button>');
        $button.attr('aria-hidden','true');
        $button.attr('data-dismiss','alert');
        $button.attr('class','close');
        $button.attr('type','button');
        $button.attr('id','alert-close-button');
        $button.html('x');

        $div.html('<?= Yii::$app->session['alert-message-text'] ?> ');
        console.log($button);
        $('.alert-message').append($button);
    });
</script>
<?php
    Yii::$app->session['alert-message-text']= null;
    Yii::$app->session['alert-message-type']= null;
} ?>
</html>
<?php $this->endPage() ?>
