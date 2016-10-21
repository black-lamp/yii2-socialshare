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
 * @property string $account
 */
class Twitter extends SocialNetwork
{
    /**
     * @var string Twitter login without `@` symbol
     */
    public $account = null;

    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $component)
    {
        $this->_route = "http://twitter.com/share?"
                        ."url=$url"
                        ."&text=$description";
        $this->_route .= ($this->account !== null) ? "&via=$this->account" : "";

        if($component->defaultIcons) {
            $this->label = Html::tag('i', '', ['class' => 'si-twitter']);
        }

        return $this->initLink($component);
    }
}