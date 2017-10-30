<?php
namespace amintado\options;

use amintado\options\models\Settings;

class Module extends \yii\base\Module{
    public static function Option($key, $value = null)
    {
        $model = Settings::findOne(['setting_key' => $key]);
        if (empty($model)) {
            if (!empty($value)){
                $model=new Settings();
                $model->setting_key=$key;
                $model->setting_value=serialize($value);
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
}
