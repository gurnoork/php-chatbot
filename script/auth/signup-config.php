<?php

$con = mysqli_connect("localhost","root","","chat-app");

echo $con ?   null : mysqli_connect_error();

?>