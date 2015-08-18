<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_library_book".
 *
 * @property integer $id
 * @property string $library_id
 * @property string $book_id
 */
class RelLibraryBook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_library_book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['library_id', 'book_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'library_id' => Yii::t('app', 'Library ID'),
            'book_id' => Yii::t('app', 'Book ID'),
        ];
    }
}
