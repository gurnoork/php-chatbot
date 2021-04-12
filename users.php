<?php

session_start();
if(!isset( $_SESSION['unq_id'])){
    header("location:  login.php");
}

?>
 
 
 <?php  include_once "header.php" ;  ?>
<body>
    <div class="wrapper1"> 
        <div class=" logins">
           <div class="users">
           <?php 
                include_once "script/auth/signup-config.php";
                $sql =  mysqli_query($con,"SELECT * FROM userdata where unq_id= {$_SESSION['unq_id']} ");
                if(mysqli_num_rows($sql)>0){
                    $row = mysqli_fetch_assoc($sql);
                }

           ?>
            <header>
                <div class="content">
                    <img src="script/auth/images/<?php echo $row['profile'] ?>" alt="" ">
                    <div class="detail">
                        <span><?php echo $row['fname']," ".$row['lname'] ?></span>
                        <p><?php echo $row['status']  ?></p>
                    </div>
                </div>
                <a href="Script/auth/logout.php?logout_id=<?php echo $row['unq_id'] ?>" class="logout">Logout</a>
            </header>
            <div class="search-box">
                <p class="text">Select an user to start conversation</p>
                <input type="text" placeholder="Enter name to search">
                <span >Search</span>

            </div>
            <div class="user-list">
               


            </div>
        </div>
        </div> 
        
    </div>
  

    <script src="Script/users.js"></script>
</body>
</html>
