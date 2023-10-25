<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php

if(isset($_POST['submit'])){

	$name= $_POST['name'];
	$description= $_POST['description'];

	$wdate= $_POST['wdate'];
	$wtime= $_POST['wtime'];
	$location= $_POST['location'];

	$reglink= $_POST['reglink'];
	$topics= $_POST['topics'];

	$target_path = "banners/";
    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
	$banner=basename( $_FILES['uploadedfile']['name']);
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))

	
	$usql ="INSERT INTO `workshops` VALUES ('null','$username','$name','$wdate','$wtime','$description','$location','$topics','$banner','$reglink' )";
	
	$result = mysql_query($usql);

	
/*	$msql ="SELECT * FROM users";
	$mresult = mysql_query($msql);

	while($mrow = mysql_fetch_assoc($mresult))  
	{

		$email=$mrow["email"];

		// the message
		$msg = "Seminar on ".$name." conducting by ".$username;

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);

		// send email
		mail($email,$description,$msg);
	}
*/
	$smsg = "Workshop Added Successfully";
}

?>
<!-- start account -->
<div class="login-page">
	<div class="dreamcrub">
		<div class="account_grid">
			<div class="col-md-6 login-right">
				
				<h3>Add Workshop</h3>
				
				<form method="post" class="form form-vertical" id="test-form"
					method="post" onSubmit="loadVal();" enctype="multipart/form-data">

					<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

					<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
					
					<div>
						<span>Name</span> <input type="text" name="name"
							id="name" required
							<?php echo isset($_POST['name'])?$_POST['name']:'';?>>
					</div>
					
					<div>
						<span>Date</span> <input type="text" name="wdate"
							id="wdate" required
							<?php echo isset($_POST['wdate'])?$_POST['wdate']:'';?>>
					</div>

					<div>
						<span>Time</span> <input type="text" name="wtime"
							id="wtime">
							
					</div>

					<div>
						<span>Location</span> <input type="text" name="location"
							id="location">
							
					</div>

					<div>
						<span>Description</span> <input type="text" name="description"
							id="description" required
							<?php echo isset($_POST['description'])?$_POST['description']:'';?>>
					</div>
					
					<div>
						<span>Topics Covering</span> <input type="text" name="topics"
							id="topics" required
							<?php echo isset($_POST['topics'])?$_POST['topics']:'';?>>
					</div>

					<div>
						<span>Registration Link</span> <input type="text" name="reglink"
							id="reglink" required
							<?php echo isset($_POST['reglink'])?$_POST['reglink']:'';?>>
					</div>

					<div>
						<span>Banner</span>
						<input  type="file" name="uploadedfile" id="uploadedfile"  required>
				    </div>

					<input type="submit" name="submit" value="Add">

				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
</div>
</div>
</div>
							<?php include('includes/footer.php'); ?>
