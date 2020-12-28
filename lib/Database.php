<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/config.php');
?>
<?php
class Database
{
    public $host   = DB_HOST;
    public $user   = DB_USER;
    public $pass   = DB_PASS;
    public $dbname = DB_NAME;
  private static $_instance; 
    public $link;
    public $error;
    public $iv;
	public $key;
 public static function getInstance() {
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function __construct()
    {
        $this->connectDB();
        $this->key = base64_encode( '1234567890qwertyuiopasdf' );
		$this->iv  = base64_encode( 'qwertyuiopasdfgh' );
    }

    private function connectDB()
    {
        $this->link = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );
        if (!$this->link) {
            $this->error = "Connection fail" . $this->link->connect_error;
            return false;
        }
    }
    
    
    // Select or Read data
    public function select($query)
    {
        $result = $this->link->query($query) or
        die($this->link->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    // Insert data
    public function insert($query)
    {
        $insert_row = $this->link->query($query) or
        die($this->link->error . __LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            return false;
        }
    }

    // Update data
    public function update($query)
    {
        $update_row = $this->link->query($query) or
        die($this->link->error . __LINE__);
        if ($update_row) {
            return $update_row;
        } else {
            return false;
        }
    }

    // Delete data
    public function delete($query)
    {
        $delete_row = $this->link->query($query) or
        die($this->link->error . __LINE__);
        if ($delete_row) {
            return $delete_row;
        } else {
            return false;
        }
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
  /*  public function encrypt($plaintext, $password) {
        $method = "AES-256-CBC";
        $key = hash('sha256', $password, true);
        $iv = openssl_random_pseudo_bytes(16);
    
        $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
        $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);
    
        return $iv . $hash . $ciphertext;
    }
    
    /*function decrypt($ivHashCiphertext, $password) {
        $method = "AES-256-CBC";
        $iv = substr($ivHashCiphertext, 0, 16);
        $hash = substr($ivHashCiphertext, 16, 32);
        $ciphertext = substr($ivHashCiphertext, 48);
        $key = hash('sha256', $password, true);
    
        if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) return null;
    
        return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
    }*/


    function encryptString($plaintext, $password, $encoding = null) {
        $iv = openssl_random_pseudo_bytes(16);
        $ciphertext = openssl_encrypt($plaintext, "AES-256-CBC", hash('sha256', $password, true), OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext.$iv, hash('sha256', $password, true), true);
        return $encoding == "hex" ? bin2hex($iv.$hmac.$ciphertext) : ($encoding == "base64" ? base64_encode($iv.$hmac.$ciphertext) : $iv.$hmac.$ciphertext);
    }



    function decryptString($ciphertext, $password, $encoding = null) {
        $ciphertext = $encoding == "hex" ? hex2bin($ciphertext) : ($encoding == "base64" ? base64_decode($ciphertext) : $ciphertext);
        if (!hash_equals(hash_hmac('sha256', substr($ciphertext, 48).substr($ciphertext, 0, 16), hash('sha256', $password, true), true), substr($ciphertext, 16, 32))) return null;
        return openssl_decrypt(substr($ciphertext, 48), "AES-256-CBC", hash('sha256', $password, true), OPENSSL_RAW_DATA, substr($ciphertext, 0, 16));
    }

//$enc = encryptString("mysecretText", "myPassword");
//$dec = decryptString($enc, "myPassword");


//$ds=' 1235';
  //  $encrypted = encrypt($ds, 'password'); // this yields a binary string
    //  echo $encrypted ;
    //echo decrypt($encrypted, 'password');
    //decrypt($encrypted, 'wrong password') === null
}
