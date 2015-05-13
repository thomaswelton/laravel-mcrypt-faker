<?php namespace Thomaswelton\LaravelMcryptFaker;

use App;
use Illuminate\Encryption\EncryptionServiceProvider;

class OpensslEncryptionServiceProvider extends EncryptionServiceProvider {

    protected $commands = [
        'Thomaswelton\LaravelMcryptFaker\KeyGenerateCommand'
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        App::bindShared('encrypter', function($app)
        {
            return new OpensslEncryptionEncrypter($app['config']['app.key']);
        });

        parent::boot();
    }

    public function register(){
        $this->commands($this->commands);

        parent::register();
    }
}
