# Changelog

All Notable changes to `Make Service Repository` will be documented in this file

------------
IMPORTANT
------------

Starting with version 1, the changelog is kept inside the Releases tab in our this repo's Github page. Please check https://github.com/felipedamacenoteodoro/makeservicerepository

------------

## 1.0.0 - 2021-12-30

### Added
- Maker for CRUD files: make:crudsrv, make:repositoryi, make:servicei, make:repository and make:service

## 1.0.1 - 2021-12-30

### Modify
- Modify License of packages to MIT

## 1.0.2 - 2021-12-30

### Modify
- Modify params of files make repository and make service
- Maker for CRUD files: make:crudsrv, make:repository --interface, make:repository, make:service --interface and make:service

## 1.0.3 - 2022-01-09

### Modify
- Modify params of files make repository and make service
- For create only interface class use : make:repository --interface, make:repository, make:service --interface and make:service
- For set your folder of services and repositories publish the config file: php artisan vendor:publish --tag=makeservicerepository-config
- Allows configuring whether the contracts will be in the same entity's folder through the config file in the parameter create_contract_in_same_folder_entity by default it is true
