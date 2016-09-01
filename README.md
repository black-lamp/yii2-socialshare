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
            'class' => bl\SocialShare::className(),
            'networks' => [
                'facebook' => [
                    'class' => bl\socialShare\classes\Facebook::className(),
                    'label' => 'Facebook'
                ],
                'twitter' => [
                    'class' => bl\socialShare\classes\Twitter::className(),
                    'label' => 'Twitter',
                    'params' => [
                        'account' => 'accountName'
                    ]
                ],
                'vk' => [
                    'class' => bl\socialShare\classes\Vkontakte::className(),
                    'label' => 'VK'
                ],
                'googlePlus' => [
                    'class' => bl\socialShare\classes\GooglePlus::className(),
                    'label' => 'Google+'
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