<?php

namespace Webeleven\Domain\Service\Flickr\Providers;


use Webeleven\Domain\Service\Flickr\FlickrConfigProvider;

class GlobalConfigProvider implements FlickrConfigProvider
{

    public function getConfig()
    {
        return [
            'FLICKR_KEY' => env('FLICKR_KEY'),
            'FLICKR_SECRET' => env('FLICKR_SECRET'),
            'FLICKR_NAME' => env('FLICKR_NAME'),
            'FLICKR_USER' => env('FLICKR_USER')
        ];
    }
}