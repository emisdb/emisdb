<?php

namespace frontend\models;

use Yii;
use yii\helpers\Html;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "languages".
 *
 * @property integer $id_languages
 * @property string $shortname
 * @property string $germanname
 * @property string $englishname
 * @property string $flagpic
 */
class Languages extends ActiveRecord
{
    public $img_local;
    public $position;
    public function afterFind() {
        $this->img_local= Html::img(Yii::$app->homeUrl.'images/langs/'.$this->flagpic,['width'=>'40px','style'=>'border:1px double rgb(124,124,64);']);
        
    }
    public static function SetNumbers($result) {
                $langs= Languages::find()->orderBy('shortname')->all();
                $ii=0;
                foreach ($langs as $lang) {
                    $ii++;
                 foreach ($result as $res) {
                     if($lang->id_languages==$res->id_languages) $res->position=$ii;
                 }
                }
        
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['flagpic'], 'required'],
            [['shortname'], 'string', 'max' => 3],
            [['germanname', 'englishname', 'flagpic'], 'string', 'max' => 45],
            [['flagpic'],'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_languages' => 'Id Languages',
            'shortname' => 'Short name',
            'germanname' => 'German name',
            'englishname' => 'English name',
            'flagpic' => 'Flag',
        ];
    }
}
