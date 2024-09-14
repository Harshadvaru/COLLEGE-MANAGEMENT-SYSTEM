<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["tid"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}	

	$sql="SELECT * FROM staff WHERE tid={$_SESSION["tid"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
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
					<h3>Add Marks</h3><br>
					<?php
						if(isset($_GET["err"]))
						{
							echo "<div class='error'>{$_GET["err"]}</div>";
						}
					?>
					
					<form  method="get" action="mark.php">
					<div class="lbox1">	
						<label>Enter Roll No</label><br>
						<input type="text" class="input3" name="rno"><br><br>
					</select>
					</div>
					<button type="submit" class="btn" name="view"> View Details</button>
				
					</form>
                    </div>
					
						
					</select>
				</div>

				
		</div>
	
	
				<?php include"footer.php";?>
	</body>
</html>