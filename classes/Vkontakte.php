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
class Vkontakte extends SocialNetwork
{
    /**
     * @param string $url
     * @param string $title
     * @param string $description
     * @param string $image
     * @return string HTML link tag
     */
    public function getLink($url, $title, $description, $image) {
        $this->_link = "http://vk.com/share.php?url=$url&title=$title&description=$description&image=$image";

        $this->attributes['target'] = '_blank';
        return Html::a($this->label, $this->_link, $this->attributes);
    }
}