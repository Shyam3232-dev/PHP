<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Course</title>
	<link rel="stylesheet" type="text/css" href="add1.css">
</head>
<body>
	<h1>ADD COURSE</h1>
<div class='design'>
<form method='post' action='add1.php'>
	<label>COURSE ID</label>
	<input type='textbox' name='id' required=""><br><br>
	<label>COURSE NAME</label>
	<input type='textbox' name='cn' required=""><br><br>
	<label>COURSE FEE</label>
	<input type='textbox' name='cf' required=""><br><br>
	<input type='submit' name='sub' value='SUBMIT'>
	<input type='reset' name='re' value='RESET'>
</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","student");
if (!$conn){
	echo "<script>alert('CONNECTION FAILED TRY AFTER CONNECTION')</script>";
}
if(isset($_POST["sub"])){
	$CID=$_POST['id'];
	$CN=$_POST['cn'];
	$CF=$_POST['cf'];
	$com="select CID from course where CID='$CID'";
	$find=$conn->query($com);
	if($find->num_rows==0){
		$CNC=strtoupper($CN);
		$insert="insert into course (CID,CNAME,FEE) values ('$CID','$CNC','$CF')";
		if($conn->query($insert)){
			echo "<script> alert('COURSE ADDED')</script>";	
		}
	}
	else{
		echo "<script> alert('COURSE ID ALREDY EXISTS')</script>";
	}
}
?>