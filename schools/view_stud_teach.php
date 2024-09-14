<?php
	include "database.php";
	session_start();

	// Enable error reporting
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	if(!isset($_SESSION["tid"])) {
		echo "<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		exit();
	}
?>

<html>
<head>
	<title>College Management System</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<?php include "navbar.php"; ?>

	<div class="container2">
		<div class="content11">
			<h3 class="text">Welcome <?php echo $_SESSION["tname"]; ?></h3><br><hr><br>
			<h3>View Student Details</h3><br>
			<?php
				if(isset($_GET["mes"])) {
					echo "<div class='error'>{$_GET["mes"]}</div>";	
				}
			?>
			<table border="1px">
				<tr>
					<th>S.No</th>
					<th>Roll No</th>
					<th>Name</th>
					<th>Father Name</th>
					<th>DOB</th>
					<th>Gender</th>
					<th>Phone</th>
					<th>Mail</th>
					<th>Address</th>
					<th>Class</th>
					<th>Sec</th>
					<th>Image</th>
					<th>Tid</th>
					<th>Delete</th>
				</tr>
				<?php
					$tid = $_SESSION["tid"];
					$s = "SELECT * FROM student WHERE tid = ?";
					$stmt = $db->prepare($s);
					if ($stmt) {
						$stmt->bind_param("i", $tid);
						$stmt->execute();
						$res = $stmt->get_result();

						if ($res->num_rows > 0) {
							$i = 0;
							while ($r = $res->fetch_assoc()) {
								$i++;
								echo "
									<tr>
										<td>{$i}</td>
										<td>{$r["rno"]}</td>
										<td>{$r["name"]}</td>
										<td>{$r["fname"]}</td>
										<td>{$r["dob"]}</td>
										<td>{$r["gen"]}</td>
										<td>{$r["pho"]}</td>
										<td>{$r["mail"]}</td>
										<td>{$r["addr"]}</td>
										<td>{$r["sclass"]}</td>
										<td>{$r["ssec"]}</td>
										<td><img src='{$r["simg"]}' height='70' width='70'></td>
										<td>{$r["tid"]}</td>
										<td><a href='stud_delete.php?id={$r["id"]}' class='btnr'>Delete</a></td>
									</tr>";
							}
						} else {
							echo "<tr><td colspan='14'>No Record Found</td></tr>";
						}

						$stmt->close();
					} else {
						echo "<tr><td colspan='14'>Query Error: " . $db->error . "</td></tr>";
					}
				?>
			</table>
		</div>	
	</div>
	
	<?php include "footer.php"; ?>
</body>
</html>
