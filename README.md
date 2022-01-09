# Make Service Repository 

Quickly generate command make for Service and Repository files for projects using [Laravel](https://www.linkedin.com/in/felipedamacenoteodoro) packages.

## Install

Via Composer

``` bash
composer require felipedamacenoteodoro/makeservicerepository --dev
```

## Usage

Open the console and enter one of the commands:

- **Generate all files for one new Service and Repository interface:**

``` bash
php artisan make:crudsrv {Entity_name}

```

- Generate only Repository Interface class

``` bash
php artisan make:repository {Entity_name} --interface 
```

- Generate only Service Interface class

``` bash
php artisan make:service {Entity_name} --interface
```

- Generate a Service, You will be asked if you want to create the interface too

``` bash
php artisan make:service {Entity_name}
``` 

- Generate a Repository, You will be asked if you want to create the interface too

``` bash
php artisan make:repository {Entity_name}
```

## Remember

You need to map the interface bind on your application server provider.

- **Exemple:**

Add In the boot method of your service provider `app/Providers/AppServiceProvider.php`:

- add on boot method

```php
$this->app->bind(YourEntityCreatedServiceInterface::class, YourEntityCreatedService::class);
$this->app->bind(YourEntityCreatedRepositoryInterface::class, YourEntityCreatedRepository::class);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.
