Social share widget for Yii2
============================
This widget adds links for sharing in social networks.

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
"black-lamp/yii2-socialshare": "*"
```
to the require section of your composer.json.
#### Add 'SocialShare' component to application config
```php
'components' => [
    // ...
    'socialShare' => [
        'class' => bl\socialShare\SocialShare::className(),
        // HTML attributes for all link, not required parameter
        'attributes' => [
            'class' => 'social-btn'
        ],
        // use default font-icons instead text labels
        'defaultIcons' => true,
        'networks' => [
            'facebook' => [
                'class' => bl\socialShare\classes\Facebook::className(),
                // not required parameter
                'label' => 'Facebook',
                // html attributes for link, not required parameter
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
Using
-----
```php
    bl\socialShare\widgets\SocialShareWidget::widget([
        'componentId' => 'socialShare', // id of component from config
        'url' => Url::toRoute(['site/index'], true), // url to the page
        'title' => 'Page title',
        'description' => 'Page description...',
        'image' => Url::toRoute(['/logo.png'], true)
    ])
```
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