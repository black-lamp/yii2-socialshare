<?php
namespace bl\socialShare\base;

use yii;
use yii\base\Object;
use yii\helpers\Html;

use bl\socialShare\SocialShare;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @property string $label
 * @property array $attributes
 */
abstract class SocialNetwork extends Object
{
    /**
     * Social network link label
     * @var string $label
     */
    public $label;
    /**
     * HTML attributes for tag <a>
     * @var array $attributes
     */
    public $attributes = [];
    /**
     * Link to the social network
     * @var string $_route
     */
    protected $_route = null;

    /**
     * Method for adding meta tags to <head> from array
     *
     * @param array $metaTags
     */
    protected function addMetaTags($metaTags = [])
    {
        foreach($metaTags as $tagOptions) {
            Yii::$app->view->registerMetaTag($tagOptions);
        }
    }

    /**
     * Method for initialize link to the social network
     *
     * @param SocialShare $component
     * @return string HTML lint to social network
     */
    protected function initLink($component = null)
    {
        if($component !== null && $this->_route !== null) {
            // init seo attributes
            $seoAttributes = $component->getSeoAttributes();
            if($component->enableSeo && !empty($seoAttributes)) {
                $this->attributes = array_merge($this->attributes, $seoAttributes);
            }

            // init global and custom attributes
            $attributes = $component->getAttributes();
            if(!empty($attributes)) {
                foreach ($attributes as $name => $value) {
                    $this->attributes[$name] = $value;
                }
            }

            return Html::a($this->label, $this->_route, $this->attributes);
        }
    }

    /**
     * Method for getting link to the social network
     *
     * @param string $url Url to your website
     * @param string $title Title of the page
     * @param string $description Page description
     * @param string $image Link to image
     * @param SocialShare $component
     * @return string Return HTML tag <a>
     * @see SocialShare
     */
    abstract public function getLink($url, $title, $description, $image, $component);
}