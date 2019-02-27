<?php
namespace App\Traits;

trait Twitter {

    /**
     * The attribute name containing the email address.
     *
     * @var string
     */
    public $twitterHandle = 'twitter_handle';

    /**
     * Get the model's gravatar
     *
     * @return string
     */
    public function getTwitterAttribute()
    {

        $twitterHandler = ltrim($this->attributes[$this->twitterHandle], '@');
        $tweetLimit = 10;
        $height = 200;
        $width = '';
        $hrefLink = !empty($twitterHandler)?"https://twitter.com/$twitterHandler?ref_src=twsrc%5Etfw":'';

        $twitterEmbedded = "<a class='twitter-timeline' data-tweet-limit=$tweetLimit data-width=$width data-height=$height href=$hrefLink>
        Tweets by $this->twitterHandle</a>
        <script async src='https://platform.twitter.com/widgets.js' charset='utf-8'></script>";

        return $twitterEmbedded;
    }

}