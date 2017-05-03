<?php
namespace frontend\models;

use Yii;
use yii\base\Model;


class SiteData extends Model
{
    public $data;
    public function rules() {
        return [
            [['data'],'string','max'=>12]
        ];
    }
           public function attributeLabels()
    {
        return [
            'data' => 'The data to save',
    ];
        
    }
    
}