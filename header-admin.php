<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard - Online Exam Portal </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
 <!--alert message-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>



<?php
include_once 'database.php';
?>
<body>
<!-- header -->
<div class="header">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-lg-6 pt-5 pb-10">
      <span class="logo"><a href="studentHome.php?q=1">Online Exam Portal</a></span>
      </div>
      <?php
      include_once 'database.php';
      
      session_start();
      $user_id=$_SESSION['user_id'];
        if(!(isset($_SESSION['user_id']))){
            header("location:studentHome.php");

      }
      else
      {
        include_once 'database.php';

          //$username1=$_SESSION['user_id']; 
         $username=$_SESSION['username']; 
           //print_r($_SESSION);
          // die();
           
            echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="#" class="log log1">'.$username.'</a>&nbsp;|&nbsp;<a href="user_about.php" class="log log1">About Us</a>&nbsp;|&nbsp;<a href="user_contact.php" class="log log1">Contact Us</a>&nbsp;|&nbsp;<a href="logout.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
      }?>
      

    </div>
  </div>
</div>
<!-- header -->
<div class="bg">

<!--navigation menu-->
