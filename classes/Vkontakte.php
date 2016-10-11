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
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $htmlAttrs)
    {
        $this->_link = "http://vk.com/share.php?url=$url&title=$title&description=$description&image=$image";

        $this->attributes['target'] = '_blank';
        if(!empty($htmlAttrs)) {
            foreach ($htmlAttrs as $name => $value) {
                $this->attributes[$name] = $value;
            }
        }

        return Html::a($this->label, $this->_link, $this->attributes);
    }
}