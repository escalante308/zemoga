<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $primaryKey = 'idportfolio';

    protected $fillable = ['description', 'image_url', 'twitter_user_name', 'title'];

    public static function deleteAll()
    {
        foreach( self::get() as $item ) {
            $item->delete();
        }
    }

    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            if (strlen($value) > 255) {
                $attributes[$key] = substr($value, 0, 255);
            }
        }
    
        parent::fill($attributes);

        return $this;
    }

    public function getTwitterUserAttribute()
    {
        if (isset($this->twitter_user_name)) {
            return $this->twitter_user_name;
        } else if (isset($this->twitterUserName)) {
            return $this->twitterUserName;
        } else {
            return "twitter";
        }
    }

    public function getImageAttribute()
    {
        if (isset($this->image_url)) {
            return $this->image_url;
        } else if (isset($this->imageURL)) {
            return $this->imageURL;
        } else if (isset($this->imag_url)) {
            return $this->imag_url;
        }  
        else {
            return "https://via.placeholder.com/350";
        }
    }
}
