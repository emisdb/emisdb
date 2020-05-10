<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "academ_product".
 *
 * @property int $id
 * @property string $id_out
 * @property string $name
 *
 * @property AcademNumber[] $academNumbers
 * @property AcademBases[] $bases
 */
class AcademProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'academ_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_out', 'name'], 'required'],
            [['id_out', 'name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_out' => 'Id Out',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademNumbers()
    {
        return $this->hasMany(AcademNumber::className(), ['product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBases()
    {
        return $this->hasMany(AcademBases::className(), ['id' => 'base'])->viaTable('academ_number', ['product' => 'id']);
    }
}
