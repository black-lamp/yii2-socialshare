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
class Facebook extends SocialNetwork
{
    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $component) {
        $this->_route = "http://www.facebook.com/sharer.php?u=$url";

        $metaTags = [
            ['property' => 'og:url', 'content' => $url],
            ['property' => 'og:type', 'content' => 'website'],
            ['property' => 'og:title', 'content' => $title],
            ['property' => 'og:description', 'content' => $description],
            ['property' => 'og:image', 'content' => $image],
        ];
        $this->addMetaTags($metaTags);

        if($component->defaultIcons) {
            $this->label = Html::tag('i', '', ['class' => 'si-facebook']);
        }

        return $this->initLink($component);
    }
}