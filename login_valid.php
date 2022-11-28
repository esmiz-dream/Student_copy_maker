<?php
 
include 'db_connection.php';
$conn = OpenCon();
session_start();


$user_sql = "SELECT * FROM roll";
$result = mysqli_query($conn, $user_sql);
$is_loged = false;
if ($_POST['roll'] == 'GS') {
    $_SESSION['roll'] = $_POST['roll'];
    $_SESSION['roll_long'] = 'Guest';
   // echo 'session.set'.$_SESSION['roll'];
   header("Location: home.php");
    $is_loged = true;
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['name'] == $_POST['roll'] && $row['password'] == $_POST['password']) {
            $_SESSION['roll'] = $_POST['roll'];
            $_SESSION['roll_long'] = $row['long_name'];
            header("Location: home.php");
            $is_loged = true;
        }
    }
}

if (!$is_loged) {
    echo "Please Check your Position and Password!!";
    session_destroy();
}
