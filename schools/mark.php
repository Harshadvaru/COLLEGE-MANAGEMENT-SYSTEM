<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["tid"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	if(isset($_GET["rno"]))
	{
		$sql="select * from student where rno='{$_GET["rno"]}'";
		$res=$db->query($sql);
		if($res->num_rows<=0)
		{
			header("location:add_mark.php?err=Invalid Register no..");
		}
		else
		{
			$rows=$res->fetch_assoc();
			$class=$rows["sclass"];
			$regno=$_GET["rno"];
		}
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

		<div class="container2">
		    <?php include"side-bar.php";?><br>

				<div class="content12">
                <h3 class="text">Welcome <?php echo $_SESSION["tname"]; ?></h3><br><hr><br>
                <h3>Add Marks</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$sq="insert into mark(regno,sub,mark,term,class) values ('{$_POST["regno"]}','{$_POST["sub"]}','{$_POST["mark"]}','{$_POST["etype"]}','{$_POST["class"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed</div>";
							}
							
						}
					?>
                    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
						<div class="lbox">
							<label> Register No</label><br>
							<input type="text" style="background:#b1b1b1;" value="<?php echo $regno;?>" class="input3" name="regno" readonly><br><br>
							
							<label>Class</label><br>
							<input type="text" style="background:#b1b1b1;"  value="<?php echo $class ?>" class="input3" name="class" readonly><br><br>
						
							<label> Select Term</label><br>
							<select name="etype" required class="input3">
								<option value="">Select</option>
								<option value="I-Term">I-Term</option>
								<option value="II-Term">II-Term</option>
								<option value="III-Term">III-Term</option>
							</select>
							<br><br>
						</div>
						<div class="rbox">
							
						<label>Subject</label><br>
							<select name="sub" required class="input3">
						
								<?php 
									 $s="SELECT *  FROM sid";
									$re=$db->query($s);
										if($re->num_rows>0)
											{
												echo"<option value=''>Select</option>";
												while($r=$re->fetch_assoc())
												{
													echo "<option value='{$r["sname"]}'>{$r["sname"]}</option>";
												}
											}
								?>
							</select>
							<br><br>
							<label >Mark :</label><br>
							<input class="input3" name="mark"  id="mark" type="mark" required>
							<br><br>
							<button type="submit" style="float:right;" class="btn" name="submit"> Add Mark Details</button>
					</form>							
						</div>
						
				</div>

        </div>
        <?php include"footer.php";?>
    </body>
</html>