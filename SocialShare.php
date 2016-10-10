<?php
namespace bl\socialShare;

use yii\base\Component;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
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
 *                  // not required
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
 *      ]
 * ]
 * ```
 */
class SocialShare extends Component
{
    public $networks = [];

    /**
     * Getter for $networks
     * @return array
     */
    public function getNetworks() {
        return $this->networks;
    }
}