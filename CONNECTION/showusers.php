<?php
include("CONNECTION/config.php");
//read all row from database table 
$sql = "SELECT * FROM users";
$result = $con->query($sql);

if(!$result){
    die("Invalid query: " . $con->error);

}
//read data of each row
