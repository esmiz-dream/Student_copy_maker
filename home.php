 <!DOCTYPE html>
 <html lang="en">
 <?php
    //error_reporting(E_ERROR | E_PARSE);
    session_start();
    if (!isset($_SESSION["roll"])) {
        header("location: error.php");
        exit; // prevent further execution, should there be more code that follows
    }

    function get_who_approve($code)
    {
        if ($code == "RH" || $code == "rh") {
            return "Approval in Registral Head";
        }
    }

    ?>

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>AAMBC Transcript Degree Maker</title>
     <link rel="stylesheet" href="styles.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 </head>

 <body>
     <!-- 
     <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
         <div class="toast-header">
             <img src="..." class="rounded me-2" alt="...">
             <strong class="me-auto">Bootstrap</strong>
             <small>11 mins ago</small>
             <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
         </div>
         <div class="toast-body">
             Hello, world! This is a toast message.
         </div>
     </div> -->
     <header>
         <div class="collapse" id="navbarToggleExternalContent">
             <div class="bg-dark p-4">
                 <h5 class="text-white h4">Teranscript Degree Maker</h5>
                 <span class="text-muted"></span>
             </div>
         </div>
         <nav class="navbar navbar-dark bg-dark">
             <div class="container-fluid">
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     <span>Home</span>
                 </button>
             </div>
         </nav>
     </header>

     <div class="main ">
         <span class="align-text-right"> Loged As: <?php echo $_SESSION['roll_long']; ?></span>
         <?php
            if ($_SESSION['roll'] == 'RD' || $_SESSION['roll']== "RH") {
                echo "<td> <form action='gradeentery.php' method='POST'>";
                echo "<input class='btn btn-success float-right' type='submit' value='Add New'  >";
                echo "</form> </td>";
            }
            ?>
           
                <?php 
                if(!empty($_GET['message']) && $_GET['message'] =='approved_success')
                {
                   echo "  <div class='message_redirect'><span class='message'>One Recored is Approved!!</span></div>";
                }
                ?>
            
         <h4 class="pl-15">Student List</h4>

         <table class="table w-60 table-striped table-hover table-sm  max-width:60%">
             <thead class="table-success">
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Full Name</th>
                     <th scope="col">ID</th>
                     <th scope="col"></th>
                     <th scope="col">Approval</th>
                 </tr>
             </thead>

             <tbody>
                 <?php include 'db_connection.php';
                    $conn = OpenCon();
                    $sql = "select * from student;";
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
                        $approval_sql = "SELECT * FROM approval where student_id=$row[id]";
                        $approval_result = mysqli_query($conn, $approval_sql);
                        $where_is = "";
                        $approver_id=0;
                        while ($row_approval = mysqli_fetch_assoc($approval_result)) {
                            $where_is = $row_approval['where_is'];
                            $approver_id=$row_approval['id'];
                        }
 
                        if ($where_is == 'PD') {
                            echo "<td> <form action='transcript.php' method='POST' target='_blank'>";
                            echo "<input type='hidden' id='student_id' name='student_id' value=\"$row[id]\">";
                            echo "<input type='submit' value='Transcript Print'  >";
                            echo "</form> </td>";
                        } else {
                            echo "<td class='print_td' ><label>In .$where_is.</label> <form action='transcript_check.php' method='POST' target='_blank'>";
                            echo "<input type='hidden' id='student_id' name='student_id' value=\"$row[id]\" tolltipe='no'>";
                            echo "<input type='submit' value='Transcript check'  >";
                            echo "</form> </td>";
                        }
                        if ($where_is != 'PD' && $_SESSION['roll'] != 'GS' && $where_is == $_SESSION['roll']) {
                            echo  '<td class="">' .
                                " <form action='approve.php' method='POST' >" .
                                "<input type='hidden' id='roll' name='approve_id' value=\"$approver_id\">" .
                                "<input type='hidden' id='student_id' name='student_id' value=\"$row[id]\">" .
                                "<input type='submit' value='Approve'  >" .
                                "</form></td>";
                        }else{
                            echo '<td></td>';
                        }
                        echo  "</tr>";
                        $i++;
                    }
                    CloseCon($conn);
                    ?>
             </tbody>
         </table>
     </div>



     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
     </script>
     <script>
         var toastElList = [].slice.call(document.querySelectorAll('.toast'))
         var toastList = toastElList.map(function(toastEl) {
             return new bootstrap.Toast(toastEl, option)
         })
     </script>
 </body>

<script src="disable_devtool.js"></script>
 </html>