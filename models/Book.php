<?php

namespace app\models;
use \yii\db\Expression;

class Book extends \yii\db\ActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Comments the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function rules()
    {
        return [
            [['name'], 'required'],
            ['name', 'string']
        ];
    }
 
    /**
     * @return string the associated database table name
     */
    public static function tableName()
    {
        return 'book';
    }
 
    /**
     * @return array primary key of the table
     **/
    public static function primaryKey()
    {
        return array('id');
    }
 
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'created' => 'Created',
            'updated' => 'Updated',
        );
    }
    
    public function beforeSave($insert)
    {
        if ($this->isNewRecord)
        {
            $this->created = new Expression('NOW()');
            $command = static::getDb()->createCommand("select max(id) as id from book")->queryAll();
            $this->id = $command[0]['id'] + 1;
        }

        $this->updated = new Expression('NOW()');
        return parent::beforeSave($insert);
    }
    
    public function createTestData($count)
    {
        $command = static::getDb()->createCommand("select max(id) as id from book")->queryAll();
        $begin = $command[0]['id'] + 1;
        
        for ($i = 1; $i < $count; ++$i)
        {
            $model = new Book;
            $model->name = "Книга " . ($begin + $i);
            $model->save();
        }
    }
    
    public function createLink($all)
    {
        $connection = \Yii::$app->db;

        $command=$connection->createCommand("SELECT id FROM book");
        $command->execute();   
        $data = $command->query();
        $book = $data->readAll();
        $bookSize = sizeof($book);
        
        $command=$connection->createCommand("SELECT id FROM author");
        $command->execute();   
        $data = $command->query();
        $author = $data->readAll();
        $authorSize = sizeof($author);
        
        $command=$connection->createCommand("SELECT id FROM reader");
        $command->execute();   
        $data = $command->query();
        $reader = $data->readAll();
        $readerSize = sizeof($reader);
        
        $query = "INSERT INTO book_author (book_id, author_id) VALUES ";        
        for ($i = 0; $i < $all; ++$i)
        {
            if ($i > 0)
                $query .= ",";
            $query .= "(" . $book[mt_rand(0, $bookSize - 1)]['id'] . "," . $author[mt_rand(0, $authorSize - 1)]['id'] . ")";
        }
        
        $command=$connection->createCommand($query);
        $command->execute();  
        
        $query = "INSERT INTO book_reader (book_id, reader_id) VALUES ";        
        for ($i = 0; $i < $all; ++$i)
        {
            if ($i > 0)
                $query .= ",";
            $query .= "(" . $book[mt_rand(0, $bookSize - 1)]['id'] . "," . $reader[mt_rand(0, $authorSize - 1)]['id'] . ")";
        }
        
        $command=$connection->createCommand($query);
        $command->execute(); 
    }
}

