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
class Facebook extends SocialNetwork
{
    /**
     * @param string $url
     * @param string $title
     * @param string $description
     * @param string $image
     * @return string HTML link tag
     */
    public function getLink($url, $title, $description, $image) {
        $this->_link = "http://www.facebook.com/sharer.php?u=$url";

        $metaTags = [
            ['property' => 'og:url', 'content' => $url],
            ['property' => 'og:type', 'content' => 'website'],
            ['property' => 'og:title', 'content' => $title],
            ['property' => 'og:description', 'content' => $description],
            ['property' => 'og:image', 'content' => $image],
        ];
        $this->addMetaTags($metaTags);

        $this->attributes['target'] = '_blank';
        return Html::a($this->label, $this->_link, $this->attributes);
    }
}