<?php


namespace backend\assets;
use yii\web\AssetBundle;
/**
 * Class HighChartsAsset
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\highcharts
 */
class HighChartsAsset extends AssetBundle
{
    public $sourcePath = '@bower/highcharts-release/';
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    public $js = [
        'highcharts.src.js',
        'highcharts-more.src.js',
    ];
}