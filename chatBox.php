<?php

session_start();
if(!isset( $_SESSION['unq_id'])){
    header("location:  login.php");
}

?>
 


<?php  include_once "header.php" ;  ?>
<body>
    <div class="wrapper1">
        <div class=" chat-box">
           <div class="chat-area">
            <header>
            <?php 
                include_once "script/auth/signup-config.php";
                $user_id = mysqli_real_escape_string($con, $_GET['user_id']);
                $sql =  mysqli_query($con,"SELECT * FROM userdata where unq_id= {$user_id} ");
               
                if(mysqli_num_rows($sql)>0){
                    $row = mysqli_fetch_assoc($sql);
                }

           ?>
                <a href="users.php"><span class="material-icons">
arrow_back
</span> </a>
                <img src="script/auth/images/<?php echo $row['profile'] ?>" alt="" style="margin-left:10px; margin-right:10px">
                    <div class="detail">
                        <span><?php echo $row['fname']." ".$row['lname']; ?></span>
                        <p><?php echo $row['status'];  ?></p>
                    </div>
                </div>
            </header>
            <div class="chat-place">
               
           
            </div>
            <form action="#" class="form-type">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unq_id'];   ?> " hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id;  ?>" hidden>
                <input type="text" class="typing" name="message" placeholder="Type your Message...">
                <span class="send">Send</span>
            </form>
        </div>
        </div> 
        
    </div> 
    

    <script src="Script/chat.js"></script>
</body>
</html>