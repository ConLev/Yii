<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;

class Test extends Model
{
    public $content;
    public $title;
    public $count;
    /** @var UploadedFile */
    public $upload;

    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
//            ['count', 'myValidate']
            [['count'], 'safe'],
            ['upload', 'file', 'extensions' => 'jpg, png']
        ];
    }

    public function save()
    {
        /* $filepath = Yii::getAlias("@webroot/img/ {$this->upload->name}");
        var_dump($filepath);
        exit; */

        if ($this->validate('upload')) {
//            Yii::setAlias("@img", "@webroot/img/");
            $filepath = Yii::getAlias("@img/{$this->upload->name}"); //web/'aliases'
            $this->upload->saveAs($filepath);

            Image::thumbnail($filepath, 100, 100)
                ->save(Yii::getAlias("@img/small/{$this->upload->name}"));
        }
    }

    public function attributeLabels()
    {
        return [
//            'content' => 'Содержимое',
            'content' => Yii::t("app", 'test_content')
        ];
    }

    public function myValidate($attr, $params)
    {
        if (!in_array($this->$attr, [3, 4, 5])) {
            $this->addError($attr, "Неверный диапазон");
        }
    }
}