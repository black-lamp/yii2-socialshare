Social share widget for Yii2
============================
This widget adds share links fro social networks.

[![Latest Stable Version](https://poser.pugx.org/black-lamp/yii2-socialshare/v/stable)](https://packagist.org/packages/black-lamp/yii2-socialshare)
[![License](https://poser.pugx.org/black-lamp/yii2-socialshare/license)](https://packagist.org/packages/black-lamp/yii2-socialshare)

It supports from the box
* Facebook
* Twitter
* VK
* Google+
* LinkedIn
* Telegram

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
        'attributes' => [
            'class' => 'social-btn'
        ],
        'defaultIcons' => true,
        'networks' => [
            'facebook' => [
                'class' => bl\socialShare\classes\Facebook::className(),
                'label' => 'Facebook',
                'attributes' => [
                    'class' => 'fb'
                ]
            ],
            'twitter' => [
                'class' => bl\socialShare\classes\Twitter::className(),
                'label' => 'Twitter',
                // custom parameter for Twitter class
                'account' => 'twitterAccount',
                'attributes' => [
                    'class' => 'tw'
                ]
            ],
            'googlePlus' => [
                'class' => bl\socialShare\classes\GooglePlus::className(),
                'label' => 'Google+',
                'attributes' => [
                    'class' => 'social-share',
                    'id' => 'gp'
                ]
            ],
            'vk' => [
                'class' => bl\socialShare\classes\Vkontakte::className(),
                'label' => 'vk',
                'attributes' => [
                    'class' => 'vk'
                ]
            ],
            // other social networks ...
        ]
    ],
]
```

In this component you need to add and configure social network classes
#### Component configuration attributes

| Name | Data type | Value | Default value | Required |
|---|---|---|---|---|
|class|string|Namespace of 'SocialShare' component|-|yes|
|networks|array|Array of social networks classes configuration|-|yes|
|attributes|array|HTML attributes for all share links|-|no|
|defaultIcons|boolean|Use default font-icons instead text labels or not|false|no|

#### Social network class configuration attributes
| Name | Data type | Value | Required |
|---|---|---|---|
|class|string|Namespace of social network class|yes|
|label|string|Text for link|no|
|attributes|array|HTML attributes for share link|no|
Using
-----
You should use the widget for adding the share links on page
```php
    bl\socialShare\widgets\SocialShareWidget::widget([
        'componentId' => 'socialShare',
        'url' => Url::toRoute(['site/index'], true),
        'title' => 'Black Lamp - digital agancy',
        'description' => 'Black Lamp provides a comprehensive range of services for development...',
        'image' => Url::toRoute(['/logo.png'], true)
    ])
```

#### Widget configuration attributes
| Name | Value |
|---|---|
|componentId|id of component from config|
|url|Absolute URL to the page|
|title|Page title|
|description|Page description|
|image|Absolute URL to the image|

What if i want to add a new social network?
-------------------------------------------
You must create class and extend it from [bl\socialShare\base\SocialNetwork](https://github.com/black-lamp/yii2-socialshare/blob/master/base/SocialNetwork.php) abstract class
```php
// ...
class LinkedIn extends bl\socialShare\base\SocialNetwork
{

}
```
and implement the method [getLink()](https://github.com/black-lamp/yii2-socialshare/blob/master/base/SocialNetwork.php#L94)
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