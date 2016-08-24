<?php

namespace Webeleven\EasyFlickr;

use Illuminate\Contracts\Config\Repository;
use InvalidArgumentException;
use phpFlickr;

class EasyFlickrServiceDefault implements EasyFlickrService
{
    protected $client;
    protected $options;
    protected $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
        $this->options = $this->config->get('easyflickr');

        $this->client = $this->getFlickrClient();
    }

    public function getFlickrClient()
    {
        return new phpFlickr($this->options['flickr_key'], $this->options['flickr_secret']);
    }

    public function getPhotosByAlbum($album)
    {
        return $this->client->photosets_getPhotos($album);
    }

    public function getAlbums($page = 1, $limit = 10)
    {
        if (empty($this->options['flickr_user'])) {
            throw new InvalidArgumentException('The flickr_user is invalid!');
        }

        return $this->client->photosets_getList($this->options['flickr_user'], $page, $limit);

    }

    public function getAlbumInfo($album)
    {
        return $this->client->photosets_getInfo($album);
    }
}