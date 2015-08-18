<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Library]].
 *
 * @see Library
 */
class LibraryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Library[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Library|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}