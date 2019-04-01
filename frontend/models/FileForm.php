<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

class FileForm extends Model
{
    public $image;
 
    /**
     * Declares the validation rules.
     */
    public function rules()
    {
		return [
			['image', 'file', 'types'=>'xml','maxSize'=>10*1024*1024]
		];
    }

    public function attributeLabels()
    {
        return [
            'image'=>'Файл загрузки (xml)'
			];
    }

}