<?php
	include "database.php";
	session_start();
	if (!isset($_SESSION["aid"])) {
		echo "<script>window.open('index.php?mes=Access Denied...', '_self');</script>";
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
	<?php include "navbar.php"; ?>
	<div class="container1">
	
			<?php include "side-bar.php"; ?><br>
			
			<div class="content12">
				<h3 class="text">Welcome <?php echo $_SESSION["aname"]; ?></h3><br><hr><br>
					<h3 >View Staff Details</h3><br>
						
						<?php
							if(isset($_GET["mes"]))
								{
									echo"<div class='error'>{$_GET["mes"]}</div>";	
								}
					
						?>
						
						<table border="1px">
							<tr>
								<th>TID</th>
								<th>TNAME </th>
								<th>TPASS</th>
								<th>QUAL</th>
								<th>SAL</th>
								<th>PNO</th>
								<th>MAIL</th>
								<th>PADDR</th>
								<th>IMG</th>
							</tr>
							<?php
								$s="select * from staff";
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
												<td>{$r["tname"]}</td>
												<td>{$r["tpass"]}</td>
												<td>{$r["qual"]}</td>
												<td>{$r["sal"]}</td>
												<td>{$r["pno"]}</td>
												<td>{$r["mail"]}</td>
												<td>{$r["paddr"]}</td>
												<td>{$r["img"]}</td>
												<td><a href='staff_delete.php?id={$r["tid"]}' class='btnr'>Delete</a></td>
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
			
	<?php include "footer.php"; ?>
	
</body>
</html>
