<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php
	
	$wid=isset($_GET['wid'])?$_GET['wid']:'';

	$sql2 ="DELETE FROM `reviews` WHERE wid='$wid'";
	$result2 = mysql_query($sql2);
	
	$sql3 ="DELETE FROM `ratings` WHERE wid='$wid'";
	$result3 = mysql_query($sql3);

	$sql4 ="DELETE FROM `workshops` WHERE id='$wid'";
	$result4 = mysql_query($sql4);
	
	header('Location: freelancerhome.php');
	exit;
?>