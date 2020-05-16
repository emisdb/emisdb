<?php

namespace app\modules\book\models;

use Yii;

/**
 * This is the model class for table "test_author".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property TestBook[] $testBooks
 */
class TestAuthor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_author';
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
        return $this->hasMany(TestBook::className(), ['author' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TestAuthorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TestAuthorQuery(get_called_class());
    }
}
