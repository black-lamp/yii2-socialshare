<?php
namespace bl\socialShare;

use yii\base\Object;

use bl\socialShare\widgets\SocialShareWidget;

/**
 * Component for configuration of social network classes
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @link https://github.com/black-lamp/yii2-socialshare
 * @license https://opensource.org/licenses/GPL-3.0 GNU Public License
 *
 * @property array $networks
 * @property array $attributes
 * @property boolean $defaultIcons
 * @property boolean $enableSeo
 * @property array $seoAttributes
 *
 * @see SocialShareWidget
 *
 * Example
 * ```php
 * 'components' => [
 *      // ...
 *      'socialShare' => [
 *          'class' => bl\socialShare\SocialShare::className(),
 *          'attributes' => [
 *              'class' => 'social-btn' // html class
 *          ],
 *          'networks' => [
 *              'facebook' => [
 *                  'class' => bl\socialShare\classes\Facebook::className(),
 *                  'label' => 'Facebook'
 *              ],
 *              'twitter' => [
 *                  'class' => bl\socialShare\classes\Twitter::className(),
 *                  'label' => 'Twitter',
 *                  // custom option for Twitter class
 *                  'account' => 'username'
 *              ],
 *              // other social networks ...
 *          ]
 *      ],
 * ]
 * ```
 */
class SocialShare extends Object
{
    /**
     * @var array Configuration social networks classes
     */
    public $networks = [];

    /**
     * @var array HTML attributes for all links
     */
    public $attributes = [];

    /**
     * @var boolean If set `true` for all links will be used font-icons
     * instead text labels
     */
    public $defaultIcons = false;

    /**
     * @var boolean If set `true` for all links will be appended
     * SEO attributes from $seoAttributes array
     */
    public $enableSeo = true;

    /**
     * @var array of SEO attributes for link
     */
    public $seoAttributes = [
        'target' => '_blank',
        'rel' => 'nofollow'
    ];

    /**
     * Getter for $networks
     * @return array
     */
    public function getNetworks()
    {
        return $this->networks;
    }

    /**
     * Getter for $attributes
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Getter for $seoAttributes
     * @return array
     */
    public function getSeoAttributes()
    {
        return $this->seoAttributes;
    }
}