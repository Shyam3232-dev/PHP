<?php
$conn=mysqli_connect("localhost","root","","student");
if (!$conn){
	echo "<script>alert('CONNECTION FAILED TRY AFTER CONNECTION')</script>";
}
if (isset($_POST['sub'])){
	$SID=$_POST['sid'];
	$select="select info.SID,info.CID,info.FNAME,info.LNAME,info.DOB,info.DOJ,course.CNAME,course.FEE,fee.DOP,fee.FS from info join course on(info.CID=course.CID) join fee on(info.SID='$SID' and fee.SID='$SID');";
	$find=$conn->query($select);
	if ($find->num_rows>0){
		$row=$find->fetch_assoc();
		$S=$row["SID"];
		$C=$row["CID"];
		$F=$row["FNAME"];
		$L=$row["LNAME"];
		$DB=$row["DOB"];
		$DJ=$row["DOJ"];
		$CN=$row["CNAME"];
		$FE=$row["FEE"];
		$DP=$row["DOP"];
		$FS=$row["FS"];
        echo ("<html>
        	<head>
          <link rel='stylesheet' type='text/css' href='sd.css'>
          <h1>STUDENT DETAILS</h1>
          <div class='design'>
        	<table border=1'>
              <tr>
                <th>STUDENT ID</th>
                <th>COURSE ID</th>
                <th>STUDENT FIRSTNAME</th>
                <th>STUDENT LASTNAME</th>
                <th>DATE OF BIRTH</th>
                <th>DATE OF JOIN</th>
                <th>COURSE NAME</th>
                <th>COURSE FEE</th>
                <th>DATE OF PAYMENT</th>
                <th>FEE STATUS</th>
              </tr>
              <tr>
                <th>$S</th>
                <th>$C</th>
                <th>$F</th>
                <th>$L</th>
                <th>$DB</th>
                <th>$DJ</th>
                <th>$CN</th>
                <th>$FE</th>
                <th>$DP</th>
                <th>$FS</th>
              </tr>
              </table>
              </div>
              </head>
              </html>");
	}
	else{
		echo "<script> alert('NO STUDENT ID FOUND')</script>";
	}
}
?>