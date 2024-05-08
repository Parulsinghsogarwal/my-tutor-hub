<?php
$servername="localhost";
$username="root";
$password="";
$dbname="gaurav";
$conn= mysqli_connect($servername,$username,$password,$dbname);
if($conn){
    // echo "connection OK";
}
else{
    echo "connection failed because".mysqli_connect_error();
}

?>