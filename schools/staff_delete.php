<?php

    include"database.php";
    session_start();

    $s="delete from staff where tid={$_GET["id"]}";
    $db->query($s);
    echo "<script>window.open('view_staff.php?mes=Data Deleted.','_self');</script>"

?>