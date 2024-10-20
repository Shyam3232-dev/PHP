 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Course</title>
	<link rel="stylesheet" type="text/css" href="pay.css">
</head>
<body>
	<h1>PAYMENT</h1>
<div class='design'>
<form method='post' action='pay.php'>
	<label>STUDENT ID</label>
	<input type='textbox' name='si' required=""><br><br>
	<label>COURSE ID</label>
	<input type='textbox' name='ci' required=""><br><br>
	<label>FEE AMOUNT</label>
	<input type='textbox' name='fa' required=""><br><br>
	<label>FEE STATUS</label>
	<input type='textbox' name='fs' placeholder="Paid" required=""><br><br>
	<label>DATE OF PAY</label>
	<input type='date' name='pay' required=""><br><br>
	<input type='submit' name='sub' value='SUBMIT'>
	<input type='reset' name='re' value='RESET'>
</form>
</div>
</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","student");
if (!$conn){
	echo "Try Again";
}
if(isset($_POST["sub"])){
	$CID=$_POST['ci'];
	$SID=$_POST['si'];
	$FA=$_POST['fa'];
	$FS=$_POST['fs'];
	$DOP=$_POST['pay'];
	$DOPM=strval($DOP);
	$com="select SID,CID from info where SID='$SID'";
	$com1="select FEE from course where CID='$CID'";
	$find1=$conn->query($com);
	$find=$conn->query($com1);
	if ($find1->num_rows>0){
		$row=$find1->fetch_assoc();
		$CIDM=$row["CID"];
		$SIDM=$row["SID"];
		if ($CIDM==$CID && $SIDM==$SID){
			if ($find->num_rows>0){
				$row=$find->fetch_assoc();
				$FEEM=$row['FEE'];
				if($FEEM==$FA){
					$insert="insert into fee (SID,CID,FEE,DOP,FS) values ('$SID','$CID','$FA','$DOPM','$FS')";
					if ($conn->query($insert)){
						echo "<script> alert('PAID SUCCESSFULLY')</script>";
					}
				}
			}
		}
		else{
			echo "<script> alert('COURSE ID OR STUDENT ID DOES NOT MATCH')</script>";
		}
	}
	else{
		echo "<script> alert('NO STUDENT FOUND CHECK STUDENT ID')</script>";
	}
}
?>