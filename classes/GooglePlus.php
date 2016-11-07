<?php
namespace bl\socialShare\classes;

use yii\helpers\Html;

use bl\socialShare\base\SocialNetwork;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @property string $_route
 * @property string $label
 * @property array $attributes
 *
 * @property string $color
 */
class GooglePlus extends SocialNetwork
{
    /**
     * @var string official color
     */
    static public $color = "#db4437";

    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $component)
    {
        $this->_route = "https://plusone.google.com/_/+1/confirm?hl=en&url=$url";

        if($component->defaultIcons) {
            $this->label = Html::tag('i', '', ['class' => 'si-google-plus']);
        }

        return $this->initLink($component);
    }
}