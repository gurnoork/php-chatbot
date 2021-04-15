<?php

session_start();

include_once "signup-config.php";

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);


if(!empty($email) &&!empty($password)){
    $sql = mysqli_query($con, "SELECT * FROM userdata WHERE email= '{$email}' AND password='{$password}' ");
    
    if(mysqli_num_rows($sql)>0){
        $row = mysqli_fetch_assoc($sql); 
        $status = "Active Now";
        $sql1 = mysqli_query($con,"UPDATE userdata SET status = '{$status}' WHERE unq_id={$row['unq_id']}");
        if($sql1){
            $_SESSION['unq_id'] = $row['unq_id'] ;
            echo "success";
        }
        
    }
    else{
        echo "Invalid Credentials";
    }
}
else{
   echo "All input fields are required";
}

?>