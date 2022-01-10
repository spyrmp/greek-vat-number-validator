# greek-vat-number-validator

Laravel plugin for validating Greek vat number.

## Install

This project can be installed via Composer run the following command:

```bash
composer require spyrmp/greek-vat-number-validator
```

## Add the Service Provider & Facade/Alias

Once spyrmp/greek-vat-number-validator is installed, you need to register the service provider in config/app.php. Make sure to add the
following line above the RouteServiceProvider.

```PHP
\Spyrmp\GreekVatNumberValidator\GreekVatNumberValidatorProvider::class,
```


Publish the package config file by running the following command:

```
php artisan vendor:publish --provider="Spyrmp\GreekVatNumberValidator\GreekVatNumberValidatorProvider" --tag="greek-vat-number-validator"
```


##Validation Rules
>greek_vat_validator

The field under validation must be a valid greek vat number.

```php
$rule= [
       "field"=>"greek_vat_validator"
];
$inputs = $request->all();
$validation = Validator::make($inputs, $rule);
```
