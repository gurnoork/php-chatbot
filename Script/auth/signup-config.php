<?php

$con = mysqli_connect("localhost","root","","chat-app");
//$con = mysqli_connect("remotemysql.com","SoL1qfXgsW","CvieyngFhG","SoL1qfXgsW");
//$con = mysqli_connect("freedb.tech","freedbtech_nemesis","@8271Abhishek","freedbtech_abhishekchat");
echo $con ?   null : mysqli_connect_error();

?>