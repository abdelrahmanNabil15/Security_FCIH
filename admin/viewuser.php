<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Customer.php'; ?>
<?php include_once '../helpers/Format.php'; ?>
<?php 
$us= new Customer();

 ?>
 

<div class="grid_10">
    <div class="box round first grid">
        <h2>customer List</h2>
        
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>id</th>
					<th>Full Name</th>
					<th>email</th>
					
					<th>phone</th>
					
				</tr>
			</thead>
			<tbody>
				<?php 
                $getPd = $us->getAllcustomer();
                if ($getPd) {
                    $i=0;
                    while ($result = $getPd->fetch_assoc()) {
                        $i++; ?>
				<tr class="odd gradeX">
					
					<td><?php echo $result['id']; ?></td>
					<td><?php echo $result['name']; ?></td>
					<td><?php echo $result['email']; ?></td>
					
					<td>$<?php echo $result['phone']; ?></td>
										
								
					>
				</tr>
				<?php
                 }                }?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
