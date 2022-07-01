<?php require'database.php' ?>
<?php
	session_start();
	if(!isset($_SESSION['admin_id'])){
		header("Location: admin.php");
	}
	$subject_id=$_GET['subject_id'];
	mysqli_query($conn,"DELETE FROM subjects WHERE subject_id='$subject_id' ");
	header("Location: adminHome.php");
?>
