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