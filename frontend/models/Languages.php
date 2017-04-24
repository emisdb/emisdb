<?php

namespace frontend\models;

use Yii;
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
