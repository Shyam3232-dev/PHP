<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>add student</title>
	<link rel="stylesheet" type="text/css" href="add.css">
</head>
<body>
<h1>ADD STUDENT</h1>
<div class="design">
<form method="post" action="add.php">
	<label>SID</label>
	<input type="textbox" name="sid" required=""><br><br>
	<label>CID</label>
	<input type="textbox" name="cid" required=""><br><br>
	<label>FIRST NAME</label>
	<input type="textbox" name="fn" required="">
	<label>LAST NAME</label>
	<input type="textbox" name="ln"><br><br>
	<label>DATE OF BIRTH</label>
	<input type="date" name="dob" required=""><br><br>
	<label>DATE OF JOIN</label>
	<input type="date" name="doj" required=""><br><br>
	<input type="submit" name="sub" value="SUBMIT">
	<input type="reset" name="re" value="RESET">
</form>
</div>
</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","student");
if (!$conn){
	echo "<script>alert('CONNECTION FAILED TRY AFTER CONNECTION')</script>";
}
if(isset($_POST["sub"])){
	$SID=$_POST["sid"];
	$CID=$_POST["cid"];
	$FN=$_POST["fn"];
	$LN=$_POST["ln"];
	$DOB=$_POST["dob"];
	$DOJ=$_POST["doj"];
	$com="select CID from course where CID='$CID'";
	$com1="select SID from info where SID='$SID'";
	$find=$conn->query($com);
	$find1=$conn->query($com1);
	if ($find1->num_rows==0){
		if ($find->num_rows>0){
			$FNC=strtoupper($FN);
			$LNC=strtoupper($LN);
			$DOBM=strval($DOB);
			$DOJM=strval($DOJ);
			$insert="insert into info (SID,CID,FNAME,LNAME,DOB,DOJ) values ('$SID','$CID','$FNC','$LNC','$DOBM','$DOJM')";
			if ($conn->query($insert)){
				echo "<script> alert('STUDENT ADDED SUCCESSFULLY')</script>";
			}
			else{
				echo "<script> alert('FAILED TRY AGAIN')</script>";
			}
		}
		else{
			echo "<script> alert('NO COURSE ID FOUND or ADDED THEY NEW COURSE')</script>";
		}
	}
	else{
		echo "<script> alert('STUDENT ID ALREDY EXISTS')</script>";
	}
}
?>