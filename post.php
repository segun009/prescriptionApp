<?php
include 'server.php';
if(!empty($_POST)) {
    $output = '';
    $drug_name = mysqli_real_escape_string($db,$_POST['drug_name']);
    $quantity = mysqli_real_escape_string($db,$_POST['quantity']);
    $from_time = mysqli_real_escape_string($db,$_POST['from_time']);
    $to_time = mysqli_real_escape_string($db,$_POST['to_time']);
    $duration = mysqli_real_escape_string($db,$_POST['duration']);
    $user_id = $_SESSION['user_id'];

    //get user email
    $email_sql = "SELECT * FROM users WHERE id='{$user_id}'";
    $email_get = mysqli_query($db,$email_sql);
    $email_g = $email_get->fetch_assoc();
    $user_email = $email_g['email'];
    //print_r($email_g['email']);exit;
    //get user email
        $sql = "INSERT INTO prescription_item (user_id,drug_name,quantity,from_time,to_time,duration,email) 
        VALUES ('{$user_id}','{$drug_name}','{$quantity}','{$from_time}','{$to_time}','{$duration}','{$user_email}')";
        
    if(mysqli_query($db,$sql)) {
        $select = "SELECT * FROM prescription_item WHERE user_id='{$user_id}' ORDER BY id desc";
        $result = mysqli_query($db, $select);
        $output .= '
        <table class="table table-bordered">  
        <tr>  
        <th>Drug Name</th>
        <th>Quantity</th>
     
                        
        <th>From</th>
        <th>Time</th>
        <th>Duration</th>
                                       
        <th>Actions</th>
        </tr>
        ';
        while($row = mysqli_fetch_array($result)) {
            $t = strtotime($row['to_time']);
                                    $tim = date('h:i a', $t);
            $output .= '
            <tr class="deleted'.$row['id'].'">  
            <td>' . $row["drug_name"] . '</td>  
            <td>' . $row["quantity"] . '</td>  
            <td>' . date("l jS \of F Y",strtotime($row['from_time'] )) . '</td> 
            <td>' . date('h:i:a',strtotime($row['to_time'])) . '</td>  
            <td>' . $row["duration"] .'day(s)'. '</td>  
            
        
            <td><div class="actions-btn">
            <button class="act-btn remove-btn" onclick="remove_prescription('.$row['id'].');"><i class="fa fa-trash"></i></button>
            <button class="used-btn used-d-btn'.($row['id']).' marked'.$row['id'].' ' . ($row["status"] == 'used' ? 'used' : ''). '" onclick="use_drug('.$row['id'].');">' . ($row["status"] == 'used' ? 'used' : 'Mark'). '</button>
        </div></td>
            
       </tr>
            ';
        }
        $output .= '</table>';
    }
    echo $output;
}
?>