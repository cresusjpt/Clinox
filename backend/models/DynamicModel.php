<?php
/**
 * Created by IntelliJ IDEA.
 * User: Simone Sika
 * Date: 12/10/2018
 * Time: 19:18
 */

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class DynamicModel extends \yii\base\Model
{
    /**
     * Creates and populates a set of models.
     *
     * @param string $modelClass
     * @param array $multipleModels
     * @return array
     */
    public static function createMultiple($modelClass, $multipleModels = [])
    {
        $model = new $modelClass;
        $formName = $model->formName();
        $post = Yii::$app->request->post($formName);
        $models = [];

        if (!empty($multipleModels)) {
            $keys = array_keys($multipleModels);
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['idintervention']) && !empty($item['idintervention']) && isset($multipleModels[$item['idintervention']])) {
                    $models[] = $multipleModels[$item['idintervention']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }

    public static function createMultipleByPost($modelClass, $multipleModels = [])
    {
        $model = new $modelClass;
        $formName = $model->formName();
        $post = $_POST;
        $models = [];

        if (!empty($multipleModels)) {
            $keys = array_keys($multipleModels);
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['idsoin']) && !empty($item['idsoin']) && isset($multipleModels[$item['idsoin']])) {
                    $models[] = $multipleModels[$item['idsoin']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }
}