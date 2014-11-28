<?php
namespace frontend\models;

use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('app', 'Этот логин уже зарегистрирован.')],
            ['username', 'string', 'min' => Yii::$app->params['minUsername'], 'max' => Yii::$app->params['maxUsername']],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email', 'enableIDN' => true],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('app', 'Этот E-mail уже зарегистрирован.')],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['minPassword']],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'required'],
            ['verifyCode', 'captcha', 'captchaAction' => '/site/captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Логин'),
            'password' => Yii::t('app', 'Пароль'),
            'email' => Yii::t('app', 'E-mail'),
            'verifyCode' => Yii::t('app', 'Kод проверки'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();
            return $user;
        }

        return null;
    }
}
