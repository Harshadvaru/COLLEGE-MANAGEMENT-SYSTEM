<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>College Management System </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

		<style>
        .container1 {
            background-image: url('images/university-of-mobile-ZPkG0EdWQa8-unsplash.jpg');
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 700px;
        }
        .login {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background for the login form */
            padding: 20px;
            border-radius: 10px;
            width: 500px;
            margin: auto;
            position: relative;
            top: 50%;
            transform: translateY(-50%);
        }
        .heading {
            text-align: center;
            margin-bottom: 20px;
        }
        .input {
            width: 95%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
			font-size: 20px;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .error {
            color: white;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
	</head>

	<body class="back">
		<?php include"navbar.php";?>
   
    <div class="container1">
        <!-- <img src="images/university-of-mobile-ZPkG0EdWQa8-unsplash.jpg" width="100%" height="700px"> -->
        <div class="login">
            <h1 class="heading">Admin Login</h1>
            <div class="log">
            <?php
                if(isset($_POST["login"]))
                {
                    $sql="select * from admin where aname='{$_POST["aname"]}' and apassword='{$_POST["apass"]}'";
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                    {
                        $ro=$res->fetch_assoc();
                        $_SESSION["aid"]=$ro["aid"];
                        $_SESSION["aname"]=$ro["aname"];
                        echo "<script>window.open('admin-home.php','_self');</script>";
                    }
                    else
                    {
                        echo "<div class='error' >Invalid Username or Password</div>";
                    }
                    
                }
                if(isset($_GET["mes"]))
                {
                    echo "<div class='error'>{$_GET["mes"]}</div>";
                }
                
            ?>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <label>User Name</label><br>
                    <input type="text" name="aname" required class="input"><br><br>
                    <label>Password </label><br>
                    <input type="password" name="apass" required class="input"><br>
                    <button type="submit" class="btn" name="login">Login Here</button>
                </form>
            </div>
        </div>
    </div>


		<div class="footer">
			<footer><p>All Copyright Received By the College Authorites...</p></footer>
		</div>

	
		<script src="js/jquery.js"></script>
	<script>
		$(document).ready(function(){
			$(".error").fadeTo(1000, 100).slideUp(1000, function(){
					$(".error").slideUp(1000);
			});
			
			$(".success").fadeTo(1000, 100).slideUp(1000, function(){
					$(".success").slideUp(1000);
			});
		});
	</script>
		
	
		
	</body>
</html>