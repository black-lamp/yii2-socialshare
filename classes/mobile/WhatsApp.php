<?php
namespace bl\socialShare\classes\mobile;

use yii\helpers\Html;

use bl\socialShare\base\SocialNetwork;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class WhatsApp extends SocialNetwork
{
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