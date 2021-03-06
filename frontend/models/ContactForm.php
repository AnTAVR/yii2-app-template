<?php

namespace frontend\models;

use common\helpers\Url;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email', 'enableIDN' => true],
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
            'name' => Yii::t('app', 'Имя'),
            'email' => Yii::t('app', 'E-mail'),
            'subject' => Yii::t('app', 'Тема'),
            'body' => Yii::t('app', 'Сообщение'),
            'verifyCode' => Yii::t('app', 'Kод проверки'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo(Url::email2ascii($email))
            ->setFrom([Url::email2ascii($this->email) => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
