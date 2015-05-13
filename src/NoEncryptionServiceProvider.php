<?php namespace Thomaswelton\LaravelMcryptFaker;

use App;
use Illuminate\Encryption\EncryptionServiceProvider;

class NoEncryptionServiceProvider extends EncryptionServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        App::bindShared('encrypter', function()
        {
            return new NoEncryptionEncrypter();
        });

        parent::boot();
    }
}
