<?php
namespace frontend\components\socialShare\widgets;

use yii;
use yii\base\Widget;
use frontend\components\socialShare;
use frontend\components\socialShare\base\SocialNetwork;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class SocialShareWidget extends Widget
{
    /**
     * @var string $url Url to yor website
     */
    public $url;
    /**
     * @var string $title Title of the page
     */
    public $title;
    /**
     * @var string $description Page description
     */
    public $description;
    /**
     * @var string $image Link to image
     */
    public $image;

    protected $_links = [];

    public function init() {
        $networks = Yii::$app->socialShare->getNetworks();

        foreach($networks as $network) {
            /** @var SocialNetwork $networkClassObj */
            $networkClassObj = Yii::createObject($network);
            $this->_links[] = $networkClassObj->getLink(
                $this->url,
                $this->title,
                $this->description,
                $this->image
            );
        }
    }

    public function run() {
        return $this->render('social_buttons', [
            'links' => $this->_links
        ]);
    }
}