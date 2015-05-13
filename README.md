# Laravel Without Mcrypt

This package uses a trick to fool composer into thinking that your system has the PHP Mcrypt extension installed. Allowing you to install Laravel on shared hosts or systems where Mcrypt is not present.
In addition it provides two service providers `NoEncryptionServiceProvider` and `OpensslEncryptionServiceProvider` for use as an alternative to `Illuminate\Encryption\EncryptionServiceProvider`

## Installation

Install via composer to an exisiting working Laravel project.

```
composer require thomaswelton/laravel-mcrypt-faker
```

If you are unable to install Laravel via composer due to no having Mcrypt installed then you will need to add this package manually.
Download the latest Laravel source and edit the `composer.json` so your require block looks as follows.

```
"require": {
	"thomaswelton/laravel-mcrypt-faker": "1.0.*",
	"laravel/framework": "5.0.*"
}
```

The run `composer install` which will install this package along with the laravel framework.


## Updating the Encryption Service Provider

In your `config/app.php` file remove `Illuminate\Encryption\EncryptionServiceProvider` from the `providers` array and replace it with either `Thomaswelton\LaravelMcryptFaker\NoEncryptionServiceProvider` or `Thomaswelton\LaravelMcryptFaker\OpensslEncryptionServiceProvider`

**WARNING** The NoEncryptionServiceProvider, as the name suggests, provides no encryption for your application... at all. This should not be used in a production website. And even though the `OpensslEncryptionServiceProvider` provides encryption using the defuse/php-encryption package I personally can not attest to how cryptographically secure it's implementation is, even thought it "Works for me" 


### OpensslEncryption Key

To use the OpensslEncryptionServiceProvider your app secret key needs to be updated. This can be done by running `php artisan key:generate-openssl`