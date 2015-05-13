<?php namespace Thomaswelton\LaravelMcryptFaker;

use Illuminate\Contracts\Encryption\Encrypter;

class NoEncryptionEncrypter implements Encrypter {

    public function encrypt($value)
    {
        return $value;
    }

    public function decrypt($payload)
    {
        return $payload;
    }

    public function setMode($mode){}
    public function setCipher($cipher){}
}
