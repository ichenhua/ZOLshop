<?php namespace Hdphp\Crypt;

class Crypt{

    private $iv;

    private $securekey;
    
    public function __construct() 
    {
       $this->securekey = hash('sha256',C('app.key'),TRUE);
       $this->iv = mcrypt_create_iv(32);
   }

    /**
     * 加密
     * @param  [type] $input [description]
     * @return [type]        [description]
     */
    public function encrypt($input) 
    {
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->securekey, $input, MCRYPT_MODE_ECB, $this->iv));
    }

   /**
    * 解密
    * @param  [type] $input [description]
    * @return [type]        [description]
    */
   public function decrypt($input) 
   {
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->securekey, 
        base64_decode($input), MCRYPT_MODE_ECB, $this->iv));
    }
}