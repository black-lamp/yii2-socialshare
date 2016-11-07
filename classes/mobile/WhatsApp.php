<?php
namespace bl\socialShare\classes\mobile;

use yii\helpers\Html;

use bl\socialShare\base\SocialNetwork;

/**
 * Class for WhatsApp
 * This link work only with mobile devices
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @property string $_route
 * @property string $label
 * @property array $attributes
 *
 * @property string $color
 */
class WhatsApp extends SocialNetwork
{
    /**
     * @var string official color
     */
    static public $color = "#00e676";

    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $component)
    {
        $this->_route = "whatsapp://send?text=$url";

        if($component->defaultIcons) {
            $this->label = Html::tag('i', '', ['class' => 'si-whatsapp']);
        }

        return $this->initLink($component);
    }
}