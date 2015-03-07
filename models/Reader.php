<?php

namespace app\models;
use \yii\db\Expression;

class Reader extends \yii\db\ActiveRecord
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
        return 'reader';
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
            $command = static::getDb()->createCommand("select max(id) as id from reader")->queryAll();
            $this->id = $command[0]['id'] + 1;
        }

        $this->updated = new Expression('NOW()');
        return parent::beforeSave($insert);
    }
    
    public function createTestData($count)
    {
        $command = static::getDb()->createCommand("select max(id) as id from reader")->queryAll();
        $begin = $command[0]['id'] + 1;
        
        for ($i = 1; $i < $count; ++$i)
        {
            $model = new Reader;
            $model->name = "Читатель " . ($begin + $i);
            $model->save();
        }
    }
}

