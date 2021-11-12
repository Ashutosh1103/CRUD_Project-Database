<?php
define("HOST","localhost");
define("UNAME","root");
define("PASSWORD","");
define("DBNAME","php_training");
$conn =  mysqli_connect(HOST, UNAME, PASSWORD,DBNAME) or die("Connection Error");

?>