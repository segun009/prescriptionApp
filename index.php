<?php include 'server.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charsert="UTF-8">
        <title>Prescription</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
        <script src="assets/js/scroll.js"></script>
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Visorr</title>
    </head>
	<div class="loader"></div>
    <body>
    <header class="scroll-top-background hide-in-mobile">
			<div class="container">
                <nav class="nav">
                  
                    <a href="index" class="theme-logo"><img src="assets/images/presc.png" alt="" style="width: 200px"></a>
                    
                </nav>
            </div>
	</header>
		
	<header class="scroll-top-background show-in-mobile">
          <div class="navbar navbar-default navbar-static-top">
			 <div class="container">
				<div class="navbar-header">
				<a href="index" class="theme-logo"><img src="assets/images/presc.png" alt="" style="width: 200px"></a>
				</div>
			 </div>
		  </div>
		  
    </header>	
		
		
		 <!--desktop header ends here-->
        <!----------------------->
        <!------------------------>
        <!--desktop header ends here-->
        <!--mobile header begins here-->
        <!----------------------->
        <!------------------------>
        <!--mobile header begins here-->
        
	<!--homepage carousel starts-->
	<section class="page-arrow index-section" id="page-arrow">
           <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="assets/images/carousel1.jpg" alt="images not found">
                    <div class="owl-c">
                        <div class="container">
                            <div class="header-content">
                                <div class="owl-l"></div>
                                <h2>PRSC Global Community</h2>
                           
                                <h4>We help you manage your prescription schedules</h4>
								
                            </div>
                        </div>
                     </div>
                </div>                    
                <div class="item">
                    <img src="assets/images/carousel2.jpg" alt="images not found">
                    <div class="owl-c">
                        <div class="container">
                            <div class="header-content">
                                <div class="owl-l animated bounceInLeft"></div>
								<h2>PRSC Global Community</h2>
                                <h1>Need a prescription reminder? </h1>
                                <h4>PRSC Got You Covered</h4>
								
                            </div>
                        </div>
                     </div>
                </div>                
                <div class="item">
                    <img src="assets/images/carousel3.jpg" alt="images not found">
                    <div class="owl-c">
                        <div class="container">
                            <div class="header-content">
                                <div class="owl-l animated bounceInLeft"></div>
                                <h2>PRSC Global Community</h2>
                                <h1>Need a prescription reminder? </h1>
                                <h4>PRSC Got You Covered</h4>
								 
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </section>
	<!--homepage carousel ends-->
        <section class="signup" id="page-arrow">
           <div class="container">
			   <div class="row">
				   <div class="col-lg-6 col-sm-6">
						<div class="signup-form left-animation">
							<form action="index.php" method="post" class="loginform" autocomplete="off">
								<div class="form-top">
								<h2> Login</h2>
								</div>
								<div class="login ist-login">LOGIN</div>
								<div class="register">REGISTER</div>
								<div class="input-field">
									<?php include 'lerrors.php'; ?>
									<input class="mail" type="text" name="username" placeholder="username" required autocomplete="off">
									<br>
								<input class="pass" type="password" name="password" placeholder="password" required autocomplete="off">
									<br>
									
								<input class="submit" type="submit" name="login" value="Login">
								</div>
								
							</form>

							<form action="index.php" method="post" class="registerform">
								<div class="form-top">
								<h2> Register</h2>
								</div>
								<div class="login">LOGIN</div>
								<div class="register">REGISTER</div>
									<div class="input-field">
										<?php include 'errors.php'; ?>
										<br>
										<input class="mail" type="email" name="email" value="<?php echo $email ?>" placeholder="Email" required >
										<br>
										<input class="mail" type="text" name="username" value="<?php echo $username ?>" placeholder="username" required autocomplete="off">
										<br>
										<input class="pass" type="password" name="password" placeholder="password" required>
										<br>
										<input class="pass" type="password" name="password2" placeholder="comfirm password" required>
										
										<br>
										
										<input class="submit" type="submit" value="Register" name="register">
									</div>
								
							</form>
						</div>
				   </div>
				   <div class="col-lg-6 col-sm-6">
					<div class="signup-form right-animation">
						<div class="signup-message">
							<div class="login-heading">
								<h2>Welcome,</h2>
								<p>Login to access your Dashboard</p>
							</div>
							<div class="signup-heading" style="display: none">
								<h2>Welcome, </h2>
								<p>Register With us to monitor and track your prescriptions.</p>
							</div>
						</div>
						
					</div>
					</div>
			   </div>
		   </div>
        </section>
        <!--header stops-->
        <!--signup starts-->
       
        <!--sign up ends-->


        <!--footer starts-->
        <footer>
			
			<div class="container">
				<div class="last-container">
					<div class="copyright">
						<h4>Copyright &copy; Design By Segun Olarewaju</h4>
					</div>
					
					<div class="terms-privacy">
						<ul class="social-m-icons">
								<li><a href="#">Terms of Use | </a></li>
								<li><a href="#"> Privacy Policy</a></li>
						</ul>
					</div>
					
					<a href="#" id="scroll" style="display: none;"><span></span></a>
					
				</div>
			</div>
		</footer>
		
		<!--footer ends-->
		<script src="assets/js/jquery-1.9.1.min.js"></script>
		<script src="assets/js/popper.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/prescription.js"></script>
    </body>
</html>
