<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class FileForm extends Model
{
    public $image;
 
    /**
     * Declares the validation rules.
     */
    public function rules()
    {
		return [
			['image', 'file', 'extensions'=>'xml','maxSize'=>10*1024*1024]
		];
    }

    public function attributeLabels()
    {
        return [
            'image'=>'Файл загрузки (xml)'
			];
    }
    public function upload()
    {
         $path=Yii::$app->params['load_xml_dir'];
        $filename=$path . $this->image->baseName . '.' . $this->image->extension;
        if ($this->validate()) {
            $this->image->saveAs($filename);
            return $filename;
        } else {
            return false;
        }
    }
}