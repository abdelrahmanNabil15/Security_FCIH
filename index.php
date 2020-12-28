<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>


 <div class="main">
    <div class="content">
    	<div class="content_top">
    	
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
              $getNpd = $pd->getNewProduct();
              if ($getNpd) {
                  while ($result = $getNpd->fetch_assoc()) {
                      ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" width="300" height="300" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				
				<?php
                  }
              } ?>
				
			</div>
            <div class="content_bottom">
    		<div class="heading">
    		<h3>all Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
            <div class="section group">
				<?php 
              $getNpd = $pd->getAllProduct();
              if ($getNpd) {
                  while ($result = $getNpd->fetch_assoc()) {
                      ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" width="300" height="300" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				
				<?php
                  }
              } ?>
    </div>
 </div>

<?php include 'inc/footer.php'; ?>
