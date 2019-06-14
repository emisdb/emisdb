<?php

namespace frontend\models;
use Yii;

/**
 * This is the model class for table "academ_bases".
 *
 * @property int $id
 * @property string $name
 * @property string $base_id
 *
 * @property AcademNumber[] $academNumbers
 * @property AcademProduct[] $products
 * @property AcademProductName[] $academProductNames
 */
class AcademBases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'academ_bases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'base_id'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['base_id'], 'string', 'max' => 16],
            [['base_id'], 'unique'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'base_id' => 'Base ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademNumbers()
    {
        return $this->hasMany(AcademNumber::className(), ['base' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(AcademProduct::className(), ['id' => 'product'])->viaTable('academ_number', ['base' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademProductNames()
    {
        return $this->hasMany(AcademProductName::className(), ['base' => 'id']);
    }
    
    public function getProductsnum()
    {
        // Customer has_many Order via Order.customer_id -> id
        return $this->hasMany(AcademNumber::className(), ['base' => 'id'])->count();
    }

}
