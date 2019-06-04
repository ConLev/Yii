<?php

namespace app\models\forms;

use app\models\events\EventUserRegistrationComplete;
use app\models\SubscribeBehavior;
use app\models\tables\Users;
use yii\base\Model;

class RegisterUserForm extends Model
{
    public $username;
    public $password;
//    public $email;

    const EVENT_REGISTRATION_BEGIN = 'registration_begin';
    const EVENT_REGISTRATION_VALIDATE_SUCCESS = 'registration_validate_success';
    const EVENT_REGISTRATION_COMPLETE = 'registration_complete';

    public function rules()
    {
        return [
//            [['username', 'password', 'email'], 'required'],
            [['username', 'password'], 'required'],
//            ['email', 'email'],
            ['password', 'string', 'min' => '8']
        ];
    }

    public function behaviors()
    {
        return [
            'my' => [
                'class' => SubscribeBehavior::class,
                'message' => "Не очень то и дружелюбное"
            ]
        ];
    }

    public function register()
    {
        echo "begin<br>";
        $this->trigger(self::EVENT_REGISTRATION_BEGIN);
        if ($this->validate()) {
            echo "validate<br>";
            $this->trigger(self::EVENT_REGISTRATION_VALIDATE_SUCCESS);
            $user = new Users($this->toArray());
            if ($user->save()) {
                echo "save<br>";
                $event = new EventUserRegistrationComplete(['userId' => $user->id]);
                $this->trigger(self::EVENT_REGISTRATION_COMPLETE, $event);
                return true;
            }
        }
        return false;
    }
}