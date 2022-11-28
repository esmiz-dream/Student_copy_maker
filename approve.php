<?php 
include 'db_connection.php';
$conn=OpenCon();
session_start();
$student=$_POST['student_id'];
$approve_id=$_POST['approve_id'];

$approval_sql = "SELECT * FROM approval where id=$approve_id";
$approval_result = mysqli_query($conn, $approval_sql);
$where_is = "";
while ($row_approval = mysqli_fetch_assoc($approval_result)) {
    $where_is = $row_approval['where_is'];
}

if($_SESSION['roll'] == 'RH')
{
    $sql = "UPDATE approval SET where_is='ICT', rh_is=1 WHERE id=$approve_id";
if ($conn->query($sql) === TRUE) {
  header("Location: home.php?message=approved_success");
} else {
  echo "Error Approve record: " . $conn->error;
}
}
else if($_SESSION['roll'] == 'ICT')
{
    $sql = "UPDATE approval SET where_is='PD', ict_is=1 WHERE id=$approve_id";
if ($conn->query($sql) === TRUE) {
  echo "Record Approved successfully";
} else {
  echo "Error Approve record: " . $conn->error;
}
}


?>