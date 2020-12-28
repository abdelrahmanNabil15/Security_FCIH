<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/feedback.php'; ?>
<?php include_once '../helpers/Format.php'; ?>
<?php 
$fe= new feedback();
if (isset($_GET['delfeed'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delfeed']);
    $delfeed = $fe->delfeedbackById($id);
}

 ?>
 

<div class="grid_10">
    <div class="box round first grid">
        <h2>customer List</h2>
        <?php 
                if (isset( $delfeed)) {
                    echo  $delfeed;
                }
                 ?>   
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>id</th>
					<th>Feedback</th>
				
                    <th>Action</th>
				
					
				</tr>
			</thead>
			<tbody>
				<?php 
                $getPd = $fe->getAllfeedback();
                if ($getPd) {
                    $i=0;
                    while ($result = $getPd->fetch_assoc()) {
                        $i++; ?>
				<tr class="odd gradeX">
					
					<td><?php echo $result['feedid']; ?></td>
					<td><?php echo $result['feedback']; ?></td>
				
								<td><a onclick="return confirm('Are you sure to delete this?')" href="?delfeed=<?php echo $result['feedid']; ?>">Delete</a></td>		
								
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
