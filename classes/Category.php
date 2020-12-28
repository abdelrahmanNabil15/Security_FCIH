<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 
class Category
{
    private $db;
    private $fm;

    public function __construct()
    {
         $this->db = Database::getInstance();
        $this->fm = new Format();
    }

    public function catInsert($catName)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        if (empty($catName)) {
            $msg = "<span class='error'>Category field must not be empty!</span>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
            $catinsert = $this->db->insert($query);
            if ($catinsert) {
                $msg = "<span class='success'>Category Inserted Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Category Not Inserted.</span>";
                return $msg;
            }
        }
    }

    public function getAllCat()
    {
        $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getCatById($catid)
    {
        $query = "SELECT * FROM tbl_category WHERE catId = '$catid'";
        $result = $this->db->select($query);
        return $result;
    }


    public function delCatById($id)
    {
        // $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM tbl_category WHERE catId = '$id'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = "<span class='success'>Category Deleted Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Category Not Deleted!</span>";
            return $msg;
        }
    }
}
