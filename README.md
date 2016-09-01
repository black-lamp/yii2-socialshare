Social share widget for Yii2
============================
INSTALATION
-----------
#### Composer require section
```javascript
"black-lamp/yii2-socialshare": "*"
```
### Add SocalShare component to application config
```php
'components' => [
    ...
    'socialShare' => [
        'class' => bl\socialShare\SocialShare::className(),
        'networks' => [
            'facebook' => [
                'class' => bl\socialShare\classes\Facebook::className(),
                'label' => 'Facebook',
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
USING
-----
```php
    bl\socialShare\widgets\SocialShareWidget::widget([
        'url' => 'http://example.com/',
        'title' => 'Web site title',
        'description' => 'Web site description...',
        'image' => 'url to image'
    ])
```