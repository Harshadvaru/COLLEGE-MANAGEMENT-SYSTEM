<?php
    include "database.php";
    session_start();
    if (!isset($_SESSION["aid"])) {
        echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";
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
    <div class="container2">
        <div id="content2">
            <?php include "side-bar.php"; ?><br>

            <div class="content9">
                <h3>View Student Details</h3><br>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="lbox1">
                        <label>Class</label><br>
                        <select name="sclass" required class="input3">
                            <?php 
                                $sl = "SELECT DISTINCT(cname) FROM class";
                                $r = $db->query($sl);
                                if ($r->num_rows > 0) {
                                    echo "<option value=''>Select</option>";
                                    while ($ro = $r->fetch_assoc()) {
                                        echo "<option value='{$ro["cname"]}'>{$ro["cname"]}</option>";
                                    }
                                }
                            ?>
                        </select>
                        <br><br>
                    </div>
                    <div class="rbox">
                        <label>Section</label><br>
                        <select name="ssec" required class="input3">
                            <?php 
                                $sql = "SELECT DISTINCT(csec) FROM class";
                                $re = $db->query($sql);
                                if ($re->num_rows > 0) {
                                    echo "<option value=''>Select</option>";
                                    while ($r = $re->fetch_assoc()) {
                                        echo "<option value='{$r["csec"]}'>{$r["csec"]}</option>";
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <button type="submit" class="btn" name="view">View Details</button>
                </form>
            </div>
            <br>
            <div class="Output" >
                <?php
                    if (isset($_POST["view"])) {
                        echo "<h3>Student Details</h3><br>";
                        $sql = "SELECT * FROM student WHERE sclass='{$_POST["sclass"]}' AND ssec='{$_POST["ssec"]}'";
                        $re = $db->query($sql);
                        if ($re->num_rows > 0) {
                            echo '
                                <table border="1px" style="background-color: rgba(255, 255, 255, 0.8);">
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
                                </tr>';
                            $i = 0;
                            while ($r = $re->fetch_assoc()) {
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
                                </tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No record Found";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</div>
</body>
</html>
