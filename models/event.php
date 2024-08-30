<?php

namespace app\models;

use Firebase\JWT\JWT;
use yii\db\ActiveRecord;
use Yii;
use yii\web\IdentityInterface;

/**
 * Event model
 */
class event extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event'; // Ensure this matches your actual table name
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname' , 'email' , 'password'] , 'required'],
            ['email' , 'email'],
            ['password' , 'string' , 'min' => 6]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Event Name',
            'location' => 'Location',
            'date' => 'Date',
            'time' => 'Time',
            'description' => 'Description',
        ];
    }

    /**
     * Signs up an event (for example, save to the database).
     * @return boolean whether the event is saved successfully
     */
    public function signup()
    {
        if (!$this->validate()) {
            return false;
        }

        // Save the event record
        $this->password = Yii::$app->security->generatePasswordHash($this->password);
        return $this->save();
    }

    /**
     * Finds an event by name.
     * @param string $name
     * @return Event|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    /**
     * Generates a JWT token for the event.
     * @return string JWT token
     */
    public function generateJwtToken()
    {
        $key = Yii::$app->params['jwtSecretKey']; // Store this key securely
        $payload = [
            'iat' => time(), // Issued at
            'exp' => time() + 3600, // Token expiration time
            'sub' => $this->id, // Event ID
        ];

        $algorithm = 'HS256'; // Specify the algorithm to use

        return JWT::encode($payload, $key, $algorithm);
    }

    // Implement IdentityInterface methods (if needed)
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // If you're not using access tokens, you can leave this method unimplemented or return null.
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id; // Ensure `id` is the primary key in your `event` table
    }

    public function validatePassword($password){
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        // If using auth keys, return the auth_key from the database
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        // Return the auth_key comparison if needed
    }
}
