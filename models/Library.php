<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "library".
 *
 * @property integer $library_id
 * @property string $name
 */
class Library extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'library_id' => Yii::t('app', 'Library ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @inheritdoc
     * @return LibraryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibraryQuery(get_called_class());
    }

    public function appendBook($book)
    {
    }
    
}
