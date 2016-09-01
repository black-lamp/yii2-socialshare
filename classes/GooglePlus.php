<?php
namespace bl\socialShare\classes;

use bl\socialShare\base\SocialNetwork;
use yii\helpers\Html;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class GooglePlus extends SocialNetwork
{
    /**
     * @param string $url
     * @param string $title
     * @param string $description
     * @param string $image
     * @return string
     */
    public function getLink($url, $title, $description, $image) {
        $this->_link = "https://plusone.google.com/_/+1/confirm?hl=en&url=$url";

        $this->attributes['target'] = '_blank';
        return Html::a($this->label, $this->_link, $this->attributes);
    }
}