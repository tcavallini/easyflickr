<?php

namespace Webeleven\Domain\Service\Flickr\Providers;


use Illuminate\Contracts\Cache\Factory;
use Illuminate\Routing\Router;
use Webeleven\Domain\Service\Flickr\FlickrConfigProvider;
use Webeleven\Domain\Site\SiteRepository;
use Webeleven\Domain\Site\SiteService;

class CentroLocalConfigProvider implements FlickrConfigProvider
{

    private $router;
    private $repository;
    private $cache;

    public function __construct(Router $router, Factory $cache, SiteRepository $repository)
    {
        $this->router = $router;
        $this->repository = $repository;
        $this->cache = $cache;
    }


    public function getConfig()
    {

        $parameters = $this->router->current()->parameters();

        $slug = isset($parameters['site']) ? $parameters['site'] : $parameters['slug'];

        $site = $this->cache->rememberForever('site-' . $slug, function () use ($slug) {
            return $this->repository->getBySlug($slug);
        });

        return [
            'FLICKR_KEY' => $site->flickr_key,
            'FLICKR_SECRET' => $site->flickr_secret,
            'FLICKR_NAME' => $site->ssccbspclst,
            'FLICKR_USER' => $site->flickr_username
        ];
    }
}