<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "academ_product_name".
 *
 * @property int $id
 * @property int $base
 * @property string $name
 *
 * @property AcademBases $base0
 */
class AcademProductName extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'academ_product_name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['base', 'name'], 'required'],
            [['base'], 'integer'],
            [['name'], 'string'],
            [['base'], 'exist', 'skipOnError' => true, 'targetClass' => AcademBases::className(), 'targetAttribute' => ['base' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'base' => 'Base',
            'name' => 'Name',
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
