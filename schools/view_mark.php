<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["tid"]))
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
				
                <div class="content">
                <h3 class="text">Welcome <?php echo $_SESSION["tname"]; ?></h3><br><hr><br>
					<h3>Mark Details</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
					
						<label>Enter Roll No</label><br>
						<input type="text" class="input3" name="rno"><br><br>
					</div>
				
					<button type="submit" class="btn" name="view"> View Details</button>
				
					</form>
					<br><br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Mark Details</h3><br>";
								$sql="select * from mark where regno='{$_POST["rno"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo'
									<table border="1px">
										<tr>
											<th>S.No</th>
											<th>Reg.No</th>
											<th>Class</th>
											<th>Term</th>
											<th>Subject</th>
											<th>Mark</th>
										</tr>
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
											<tr>
												<td>{$i}</td>
												<td>{$r["regno"]}</td>
												<td>{$r["class"]}</td>
												<td>{$r["term"]}</td>
												<td>{$r["sub"]}</td>
												<td>{$r["mark"]}</td>
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
        </div>
				<?php include"footer.php";?>
    </body>
</html>