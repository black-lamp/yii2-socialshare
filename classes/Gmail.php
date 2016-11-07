<?php
namespace bl\socialShare\classes;

use yii\helpers\Html;

use bl\socialShare\base\SocialNetwork;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @property string $_route
 * @property string $label
 * @property array $attributes
 *
 * @property string $bodyPattern
 */
class Gmail extends SocialNetwork
{
    /**
     * @var string pattern for body of mail
     * You should use next variables from widget config: $url, $title, $description, $image
     * @see parsePattern()
     */
    public $bodyPattern = "{description} - {url}";

    /**
     * @var string result of parsing body pattern
     * @see parsePattern()
     */
    protected $_parseResult;

    /**
     * @inheritdoc
     */
    public function getLink($url, $title, $description, $image, $component)
    {
        $this->parsePattern($url, $title, $description, $image);
        $body = $this->_parseResult;

        $this->_route = "https://mail.google.com/mail/?view=cm&fs=1"
                        ."&su=$title"
                        ."&body=$body";

        if($component->defaultIcons) {
            $this->label = Html::tag('i', '', ['class' => 'si-mail']);
        }

        return $this->initLink($component);
    }

    /**
     * Method for parsing the body pattern string
     *
     * @param string $url
     * @param string $title
     * @param string $description
     * @param string $image
     */
    protected function parsePattern($url, $title, $description, $image) {
        $params = [
            '{url}' => $url,
            '{title}' => $title,
            '{description}' => $description,
            '{image}' => $image
        ];

        $temp = $this->bodyPattern;
        foreach ($params as $name => $value) {
            $temp = strtr($temp, [$name => $value]);
        }

        $this->_parseResult = $temp;
    }
}