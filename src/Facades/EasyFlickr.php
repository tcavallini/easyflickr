<?php
namespace Webeleven\EasyFlickr\Facades;

use Illuminate\Support\Facades\Facade;

class EasyFlickr extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'easyflickr.service';
    }
}