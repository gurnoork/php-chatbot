<?php


    while($row = mysqli_fetch_assoc($sql)){
        $que = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unq_id']} or outgoing_msg_id = {$row['unq_id']} ) 
        AND (outgoing_msg_id = {$outgoing_id} or incoming_msg_id = {$outgoing_id} ) ORDER BY msg_id DESC LIMIT 1 ";

        $que1 = mysqli_query($con, $que );
        $roww = mysqli_fetch_assoc($que1);

        if(mysqli_num_rows($que1)>0){
            $res = $roww['msg'];
            $tme = date('h:i',strtotime($roww['time']));
            $dte = date('d-m-Y',strtotime($roww['time']));
            $statusicon = "time";
        }
        else{
            $res = "No Conversation available";
            $tme = null;
            $dte = null;
            $statusicon = "status-icon";
        }
       

        (strlen($res)>28) ? $msg=substr($res, 0,28).'...' : $msg = $res;
        ($outgoing_id == $roww['outgoing_msg_id']) ? $you = "You: " : $you = "";
        

        $row['status'] == "Offline now" ? $offline = "content" : $offline = "contents";


        $output .= '<a href="chatBox.php?user_id='.$row['unq_id'].' " >
        <div class="'.$offline.'  ">
        <img src="script/auth/images/'. $row['profile'] .'" alt="">
            <div class="detail">
                <span>'. $row['fname']." ".$row['lname'] .'</span>
                <p>'. $you . $msg.'</p>
               
              
            </div>
        </div>
        <div class="he">
        <div class = "date">'.$dte.'</div>
        <div class="'.$statusicon.'  "> '.$tme.'
        
        
    </div>
    </div>
   
   
    </a>';

    
}
?>