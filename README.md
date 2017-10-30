## simple option module for Yii2
this module just create a table with name `{{%at_settings}}` and (`setting_key` , `setting_value`) columns.

this module has a simple method in `amintado\option\Module` class with name:`Option($key, $value = null)`.
if you set `key` and `value` parameters ,module will create new record in `{{%at_settings}}` with `setting_key` column=`key` parameter and `setting_value`=serialize(`key`) parameter


if you just set `key` parameter in option function,will return unserialized `value`


very simple and useful for  set every variable or object in database

## Installation
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

`php composer.phar require --prefer-dist amintado/yii2-option "@dev"`

or add

`"amintado/yii2-option": "@dev"`

to the require section of your `composer.json` file.

## migration
for apply tables in your database,run this command:
```
yii migrate --migrationPath=@vendor/amintado/yii2-option/migrations
```
