<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "academ_bases".
 *
 * @property integer $id
 * @property string $name
 * @property string $base_id
 *
 * @property AcademProduct[] $academProducts
 */
class AcademBases extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'academ_bases';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'base_id'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['base_id'], 'string', 'max' => 10],
            [['base_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
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
    public function getAcademProducts()
    {
        return $this->hasMany(AcademProduct::className(), ['base' => 'id']);
    }
}
