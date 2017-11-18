<?php

namespace amintado\options\models;

use Yii;

/**
 * This is the model class for table "{{%options}}".
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 * @property string $description
 * @property string $default_value
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%options}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'value'], 'required'],
            [['value', 'description', 'default_value'], 'string'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'نام تنظیم',
            'value' => 'مقدار تنظیمات',
            'description' => 'توضیحات',
            'default_value' => 'مقدار پیش فزض',
        ];
    }
}
