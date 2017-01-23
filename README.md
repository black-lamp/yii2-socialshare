Social share widget for Yii2
============================
This widget adds share links for social networks.

[![Latest Stable Version](https://poser.pugx.org/black-lamp/yii2-socialshare/v/stable)](https://packagist.org/packages/black-lamp/yii2-socialshare)
[![Latest Unstable Version](https://poser.pugx.org/black-lamp/yii2-socialshare/v/unstable)](https://packagist.org/packages/black-lamp/yii2-socialshare)
[![License](https://poser.pugx.org/black-lamp/yii2-socialshare/license)](https://packagist.org/packages/black-lamp/yii2-socialshare)

It supports from the box
* VK
* Facebook
* Twitter
* Google+
* LinkedIn
* Pinterest
* Telegram
* Viber
* WhatsApp
* Gmail

Installation
------------
#### Run command
```
composer require black-lamp/yii2-socialshare
```
or add
```json
"black-lamp/yii2-socialshare": "1.*.*"
```
to the require section of your composer.json.
#### Add 'SocialShare' component to application config
```php
'components' => [
    // ...
    'socialShare' => [
        'class' => bl\socialShare\SocialShare::className(),
        'defaultIcons' => true,
        'attributes' => [
            'class' => 'social-btn'
        ],
        'networks' => [
            'facebook' => [
                'class' => bl\socialShare\classes\Facebook::className(),
                'label' => 'Facebook'
            ],
            'twitter' => [
                'class' => bl\socialShare\classes\Twitter::className(),
                'label' => 'Twitter',
                // custom option for Twitter class
                'account' => 'twitterAccount'
            ],
            'googlePlus' => [
                'class' => bl\socialShare\classes\GooglePlus::className(),
                'label' => 'Google+'
            ],
            'vk' => [
                'class' => bl\socialShare\classes\Vkontakte::className(),
                'label' => 'vk'
            ],
            // other social networks ...
        ]
    ],
]
```

In this component you need to add and configure social network classes
#### Component configuration properties

| Option | Description | Type | Default |
|---|---|---|---|
|networks|Array of social networks classes configuration|array|-|
|attributes|HTML attributes for all share links|array|-|
|defaultIcons|Use default font-icons instead text labels or not|boolean|false|
|enableSeo|Enable or disable appending SEO attributes from `seoAttributes` array for links|boolean|true|
|seoAttributes|Array of SEO attributes for links|array|['target' => '_blank', 'rel' => 'nofollow']|

#### Social network class configuration properties
| Option | Description | Type |
|---|---|---|
|class|Namespace of social network class|string|
|label|Text for link|string|
|attributes|HTML attributes for share link|array|

Using
-----
You should use the widget for adding the share links on page
```php
    <?= \bl\socialShare\widgets\SocialShareWidget::widget([
        'componentId' => 'socialShare',
        'url' => Url::toRoute(['site/index'], true),
        'title' => 'Black Lamp - digital agancy',
        'description' => 'Black Lamp provides a comprehensive range of services for development...',
        'image' => Url::toRoute(['/logo.png'], true)
    ]) ?>
```

#### Widget configuration properties
| Option | Description | Type |
|---|---|---|
|componentId|id of SocialShare component from config|string|
|url|Absolute URL to the page|string|
|title|Page title|string|
|description|Page description|string|
|image|Absolute URL to the image for page|string|
|exceptions|Exceptions for social networks. In this array you can override default title, description, link or image.|array|

What if i want to add a new social network?
-------------------------------------------
You must create class and extend it from [bl\socialShare\base\SocialNetwork](https://github.com/black-lamp/yii2-socialshare/blob/master/base/SocialNetwork.php) abstract class
```php
use bl\socialShare\base\SocialNetwork;

class LinkedIn extends SocialNetwork
{

}
```
and implement the method [getLink()](https://github.com/black-lamp/yii2-socialshare/blob/master/base/SocialNetwork.php#L84)
```php
class LinkedIn extends bl\socialShare\base\SocialNetwork
{
    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $component)
    {
    }
}
```
this method must initialize route to the social network 
and return `initLink()` method with `$component` argument
```php
/**
 * @inheritdoc
 */
public function getLink($url, $title, $description, $image, $component)
{
    $this->_route = "https://www.linkedin.com/shareArticle?mini=true"
                    ."&url=$url"
                    ."&title=$title"
                    ."&summary=$description";
                    
    return $this->initLink($component);
}
```

Other extensions
----------------
[yii2-social-networks](https://github.com/black-lamp/yii2-social-networks) - this widget adds links to social networks
