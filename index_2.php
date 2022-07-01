<?php

 require_once "./database.php";

 function match_pin($email, $pin)
{
    // require_once "./database.php";
    global $conn;
    $query =  "SELECT * FROM recovery_pin WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    // die(var_dump($query));
    // die(var_dump($result));

    if (mysqli_num_rows($result)) {

        $flag = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $hashed_pin = $row["pin"];
            if (password_verify($pin, $hashed_pin)) {
                $flag = 1;
                break;
            }
        }
        return $flag == 1 ? "MATCHED-SENT" : "NOT-MATCHED-SENT";
    } else {
        return "NOT-SENT";
    }
}

if (isset($_POST["set-pass"])) {
    $pass1 = $_POST["pass-1"];
    $pass2 = $_POST["pass-1"];
    $email = $_POST['email'];

    $pass1 = md5($pass1);
    
            $update_pass = "UPDATE users SET  password = '$pass1' WHERE email = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $msg = "Your password changed. Now you can login with your new password.";
                $_SESSION['user_id'] = $msg;
                header('Location: studentHome.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    
        //die("Update Database");
        
    



if (isset($_GET["email"])) {
    $email = $_GET["email"];
    if (isset($_GET["pin"])) {
        $pin = $_GET["pin"];
        $match = match_pin($email, $pin);
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
            .enter_pin{
                text-align: center;
                background-color:  #1b1b1b8c;
                padding: 40px 20px 40px 20px;
                margin-top: 80px;
                position: relative;
                top: 100px;
            }
            .heading{
                text-align: center;
                margin-top: 100px;
                position: relative;
                top: 100px;
            }
            .nextbtn{
                margin: 2px;
                padding: 0px 3px;
                background-color: darkcyan;
            }
            .nextbtn:hover{
                background-color: slategrey;
            }
            .resetpass{
                margin-top: 180px;
                background-color: #1b1b1b8c;
                padding: 40px 80px 40px 80px;
                
            }
            .resetbtn{
                margin: 1px 0px 0px 43px;
                padding: 0px 8px;
                background-color: darkcyan;
                color: black;

            }
            .resetbtn:hover{
                font-size: 110%;
                background-color: silver;
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

    <!-- <body style="background-color: skyblue;"> -->
    <?php if (!isset($email)) : ?>
        <form   action="" method="get">
            <div>
                <label>
                     Enter Email:
                    <input type="email" name="email">
                </label>
                <input type="submit" value="Next" name="set-email">
            </div>
        </form>
    <?php elseif (!isset($pin)) : ?>
        <div class="enter_pin">
        <h4>Check your email for pin: <?= $email ?></h4>
        
        
        <form action="" method="get">
            <div>
                <label>
                    Enter Pin
                    <input type="text" name="pin" placeholder="Enter Pin Code" required>
                    <input type="text" name="email" value="<?= $email ?>" hidden>
                </label>
                <input class="nextbtn"  type="submit" value="Next" name="set-pin">
            </div>
        </form>
        </div>

    <?php elseif (isset($match)) : ?>
        <!-- INNER IF BLOCK START -->
        <?php if ($match == "MATCHED-SENT") : ?>
            <div class="resetpass" >
            <h4>Email: <?= $email ?></h4>
            <h4>Pin: <?= $pin ?></h4>
            
            <form action="" method="POST">
                <input type="text" name="email" value="<?= $email ?>" hidden>
                <input type="text" name="pin" value="<?= $pin ?>" hidden>
                <div>
                    <label>
                        New Password
                        <input style="color: black;" type="password" name="pass-1" required>
                    </label>
                </div>
                <div>
                    <label>
                        Confirm New Password
                        <input style="color: black;" type="password" name="pass-1" required>
                    </label>
                </div>
                <input class="resetbtn" type="submit" value="Reset Password" name="set-pass">
            </form>
            </div>

        <?php elseif ($match == "NOT-MATCHED-SENT") : ?>
            <h2>Invalid Pin</h2>
        <?php else : ?>
            <h2>Pin Not Sent</h2>
        <?php endif ?>
        <!-- INNSER IF BLOCK END -->
    <?php endif ?>
    <!-- OUTTER IF BLOCK END -->


    <!-- <form action="" method="post">
        <div>
            <label>New Password
                <input type="password" name="pass-1">
            </label>
        </div>
        <div>
            <label>Confirm Password
                <input type="password" name="pass-2">
            </label>
        </div>
    </form> -->

                    
				</div>
			</div>
		</div>
	</section>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>



