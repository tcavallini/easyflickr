## Instalação

Para instalar, execute o comando abaixo no seu terminal:

```shell
composer require webeleven/easyflickr
```

Após a instalação, adicione o ServiceProvider do pacote no seu config/app.php conforme as linhas abaixo:

####Service provider
```php
Webeleven\EasyFlickr\EasyFlickrServiceProvider::class,
```

####Facade
```php
'EasyFlickr' => Webeleven\EasyFlickr\Facades\EasyFlickr::class,
```

## Vendor Publish
Execute o comando abaixo para transferir as configs do pacote para seu projeto:

```shell
php artisan vendor:publish --provider="Webeleven\EasyFlickr\EasyFlickrServiceProvider"
```

##Configuração
Para utilizar altere os valores de configuração no arquivo easyflickr.php localizado no diretório config, ou se preferir defina as variáveis de ambiente no seu arquivo .env 

```php
return [
    'flickr_key' => env('FLICKR_KEY'),
    'flickr_secret' => env('FLICKR_SECRET'),
    'flickr_user' => env('FLICKR_USER')
];
```
##Utilização

####Método GetAlbumInfo
Lista as informações sobre um determinado álbum (photoset) do Flickr

```php
Route::get('/', function () {

    return EasyFlickr::getAlbumInfo('PHOTOSET_ID');
     
});
```

####Método getAlbums
Lista as fotos de um determinado álbum (photoset) do Flickr, os parâmetros ($page, $limit) são opcionais, mas por padrão são preenchidos por $page=1 e $limit=10.  

```php
Route::get('/', function () {
    
    return EasyFlickr::getAlbums($page, $limit); 

});
```

####Método getPhotosByAlbum
Lista as fotos de um determinado álbum (photoset) do Flickr

```php
Route::get('/', function () {
    
    return EasyFlickr::getPhotosByAlbum('PHOTOSET_ID'); 
    
});
```

