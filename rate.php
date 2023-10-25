<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php
	
	$parameter=isset($_GET['rating'])?$_GET['rating']:'';
	$arr=explode('-',$parameter);
		
	$wid=$arr[0];
	$rating=$arr[1];
	$rdate=date("d/m/Y");

	$sql1 ="SELECT count(*) as score FROM ratings where wid='$wid' and username='$username'";
	$result1 = mysql_query($sql1);
		
	$score=0;

	while($row1 = mysql_fetch_assoc($result1))
	{
		$score=$row1['score'];
	}

	if($score==1)
	{
		$usql1 ="update `ratings` set rating='$rating' where wid='$wid' and username='$username'";
		$result1 = mysql_query($usql1);
	}
	else
	{
		$usql1 ="INSERT INTO `ratings` VALUES ('null','$wid','$username','$rating','$rdate')";
		$result1 = mysql_query($usql1);
	}

	header('Location: userhome.php?msg=Your rating is submitted');
	exit;
?>