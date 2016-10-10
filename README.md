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
        'networks' => [
            'facebook' => [
                'class' => bl\socialShare\classes\Facebook::className(),
                // not required
                'label' => 'Facebook',
                // html attributes
                'attributes' => [
                    'class' => 'social-share'
                ]
            ],
            'twitter' => [
                'class' => bl\socialShare\classes\Twitter::className(),
                'label' => 'Twitter',
                'account' => 'twitterAccount',
                'attributes' => [
                    'class' => 'social-share'
                ]
            ],
            'googlePlus' => [
                'class' => bl\socialShare\classes\GooglePlus::className(),
                'label' => 'Google+',
                'attributes' => [
                    'class' => 'social-share',
                    'id' => 'google'
                ]
            ],
            'vk' => [
                'class' => bl\socialShare\classes\Vkontakte::className(),
                'label' => 'vk',
                'attributes' => [
                    'class' => 'social-share'
                ]
            ]
        ]
    ]
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