<?php

session_start();
if(isset($_SESSION['unq_id'])){
    header("location: users.php");
}

?>

<?php  include_once "header.php" ;  ?>
<body>
    <div class="wrapper">
        <div class=" login">
            <h1 class="title">Chat Application</h1>
            <form action="#">
                <div class="error-msg"></div>
                
                <div class="field">
                    <label>Email Address</label>
                    <input type="email" class="input" name="email" />  
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="password" class="input" name="password" />  
                   
                </div>
                
              
           
                  <button type="submit" class="button">
                      <span>Submit</span>
                  </button>
             
             
            </form>
            <div class="link">New User ? <a href="index.php">Sign up</a></div>
        </div>
    </div>
    <script src="script/login.js"></script>
</body>
</html>