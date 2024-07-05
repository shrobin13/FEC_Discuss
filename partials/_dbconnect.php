<?php
//connecting database

$servername = 'localhost';
$username ='root';
$password ='';
$database ='fec_discuss';

$conn = @mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Couldnot connect to database.".mysqli_connect_error($conn));
}
?>