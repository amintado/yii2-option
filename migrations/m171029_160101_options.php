<?php

use yii\db\Schema;

class m171029_160101_options extends \yii\db\Migration
{
    public function safeUp()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'pay_settings', $tables))  {
          $this->createTable('{{%pay_settings}}', [
              'setting_id' => $this->primaryKey(),
              'setting_key' => $this->string(255)->notNull(),
              'setting_value' => $this->text()->notNull(),
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."pay_settings` already exists!\n";
        }
                 
    }

    public function safeDown()
    {
        $this->dropTable('{{%pay_settings}}');
    }
}
