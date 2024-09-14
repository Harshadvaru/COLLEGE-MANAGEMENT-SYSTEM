
<?php
	include "database.php";
	session_start();
	if (!isset($_SESSION["tid"])) {
		echo "<script>window.open('index.php?mes=Access Denied..', '_self');</script>";
		exit();
	}

    // Fetch staff details
    $sql = "SELECT * FROM staff WHERE tid={$_SESSION["tid"]}";
    $res = $db->query($sql);

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $_SESSION["tname"] = $row["tname"]; // Set tname in session
    } else {
        echo "<script>window.open('index.php?mes=No record found...', '_self');</script>";
        exit();
    }
?>

<!DOCTYPE html>
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
        <?php include "side-bar.php"; ?><br>
        
        <div class="content10">
            <h3 class="text">Welcome <?php echo $_SESSION["tname"]; ?></h3><br><hr><br>
            
            <h3>Add Profile</h3><br>
            <div class="lbox1">
                <?php
                    if (isset($_POST["submit"])) {
                        $target_dir = "staff/";
                        if (!is_dir($target_dir)) {
                            mkdir($target_dir, 0777, true);
                        }
                        $target_file = $target_dir . basename($_FILES["img"]["name"]);
                        
                        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                            $sql = "UPDATE staff SET pno='{$_POST["pno"]}', mail='{$_POST["mail"]}', paddr='{$_POST["addr"]}', img='{$target_file}' WHERE tid={$_SESSION["tid"]}";
                            if ($db->query($sql)) {
                                echo "<div class='success'>Insert Success</div>";
                            } else {
                                echo "<div class='error'>Insert Failed</div>";
                            }
                        } else {
                            echo "<div class='error'>File Upload Failed</div>";
                        }
                    }
                ?>
                <form enctype="multipart/form-data" role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <label>Phone No</label><br>
                    <input type="text" maxlength="10" required class="input3" name="pno"><br><br>
                    <label>E-Mail</label><br>
                    <input type="email" class="input3" required name="mail"><br><br>
                    <label>Address</label><br>
                    <textarea rows="5" name="addr"></textarea><br><br>
                    <label>Image</label><br>
                    <input type="file" class="input3" required name="img"><br><br>
                    <button type="submit" class="btn" name="submit">Add Profile Details</button>
                </form>
            </div>

            <div class="rbox1">
                <h3>Profile</h3><br>
                <table border="1px">
                    <tr><td colspan="2"><img src="<?php echo $row["img"]; ?>" height="100" width="100" alt="Upload Pending"></td></tr>
                    <tr><th>Name</th> <td><?php echo $row["tname"]; ?></td></tr>
                    <tr><th>Qualification</th> <td><?php echo $row["qual"]; ?></td></tr>
                    <tr><th>Salary</th> <td><?php echo $row["sal"]; ?></td></tr>
                    <tr><th>Phone No</th> <td><?php echo $row["pno"]; ?></td></tr>
                    <tr><th>E-Mail</th> <td><?php echo $row["mail"]; ?></td></tr>
                    <tr><th>Address</th> <td><?php echo $row["paddr"]; ?></td></tr>
                </table>
            </div>
        </div>
    </div>
    
    <?php include "footer.php"; ?>
</body>
</html>
```

