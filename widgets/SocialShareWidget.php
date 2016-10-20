<?php
namespace bl\socialShare\widgets;

use yii;
use yii\base\Widget;

use bl\socialShare\SocialShare;
use bl\socialShare\base\SocialNetwork;
use bl\socialShare\assets\SocialIconsAsset;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @link https://github.com/black-lamp/yii2-socialshare
 * @license https://opensource.org/licenses/GPL-3.0 GNU Public License
 *
 * @property string $componentId Id of SocialShare component
 * @property string $url Url to yor website
 * @property string $title Title of the page
 * @property string $description Page description
 * @property string $image Link to image
 *
 * @see SocialShare
 */
class SocialShareWidget extends Widget
{
    public $componentId;
    public $url;
    public $title;
    public $description;
    public $image;

    protected $_links = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $component = $this->componentId;
        $networkClasses = Yii::$app->$component->getNetworks();

        foreach($networkClasses as $networkClass) {
            /** @var SocialNetwork $network */
            $network = Yii::createObject($networkClass);

            $this->_links[] = $network->getLink(
                $this->url,
                $this->title,
                $this->description,
                $this->image,
                Yii::$app->$component
            );
        }

        if(Yii::$app->$component->defaultIcons) {
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