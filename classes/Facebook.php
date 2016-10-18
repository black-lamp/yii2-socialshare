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
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $htmlAttrs) {
        $this->_link = "http://www.facebook.com/sharer.php?u=$url";

        $metaTags = [
            ['property' => 'og:url', 'content' => $url],
            ['property' => 'og:type', 'content' => 'website'],
            ['property' => 'og:title', 'content' => $title],
            ['property' => 'og:description', 'content' => $description],
            ['property' => 'og:image', 'content' => $image],
        ];
        $this->addMetaTags($metaTags);

        $this->addCustomAttributes($htmlAttrs);

        return Html::a($this->label, $this->_link, $this->attributes);
    }
}