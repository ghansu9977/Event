<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "property".
 *
 * @property int $id
 * @property string $address
 * @property string $price
 * @property string|null $description
 * @property string|null $images
 * @property string $contactInfo
 * @property int $user
 * @property string|null $favorites
 *
 * @property User $user0
 */
class Property extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'price', 'contactInfo', 'user'], 'required'],
            [['price'], 'number'], // For DECIMAL type
            [['description', 'images', 'favorites'], 'string'],
            [['user'], 'integer'],
            [['address', 'contactInfo'], 'string', 'max' => 255],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'price' => 'Price',
            'description' => 'Description',
            'images' => 'Images',
            'contactInfo' => 'Contact Info',
            'user' => 'User',
            'favorites' => 'Favorites',
        ];
    }

    /**
     * Gets query for [[User0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::class, ['id' => 'user']);
    }
}
