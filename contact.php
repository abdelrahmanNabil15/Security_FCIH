<?php include 'inc/header.php'; 
$feed = new feedback();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $feedback = $_POST['feedback'];
    
    $insertfeed= $feed->feedInsert($feedback);
}
?>
 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Live Support</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
  				<p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				
                     <div class="product-desc">
                        <?php 
               if (isset($feedinsert)) {
                   echo $feedinsert;
               }
                ?>
					<h2>Feedback about Our System</h2>
					<form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                             
                                  <textarea class="tinymce" placeholder=" Enter your feedback..." name="feedback" class="medium" width="700"></textarea>
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                  
                                 <input type="submit"  class="buysubmit" name="submit" Value="Add feedback" />
                            </td>
                        </tr>
                    </table>
                    </form>
						    	
						    </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Company Information :</h2>
						    	<p>500 Lorem Ipsum Dolor Sit,</p>
						   		<p>22-56-2-9 Sit Amet, Lorem,</p>
						   		<p>USA</p>
				   		<p>Phone:(03) 01146381028</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>info@abdo.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
<?php include 'inc/footer.php'; ?>
