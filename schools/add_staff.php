<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["aid"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
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
		<!-- <img src="img/1.jpg" style="margin-left:90px;" class="sha"> -->
        <div class="container1">
			<div id="content2">
				<?php include"side-bar.php";?><br>
				
				<div class="content6">
                    <h3 class="text">Welcome <?php echo $_SESSION["aname"]; ?></h3><br><hr><br>
						<h3 > Add Staff Details</h3><br>
					
                        <?php
							if(isset($_POST["submit"]))
							{
								$sq="insert into staff(tname,tpass,qual,sal) values('{$_POST["sname"]}',1234,'{$_POST["qual"]}','{$_POST["sal"]}')";
								if($db->query($sq))
								{
									echo "<div class='success'>Insert Success..</div>";
								}
								else
								{
									echo "<div class='error'>Insert Failed..</div>";
								}
							}
						?>

					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					   <label>Staff Name</label><br>
					   <input type="text" name="sname" required class="input"><br>
                       <label>Staff Qualification</label><br>
					   <input type="text" name="qual" required class="input"><br>
                       <label>Staff Salary</label><br>
					   <input type="text" name="sal" required class="input">
					   <button type="submit" class="btn" name="submit">Add Subject Details</button>
					</form>
                </div>
                    
                    
				
			</div>
        </div>
			<?php include"footer.php";?>
	</body>
</html>