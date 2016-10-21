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
 * @property string $siteName
 */
class LinkedIn extends SocialNetwork
{
    /**
     * @var string Title of your website
     */
    public $siteName = null;

    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $component)
    {
        $this->_route = "https://www.linkedin.com/shareArticle?mini=true"
                        ."&url=$url"
                        ."&title=$title"
                        ."&summary=$description";
        $this->_route .= ($this->siteName !== null) ? "&source=$this->siteName" : "";

        if($component->defaultIcons) {
            $this->label = Html::tag('i', '', ['class' => 'si-linkedin']);
        }

        return $this->initLink($component);
    }
}