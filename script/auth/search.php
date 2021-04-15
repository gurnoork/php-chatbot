<?php
session_start();
include_once "signup-config.php";
$outgoing_id = $_SESSION['unq_id'];
$searchTerm = mysqli_real_escape_string($con,$_POST['searchTerm']);
//echo $searchTerm;
$output ="";

$sql = mysqli_query($con, "SELECT * FROM userdata WHERE NOT unq_id = {$outgoing_id} AND
( fname LIKE '%{$searchTerm}%'OR lname LIKE '%{$searchTerm}%' )");
if(mysqli_num_rows($sql)>0){
    include 'data.php';
}
else{
    $output .= 'No user Found';
}

echo $output;
?>