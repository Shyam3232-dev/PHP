<?php
$conn=mysqli_connect("localhost","root","","student");
if (!$conn){
	echo "Try Again";
}
else{
	echo "Working";
}
?>