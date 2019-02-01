<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

class DynamicModels extends \yii\base\Model
{
    /**
     * Creates and populates a set of models.
     *
     * @param string $modelClass
     * @param array $multipleModels
     * @param array $data
     * @return array
     */
    public static function createMultiple($modelClass, $multipleModels = [], $data = null)
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        // added $data=null to function arguments
        // modified the following line to accept new argument
        $post     = empty($data) ? Yii::$app->request->post($formName) : $data[$formName];
        $models   = [];

        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'idintervention', 'idintervention'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['idintervention']) && !empty($item['idintervention']) && isset($multipleModels[$item['idintervention']])) {
                    $models[$i] = $multipleModels[$item['idintervention']];
                } else {
                    $models[$i] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }
}