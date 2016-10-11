Social share widget for Yii2
============================
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
        'networks' => [
            'facebook' => [
                'class' => bl\socialShare\classes\Facebook::className(),
                /* not required */
                'label' => 'Facebook',
                // html attributes for link
                'attributes' => [
                    'class' => 'fb'
                ]
            ],
            'twitter' => [
                'class' => bl\socialShare\classes\Twitter::className(),
                'label' => 'Twitter',
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
        'url' => 'http://example.com/', // url to your web site
        'title' => 'Page title',
        'description' => 'Page description...',
        'image' => 'url/to/image'
    ])
```
What if i want to add a new social network?
-------------------------------------------
You must create class and extend it from `bl\socialShare\base\SocialNetwork` abstract class
```php
// ...
class LinckedIn extends bl\socialShare\base\SocialNetwork
{

}
```
and implement the method `getLink()`
```php
class LinckedIn extends bl\socialShare\base\SocialNetwork
{
    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $htmlAttrs)
    {
    }
}
```
this method must return the link to the social network at HTML tag