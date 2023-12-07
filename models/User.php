<?php

namespace Models;

class User extends ActiveRecord
{
    protected static $table = 'users';
    protected static $dbColumns = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;
    private $privateKeyFilePath = __DIR__ . "/../includes/key/private_key.pem";
    private $publicKeyFilePath = __DIR__ . "/../includes/key/public_key.pem";

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validate()
    {
        if (!$this->email) {
            self::$alerts['error'][] = 'El email es obligatorio';
        }
        if (!$this->password) {
            self::$alerts['error'][] = 'El password no puede ir vacío';
        }

        return self::$alerts;
    }

    public function encryptPassword($userEnteredPassword)
    {
        $publicKey = $this->loadPublicKey();

        if ($publicKey) {
            $dataToEncrypt = $userEnteredPassword;

            openssl_public_encrypt($dataToEncrypt, $encryptedPassword, $publicKey);

            return base64_encode($encryptedPassword);
        } else {
            return false;
        }
    }

    private function loadPublicKey()
    {
        $publicKey = null;

        if (file_exists($this->publicKeyFilePath)) {
            $publicKey = openssl_pkey_get_public("file://$this->publicKeyFilePath");
        }

        return $publicKey;
    }

    private function loadPrivateKey()
    {
        $privateKey = null;

        if (file_exists($this->privateKeyFilePath)) {
            $privateKey = openssl_pkey_get_private("file://$this->privateKeyFilePath");
            
        }

        return $privateKey;
    }

    public function comparePassword($userEnteredPassword)
    {
    
        $privateKey = $this->loadPrivateKey();
    
        if ($privateKey) {
    
            $encryptedPassword = base64_decode($this->password);
            openssl_private_decrypt($encryptedPassword, $decryptedPassword, $privateKey);
            return $userEnteredPassword === $decryptedPassword;
        } else {
            return false;
        }
    }
    
}
