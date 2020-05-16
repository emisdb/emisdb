<?php

namespace app\modules\book\models;

use Yii;

/**
 * This is the model class for table "test_book".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $category
 * @property int|null $author
 * @property int|null $year
 *
 * @property TestAuthor $author0
 * @property TestCategory $category0
 */
class TestBook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'author', 'year'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => TestAuthor::className(), 'targetAttribute' => ['author' => 'id']],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => TestCategory::className(), 'targetAttribute' => ['category' => 'id']],
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
            'category' => 'Category',
            'author' => 'Author',
            'year' => 'Year',
        ];
    }

    /**
     * Gets query for [[Author0]].
     *
     * @return \yii\db\ActiveQuery|TestAuthorQuery
     */
    public function getAuthor0()
    {
        return $this->hasOne(TestAuthor::className(), ['id' => 'author']);
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery|TestCategoryQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(TestCategory::className(), ['id' => 'category']);
    }

    /**
     * {@inheritdoc}
     * @return TestBookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TestBookQuery(get_called_class());
    }
}
