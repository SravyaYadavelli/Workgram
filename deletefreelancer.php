<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php
	
	$id=isset($_GET['username'])?$_GET['username']:'';

	$sql1 ="SELECT * FROM workshops WHERE username='$id";
	$result1 = mysql_query($sql1);

	while($row1 = mysql_fetch_assoc($result1))
	{
		$wid=$row1 ['wid'];
		
		$sql2 ="DELETE FROM `reviews` WHERE wid='$wid'";
		$result2 = mysql_query($sql2);
	
		$sql3 ="DELETE FROM `ratings` WHERE wid='$wid'";
		$result3 = mysql_query($sql3);
	}

	$sql4 ="DELETE FROM `workshops` WHERE username='$id'";
	$result4 = mysql_query($sql4);

	$sql5 ="DELETE FROM `freelancers` WHERE username='$id'";
	$result5 = mysql_query($sql5);

	$sql6 ="DELETE FROM `login` WHERE username='$id'";
	$result6 = mysql_query($sql6);
	
	header('Location: adminhome.php');
	exit;
?>