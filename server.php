<?php 
session_start();
$username = '';
$email = '';
$errors = array();
$lerrors = array();
//connect 
$db = mysqli_connect('localhost', 'root', '', 'prescription');
//handle post variables
if(isset($_POST['register'])) {
   $username = mysqli_real_escape_string($db,$_POST['username']);
   $email = mysqli_real_escape_string($db,$_POST['email']);
   $password = mysqli_real_escape_string($db,$_POST['password']);
   $password2 = mysqli_real_escape_string($db,$_POST['password2']);

  /*  if(empty($username)) {
       array_push($errors, 'please fill in your username');
   }
   if(empty($email)) {
    array_push($errors, 'please fill in your email');
   }
   if(empty($password)) {
    array_push($errors, 'please fill in your password');
   } */
   if($password != $password2) {
       array_push($errors, 'passwords do not match');
   }
   //incase no errors
   if(count($errors) == 0) {
       $password = md5($password);
       //print_r($email);exit;
       $sql = "INSERT INTO users (username, email, password) VALUES('{$username}','{$email}','{$password}')";
       mysqli_query($db,$sql);
       $user_id = mysqli_insert_id($db);
       //print_r($user_id);exit;
       $_SESSION['user_id'] = $user_id;
       $_SESSION['username'] = $username;
       $_SESSION['success'] = "Welcome";
       header('location: dashboard');
   }
}
if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result) == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $user_id = $row['id']; //this is the id of the loggedIn User
            $_SESSION['user_id'] = $user_id;
       $_SESSION['success'] = "Welcome Back";
       header('location: dashboard');
    } else {
        array_push($lerrors, "Please input correct login details");
    }
}
/* if(isset($_POST['submit'])) {
    $drug_name = mysqli_real_escape_string($db,$_POST['drug_name']);
    $quantity = mysqli_real_escape_string($db,$_POST['quantity']);
    $period = mysqli_real_escape_string($db,$_POST['period']);
    $pre_time = mysqli_real_escape_string($db,$_POST['pre_time']);
    $duration_from = mysqli_real_escape_string($db,$_POST['duration_from']);
    $duration_to = mysqli_real_escape_string($db,$_POST['duration_to']);
    
    if(empty($quantity)) {
        array_push($errors, "quantity is required");
    }
    if(empty($period)) {
        array_push($errors, "period is required");
    }
    if(empty($pre_time)) {
        array_push($errors, "time is required");
    }
    if(empty($duration_from)) {
        array_push($errors, "start duration is required");
    }
    if(empty($duration_to)) {
        array_push($errors, "duration end is required");
    }
    if(count($errors) == 0) {
        $user_id = $_SESSION['user_id'];
        $sql = "INSERT INTO prescription_item (user_id,drug_name,quantity,period,pre_time,duration_from,duration_to) 
        VALUES ('{$user_id}','{$drug_name}','{$quantity}','{$period}','{$pre_time}','{$duration_from}','{$duration_to}')";
        $result = mysqli_query($db,$sql);
        $_SESSION['success'] = "Prescription Added Successfully";
        header('location: dashboard');
    } else {
        print_r($errors);die;
    }
} */
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: index');
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['sendmail'])) {

    require 'vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'segunolarewaju5@gmail.com';                     // SMTP username
            $mail->Password   = 'junior@@@';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('prescription@gmail.com', 'bot');
            $mail->addAddress('segunolarewaju5@gmail.com', 'User');     // Add a recipient
                        // Name is optional
        

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        header('location: dashboard');
}