<?php require'database.php' ?>
<?php
session_start();

if(isset($_POST['signup'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        
        $res=mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");
        $count = mysqli_num_rows($res);
        if ($count){
            $userdata=mysqli_fetch_array($query);
            $username=$userdata['username'];
            $token=$userdata['token'];  
            $subject="Password Reset";
            $body="hi, $username. click here to activate your account http://localhost/1emailverifregister/activate.php?token=$token";
            $sender_email = "From: csravi816@gmail.com";

            if(mail($email, $subject, $body, $sender_mail)){
                $_SESSION['msg']= "Check you mail to activate Your account $email";
                header("location:login.php");
            }else{
                echo "Email Sending Failed..";
            }
        }else{
            echo "No email found..";
        }
            
    
            }

     
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Online Exam Portal</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
		<style>
			.recemail{
				background-color: black;
				margin-top: 170px;
				padding: 20px;
			}
		</style>
	</head>
	<body>
		<section id="main-section">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<div class="main-frame text-center">
								<h1 style="font-size:400%;"><strong>ONLINE - EXAM PORTAL</strong></h1>
								<h3>Online Exam Portal</h3>
								<a style="position:fixed;bottom:0;left:0;" class="btn btn-primary btn-block" href="admin.php">Go To Admin Panel</a>
							</div>
						</div>
						<div class="col-lg-4">
              <div class="recemail">
                                <div>
                                <h2>Recover Your Account</h2>
                                </div>
								
								<!-- <ul class="nav nav-pills nav-justified"> -->
									<!-- <li style="background-color:aliceblue"><a data-toggle="tab" data-target="#signup">Click To Recover Your Account</a></li> -->
								<!-- </ul> -->
                  <div class="recovermail">
									<div id="signup" class="" style="padding-left:20px; padding-right:20px;  ">
										<form action="index_1.php" method="GET"><br><br>
											<div class="form-group"><input class="form-control" type="email" name="email" placeholder="E-mail" required></div><br>
											<div class="form-group"><input class="form-control" type="submit" name="signup" value="Send Mail"></div>
										</form>
									</div>
								</div>
								<br><center><span><?php if(isset($errMSG)){echo $errMSG;}?></span><center>
							</div>
            </div>
				</div>
			</div>
		</div>
	</section>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
