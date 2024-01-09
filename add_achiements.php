<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add new Achiement</title>

	<?php
		require_once'configuration.php';
		require_once'function.php';
	?>
	<link rel="stylesheet" type="text/css" href="css/admin_page.css">
	<link rel="stylesheet" type="text/css" href="css/view_content.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<style type="text/css">

	.leftmember
	{
		padding: 10px;
		margin: 20px;
		padding-left: 50px;
		background-color: #4b0150;
		float: left;
		width: 30%;
		color: gold;
	}


	.rightmember
	{
		padding: 10px;
		margin: 20px;
		background-color: #4b0150;
		float: right;
		width: 30%;
		color: gold;
	}

	
</style>
	

</head>
<body>
	<div class="header">
		<div class="heading">
			<div class="left">
				<div class="image">
					<img src="Vavuniversity.jpg" width="150px" height="150px" align="left">
				</div>
			</div>

			<div class="right">
				<h1 class="h">
					Club Management System
					<br>
					University of Vavuniya
				</h1>
			</div>
		</div>
	</div>

	<div class="body">
		<div class="navigationbar">
    	<div class="tab">
    		<ul class="nav nav-tabs">

    			<li class="nav-item">
	    				<a class="nav-link"  style="color: gold;" href="home_club_admin.php">Home</a>
	    		</li>
    			<li> &nbsp</li>
    			<li class="nav-item">
    				<a class="nav-link"  style="color: gold;" href="home_club_admin.php">Back</a>
    			</li>
			</ul>
    	   
    	</div>	
  		</div>

  		<center>
  				<br>
	    		<br>
	    		<b style="color:#4b0150;"><u><h2>Add new Achiement</h2></u></b> 
	    		<p>&nbsp</p>
  			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
				<table border="1" cellpadding="10px" style="color:#4b0150; border-color: #4b0150;">
						<tr>
							<td align="right">Achievement Heading : </td>
							<td><input type="text" name="achie_head" ></td>
							<td style="color:red; text-align: center; text-indent: 30px;"><?php if(isset($_POST['achie_head'])) {EmptyCheck('achie_head',"Please provide the Achievement Heading !");} ?></td>
						</tr>

						<tr>
							<td align="right">Achievement Date : </td>
							<td><input type="text" name="achie_date" ></td>
							<td style="color:red; text-align: center; text-indent: 30px;"><?php if(isset($_POST['achie_date'])) {EmptyCheck('achie_date',"Please provide the Achievement Date !");} ?></td>
						</tr>



						<tr>
							<td align="right">Achievement Image : </td>
							<td><input type="text" name="achie_image" ></td>
							<td style="color:red; text-align: center; text-indent: 30px;"><?php if(isset($_POST['achie_image'])) {EmptyCheck('achie_image',"Please provide the Achievement Image !");} ?></td>
						</tr>

						<tr>
							<td align="right">Achievement Description : </td>
							<td><textarea rows=5 cols=30 name="achie_desc" ></textarea></td>
							<td style="color:red; text-align: center; text-indent: 30px;"><?php if(isset($_POST['achie_desc'])) {EmptyCheck('achie_desc',"Please provide the Achievement Description !");} ?></td>
						</tr>

						
						<tr>
							<td colspan="2"></td>
							<td><input type="submit" name="btn" value="Add"></td>
						</tr>
					</table>
			</form>			
		</center>
	</div>
    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$achie_head=trim($_POST['achie_head']);
		$achie_date=trim($_POST['achie_date']);
		$achie_image=trim($_POST['achie_image']);
		$achie_desc=trim($_POST['achie_desc']);


		session_start();
		$user=$_SESSION['user'];
		$club=substr($user, 6)."_achie";
		
		if(!empty($achie_head) && !empty($achie_date) && !empty($achie_image) && !empty($achie_desc))
		{
			
			$query="insert into $club values('$achie_head','$achie_desc','$achie_image','$achie_date',)";
			ExecuteQuery($connect,$query);

					
			header("location:success_msg_for_achie_creation.php");

		}
	}

	function EmptyCheck($chk,$msg)
	{
		if(empty($_POST['$chk']))
			{
				echo "$msg"; 
				return false;
			}
		else
			{ 
				return true;
			}
	}

	
?>