<?php
namespace App\Traits;

trait Gravatar {

    /**
     * The attribute name containing the email address.
     *
     * @var string
     */
    public $gravatarEmail = 'email';

    /**
     * Get the model's gravatar
     *
     * @return string
     */
    public function getGravatarAttribute()
    {

        $gravatarLink = "https://www.gravatar.com/avatar/";
        $hash = md5(strtolower(trim($this->attributes[$this->gravatarEmail])));
        
        $link = $gravatarLink.$hash;

        return $link;
    }

}