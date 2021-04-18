<?php

session_start();
include_once "signup-config.php";
$outgoing_id = $_SESSION['unq_id'];
$sql = mysqli_query($con, "SELECT * FROM userdata  WHERE NOT unq_id = {$outgoing_id}  ");
$output = "";


if(mysqli_num_rows($sql)==1){
    $output .="No users available";
}
elseif(mysqli_num_rows($sql)>0){
    include "data.php";
}
echo $output;  


?>