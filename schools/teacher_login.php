<?php
    include"database.php";
    session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>College Management System </title>
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
        
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
            <h1 class="heading">Teacher Login</h1>
            <div class="log">
            <?php
                if(isset($_POST["login"]))
                {
                    $sql="select * from staff where tname='{$_POST["tname"]}' and tpass='{$_POST["tpass"]}'";
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                    {
                        $ro=$res->fetch_assoc();
                        $_SESSION["tid"]=$ro["tid"];
                        $_SESSION["tname"]=$ro["tname"];
                        echo "<script>window.open('teacher_home.php','_self');</script>";
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
                    <input type="text" name="tname" required class="input"><br><br>
                    <label>Password </label><br>
                    <input type="password" name="tpass" required class="input"><br>
                    <button type="submit" class="btn" name="login">Login Here</button>
                </form>
            </div>
        </div>
    </div>


    <?php include"footer.php";?>
		
	</body>
</html>