<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["tid"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
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
				
				<div class="content10">
                <h3 class="text">Welcome <?php echo $_SESSION["tname"]; ?></h3><br><hr><br>
                <h3>Add Class</h3><br>
                <div class="lbox1">
					<?php
						if(isset($_POST["submit"]))
						{
							 $sq="insert into hclass(tid,cla,sec,sub) values ('{$_SESSION["tid"]}','{$_POST["cla"]}','{$_POST["sec"]}','{$_POST["sub"]}')";
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
						
						
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
					<label>Class</label><br>
						
						<select name="cla" required class="input3">
							<?php
								$sl="select DISTINCT(cname) from class";
								$r=$db->query($sl);
								 if($r->num_rows>0)
								 {
									 echo "<option value=''>Select</option>";
									 while($ro=$r->fetch_assoc())
									 {
										 echo "<option value='{$ro["cname"]}'>{$ro["cname"]}</option>";
									 }
								 }
                                 ?>
					
						</select>
						
					<br><br>
					
					<label>Section</label><br>
					
						<select name="sec" required class="input3">
						<?php
							$sl="select DISTINCT(CSEC) from class";
							$r=$db->query($sl);
								if($r->num_rows>0)
								{
									echo "<option value=''>Select</option>";
									while($ro=$r->fetch_assoc())
									{
										echo "<option value='{$ro["CSEC"]}'>{$ro["CSEC"]}</option>";
									}
								}
                        ?>	
						</select><br></br>
				
					<label>Subject</label><br>
					
						<select name="sub" required class="input3">
						<?php
							$s="select * from sid";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>Select</option>";
								while($r=$re->fetch_assoc())
								{
								echo "<option value='{$r["sname"]}'>{$r["sname"]}</option>";
								}
							}
                        ?>
						</select>
						
					<br><br>
					
					<button type="submit" class="btn" name="submit">Add  Details</button>
					</form>
					
					</div>
					<div class="rbox1">
					<h3> Details</h3><br>
						<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>S.No</th>
							<th>Class Name</th>
							<th>Section</th>
							<th>Subject</th>
							<th>Delete</th>
						</tr>
						<?php
							$s="select * from hclass";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"
									<tr>
										<td>{$i}</td>
										<td>{$r["cla"]}</td>
										<td>{$r["sec"]}</td>
										<td>{$r["sub"]}</td>
										<td><a href='hclass_delete.php?id={$r["hid"]}' class='btnr'>Delete</a></td>
									</tr>";
								}
							}
						?>
						</table>
					</div>
				</div>
			</div>
                        </div>
                        </div>
				
		
		<?php include"footer.php";?>


	</body>
</html>