<?php namespace Thomaswelton\LaravelMcryptFaker;

use Crypto;
use Illuminate\Contracts\Encryption\Encrypter;

class OpensslEncryptionEncrypter implements Encrypter {

    protected $key;

    public function __construct($key)
    {
        $this->key = hex2bin($key);
    }

    public function encrypt($value)
    {
        return Crypto::Encrypt($value, $this->key);   
    }

    public function decrypt($payload)
    {
        return Crypto::Decrypt($payload, $this->key);
    }

    public function setMode($mode){}
    public function setCipher($cipher){}
}
