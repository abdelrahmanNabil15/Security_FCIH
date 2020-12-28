                     <?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 

class Product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->fm = new Format();
    }

    public function addproduct($data, $file)
    {
      
        $productName = $this->fm->validation($data['productName']);
        $catId       = $this->fm->validation($data['catId']);
        $sel_id      = $this->fm->validation($data['sel_id']);
        $body        = $this->fm->validation($data['body']);
        $price       = $this->fm->validation($data['price']);


        $productName = mysqli_real_escape_string($this->db->link, $productName);
        $catId       = mysqli_real_escape_string($this->db->link, $catId);
        $br          = mysqli_real_escape_string($this->db->link, $sel_id);
        $body        = mysqli_real_escape_string($this->db->link, $body);
        $price       = mysqli_real_escape_string($this->db->link, $price);
       

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if (empty($file_name)) {
            echo "<span class='error'>Please Select any Image !</span>";
        } elseif ($file_size >4048567) {
            echo "<span class='error'>Image Size should be less then 4MB! </span>";
        } elseif (in_array($file_ext, $permited) === false) {
            echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
        } elseif ($productName == "" || $catId == "" || $sel_id == "" || $body == "" || $price == "" ) {
            $msg = "<span class='error'>Fields must not be empty!</span>";
            return $msg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName, catId, sel_id, body, price, image ) VALUES('$productName', '$catId', '$sel_id', '$body', '$price', '$uploaded_image')";
            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                $msg = "<span class='success'>Product Inserted Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Product Not Inserted.</span>";
                return $msg;
            }
        }
    }
      public function getAllProduct()
    {
        $query = "SELECT p.*, c.catName
                    FROM tbl_product AS p, tbl_category AS c
                    WHERE p.catId = c.catId   
                    ORDER BY p.productId DESC";
       
        $result = $this->db->select($query);
        return $result;
    }

    public function getProById($proid)
    {
        $query = "SELECT * FROM tbl_product WHERE productId = '$proid'";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function getNewProduct()
    {
        $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function getSingleProduct($proId)
    {
        $query = "SELECT p.*, c.catName,b.add_in
                    FROM tbl_product AS p, tbl_category AS c, seller AS b
                    WHERE p.catId = c.catId AND p.sel_id=b.sel_id  AND p.productId = '$proId'";
     
        $result = $this->db->select($query);
        return $result;
    }

    public function productUpdate($data, $file, $proid)
    {
        $productName = $this->fm->validation($data['productName']);
        $catId       = $this->fm->validation($data['catId']);
        $sel_id      = $this->fm->validation($data['sel_id']);
        $body        = $this->fm->validation($data['body']);
        $price       = $this->fm->validation($data['price']);
       

        $productName = mysqli_real_escape_string($this->db->link, $productName);
        $catId       = mysqli_real_escape_string($this->db->link, $catId);
        $sel_id      = mysqli_real_escape_string($this->db->link,$sel_id);
        $body        = mysqli_real_escape_string($this->db->link, $body);
        $price       = mysqli_real_escape_string($this->db->link, $price);
    

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if ($productName == "" || $catId == ""||$sel_id == ""|| $body == "" || $price == ""  ) {
            $msg = "<span class='error'>Fields must not be empty!</span>";
            return $msg;
        } else {
            if (!empty($file_name)) {
                if ($file_size >4048567) {
                    echo "<span class='error'>Image Size should be less then 4MB! </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_product
                                SET
                                productName ='$productName',
                                catId       ='$catId',
                                body        ='$body',
                                sel_id      ='$sel_id',
                                price       ='$price',
                                image       ='$uploaded_image'
                                WHERE productId = '$proid'
                                ";
                    $updated_row = $this->db->update($query);
                    if ($updated_row) {
                        $msg = "<span class='success'>Product Updated Successfully</span>";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Product Not Updated.</span>";
                        return $msg;
                    }
                }
            } else {
                $query = "UPDATE tbl_product
                                SET
                                productName ='$productName',
                                catId       ='$catId',
                                sel_id      ='$sel_id',
                                body        ='$body',
                                price       ='$price'                               
                                WHERE productId = '$proid'
                                ";
                $updated_row = $this->db->update($query);
                if ($updated_row) {
                    $msg = "<span class='success'>Product Updated Successfully</span>";
                    return $msg;
                } else {
                    $msg = "<span class='error'>Product Not Updated.</span>";
                    return $msg;
                }
            }
        }
    }
      public function delProById($id)
    {
        $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $getData = $this->db->select($query);
        if ($getData) {
            while ($delImg = $getData->fetch_assoc()) {
                $dellink = $delImg['image'];
                unlink($dellink);
            }
        }
        $delquery = "DELETE FROM tbl_product WHERE productId = '$id'";
        $deldata = $this->db->delete($delquery);
        if ($deldata) {
            $msg = "<span class='success'>Product Deleted Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Product Not Deleted!</span>";
            return $msg;
        }
    }
  public function insertCompareDara($cmprid, $cmrId)
    {
        $cmrId      = mysqli_real_escape_string($this->db->link, $cmrId);
        $productId  = mysqli_real_escape_string($this->db->link, $cmprid);

        $cquery = "SELECT * FROM tbl_compare WHERE cmrId = '$cmrId' AND productId = '$productId'";
        $check = $this->db->select($cquery);
        if ($check) {
            $msg = "<span class='error'>Product Already Added to Compare.</span>";
            return $msg;
        }

        $query = "SELECT * FROM tbl_product WHERE productId = '$productId'";
        $result = $this->db->select($query)->fetch_assoc();
        if ($result) {
            $productId      = $result['productId'];
            $productName    = $result['productName'];
            $price          = $result['price'];
            $image          = $result['image'];

            $query = "INSERT INTO tbl_compare(cmrId, productId, productName, price, image) VALUES('$cmrId', '$productId', '$productName', '$price', '$image')";
            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                $msg = "<span class='success'>Product Addred! Chwck Compare Page.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Product Not Added!</span>";
                return $msg;
            }
        }
    }

    public function getCompareData($cmrId)
    {
        $query = "SELECT * FROM tbl_compare WHERE cmrId = '$cmrId' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }
 
      public function sreach($productName)
    {
       $query = "SELECT * FROM tbl_product WHERE productName='$productName' ";
       
        $result = $this->db->select($query);
        return $result;
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
    
      public function getAllseller()
    {
        $query = "SELECT * FROM seller ORDER BY sel_id DESC";
        $result = $this->db->select($query);
        return $result;
    }

}
