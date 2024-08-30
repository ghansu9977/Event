<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read Event|null $event
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    // public $rememberMe = true;

    private $_event = false; // Add this private property

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'], // Ensure the email is valid
            // ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $event = $this->getEvent();

            if (!$event || !$event->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect email or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided email and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getEvent());
        }
        return false;
    }

    /**
     * Finds event by [[email]]
     *
     * @return Event|null
     */
    public function getEvent()
    {
        if ($this->_event === false) {
            $this->_event = Event::findByEmail($this->email); // Use Event model
        }

        return $this->_event;
    }
}
