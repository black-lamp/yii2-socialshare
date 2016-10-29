<?php
namespace bl\socialShare\assets;

use yii\web\AssetBundle;

/**
 * Asset for font-icons
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class SocialIconsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/black-lamp/yii2-socialshare/assets';

    public $css = [
        'css/social-icons.css'
    ];
}