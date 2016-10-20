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
class Vkontakte extends SocialNetwork
{
    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $component)
    {
        $this->_route = "http://vk.com/share.php?"
                        ."url=$url"
                        ."&title=$title"
                        ."&description=$description"
                        ."&image=$image";

        if($component->defaultIcons) {
            $this->label = Html::tag('i', '', ['class' => 'si-vk']);
        }

        return $this->initLink($component);
    }
}