<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class FileForm extends Model
{
	public $image;
	public $csv;

	/**
     * Declares the validation rules.
     */
    public function rules()
    {
		return [
			[['image'], 'file', 'extensions'=>['xml'],'maxSize'=>10*1024*1024],
			[['csv'], 'file', 'extensions'=>['csv'],'checkExtensionByMimeType' => false, 'maxSize'=>10*1024*1024]
		];
    }

    public function attributeLabels()
    {
        return [
			'image'=>'Файл загрузки (xml)',
           'csv'=>'Файл загрузки (csv)'
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
	public function upload_csv()
	{
		$path=Yii::$app->params['load_xml_dir'];
		$filename=$path . $this->csv->baseName . '.' . $this->csv->extension;
		if ($this->validate()) {
			$this->csv->saveAs($filename);
			return $filename;
		} else {
			return false;
		}
	}
}