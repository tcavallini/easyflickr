<?php
namespace Webeleven\Domain\Service\Flickr\Transformers;

use League\Fractal\TransformerAbstract;

class AlbumTransformer extends TransformerAbstract
{
    public function transform(array $photo)
    {
        return [
            'id' => $photo['id'],
            'secret' => $photo['secret'],
            'server' => $photo['server'],
            'farm' => $photo['farm'],
            'title' => $photo['title']['_content'],
            'description' => $photo['description']['_content'],
            'total' => $photo['photos'],
            'count_views' => $photo['count_views'],
            'isprimary' => $photo['primary'],
            'created_at' => $photo['date_create'],
            'updated_at' => $photo['date_update'],
            'Square' => $this->getPhotoVersion($photo, "m"),
            'Thumbnail' => $this->getPhotoVersion($photo, "m"),
            'Medium' => $this->getPhotoVersion($photo, "c"),
            'Large' => $this->getPhotoVersion($photo, "b"),
            'Original' => $this->getPhotoVersion($photo, "o"),
            'Capa' => $this->getPhotoVersion($photo, null),
        ];

    }

    public function getPhotoVersion($photo, $version)
    {
        $flick_url = "http://c.staticflickr.com/";

        if (is_null($version)) {
            return $flick_url . $photo['farm'] . "/" . $photo['server'] . "/" . $photo['primary'] . "_" . $photo['secret'] . ".jpg";
        }

        return $flick_url . $photo['farm'] . "/" . $photo['server'] . "/" . $photo['primary'] . "_" . $photo['secret'] . "_" . $version . ".jpg";
    }

}