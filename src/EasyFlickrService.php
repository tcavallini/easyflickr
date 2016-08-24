<?php
namespace Webeleven\EasyFlickr;

interface EasyFlickrService
{
    public function getFlickrClient();

    public function getPhotosByAlbum($album);

    public function getAlbums($page = 1, $limit = 10);

    public function getAlbumInfo($album);
}