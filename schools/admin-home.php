<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["aid"]))
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
				
				<div class="content">
					<h3 class="text">Welcome <?php echo $_SESSION["aname"]; ?></h3><br><hr><br>
						<h3 > School Information</h3><br>
					<!-- <img src="img/home.jpg" class="imgs"> -->
					<p class="para">
						College Management System is a is a complete College management software designed to automate a College's diverse operations from classes, exams to College events calendar. 
					</p>
					
					<p class="para">
						This College software has a powerful online community to bring parents, teachers and students on a common interactive platform. It is a paperless office automation solution for today's modern Colleges. The College Management System provides the facility to carry out all day to day activities of the College.
					</p>
				</div>

    	</div>
		
		<?php include"footer.php";?>


	</body>
</html>