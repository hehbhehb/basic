<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property integer $author_id
 * @property string $first_name
 * @property string $last_name
 * @property string $birth
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birth'], 'date', 'format'=>'yyyy-MM-dd'],            
            [['first_name', 'last_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'author_id' => Yii::t('app', 'Author ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'birth' => Yii::t('app', 'Birth Date'),
        ];
    }

    public static function getAllAuthorDropDownList()
    {
        $authors = self::find()->all();
        foreach ($authors as $author) {
            $rows[$author->author_id] = $author->getLongName();
        }
        return $rows;
    }

    public function getLongName()
    {
        return $this->first_name . ' '. $this->last_name;
    }

    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['author_id' => 'author_id']);
    }

     public function afterDelete()
     {
          foreach($this->books as $book) {
               $book->delete();
          }
          parent::afterDelete();
     }

}
