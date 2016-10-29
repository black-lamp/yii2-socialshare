<?php
namespace bl\socialShare\widgets;

use yii;
use yii\base\Widget;

use bl\socialShare\SocialShare;
use bl\socialShare\base\SocialNetwork;
use bl\socialShare\assets\SocialIconsAsset;

/**
 * Widget for rendering share links for social networks
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @link https://github.com/black-lamp/yii2-socialshare
 * @license https://opensource.org/licenses/GPL-3.0 GNU Public License
 *
 * @property string $componentId
 * @property string $url
 * @property string $title
 * @property string $description
 * @property string $image
 *
 * @see SocialShare
 */
class SocialShareWidget extends Widget
{
    /**
     * @var string id of SocialShare component from config
     */
    public $componentId;

    /**
     * @var string Absolute URL to the page
     */
    public $url;

    /**
     * @var string Page title
     */
    public $title;

    /**
     * @var string Page description
     */
    public $description;

    /**
     * @var string Absolute URL to the image for page
     */
    public $image;

    /**
     * @var array
     */
    protected $_links = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $componentId = $this->componentId;
        /** @var SocialShare $socialShare */
        $socialShare = Yii::$app->$componentId;

        $networkClasses = $socialShare->getNetworks();

        foreach($networkClasses as $networkClass) {
            /** @var SocialNetwork $network */
            $network = Yii::createObject($networkClass);

            $this->_links[] = $network->getLink(
                $this->url,
                $this->title,
                $this->description,
                $this->image,
                $socialShare
            );
        }

        if($socialShare->defaultIcons) {
            SocialIconsAsset::register($this->view);
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();

        return $this->render('social_buttons', [
            'links' => $this->_links
        ]);
    }
}