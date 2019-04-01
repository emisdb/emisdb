<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "academ_product".
 *
 * @property integer $id
 * @property integer $base
 * @property string $id_out
 * @property string $name
 * @property double $number
 * @property double $sum
 *
 * @property AcademBases $base0
 */
class AcademProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'academ_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['base', 'id_out', 'name', 'number', 'sum'], 'required'],
            [['base'], 'integer'],
            [['id_out', 'name'], 'string'],
            [['number', 'sum'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'base' => 'Base',
            'id_out' => 'Id Out',
            'name' => 'Name',
            'number' => 'Number',
            'sum' => 'Sum',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBase0()
    {
        return $this->hasOne(AcademBases::className(), ['id' => 'base']);
    }
}
