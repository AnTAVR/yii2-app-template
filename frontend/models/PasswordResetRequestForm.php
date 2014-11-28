<?php
namespace frontend\models;

use common\helpers\Url;
use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email', 'enableIDN' => true],
            ['email', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => Yii::t('app', 'Пользователь с этим E-mail не зарегистрирован или заблокирован.')
            ],
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
            'email' => Yii::t('app', 'E-mail'),
            'verifyCode' => Yii::t('app', 'Kод проверки'),
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if ($user) {
            if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

            if ($user->save()) {
                return Yii::$app->mailer->compose('passwordResetToken', ['user' => $user])
                    ->setFrom([Url::email2ascii(Yii::$app->params['supportEmail']) => Yii::$app->name . ' robot'])
                    ->setTo(Url::email2ascii($this->email))
                    ->setSubject(Yii::t('app', 'Восстановление пароля для {user}',['user'=>Yii::$app->name]))
                    ->send();
            }
        }

        return false;
    }
}
