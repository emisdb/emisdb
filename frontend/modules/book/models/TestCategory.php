<?php

namespace app\modules\book\models;

use Yii;

/**
 * This is the model class for table "test_category".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property TestBook[] $testBooks
 */
class TestCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[TestBooks]].
     *
     * @return \yii\db\ActiveQuery|TestBookQuery
     */
    public function getTestBooks()
    {
        return $this->hasMany(TestBook::className(), ['category' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TestCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TestCategoryQuery(get_called_class());
    }
}
