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
        <div class="container2">
			<div id="content2">
				<?php include"side-bar.php";?><br>
					
				<div class="content13">
                    <h3 class="text">Welcome <?php echo $_SESSION["aname"]; ?></h3><br><hr><br>
						<h3> Change Password</h3><br>
						<?php
							if(isset($_POST["submit"]))
							{
								$sql="select * from admin where APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
								$result=$db->query($sql);
								if($result->num_rows>0)
								{
									if($_POST["npass"]==$_POST["cpass"])
									{
										$s="update admin SET apass='{$_POST["npass"]}' where aid='{$_SESSION["AID"]}'";
										$db->query($s);
										echo "<div class='success'>Password Changed</div>";
									}
									else
									{
										echo "<div class='error'>Password Mismatch</div>";
									}
								}
								else
								{
									echo "<div class='error'>Invalid Password</div>";
								}
							}
						
						
						?>
						
							
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label>Old Password</label><br>
						<input type="text" class="input3" name="opass"><br><br>
						<label>New Password</label><br>
						<input type="text" class="input3" name="npass"><br><br>
						<label>Confirm Password</label><br>
						<input type="text" class="input3" name="cpass"><br><br>
						<button type="submit" class="btn" style="float:left" name="submit"> Change Password</button>
					</form>
			
				</div>	
			</div>
        </div>
			<?php include"footer.php";?>
		
	</body>
</html>