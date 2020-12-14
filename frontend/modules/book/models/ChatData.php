<?php
namespace app\modules\book\models;

use Yii;
use yii\base\Model;


class ChatData extends Model
{
    public $data;
    public function rules() {
        return [
            [['data'],'string','max'=>128]
        ];
    }
           public function attributeLabels()
    {
        return [
            'data' => 'Message',
    ];
        
    }
    
}