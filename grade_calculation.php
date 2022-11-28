<?php  
session_start();
if (!isset($_SESSION["roll"])) {
    header("location: error.php");
    exit; // prevent further execution, should there be more code that follows
}
include 'db_connection.php';
$conn= OpenCon();
function tell_me_mygrade(){
$stud_grade_sql = "select * from student;";
                    $retrived = mysqli_query($conn, $sql);
                    if (!$retrived) {
                        die('Could not get data: ');
                    }
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($retrived)) {


                        echo  "<tr>";

                        echo  '<td>';
                        echo  $i;
                        echo "</td>";

                        echo  '<td>';
                        echo   $row["full_name"];
                        echo "</td>";

                        echo  "<td>";
                        echo  $row['id_number'];
                        echo "</td>";

                        echo "<td> <form action='transcript_guest.php' method='POST' target='_blank'>";
                        echo "<input type='hidden' id='student_id' name='student_id' value=\"$row[id]\">";
                        echo "<input type='submit' value='Transcript'  >";
                        echo "</form> </td>";
                        echo  "</tr>";
                        $i++;
                    }
                    CloseCon($conn);
                }
?>