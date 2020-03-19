<?php include 'server.php'; 
if(!isset($_SESSION['username'])){
    header('location: index');
}
?>
<?php 
 $user_id = $_SESSION['user_id'];
 $sql = "SELECT * FROM prescription_item WHERE user_id='{$user_id}' ORDER BY id desc";
 $result = mysqli_query($db, $sql);
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charsert="UTF-8">
        <title><?php echo $_SESSION['username'] ?></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
        <script src="assets/js/scroll.js"></script>
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Visorr</title>
    </head>
	<!-- <div class="loader"></div> -->
    <body id="divId">
    <header class="scroll-top-background dashboard-in-desktop">
			<div class="container">
                <nav class="nav">
                  
                    <a href="dashboard" class="theme-logo"><img src="assets/images/presc.png" alt="" style="width: 200px"></a>
                  
                </nav>
            </div>
		</header>
    <section class="dashboard">
       
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <div class="user-info">
                        <div class=""><h5><i class="fa fa-user"></i><strong><?php echo $_SESSION['username'] ?></strong></h5></div>
                        <div class="user-logout">
                            <i class="fa fa-cog"></i><a href="index?logout" class="user-logout-btn">LOGOUT</a>
                        </div>
                    </div>
                   
                </div>
                <div class="col-lg-9 col-sm-9">
                    <div class="user-content">
                        <div class="row">
                           
                        </div>
                        <div class="row">
                            <div class="add-presc">
                            
                                <a href="#" class="presc-btn" data-toggle="modal" data-target="#add-prescription-modal">Add Prescription</a>
                                <!--modal starts-->
                                <div class="modal fade" id="add-prescription-modal" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="" method="post" class="presc-form" enctype="multipart/form-data">
                                            <div class="loader" style="display: none"></div>
                                                <div class="modal-form-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <p class="modal-title">New Prescription</p>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="field">
                                                        <p id="message"></p>
                                                        <div class="top">
                                                            <label class="control-label">Drug Name</label>
                                                        </div>
                                                        <div class="bottom">
                                                            <input value="" type="text" class="form-control" id="name" name="drug_name" placeholder="" required/>
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <div class="left">
                                                            <label class="control-label">Quantity</label>
                                                        </div>
                                                        <div class="select">
                                                            <select name="quantity" aria-label="Select menu example" id="quantity">
                                                                <option value="drug quantity">choose quantity</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                                <option value="4">Four</option>
                                                                <option value="5">Five</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="field">
                                                        <div class="top">
                                                            <label class="control-label">From</label>
                                                        </div>
                                                        <div class="bottom">
                                                        <input type="text" class="form-control" name="from_time" id="picker" placeholder="Starting time" required/>
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <div class="top">
                                                            <label class="control-label">Time</label>
                                                        </div>
                                                        <div class="bottom">
                                                        <input type="text" class="form-control" name="to_time" id="topicker" placeholder="End time" required/>
                                                        </div>
                                                    </div>
                                                    <div class="field">
                                                        <div class="left">
                                                            <label class="control-label">Duration</label>
                                                        </div>
                                                        <div class="select">
                                                            <select name="duration" aria-label="Select menu example" id="duration">
                                                                
                                                                <option value="1">One Day</option>
                                                                <option value="2">Two Days</option>
                                                                <option value="3">Three Days</option>
                                                                <option value="4">Four Days</option>
                                                                <option value="5">Five Days</option>
                                                                <option value="6">Six Days</option>
                                                                <option value="7">Seven Days</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    	
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <div class="presc-submit">
                                                        <input type="submit" class="btn btn-default add-presc-btn" name="submit" value="Add"/>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--modal ends-->
                            </div>
                        </div>
                        <!--the prescription results starts-->
                        <div class="row loadp">
                            <div class="prescription-container">
                                <!--table-->
                                <table class="table table-bordered">
                                <tr>
                                        <th>Drug Name</th>
                                        <th>Quantity</th>
                                     
                                                        
                                        <th>From</th>
                                        <th>Time</th>
                                        <th>Duration</th>
                                       
                                        <th>Actions</th>
                                    </tr>
                                    <?php
                                    while($row = mysqli_fetch_array($result))
                                    {
                                    ?>
                                   <tr class="deleted<?php echo $row['id'] ?>">
                                        <td><?php echo $row['drug_name'] ?></td>
                                        <td><?php echo $row['quantity'] ?></td>
                                     
                                        <td><?php echo date("l jS \of F Y",strtotime($row['from_time'] )) ?></td>
                                        <td><?php echo date('h:i:a',strtotime($row['to_time'])); ?></td>
                                        <td><?php echo $row['duration'].'day(s)' ?></td>
                                        
                                      
                                        <td>
                                                                                    
                                            <div class="actions-btn">
                                                <button class="act-btn remove-btn" onclick="remove_prescription(<?php echo $row['id'] ?>);" ><i class="fa fa-trash"></i></button>
                                                <button class="used-btn used-d-btn<?php echo $row['id'] ?> marked<?php echo $row['id'] ?> <?php echo $row['status'] == 'used' ? 'used' : '' ?>" onclick="use_drug(<?php echo $row['id'] ?>);" <?php echo $row['status'] == 'used' ? 'disabled' : '' ?>><?php echo $row['status'] == 'used' ? 'USED' : 'Mark'   ?></button>
                                            </div>
                                                                                        
                                        </td>
                                    </tr>
                                    <div class="send-mail">
                                    <?php
                                    //send notification
                                    $t = strtotime($row['to_time']);
                                    $tim = date('h:i a', $t);
                                   //print_r($tim);die;
                                    $lastday = date ("Y-m-d", strtotime ($row['from_time'] .$row['duration']." days"));
                                    if(date('Y-m-d') <= date("Y-m-d",strtotime($lastday))) {
                                        if ($tim == date('h:i a')) {
                                            //echo 'here';die;
                                        require 'vendor/autoload.php';

                                        // Instantiation and passing `true` enables exceptions
                                        $mail = new PHPMailer(true);
                                    
                                            try {
                                                //Server settings
                                               // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                                                $mail->isSMTP();                                            // Send using SMTP
                                                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                                                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                                $mail->Username   = 'segunolarewaju5@gmail.com';                     // SMTP username
                                                $mail->Password   = 'junior@@@';                               // SMTP password
                                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                                    
                                                //Recipients
                                                $mail->setFrom('prescription@gmail.com', 'bot');
                                                $mail->addAddress($row['email'], 'User');     // Add a recipient
                                                            // Name is optional
                                            
                                    
                                                // Content
                                                $mail->isHTML(true);                                  // Set email format to HTML
                                                $mail->Subject = 'Prescription Schedule';
                                                $mail->Body    = 'Time to take your '.$row['drug_name'];
                                                $mail->AltBody = 'Time to take your '.$row['drug_name'];
                                    
                                                $mail->send();
                                                //echo 'Message has been sent';
                                            } catch (Exception $e) {
                                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                            }
                                        }
                                    }
                                    //print_r(date('Y-m-d H:i'));die;
                                    //send notification
                                    }

                                    ?>
                                    </div>
                                </table>
                                <!--table-->
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    </section>

		<!--footer ends-->
		<script src="assets/js/jquery-1.9.1.min.js"></script>
		<script src="assets/js/popper.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/daterangepicker.js"></script>
        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/prescription.js"></script>
        <script src="assets/js/jquery.datetimepicker.full.min.js"></script>
        <script type="text/javascript">
   $(document).ready(function() {
     $('#picker').datetimepicker({
            timepicker: true,
            datepicker: true,
            format: 'Y-m-d',
            value: '09:00',
            hours12: false,
            step: 30,
            yearStart: 2014,
            yearEnd: 2025,
         });
         $('#topicker').datetimepicker({
            timepicker: true,
            datepicker: false,
            format: 'H:i',
            value: '09:30',
            hours12: false,
            step: 5,
           
         });
        
   });
    setInterval(function(){
    $('body').load('dashboard.php');
}, 60000);

</script>
    </body>
</html>