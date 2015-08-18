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

    public function getRelLibraryBooks()
    {
        return $this->hasMany(\app\models\RelLibraryBook::className(), ['library_id' => 'library_id']);
    }

    public function getBooks()
    {
        return $this->hasMany(\app\models\Book::className(), ['book_id' => 'book_id'])->viaTable('rel_library_book', ['library_id' => 'library_id']);
    }

    public function insertBook($book)
    {
        $model = \app\models\RelLibraryBook::findOne(['library_id' => $this->library_id, 'book_id' => $book->book_id]);
        if ($model !== null ) {
            return false;
        }
        $model = new \app\models\RelLibraryBook();
        $model->library_id =  $this->library_id;
        $model->book_id =  $book->book_id;
        return $model->save(false);        
    }

    public function removeBook($book)
    {
        $model = \app\models\RelLibraryBook::findOne(['library_id' => $this->library_id, 'book_id' => $book->book_id]);
        if ($model === null ) {
            return false;
        }
        return $model->delete();    
    }

     public function afterDelete()
     {
          foreach($this->relLibraryBooks as $relLibraryBook) {
               $relLibraryBook->delete();
          }
          parent::afterDelete();
     }
    
}
