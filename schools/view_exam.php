<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["aid"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
		<title>School</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
		<?php include"navbar.php";?>
        <div class="container1">
			<div id="content2">
				<?php include"side-bar.php";?><br>
				
				<div class="content8">
                    	
					<h3 class="text">Welcome <?php echo $_SESSION["aname"]; ?></h3><br><hr><br>
					<h3 >View Exam Time Table Details</h3><br>
						
						<?php
							if(isset($_GET["mes"]))
								{
									echo"<div class='error'>{$_GET["mes"]}</div>";	
								}
					
						?>
						
						<table border="1px">
							<tr>
								<th>S.No</th>
								<th>Class </th>
								<th>Subject</th>
								<th>Exam Name</th>
								<th>Term</th>
								<th>Date</th>
								<th>Session</th>
								<th>Delete</th>
							</tr>
							<?php
								$s="select * from exam";
								$res=$db->query($s);
								if($res->num_rows>0)
								{
									$i=0;
									while($r=$res->fetch_assoc())
									{
										$i++;
										echo "
											<tr>
												<td>{$i}</td>
												<td>{$r["class"]}</td>
												<td>{$r["sub"]}</td>
												<td>{$r["ename"]}</td>
												<td>{$r["etype"]}</td>
												<td>{$r["edate"]}</td>
												<td>{$r["session"]}</td>
												<td><a href='exam_delete.php?id={$r["eid"]}' class='btnr'>Delete</a></td>
											</tr>";					
									}
								}
								else
								{
									echo "No Record Found";
								}	
							?>
						</table>
				</div>
			</div>
            </div>
				<?php include"footer.php";?>
        </div>
                            
	</body>
</html>