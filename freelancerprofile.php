<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php
	
	$uid=isset($_GET['username'])?$_GET['username']:'';

	$usql ="select * FROM `freelancers` WHERE username='$uid'";
	$uresult = mysql_query($usql);

	while($urow = mysql_fetch_assoc($uresult))
	{
		$score=0;
		$cnt=0;

		$sql ="SELECT * FROM workshops where username='$uid'";
		$result = mysql_query($sql);

		while($row = mysql_fetch_assoc($result))  {
			
			$wid=$row['id'];

			$rsql ="SELECT count(*) as cnt,sum(rating) as score FROM ratings where wid='$wid'";
			$rresult = mysql_query($rsql);

			while($rrow = mysql_fetch_assoc($rresult))
			{
				$score=$score+$rrow['score'];
				$cnt=$cnt+$rrow['cnt'];
			}
		}
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="table-responsive">
						<center>
							<img src="photos/<?php echo $urow ['photo']; ?>" style="width:200px;height:200px;"><br/>
							<b>
							<font color="red" size="4"><?php echo $urow ['name']; ?> 
								<?php
								
									if($cnt!=0)
									{
								?>
										(<?php echo $score/$cnt;?>)
								<?php
									}
									
								?>
							</font></b>
						</center>
						User Name: <?php echo $urow ['username']; ?> <br/>
						Email: <?php echo $urow ['email']; ?><br/>
						Mobile: <?php echo $urow ['mobile']; ?><br/>
						Qualification: <?php echo $urow ['qualification']; ?><br/>
						Skill Set: <?php echo $urow ['skillset']; ?><br/>
						Experience: <?php echo $urow ['exp']; ?><br/><br/>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


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

<?php
	
	$sql ="SELECT * FROM workshops where username='$uid' ORDER BY id DESC";
	$result = mysql_query($sql);

	while($row = mysql_fetch_assoc($result))  { ?>

		<div style="border-style: dotted;border: 4mm ridge rgba(170, 50, 220, .6);">
			
			<center><font size="5"><?php echo $row ['name'];?></font>  <br/>
			
			<img src="banners/<?php echo $row ['banner']; ?>" style="width:500px;height:300px;"></center> <br/><br/>
			
			<font size="5" color="red"><a href="freelancerprofile.php?username=<?php echo $row ['username'];?>"><?php echo $row ['username'];?></a></font>:&nbsp;&nbsp;<?php echo $row ['location']; ?>&nbsp;&nbsp;
			<br/>
			
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

					Conduting on : &nbsp;&nbsp; 
					<font color="green"><?php echo $row ['wdate']; ?>:<?php echo $row ['wtime']; ?></font>

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
			 <font color="#33B2FF" size="5"><u>Latest Comments</u></font> <br/><br/>

			 <?php 
					$sql1 ="SELECT * FROM reviews where wid='$wid' ORDER BY id DESC";
					$result1 = mysql_query($sql1);

					$i=0;

					while($row1 = mysql_fetch_assoc($result1))  {	
			?>
					 <div style="background-color:#DCDCDC;border-radius: 5px;">
						<?php echo $row1['username']; ?> : &nbsp;&nbsp;<?php echo $row1['review']; ?> 
						<p align="right"><?php echo $row1['rdate']; ?> </p>
					 </div> <br/>
			<?php
						$i=$i+1;

						if($i>3)
						{
							break;
						}
					}
			 ?>
			<p align="right"><a href="readmore.php?wid=<?php echo $row['id'];?>">read more info</a></p>
         </div> <br/>
		
	<?php
		}
	?>

<?php 
	}
?>

</div>
</div>
</div>


<?php include('includes/footer.php'); ?>


