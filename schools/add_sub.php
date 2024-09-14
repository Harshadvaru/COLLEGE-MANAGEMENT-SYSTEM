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
				
				<div class="content5">
                <h3 class="text">Welcome <?php echo $_SESSION["aname"]; ?></h3><br><hr><br>
						<h3 > Add Subject Details</h3><br>
					
                        <?php
							if(isset($_POST["submit"]))
							{
								$sq="insert into sid(sname) values ('{$_POST["sname"]}')";
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
					   <label>Subject Name</label><br>
					   <input type="text" name="sname" required class="input">
					   <button type="submit" class="btn" name="submit">Add Subject Details</button>
					</form>
                </div>
                    
                    <div class="tbox" >
					<h3 style="margin-top:30px;"> Subject Details</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
                    
					<table border="1px" >
						<tr>
							<th>S.No</th>
							<th>Subject Name</th>
							<th>Delete</th>
						</tr>
						<?php
							$s="select * from sid";
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
										<td>{$r["sname"]}</td>
										<td><a href='sub_delete.php?id={$r["sid"]}' class='btnr'>Delete</a></td>
										</tr>
									
									";
									
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
	</body>
</html>