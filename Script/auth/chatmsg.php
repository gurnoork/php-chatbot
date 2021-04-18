<?php

session_start();
if(isset($_SESSION['unq_id'])){
    include_once "signup-config.php";
    $outgoing_id = mysqli_real_escape_string($con, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
  
    
    $output="";

    // $sql="SELECT * FROM messages WHERE (outgoing_msg_id ={$outgoing_id} AND incoming_msg_id = {$incoming_id} )
    // OR (outgoing_msg_id ={$incoming_id} AND incoming_msg_id = {$outgoing_id} ) ORDER BY msg_id asc";
    
    $sql = "SELECT * FROM messages 
    LEFT JOIN userdata ON userdata.unq_id = messages.outgoing_msg_id
    WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
    OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
   
    
    $query = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($query)>0){
        while($row = mysqli_fetch_assoc($query)){
            if($row['incoming_msg_id'] === $incoming_id){
              
                $output .= '<div class="chat chat-send">
                <div class="details">
                    <p>'.$row['msg'].'</p>
                    <div class="time" style="color:greyblue; float:right; font-size:10px; margin-bottom:0; ">'.date('h:i',strtotime($row['time'])).'</div>
                    
                </div>
               
            </div>
            ';
            }
            else{
               // echo $row['outgoing_msg_id']. "    ".$outgoing_id;
                
                $output .= '<div class="chat chat-receive">
               <img src="script/auth/images/'.$row['profile'].'" alt="">
                <div class="details">
                <p>'.$row['msg'].'</p>
                <div class="time" style="color:greyblue; float:left; font-size:10px; margin-bottom:0; ">'.date('h:i',strtotime($row['time'])).'</div>
                
                </div>
            </div>';
            }
        }
        echo $output;
    }
}
else{
    header("../login.php");
}

?>