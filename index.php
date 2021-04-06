<?php

session_start();
if(isset($_SESSION['unq_id'])){
    header("location: users.php");
}

?>


<?php  include_once "header.php" ;  ?>
<body>
    <div class="wrapper">
        
        <div class=" signup">
            <h1 class="title">Chat Application</h1>
            <form action="#" enctype="multipart/form-data">
                <div class="error-msg"></div>
                <div class="name">
                    <div class="field name-details">
                        <label>First Name</label>
                        <input type="text" class="input" name="fname" required />  
                    </div>
                    <div class="field name-details">
                        <label>Last Name</label>
                        <input type="text" class="input" name="lname" required  />  
                    </div>
                </div>
                
                <div class="field">
                    <label>Email Address</label>
                    <input type="email" class="input" name="email" required />  
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="password" class="input" name="password" required />  
                </div>
                <div class="field file-input">
                    <label>Profile Pic</label>
                    <input type="file" class="file" name="profile" required />  
                </div>
             
              
             
                  <button type="submit" class="button">
                      <span>Submit</span>
                  </button>
             
             
            </form>
            <div class="link">Already signed up? <a href="login.php">Login</a></div>
        </div>
    </div>
 
    <script src="script/signup.js"></script>
</body>
</html>