<?php
 
function student_duplication($conn,$full_name){
    $duplicate_checker_sql="SELECT * FROM student where full_name='$full_name'";
$duplication_result=mysqli_query($conn,$duplicate_checker_sql);
if(mysqli_num_rows($duplication_result) >0)
{
    return true;
}
    
}
?>