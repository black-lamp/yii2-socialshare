<?php
namespace bl\socialShare\classes;

use yii\helpers\Html;

use bl\socialShare\base\SocialNetwork;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @property string $_link
 * @property string $label
 * @property array $attributes
 */
class GooglePlus extends SocialNetwork
{
    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $htmlAttrs)
    {
        $this->_link = "https://plusone.google.com/_/+1/confirm?hl=en&url=$url";

        $this->addCustomAttributes($htmlAttrs);

        return Html::a($this->label, $this->_link, $this->attributes);
    }
}