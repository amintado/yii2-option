<?php
namespace amintado\options;

use amintado\options\models\Settings;

class Module extends \yii\base\Module{

    public $controllerNamespace='amintado\options\controllers';

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


    public function init()
    {

        $this->initI18N();
        $this->initComponents();
        parent::init(); // TODO: Change the autogenerated stub
        return $this;
    }

    /**
     * TranslationTrait manages methods for all translations used in Krajee extensions
     *
     * @property array $i18n
     *
     * @author Kartik Visweswaran <kartikv2@gmail.com>
     * @since 1.8.8
     * Yii i18n messages configuration for generating translations
     * source : https://github.com/kartik-v/yii2-krajee-base/blob/master/TranslationTrait.php
     * Edited by : Yohanes Candrajaya <moo.tensai@gmail.com>
     *
     *
     * @return void
     */
    public function initI18N()
    {
        $reflector = new \ReflectionClass(get_class($this));
        $dir = dirname($reflector->getFileName());

        Yii::setAlias("@atoption", $dir);
        $config = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => "@atoption/messages",
            'forceTranslation' => true
        ];
        $globalConfig = ArrayHelper::getValue(Yii::$app->i18n->translations, "atoption*", []);
        if (!empty($globalConfig)) {
            $config = array_merge($config, is_array($globalConfig) ? $globalConfig : (array)$globalConfig);
        }
        Yii::$app->i18n->translations["atoption*"] = $config;
    }

    public function initComponents(){
        $pdf=
            [
                'class'=>'kartik\mpdf\Pdf',
                'mode'=>Pdf::MODE_UTF8,
                'format' => Pdf::FORMAT_A4,
                'marginLeft' => 20,
                'marginRight' => 20,
                'marginTop' => 10,
                'marginBottom' => 10,
                'orientation' => Pdf::ORIENT_PORTRAIT,
                'cssFile' => '@vandor/amintado/yii2-option/assets/css/factor.css',

            ];


        //Yii::$app->components['pdf']= $pdf;
        Yii::$app->setComponents([$pdf]);
    }


}
