<?php
namespace common\widgets\TopLink;

use Yii;
use yii\base\Widget;

class TopLink extends Widget
{
    public $class = 'toplink';
    public $idw = 'toplink';
    public $icon = 'arrow-up';
    public $text;
    public $echoText = false;

    public function init()
    {
        if (empty($this->text))
            $this->text = Yii::t('app', 'Наверх');
        TopLinkAsset::register($this->view);
    }

    public function run()
    {
        return '<div id="' . $this->idw . '" class="' . $this->class . '" title="' . $this->text . '"><span class="glyphicon glyphicon-' . $this->icon . '"></span>' . ($this->echoText ? $this->text : '') . '</div>';
    }

}
