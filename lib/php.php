<?php

/*
function encrypt($plaintext, $password) {
    $method = "AES-256-CBC";
    $key = hash('sha256', $password, true);
    $iv = openssl_random_pseudo_bytes(16);

    $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
    $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);

    return $iv . $hash . $ciphertext;
}

function decrypt($ivHashCiphertext, $password) {
    $method = "AES-256-CBC";
    $iv = substr($ivHashCiphertext, 0, 16);
    $hash = substr($ivHashCiphertext, 16, 32);
    $ciphertext = substr($ivHashCiphertext, 48);
    $key = hash('sha256', $password, true);

    if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) return null;

    return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
}

//$pass=' eslam shhhhhhhhhhhhhhhhhhhhh';
//$encrypted = encrypt($pass, 'password'); // this yields a binary string
  //echo $encrypted ;
//echo decrypt($encrypted, 'password');
// decrypt($encrypted, 'wrong password') === null

*/
 
namespace SimpleAes;

/**
 * Aes is using PHP OpenSSL Extention
 * The official of PHP manual sugest us using OpenSSL to replace Mcrypt extention
 * When you are ready to use this class,
 * You may check your OpenSSL extention is avaliable.
 */
class Aes
{
	protected $iv;
	protected $key;

	public function __construct()
	{
		$this->key = base64_encode( '1234567890qwertyuiopasdf' );
		$this->iv  = base64_encode( 'qwertyuiopasdfgh' );
	}

	public function setKey( $key )
	{
		$this->key = $key;
	}

	public function setIv( $iv )
	{
		$this->iv = $iv;
	}

	/**
	 * encrypt
	 *
	 * @param $str
	 *
	 * @return string
	 */
	public function encrypt( $str )
	{
		$encrypted = openssl_encrypt( $str, 'aes-256-cbc', base64_decode( $this->key ), OPENSSL_RAW_DATA, base64_decode( $this->iv ) );

		return base64_encode( $encrypted );
	}

	/**
	 * decrypt
	 *
	 * @param $str
	 *
	 * @return string
	 */
	public function decrypt( $str )
	{
		$baseDecode = base64_decode( $str );

		return openssl_decrypt( $baseDecode, 'aes-256-cbc', base64_decode( $this->key ), OPENSSL_RAW_DATA, base64_decode( $this->iv ) );
	}
}


$aes     = new Aes();
$encrypt = $aes->encrypt( 'asd' );
echo $encrypt . PHP_EOL;
//output : xviTncBNkTIg/44a27uGzw==

echo $aes->decrypt( 'HLWKTrQtxtL0ejFugDTY8A' ) . PHP_EOL;
//output : star zmisgod