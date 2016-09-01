<?php
namespace bl\socialShare\classes;

use bl\socialShare\base\SocialNetwork;
use yii\helpers\Html;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class Facebook extends SocialNetwork
{
    /**
     * @param string $url
     * @param string $title
     * @param string $description
     * @param string $image
     * @return string
     */
    public function getLink($url, $title, $description, $image) {
        $this->_link = "http://www.facebook.com/sharer.php?u=$url";

        $metaTags = [
            ['property' => 'og:url', 'content' => $url],
            ['property' => 'og:type', 'content' => 'website'],
            ['property' => 'og:description', 'content' => $title],
            ['property' => 'og:property', 'content' => $description],
            ['property' => 'og:image', 'content' => $image],
        ];
        $this->addMetaTags($metaTags);

        $this->attributes['target'] = '_blank';
        return Html::a($this->label, $this->_link, $this->attributes);
    }
}