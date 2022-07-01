<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Online Exam Portal </title>
  <link  rel="stylesheet" href="css/bootstrap.min.css"/>
  <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
  <link rel="stylesheet" href="css/main.css">
  <link  rel="stylesheet" href="css/font.css">
  <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <!--alert message-->
<?php #if(@$_GET['w'])
  #{echo'<script>alert("'.@$_GET['w'].'");</script>';}
  #?>
  <!--alert message end-->

</head>

<body>

<!--header start-->
<div class="header">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-lg-6 pt-17">
      <span class="logo"><a href=".php">Online Exam Portal</a></span>
      </div>
      <div class="col-md-2 col-md-offset-4 col-sm-12">
        <!--a href="#" class="pull-right btn sub1" data-toggle="modal" data-target="#myModal">
          <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Signin</b></span>
        </a-->
      </div>

    </div><!--header row closed-->
  </div>
</div>
<!--sign in modal start-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:orange">Log In</span></h4>
      </div>
      <div class="modal-body">
        <!--form class="form-horizontal" action="login.php?q=index.php" method="POST">
            <fieldset>

            <-- Text input-->
            <!--div class="form-group">
              <label class="col-md-3 control-label" for="email"></label>  
              <div class="col-md-6">
              <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">
                
              </div>
            </div>

            < Password input>
            <div class="form-group">
              <label class="col-md-3 control-label" for="password"></label>
              <div class="col-md-6">
                <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
                
              </div>
            </div-->

            
            <!--div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Log in</button>
            </div>
          </fieldset>
        </form-->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--sign in modal closed-->

<!--header end-->