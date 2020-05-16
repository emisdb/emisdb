<?php

namespace app\modules\book\models;

/**
 * This is the ActiveQuery class for [[TestAuthor]].
 *
 * @see TestAuthor
 */
class TestAuthorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TestAuthor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TestAuthor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
