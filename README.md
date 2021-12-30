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

- Generate a Repository Interface

``` bash
php artisan make:repositoryi {Entity_name}
```

- Generate a Service Interface

``` bash
php artisan make:servicei {Entity_name}
```

- Generate a Service

``` bash
php artisan make:service {Entity_name}
``` 

- Generate a Repository file

``` bash
php artisan make:repository {Entity_name}
```

## Remember

You need to map the interface bind on your application server provider.

- **Exemple:**

Add In the boot method of your service provider `app/Providers/AppServiceProvider.php`:

```php
$this->app->bind(YourEntityCreatedServiceInterface::class, YourEntityCreatedService::class);
$this->app->bind(YourEntityCreatedRepositoryInterface::class, YourEntityCreatedRepository::class);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.
