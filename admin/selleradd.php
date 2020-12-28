<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/Product.php'; ?>
<?php 
$sel = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $infoseller = $_POST['add_in'];
    
    $selinsert= $sel->addinfoseller($infoseller);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New seller</h2>
               <div class="block copyblock">
               <?php 
               if (isset($selinsert)) {
                   echo $selinsert;
               }
                ?> 
                 <form action="" method="post">
                    <table class="form">                    
                          <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name='add_in'></textarea>
                    </td>
                </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
