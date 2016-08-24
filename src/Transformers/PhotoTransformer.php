<?php
namespace Webeleven\Domain\Service\Flickr\Transformers;

use League\Fractal\TransformerAbstract;

class PhotoTransformer extends TransformerAbstract
{
    public function transform(array $photo)
    {

        return [
            'id' => $photo['id'],
            'secret' =>  $photo['secret'],
            'server' =>  $photo['server'],
            'farm' =>  $photo['farm'],
            'title' =>  $photo['title'],
            'isprimary' =>  $photo['isprimary'],
            'ispublic' =>  $photo['ispublic'],
            'isfriend' =>  $photo['isfriend'],
            'isfamily' =>  $photo['isfamily'],
            'Square' => $this->getPhotoVersion($photo, "m"),
            'Thumbnail' => $this->getPhotoVersion($photo, "m"),
            'Medium' => $this->getPhotoVersion($photo, "c"),
            'Large' => $this->getPhotoVersion($photo, "b"),
            'Original' => $this->getPhotoVersion($photo, "o"),
        ];

    }

    public function getPhotoVersion($photo, $version)
    {
        return "http://c.staticflickr.com/" . $photo['farm'] . "/" . $photo['server'] . "/" . $photo['id'] . "_" . $photo['secret'] . "_" . $version . ".jpg";
    }

}