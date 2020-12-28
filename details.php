<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET['proId'])) {
    $proId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proId']);
}


?>
<?php 
$rev = new  Customer();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $review = $_POST['review'];
    $revinsert= $rev-> addreview_rate($review);
}


$cmrId = Session::get("cmrId");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
    $productId = $_POST['productId'];
    $insertCom = $pd->insertCompareDara($productId, $cmrId);
}
?>


<style type="text/css">
	.mybutton{widows: 100px; float:left; margin-right: 30px;}
</style>
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2">
				<?php 
                $getPd = $pd->getSingleProduct($proId);
                if ($getPd) {
                    while ($result = $getPd->fetch_assoc()) {
                        ?>
				<div class="grid images_3_of_2">
					<img src="admin/<?php echo $result['image']; ?>" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName']; ?></h2>
					
					<div class="price">
						<p>Price: <span>$<?php echo $result['price']; ?></span></p>
						<p>Category: <span><?php echo $result['catName']; ?></span></p>
                        <p>Seller: <span><?php echo $result['add_in']; ?></span></p>
						
					</div>
					
                </div>
                
					<span style="color:red; font-size:18px;">
						
                        <?php 
                        $login = Session::get("cuslogin");
                        if ($login == true) {
                            ?>
                    <div class="add-cart">
                    	<div class="mybutton">
						<form action="" method="post">
							<input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId']; ?>"/>							
							<input type="submit" class="buysubmit" name="compare" value="Add to Compare"/>
						</form>
						
                        
            
                            </div>
					</div>
					<?php
                        } ?>					
			
                
                
				<div class="product-desc">
					<h2>Product Details</h2>
					<p><?php echo $result['body']; ?></p>
				</div>
				<?php
                    }
                } ?>
                    
                   <div class="product-desc">
                        <?php 
               if (isset($revinsert)) {
                   echo $revinsert;
               }
                ?>
					<h2>Review</h2>
					<form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                              <input type="text" placeholder=" Enter Review..." name="review" class="medium" width="700" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                  
                                 <input type="submit"  class="buysubmit" name="submit" Value="Add Review" />
                            </td>
                        </tr>
                    </table>
                    </form>
						    	
						    </div>
			</div>
                  
                
                
                 
			<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<ul>
					<?php 
                    $getCat = $cat->getAllCat();
                    if ($getCat) {
                        while ($result = $getCat->fetch_assoc()) {
                            ?>
					<li><a href="details.php"><?php echo $result['catName']; ?></a></li>
                    
					<?php
                        }
                    } ?>
				</ul>
				
			</div>
		</div>
	</div>
<?php include 'inc/footer.php'; ?>
