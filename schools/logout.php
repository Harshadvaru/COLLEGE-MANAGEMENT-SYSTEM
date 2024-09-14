<?php
	include "database.php";
	session_start();
	
	unset ($_SESSION["aid"]);
	unset ($_SESSION["aname"]);
	unset ($_SESSION["tid"]);
	unset ($_SESSION["tname"]);
	
	session_destroy();
	echo "<script>window.open('index.php','_self');</script>";
?>