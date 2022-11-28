<?php
 
function OpenCon()
 {
    $hostName = "localhost";
    $userName = "root";
    $password = "stmichael@aambc1989";
    $dbName = "transcript-maker";
 $conn = new mysqli($hostName, $userName, $password, $dbName) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>