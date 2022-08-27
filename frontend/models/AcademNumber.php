<?php

namespace frontend\models;

use Yii;


/**
 * This is the model class for table "academ_number".
 *
 * @property int $product
 * @property int $base
 * @property double $number
 * @property double $sum
 *
 * @property AcademBases $base0
 * @property AcademProduct $product0
 */
class AcademNumber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'academ_number';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product', 'base'], 'required'],
            [['product', 'base'], 'integer'],
            [['number', 'sum'], 'number'],
            [['product', 'base'], 'unique', 'targetAttribute' => ['product', 'base']],
            [['base'], 'exist', 'skipOnError' => true, 'targetClass' => AcademBases::className(), 'targetAttribute' => ['base' => 'id']],
            [['product'], 'exist', 'skipOnError' => true, 'targetClass' => AcademProduct::className(), 'targetAttribute' => ['product' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product' => 'Product',
            'base' => 'Base',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct0()
    {
        return $this->hasOne(AcademProduct::className(), ['id' => 'product']);
    }
}
