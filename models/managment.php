<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Managment extends ActiveRecord
{
    public static function tableName()
    {
        return 'events';
    }

    public function rules()
    {
        return [
            [['title', 'date', 'time', 'location', 'description'], 'required'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['time'], 'safe'],
            [['location'], 'string', 'max' => 255],
            [['description'], 'string'],
        ];
    }
}
