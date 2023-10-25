<?php include('includes/header1.php'); ?>

<?php @ob_start();
session_start();

include('includes/config.php');

if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysql_query("SELECT * FROM `login` WHERE `username` = '$username' AND `password` = '$password'");

	$count = mysql_num_rows($result);

	if ($count == '1') {
			
		if ($row = mysql_fetch_assoc($result)) {
				
			$_SESSION['username'] = $row ['username'];
			$_SESSION['user_type'] = $row ['role'];

			if($row ['status']=="yes")
			{
				if($_SESSION['user_type'] == '1'){
					header('Location: adminhome.php');
				}
				if($_SESSION['user_type'] == '2'){
					header('Location: freelancerhome.php');
				}
				if($_SESSION['user_type'] == '3'){
					header('Location: userhome.php');
				}
			}
			else
			{
				$emsg ="Your Account is not Activated";
			}
		}
	} else {
		$emsg ="Invalid Username Or Password";
	}
}

?>
		<!-- start account -->
		<div class="login-page">
			<div class="dreamcrub">
				<div class="account_grid">
					<div class="col-md-6 login-right">
						<h3>LOGIN</h3>
						<p>If you have an account with us, please log in.</p>
						<form method="post" class="form form-vertical" id="register-form"
							method="post" onSubmit="loadVal();">

							<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

							<h3 style="color: #3498db;">
							<?php echo isset($pmsg)?$pmsg:'';?>
							</h3>

							<div>
								<span>User Name</span> <input type="text" name="username"
									id="username" required>
							</div>
							<div>
								<span>Password</span> <input type="password" name="password"
									id="password" required>
							</div>
							<input
								type="submit" name="submit" value="Login">
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