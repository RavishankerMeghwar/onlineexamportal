<?php require'database.php' ?>
<?php
	session_start();
	if(!isset($_SESSION['test_id'])){
		//header("Location: admin.php");
	}
	$test_id=$_GET['test_id'];
  	mysqli_query($conn,"DELETE FROM test WHERE test_id =  '$test_id'");
  	header("Location: adminHome.php");
?>
