<?php
namespace bl\socialShare\classes;

use bl\socialShare\base\SocialNetwork;
use yii\helpers\Html;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @property string $_link
 * @property string $label
 * @property array $attributes
 */
class Twitter extends SocialNetwork
{
    public $account;

    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $htmlAttrs)
    {
        $this->_link = "http://twitter.com/share?url=$url&text=$description&via=$this->account";

        $this->attributes['target'] = '_blank';
        if(!empty($htmlAttrs)) {
            foreach ($htmlAttrs as $name => $value) {
                $this->attributes[$name] = $value;
            }
        }

        return Html::a($this->label, $this->_link, $this->attributes);
    }
}