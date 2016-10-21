<?php
namespace bl\socialShare\classes;

use bl\socialShare\base\SocialNetwork;
use yii\helpers\Html;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @property string $_route
 * @property string $label
 * @property array $attributes
 *
 * @property string $message
 */
class Telegram extends SocialNetwork
{
    /**
     * @var string adding message for share link
     */
    public $message = null;

    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $component)
    {
        $this->_route = "https://telegram.me/share/url?url=$url";
        $this->_route .= ($this->message !== null) ? "&text=$this->message" : "";

        if($component->defaultIcons) {
            $this->label = Html::tag('i', '', ['class' => 'si-telegram']);
        }

        return $this->initLink($component);
    }
}