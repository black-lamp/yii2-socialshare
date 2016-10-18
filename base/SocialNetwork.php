<?php
namespace bl\socialShare\base;

use yii;
use yii\base\Object;

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
     * @var string $_link
     */
    protected $_link;

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
     * Method for adding custom HTML attributes to the social share link
     *
     * @param array $htmlAttrs
     */
    protected function addCustomAttributes($htmlAttrs)
    {
        $this->attributes['target'] = '_blank';
        if(!empty($htmlAttrs)) {
            foreach ($htmlAttrs as $name => $value) {
                $this->attributes[$name] = $value;
            }
        }
    }

    /**
     * Method for getting link to the social network
     *
     * @param string $url Url to your website
     * @param string $title Title of the page
     * @param string $description Page description
     * @param string $image Link to image
     * @param array $htmlAttrs HTML  attributes from SocialShare component config
     * @return string Return HTML tag <a>
     * @see SocialShare
     */
    abstract public function getLink($url, $title, $description, $image, $htmlAttrs);
}