<?php include('includes/header1.php'); ?>
<?php include('includes/config.php'); ?>

<?php

if(isset($_POST['submit'])){

	$username= $_POST['username'];
	$password= $_POST['password'];
	$name= $_POST['name'];
	$email= $_POST['email'];
	$mobile= $_POST['mobile'];
	$qualification= $_POST['qualification'];
	$skillset= $_POST['skillset'];
	$exp= $_POST['exp'];

	$target_path = "photos/";
    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
	$photo=basename( $_FILES['uploadedfile']['name']);
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
	
	$usql ="INSERT INTO `freelancers` VALUES ('$username','$name','$email','$mobile','$qualification','$skillset','$exp','$photo')";
	
	$result = mysql_query($usql);
	
	$role="2";
	$status="no";
	
	$usql1 ="INSERT INTO `login` VALUES ('$username','$password','$role','$status')";
	$result1 = mysql_query($usql1);

	$smsg = "Registred Success";
}

?>
<!-- start account -->
<div class="login-page">
	<div class="dreamcrub">
		<div class="account_grid">
			<div class="col-md-6 login-right">
				<h3>Freelancer Register Here</h3>
				<form method="post" class="form form-vertical" id="test-form"
					method="post" onSubmit="loadVal();" enctype="multipart/form-data">

					<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

					<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
					<div>
						<span>User Name</span> <input type="text" name="username"
							id="username" required
							<?php echo isset($_POST['username'])?$_POST['username']:'';?>>
					</div>

					<div>
						<span>Password</span> <input type="password" name="password"
							id="password" required
							<?php echo isset($_POST['password'])?$_POST['password']:'';?>>
					</div>

					<div>
						<span>Name</span> <input type="text" name="name"
							id="name" required
							<?php echo isset($_POST['name'])?$_POST['name']:'';?>>
					</div>
					<div>
						<span>Mobile<input type="text" name="mobile"
							id="mobile" required
							<?php echo isset($_POST['mobile'])?$_POST['mobile']:'';?>>
					</div>
					
					<div>
						<span>Email</span> <input type="text" name="email"
							id="email" required
							<?php echo isset($_POST['email'])?$_POST['email']:'';?>>
					</div>

					<div>
						<span>Qualification</span> <input type="text" name="qualification"
							id="qualification" required
							<?php echo isset($_POST['qualification'])?$_POST['qualification']:'';?>>
					</div>

					<div>
						<span>Skillset</span> <input type="text" name="skillset"
							id="skillset" required
							<?php echo isset($_POST['skillset'])?$_POST['skillset']:'';?>>
					</div>

					<div>
						<span>Experience</span> <input type="text" name="exp"
							id="exp" required
							<?php echo isset($_POST['exp'])?$_POST['exp']:'';?>>
					</div>

					<div>
						<span>Photo</span> <input type="file" name="uploadedfile" id="uploadedfile" required>
					</div>
					
					<input type="submit" name="submit" value="Register">

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
