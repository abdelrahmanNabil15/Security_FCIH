<?php include 'inc/header.php'; 

if (isset($_GET['keywords'])) {
    $productName = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['keywords']);
    $productName = trim($_GET['keywords']);
}?>

<div class="main">
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2">
				<?php 
                $getPd = $pd->sreach($productName);
                if ($getPd) {
                    while ($result = $getPd->fetch_assoc()) {
                        ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" width="250" height="250"/></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				
					<?php
                        } ?>
                    <?php
                        } ?>
                </div>
            </div>
        </div>
    </div>
</div>

					<?php include 'inc/footer.php'; ?>
