<?php

session_start();

include_once "signup-config.php";
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);


if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($con, "SELECT email FROM userdata WHERE email ='{  $email }'");
        if(mysqli_num_rows($sql)>0) {
            echo "$email already exists";
        }else{
            if(isset($_FILES['profile'])){
                $img_file = $_FILES['profile']['name'];
                $img_type = $_FILES['profile']['type'];
                $tmp_name = $_FILES['profile']['tmp_name'];

                $img_explode = explode('.',$img_file);
                $img_extension = end($img_explode);

                $extension = ['jpg','png','jpeg'];
                if(in_array($img_extension, $extension) === true){
                    $time = time();

                    $new_img_name = $time.$img_file;

                    if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
                        $status = "Active now";
                        $random_id = rand(time(), 1000000);


                        $sql2 = mysqli_query($con, "INSERT INTO userdata(unq_id,fname,lname,email,password, profile , status) VALUES({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
                        if($sql2){
                            $sql3 = mysqli_query($con,"SELECT * FROM userdata WHERE email = '{$email}'");
                            if(mysqli_num_rows($sql3)>0){
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unq_id'] = $row['unq_id'] ;
                                echo "success";
                            }
                        }
                        else{
                            echo "Oops something went wrong !!";
                        }
                    }
                }
                else{
                    echo "Please select valid image type - jpg, png or jpeg";
                }

            }
            else{
                echo "Please select an Image file";
            }
        }
    }
    else{
        echo "$email is not a valid email";
    }
}
else{
    echo "All input field are required";
}

?>