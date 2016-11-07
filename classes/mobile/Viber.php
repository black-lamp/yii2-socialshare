<?php
namespace bl\socialShare\classes\mobile;

use yii\helpers\Html;

use bl\socialShare\base\SocialNetwork;

/**
 * Class for Viber
 * This link work only with mobile devices
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @property string $_route
 * @property string $label
 * @property array $attributes
 */
class Viber extends SocialNetwork
{
    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $component)
    {
        $this->_route = "viber://forward?text=$url";

        if($component->defaultIcons) {
            $this->label = Html::tag('i', '', ['class' => 'si-viber']);
        }

        return $this->initLink($component);
    }
}