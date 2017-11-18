<?php

use yii\db\Schema;

class m171118_090101_option extends \yii\db\Migration
{
    public function safeUp()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'options', $tables))  {
          $this->createTable('{{%options}}', [
              'id' => $this->primaryKey(),
              'key' => $this->string(255)->notNull(),
              'value' => $this->text()->notNull(),
              'description' => $this->text(),
              'default_value' => $this->text(),
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."options` already exists!\n";
        }
                 
    }

    public function safeDown()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->dropTable('{{%options}}');
        $this->execute('SET foreign_key_checks = 1');
    }
}
