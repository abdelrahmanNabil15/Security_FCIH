<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 



class feedback
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->fm = new Format();
    }
    
     public function feedInsert($feedback)
    {
        $feedback = $this->fm->validation($feedback);
        $feedback = mysqli_real_escape_string($this->db->link, $feedback);
        if (empty($feedback)) {
            $msg = "<span class='error'>feedback field must not be empty!</span>";
            return $msg;
        } else {
            $query = "INSERT INTO feedback(feedback) VALUES('$feedback')";
            $feedinsert = $this->db->insert($query);
            if ($feedinsert) {
                $msg = "<span class='success'>feedback Inserted Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>feedback Not Inserted.</span>";
                return $msg;
            }
        }
    }
       public function getAllfeedback()
    {
        $query = "SELECT * FROM feedback ORDER BY feedid DESC";
        $result = $this->db->select($query);
        return $result;
    }
    
        public function delfeedbackById($id)
    {
        // $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM feedback WHERE feedid = '$id'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = "<span class='success'>feedback Deleted Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>feedback Not Deleted!</span>";
            return $msg;
        }
    }
}
