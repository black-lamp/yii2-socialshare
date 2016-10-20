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
 */
class GooglePlus extends SocialNetwork
{
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