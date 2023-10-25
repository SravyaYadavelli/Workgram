<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php
	
	$usql ="select * FROM `freelancers`";
	$uresult = mysql_query($usql);

	while($urow = mysql_fetch_assoc($uresult))
	{
		$score=0;
		$cnt=0;

		$uid=$urow['username'];

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

<?php 
	}
?>

</div>
</div>
</div>


<?php include('includes/footer.php'); ?>


