<?php

namespace app\modules\book\models;

/**
 * This is the ActiveQuery class for [[TestBook]].
 *
 * @see TestBook
 */
class TestBookQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TestBook[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TestBook|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
