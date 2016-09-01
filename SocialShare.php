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
     *       'class' => bl\socialShare\SocialShare::className(),
     *       'networks' => [
     *           'facebook' => [
     *               'class' => bl\socialShare\classes\Facebook::className(),
     *               'label' => 'Facebook',
     *               'attributes' => [
     *                   'class' => 'social-share'
     *               ]
     *           ],
     *           'twitter' => [
     *               'class' => bl\socialShare\classes\Twitter::className(),
     *               'label' => 'Twitter',
     *               'account' => 'twitterAccount',
     *               'attributes' => [
     *                   'class' => 'social-share'
     *               ]
     *           ],
     *           'googlePlus' => [
     *               'class' => bl\socialShare\classes\GooglePlus::className(),
     *               'label' => 'Google+',
     *               'attributes' => [
     *                   'class' => 'social-share',
     *                   'id' => 'google'
     *               ]
     *           ],
     *           'vk' => [
     *               'class' => bl\socialShare\classes\Vkontakte::className(),
     *               'label' => 'vk',
     *               'attributes' => [
     *                   'class' => 'social-share'
     *               ]
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