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
 *
 * @property string $color
 */
class Pinterest extends SocialNetwork
{
    /**
     * @var string official color
     */
    static public $color = "#bd081c";

    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $component)
    {
        $this->_route = "https://www.pinterest.com/pin/create/link/"
                        ."?url=$url"
                        ."&media=$image"
                        ."&description=$description";

        if($component->defaultIcons) {
            $this->label = Html::tag('i', '', ['class' => 'si-pinterest']);
        }

        return $this->initLink($component);
    }
}