<?php
namespace bl\socialShare\classes;

use frontend\components\socialShare\base\SocialNetwork;
use yii\helpers\Html;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class Vkontakte extends SocialNetwork
{
    /**
     * @param string $url
     * @param string $title
     * @param string $description
     * @param string $image
     * @return string
     */
    public function getLink($url, $title, $description, $image) {
        $this->_link = "http://vk.com/share.php?
                        url=$url
                        &title=$title
                        &description=$description
                        &image=$image";

        $this->attributes['target'] = '_blank';
        return Html::a($this->label, $this->_link, $this->attributes);
    }
}