<?php
namespace bl\socialShare;

use yii\base\Component;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class SocialShare extends Component
{
    /**
     * Configuration array
     * Example
     * ```php
     * 'socialShare' => [
     *       'class' => bl\SocialShare::className(),
     *       'networks' => [
     *           'facebook' => [
     *               'class' => bl\socialShare\classes\Facebook::className(),
     *               'label' => 'Facebook'
     *           ],
     *           'twitter' => [
     *               'class' => bl\socialShare\classes\Twitter::className(),
     *               'label' => 'Twitter',
     *               'params' => [
     *                   'account' => 'accountName'
     *               ]
     *           ],
     *           'vk' => [
     *               'class' => bl\socialShare\classes\Vkontakte::className(),
     *               'label' => 'VK'
     *           ],
     *           'googlePlus' => [
     *               'class' => bl\socialShare\classes\GooglePlus::className(),
     *               'label' => 'Google+'
     *           ]
     *       ]
     *   ]
     * ```
     */
    public $networks = [];

    /**
     * Getter for $networks
     * @return array
     */
    public function getNetworks() {
        return $this->networks;
    }
}