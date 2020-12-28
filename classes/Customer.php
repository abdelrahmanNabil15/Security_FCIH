<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 


class Customer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

  


  
     public function customerRegistration($data)
    {
        $name    	= $this->fm->validation($data['name']);
        $phone   	= $this->fm->validation($data['phone']);
        $email   	= $this->fm->validation($data['email']);
        $pass  		= $this->fm->validation($data['pass']);
        $encrypted  =  $this->db->encrypt(  $pass    );
        $name 		    = mysqli_real_escape_string($this->db->link, $name);
        $phone 		   = mysqli_real_escape_string($this->db->link, $phone);
        $email 		   = mysqli_real_escape_string($this->db->link, $email);
        $pass 	    	= mysqli_real_escape_string($this->db->link,$encrypted  );

        if ($name == ""|| $phone == ""  ||$email == ""|| $pass == "") {
            $msg = "<span class='error'>Fields must not be empty!</span>";
            return $msg;
        }
        $mailquery = "SELECT * FROM tbl_customers WHERE email = '$email' LIMIT 1";
        $mailchk = $this->db->select($mailquery);
        if ($mailchk != false) {
            $msg = "<span class='error'>Email already Exist!</span>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_customers(name, phone, email, pass) VALUES('$name','$phone', '$email', '$pass')";
            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                $msg = "<span class='success'>Customer Data Inserted Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Customer Data Not Inserted.</span>";
                return $msg;
            }
        }
    }

    public function customerLogin($data)
    {
        

       $email 	= $this->fm->validation($data['email']);
       $passs  	= $this->fm->validation($data['pass']);
      // $encrypted  =  $this->db->encrypt(  $pass    );
      $query = "SELECT pass FROM tbl_customers WHERE email  = '$email'";
       $result = $this->db->select($query);  
     $value = $result->fetch_assoc();
       $value['pass'];
       // $s=$value['pass'];
    // echo $s;
   
               $coco= $this->db-> decrypt($value['pass']);
     

        $email 	= mysqli_real_escape_string($this->db->link, $email);
        $pass 	= mysqli_real_escape_string($this->db->link,  $coco  );
   

        if (empty($email)||empty($pass) ) {
            $msg = "<span class='error'>Fields must not be empty!</span>";
            return $msg;
        }
       
if( $coco==$passs){
     
        $query = "SELECT * FROM tbl_customers WHERE email = '$email' ";
        $result = $this->db->select($query);
        if ($result != false) {
            $value = $result->fetch_assoc();
            Session::set("cuslogin", true);
            Session::set("cmrId", $value['id']);
            Session::set("cmrName", $value['name']);
          
        } else {
            $msg = "<span class='error'>Email or Passowrd not matched!</span>";
            return $msg;
        }
    } else {
        $msg = "<span class='error'>Email or Passowrd not matched!</span>";
        return $msg;
    }

}
       public function getAllcustomer()
    {
        $query = "SELECT * FROM 	tbl_customers ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    
      public function getCustomerData($id)
    {
        $query = "SELECT * FROM tbl_customers WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    
    
    
    public function cmrUpateDate($data,$cmrId)
    {
       
        $name    	= $this->fm->validation($data['name']);
        $phone   	= $this->fm->validation($data['phone']);
        $email   	= $this->fm->validation($data['email']);
        $pass  		= $this->fm->validation($data['pass']);
        
     $name 		= mysqli_real_escape_string($this->db->link, $name);
     $phone 		= mysqli_real_escape_string($this->db->link, $phone);
     $email 		= mysqli_real_escape_string($this->db->link, $email);
     $pass 		= mysqli_real_escape_string($this->db->link, md5($pass));
        
        
        if ($name == "" || $phone == ""|| $email == "" || $pass == ""  ) {
            $msg = "<span class='error'>Fields must not be empty!</span>";
            return $msg;
        } else {   $query = "UPDATE tbl_customers
                                SET
                                name ='$name',
                                phone       ='$phone',
                                email        ='$email',
                                pass       ='$pass',
                               
                                WHERE id = '$cmrId'
                                ";
                    $updated_row = $this->db->update($query);
                    if ($updated_row) {
                        $msg = "<span class='success'>data Updated Successfully</span>";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>data Not Updated.</span>";
                        return $msg;
                    }
                }}

      public function addreview_rate($review)
    {
        $review = $this->fm->validation('review');
        $review = mysqli_real_escape_string($this->db->link, $review);
         
        if (empty($review)) {
            $msg = "<span class='error'>feedback field must not be empty!</span>";
            return $msg;
        } else {
            $query = "INSERT INTO review(review) VALUES('$review')";
            $revinsert = $this->db->insert($query);
            if ($revinsert) {
                $msg = "<span class='success'>Review Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Review Not Inserted.</span>";
                return $msg;
            }
        }
    }
     public function getreviewData()
    {
        $query = "SELECT * FROM review WHERE ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }
}
