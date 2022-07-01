<?php
    if(isset($_GET["email"])){
        // $email = "csravi816@gmail.com";

        $email = $_GET["email"];
        $digits = 4;
        // $pin = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
        $pin = 1;
        require_once "./sendmail/index.php";

        require_once "./database.php";

        $hashed_pin = password_hash($pin, PASSWORD_DEFAULT);
        $query =  "INSERT INTO recovery_pin (email, pin) VALUES ('$email', '$hashed_pin');";

        
        mysqli_query($conn, $query);
        
        send_mail($email,"http://localhost/onllineexam2/index_2.php?pin=$pin&email=$email\n\nPin is $pin");
        var_dump("Mail sent");
        header("Location: index_2.php?email=$email");
        // send_mail($email,"http://localhost/onllineexam2/set_password.php");
        // header("Location: set_password.php?email-sent=1&email=$email");
    }else{
        header("Location: index.php");
    }
?>