<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>
<?php require_once('includes/Pagination.class.php');

$count = mysql_query("SELECT * FROM freelancers");
$total_rows = mysql_num_rows($count);


$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1;

if (!isset($_SESSION['perpage']) && !isset($_GET['per']))
$_SESSION['perpage'] = 10;
else if (isset($_GET['per']))
$_SESSION['perpage'] = (int) $_GET['per'];
$per_page = $_SESSION['perpage'];

$page = ($page == 0) ? 1 : $page;

$pagination = new Pagination($page, $total_rows);
$pagination->setRPP($per_page); //setting  no.of rows per page
$pagination_markup = $pagination->parse();
$row_start = abs(($page - 1) * $per_page);

$sql ="SELECT * FROM freelancers LIMIT $row_start, $per_page";
$result = mysql_query($sql);

?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong> Freelancer's </strong>
				</div>

				<!-- /.panel-heading -->
				<div class="panel-body">

					<label> No Of Records: <select class="sgrid left-align"
						id="per_page" name="per_page"
						onChange="javascript:loadperpage(this);">
							<option value="10"
								<?php echo ($per_page == 10 ) ? 'selected': ''; ?>>10</option>
							<option value="25"
								<?php echo ($per_page == 25 ) ? 'selected': ''; ?>>25</option>
							<option value="50"
								<?php echo ($per_page == 50 ) ? 'selected': ''; ?>>50</option>
							<option value="100"
								<?php echo ($per_page == 100 ) ? 'selected': ''; ?>>100</option>
					</select>
					</label>



					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover"
							id="dataTables-example">
							<thead>
								<tr>
									<td width="10%">Photo</td>
									<td width="10%">Name</td>
									<td width="10%">Mobile</td>
									<td width="10%">Qualification</td>
									<td width="10%">Skill Set</td>
									<td width="10%">Experience</td>
									<td width="10%">Status</td>
									<td width="10%">Change to</td>
									<td width="10%">Delete</td>
									<td width="10%">Profile</td>
								</tr>
							</thead>
							<tbody>

								<?php $sno=1;$i = $row_start; while($row = mysql_fetch_assoc($result))  { 

									$status="";
									$uname=$row ['username'];

									$sql1 ="SELECT status FROM login where username='$uname'";
									$result1 = mysql_query($sql1);
	
									while($row1 = mysql_fetch_assoc($result1))  
									{
										$status=$row1 ['status'];
									}

							 		$i++;?>
									
								<tr>
									<td><img src="photos/<?php echo $row ['photo']; ?>" style="width:100px;height:100px;"></td>
									<td><?php echo $row ['name']; ?></td>
									<td><?php echo $row ['mobile']; ?></td>
									<td><?php echo $row ['qualification']; ?></td>
									<td><?php echo $row ['skillset']; ?></td>
									<td><?php echo $row ['exp']; ?></td>
									<td><?php echo $status; ?></td>
									
									<?php 
											if($status=="yes")
											{
									?>
												<td><a href="adminhome.php?userid=<?php echo $row ['username'];?>&status=no"/>No</a></td>
									<?php
											}
											else
											{
									?>
												<td><a href="adminhome.php?userid=<?php echo $row ['username'];?>&status=yes"/>Yes</a></td>
									<?php
											}
									?>
									
									<td><a href="deletefreelancer.php?username=<?php echo $row ['username'];?>"/>delete</a></td>
									<td><a href="freelancerprofile.php?username=<?php echo $row ['username'];?>"/>profile</a></td>
									
								</tr>
								<?php
							}
							if ($total_rows == 0) {
								echo '<tr><td colspan="10">No records found to display.</td></tr>';
							}
							?>
							</tbody>
						</table>

						<span class="pull-left" style="margin-top: 15px; float:"> <?php
						$row_start++;
						if ($total_rows != 0) { echo "Showing $row_start to $i of $total_rows records"; }
						?>
						</span>
						<link href="css/pagination.css" rel="stylesheet">
						<span class="pull-right">
							<div class="pagination">
								<ul style="float: right; margin-right: 10px;">
									<?php echo $pagination_markup; ?>
								</ul>
							</div>
						</span>
					</div>
					<!-- /.table-responsive -->

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
	</div>

</div>

</div>

</div>
</div>

<?php
	
	$userid =isset($_GET['userid'])?$_GET['userid']:'';
	$status =isset($_GET['status'])?$_GET['status']:'';
	
	if($userid!=null && $status!=null)
	{

		$psql ="update login set status='$status' WHERE username='$userid'";
		mysql_query($psql);
		
		header('Location: adminhome.php');
		exit; 
	}

?>



<?php include('includes/footer.php'); ?>


