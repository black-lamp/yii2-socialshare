<?php
namespace bl\socialShare\widgets;

use yii;
use yii\base\Widget;

use bl\socialShare\SocialShare;
use bl\socialShare\base\SocialNetwork;

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
    public function init() {
        $component = $this->componentId;
        $networks = Yii::$app->$component->getNetworks();

        foreach($networks as $network) {
            /** @var SocialNetwork $networkObj */
            $networkObj = Yii::createObject($network);

            $this->_links[] = $networkObj->getLink(
                $this->url,
                $this->title,
                $this->description,
                $this->image
            );
        }
    }

    /**
     * @inheritdoc
     */
    public function run() {
        parent::run();
        return $this->render('social_buttons', [
            'links' => $this->_links
        ]);
    }
}