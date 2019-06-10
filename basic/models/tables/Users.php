<?php

namespace app\models\tables;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $created
 * @property string $updated
 *
 * @property Tasks[] $tasks
 * @property Tasks[] $tasks0
 */
class Users extends ActiveRecord
{
    const SCENARIO_AUTH = 'auth';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['username', 'password'], 'required', 'on' => static::SCENARIO_AUTH],
            [['username', 'password', 'email'], 'required'],
            [['email'], 'email'],
            [['username', 'password', 'email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['creator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks0()
    {
        return $this->hasMany(Tasks::className(), ['responsible_id' => 'id']);
    }

    public function fields()
    {
        if ($this->scenario == static::SCENARIO_AUTH) {
            return [
//                'username' => 'login',
                'username',
                'id',
                'password',
                'email'
            ];
        }
        return parent::fields();
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public static function getUsersList()
    {
        return static::find()
            ->select(['username'])
            ->indexBy('id')
            ->column();
    }
}