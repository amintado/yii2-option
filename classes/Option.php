<?php
/**
 * Created by PhpStorm.
 * User: amin__000
 * Date: 10/17/2017
 * Time: 6:43 AM
 */

namespace amintado\options\classes;

use amintado\options\models\Options;
use amintado\options\Module;
use Yii;


class Option
{
    public static function Option($key, $value = null)
    {
        $model = Options::findOne(['key' => $key]);
        if (empty($model)) {
            if (!empty($value)){
                $model=new Options();
                $model->key=$key;
                $model->value=serialize($value);
                $model->save();
            }
            return '';
        }
        if (empty($value)) {
            return unserialize($model->setting_value);
        }
        $model->setting_value = serialize($value);
        $model->save();
    }
    public static function description($key, $description=null){
        $model = Options::findOne(['key' => $key]);
        if (empty($model)) {
            if (!empty($description)){
                $model=new Options();
                $model->key=$key;
                $model->description=$description;
                $model->save();
            }
            return '';
        }
        if (empty($description)) {
            return $model->description;
        }
        $model->description = $description;
        $model->save();
    }


    public static function DefaultVal($key, $value=null){
        $model = Options::findOne(['key' => $key]);
        if (empty($model)) {
            if (!empty($value)){
                $model=new Options();
                $model->key=$key;
                $model->default_value=$value;
                $model->save();
            }
            return '';
        }
        if (empty($value)) {
            return $model->default_value;
        }
        $model->default_value = $value;
        $model->save();
    }
    public static function InitModule(){
        $moduleID = '';

        foreach (Yii::$app->modules as $key => $value) {
            if (!empty($value['class'])) {
                if ($value['class'] == 'amintado\options\Module') {

                    $moduleID = $key;
                    break;
                }
            }

        }

        //---------------- init Module -------------------
        $module = (new Module($moduleID))->init();
    }
}