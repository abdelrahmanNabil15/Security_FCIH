 

<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "db_shop");

class Database
{
    public $host   = DB_HOST;
    public $user   = DB_USER;
    public $pass   = DB_PASS;
    public $dbname = DB_NAME;
  private static $_instance; 
    public $link;
    public $error;
 public static function getInstance() {
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function __construct()
    {
        $this->connectDB();
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
    public function validation($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
}