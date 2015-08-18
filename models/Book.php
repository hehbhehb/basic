<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $book_id
 * @property string $name
 * @property string $author_id
 * @property integer $pages_amount
 * @property string $publication
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'pages_amount'], 'required'],
            [['author_id', 'book_id'], 'integer'],
            [['pages_amount'], 'integer', 'min'=>1],            
            [['publication'], 'date', 'format'=>'yyyy-MM-dd'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'book_id' => Yii::t('app', 'Book ID'),
            'name' => Yii::t('app', 'Name'),
            'author_id' => Yii::t('app', 'Author ID'),
            'pages_amount' => Yii::t('app', 'Pages Amount'),
            'publication' => Yii::t('app', 'Publication Date'),
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['author_id' => 'author_id']);
    }

    public function getRelLibraryBooks()
    {
        return $this->hasMany(\app\models\RelLibraryBook::className(), ['book_id' => 'book_id']);
    }

     public function afterDelete()
     {
          foreach($this->relLibraryBooks as $relLibraryBook) {
               $relLibraryBook->delete();
          }
          parent::afterDelete();
     }
    
}
