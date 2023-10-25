<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php

if(isset($_POST['submit'])){

	$comment= $_POST['comment'];
	$wid= $_POST['wid'];
	$rdate=date("d/m/Y");

	$usql ="INSERT INTO `reviews` VALUES ('null','$wid','$username','$comment','$rdate')";
	
	$result = mysql_query($usql);

	$smsg = "Your Comment Posted Successfully";
}

?>

<script type="text/javascript">
	function test()
	{
		var rates = document.getElementsByName('rating');
		var rate_value;
		for(var i = 0; i < rates.length; i++){
			if(rates[i].checked){
				rate_value = rates[i].value;
			}
		}
		location.replace("rate.php?rating="+rate_value);
	}
</script>

<center> 
	<font size="5" color="green">
		<?php 
			$msg=isset($_GET['msg'])?$_GET['msg']:''; 
			echo isset($msg)?$msg:'';
		?>
	</font>
</center>

<?php
	
	$wid=isset($_GET['wid'])?$_GET['wid']:'';

	$sql ="SELECT * FROM workshops where id='$wid'";

	$result = mysql_query($sql);

	while($row = mysql_fetch_assoc($result))  { ?>

		<div style="border-style: dotted;border: 4mm ridge rgba(120, 120, 120, 0.8);">
			
			<center><font size="5"><?php echo $row ['name'];?></font>  <br/>

			<img src="banners/<?php echo $row ['banner']; ?>" style="width:500px;height:300px;"> <br/><br/> </center>
			
			<font size="5" color="red"><a href="freelancerprofile.php?username=<?php echo $row ['username'];?>"><?php echo $row ['username'];?></a></font>&nbsp;&nbsp;
			<br/><br/>
			Location:&nbsp;&nbsp;<?php echo $row ['location']; ?><br/><br/>
			Description:&nbsp;&nbsp;<?php echo $row ['description']; ?><br/><br/>
			Registration Link:&nbsp;&nbsp;<a href="http://<?php echo $row ['reglink']; ?>" target=”_blank”><?php echo $row ['reglink']; ?></a><br/><br/>
			Topics Covered:&nbsp;&nbsp;<?php echo $row ['topics']; ?><br/><br/>
			
			<div align="left">  
			
				<form>
					
					<?php
						
						if($user_type==3)
						{

					?>
					Rate this Trainer: &nbsp;&nbsp;
					
					<input type="radio" name="rating" value="<?php echo $row ['id']; ?>-1" onclick="test()"> * &nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="rating" value="<?php echo $row ['id']; ?>-2" onclick="test()"> ** &nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="rating" value="<?php echo $row ['id']; ?>-3" onclick="test()"> *** &nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="rating" value="<?php echo $row ['id']; ?>-4" onclick="test()"> **** &nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="rating" value="<?php echo $row ['id']; ?>-5" onclick="test()"> ***** 
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<?php
						}
					?>

					Conduting on:&nbsp; 
					<font color="blue"><?php echo $row ['wdate']; ?></font> at <font color="blue"><?php echo $row ['wtime']; ?></font>

				</form> 
			
			</div><br/>
				
			<?php
						
				if($user_type==3)
				{

			?>
			 <form method="post" class="form form-vertical" id="test-form" method="post" onSubmit="loadVal();">

				<p>
						<span>Comment Here &nbsp;&nbsp; </span>
						<input type="hidden" value="<?php echo $row['id']; ?>" name="wid">
						<input type="text" name="comment" size="60" required>
						<input class="submit" type="submit" name="submit" value="Post Suggestion" />
				</p>
			 </form>

			 <?php
				}
			?>

			 <font color="blue" size="4"><u>Comments</u></font> <br/><br/>

			 <?php 
					$sql1 ="SELECT * FROM reviews where wid='$wid' ORDER BY id DESC";
					$result1 = mysql_query($sql1);

					while($row1 = mysql_fetch_assoc($result1))  {	
			?>
					 <div style="background-color:#DCDCDC;border-radius: 5px;">
						<?php echo $row1['username']; ?> : &nbsp;&nbsp;<?php echo $row1['review']; ?> 
						<p align="right"><?php echo $row1['rdate']; ?> </p>
					 </div> <br/>
			<?php
					}
			 ?>
         </div> <br/>
		
	<?php
		}
	?>

</div>

</div>
</div>

<?php include('includes/footer.php'); ?>


