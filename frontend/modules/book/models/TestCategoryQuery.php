<?php

namespace app\modules\book\models;

/**
 * This is the ActiveQuery class for [[TestCategory]].
 *
 * @see TestCategory
 */
class TestCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TestCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TestCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
