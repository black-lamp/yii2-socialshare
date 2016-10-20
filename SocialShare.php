<?php
namespace bl\socialShare;

use yii\base\Object;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @property array $networks
 * @property array $attributes
 * @property boolean $defaultIcons
 *
 * Installation
 * Add this component to application config
 * ```php
 * 'components' => [
 *      // ...
 *      'socialShare' => [
 *          'class' => bl\socialShare\SocialShare::className(),
 *          'networks' => [
 *              'facebook' => [
 *                  'class' => bl\socialShare\classes\Facebook::className(),
 *                  // not required parameters section
 *                  'label' => 'Facebook',
 *                  // html attributes
 *                  'attributes' => [
 *                      'class' => 'social-btn' // html class
 *                  ]
 *              ],
 *              'twitter' => [
 *                  'class' => bl\socialShare\classes\Twitter::className(),
 *                  'label' => 'Twitter',
 *                  'account' => 'username',
 *                  'attributes' => [
 *                      'class' => 'social-btn'
 *                  ]
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
     * Getter for $networks
     * @return array
     */
    public function getNetworks()
    {
        return $this->networks;
    }

    /**
     * Getter fot attributes
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}