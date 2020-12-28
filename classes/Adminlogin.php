<?php 
$filepath = realpath(dirname(__FILE__));
include($filepath.'/../lib/Session.php');
Session::checkLogin();
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');

 ?>
<?php
/**
 * Adminlogin Class
 */
class Adminlogin
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function adminLogin($adminUser, $adminPass)
    {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

        if (empty($adminUser) || empty($adminPass)) {
            $loginmsg = "Username or Password must not be empty!";
            return $loginmsg;
        } else {
            $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set("adminlogin", true);
                Session::set("adminId", $value['adminId']);
                Session::set("adminUser", $value['adminUser']);
                Session::set("adminName", $value['adminName']);
                Session::set("lavel", $value['lavel']);
                header("Location:dashboard.php");
            } else {
                $loginmsg = "Username or Password not match!";
                return $loginmsg;
            }
        }
    }
      public function addinfoseller($infoseller)
    {
        
        $infoseller = $this->fm->validation($infoseller);
        $infoseller = mysqli_real_escape_string($this->db->link, $infoseller);
        
        if (empty($infoseller)) {
            $msg = "<span class='error'>SELLER field must not be empty!</span>";
            return $msg;
        } else {
            $query = "INSERT INTO seller(add_in) VALUES('$infoseller')";
            $selinsert = $this->db->insert($query);
            if ($selinsert) {
                $msg = "<span class='success'>seller Inserted Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>seller Not Inserted.</span>";
                return $msg;
            }
        }
    }
}
