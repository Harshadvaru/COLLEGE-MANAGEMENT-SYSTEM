<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["tid"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";	
	}
?>

<html>
    <head>
        <title>College Management System </title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	
		<?php include"navbar.php";?>

		<div class="container1">
		    <?php include"side-bar.php";?><br>
					
				<div class="content12">
                	<h3 class="text">Welcome <?php echo $_SESSION["tname"]; ?></h3><br><hr><br>
						<h3>View Exam</h3><br>
						<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<div class="lbox1">	
						
							<label>Exam Date</label><br>
							<select name="edate" required class="input3">
					
							<?php 
								$sl="SELECT * FROM exam";
								$r=$db->query($sl);
									if($r->num_rows>0)
										{
											echo"<option value=''>Select</option>";
											while($ro=$r->fetch_assoc())
											{
												echo "<option value='{$ro["edate"]}'>{$ro["edate"]}</option>";
											}
										}
							?>
					
					</select>
				</div>
				<div class="rbox">
					<label>Class</label><br>
					<select name="cla" required class="input3">
				
						<?php 
							 $sl="SELECT DISTINCT(cname) FROM class";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["cname"]}'>{$ro["cname"]}</option>";
										}
									}
						?>
					
					</select>
					<br><br>
				</div>
					<button type="submit" class="btn" name="view"> View Details</button>
				
					</form>
					<br>
					
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Exam Time Table</h3><br>";
								$sql="select * from exam where edate='{$_POST["edate"]}' and class='{$_POST["cla"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo '
										<table border="1px">
											<tr>
												<th>S.NO</th>
												<th>Date</th>
												<th>Class</th>
												<th>Subject</th>
												<th>Exam Name</th>
												<th>Exam Type</th>
												<th>Session</th>
											</tr>
											';
											
											$i=0;
											while($r=$re->fetch_assoc())
											{
												$i++;
												echo"
													<tr>
														<td>{$i}</td>
														<td>{$r["edate"]}</td>
														<td>{$r["class"]}</td>
														<td>{$r["sub"]}</td>
														<td>{$r["ename"]}</td>
														<td>{$r["etype"]}</td>
														<td>{$r["session"]}</td>
													</tr>";	
											}
								}
								else
								{
									echo "No Record Found";
								}
								echo "</table>";	
							}
						?>
					
					</div>
				</div>
			</div>
				<?php include"footer.php";?>
	</body>
</html>