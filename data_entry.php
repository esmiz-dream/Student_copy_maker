<?php
 session_start();
if (!isset($_SESSION["roll"])) {
    header("location: error.php");
    exit; // prevent further execution, should there be more code that follows
}
 

include 'db_connection.php';
include 'validator.php';
$hostName = "localhost";
$userName = "root";
$password = "stmichael@aambc1989";
$dbName = "transcript-maker";
$conn = OpenCon();
$full_name = $_REQUEST['full_name'];




if (student_duplication($conn, $full_name)) {
    echo "<b>" . $full_name . "</b> is already Registered! check your registered student from 'home' first plc, else plc contact IT.";
} else {

    $full_name = $_REQUEST['full_name'];
    $id_number = $_REQUEST['student_id'];
    $gender = $_REQUEST['sex'];
    $birth_date = $_REQUEST['birth_date'];


    $insert_sql = "INSERT INTO student(full_name, id_number, gender, birth_date) VALUES( '$full_name', '$id_number', '$gender', '$birth_date')";

    $statement1 = $conn->prepare($insert_sql);
    $statement1->execute();

    $student_id = mysqli_insert_id($conn);
  


    try {
        $conn = new PDO("mysql:host=$hostName;dbname=$dbName", $userName, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // begin the transaction
        $conn->beginTransaction();
        // our SQL statements


        //year 1  semister I
        $ANAT201 = $_POST['ANAT-201'];
        $SOSA201 = $_POST['SOSA-201'];
        $FLEn101 = $_POST['FLEn-101'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$ANAT201', 'ANAT201')");
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$SOSA201', 'SOSA201')");
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$FLEn101', 'FLEn101')");

        $PHYL201 = $_POST['PHYL-201'];        
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$PHYL201', 'PHYL201')");
        $Epsy201  = $_POST['Epsy-201'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$Epsy201', 'Epsy201')");
        $Chem202  = $_POST['Chem-202'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$Chem202', 'Chem202')");
        //year 1  semister II
        $Micro222  = $_POST['Micro-222'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$Micro222', 'Micro222')");
        $NURS282   = $_POST['NURS-282'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS282', 'NURS282')");
        $PARA321    = $_POST['PARA-321'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$PARA321', 'PARA321')");
        $NURS231   = $_POST['NURS-231'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS231', 'NURS231')");
        $NURS202   = $_POST['NURS-202'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS202', 'NURS202')");
        $NURS211   = $_POST['NURS-211'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS211', 'NURS211')");
        //year 2  semister I
        $GeEd    = $_POST['GeEd'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$GeEd', 'GeEd')");
        $NURS331 = $_POST['NURS-331'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS331', 'NURS331')");
        $Pharm302  = $_POST['Pharm-302'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$Pharm302', 'Pharm302')");
        $NURS252   = $_POST['NURS-252'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS252', 'NURS252')");
        //year 2  semister II
        $NURS301   = $_POST['NURS-301'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS301', 'NURS301')");
        $NURS341   = $_POST['NURS-341'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS341', 'NURS341')");
        $MIDW321     = $_POST['MIDW-321'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW321', 'MIDW321')");
        $MIDW312    = $_POST['MIDW-312'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW312', 'MIDW312')");
        $Nurs311    = $_POST['Nurs-311'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$Nurs311', 'Nurs311')");
        $MIDW322    = $_POST['MIDW-322'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW322', 'MIDW322')");
        $MIDW471   = $_POST['MIDW-471'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW471', 'MIDW471')");

        // year 3     semister I
        $MIDW571  = $_POST['MIDW-571'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW571', 'MIDW571')");
        $MIDW451   = $_POST['MIDW-451'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW451', 'MIDW451')");
        $MIDW323  = $_POST['MIDW-323'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW323', 'MIDW323')");
        $NURS441   = $_POST['NURS-441'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS441', 'NURS441')");
        $MIDW412   = $_POST['MIDW-412'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW412', 'MIDW412')");
        $Comp2022  = $_POST['Comp-2022'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$Comp2022', 'Comp2022')");

        // year 3     semister II
        $MIDW372   = $_POST['MIDW-372'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW372', 'MIDW372')");
        $FLEN201  = $_POST['FLEN-201'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$FLEN201', 'FLEN201')");
        $NURS442   = $_POST['NURS-442'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS442', 'NURS442')");
        $NURS481   = $_POST['NURS-481'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS481', 'NURS481')");
        $MIDW472   = $_POST['MIDW-472'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW472', 'MIDW472')");
        $NURS521   = $_POST['NURS-521'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS521', 'NURS521')");

        // year 4     semister I
        $MIDW552   = $_POST['MIDW-552'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW552', 'MIDW552')");
        $MIDW431   = $_POST['MIDW-431'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW431', 'MIDW431')");
        $MIDW311   = $_POST['MIDW-311'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW311', 'MIDW311')");
        $STAT322   = $_POST['STAT-322'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$STAT322', 'STAT322')");
        $MIDW482   = $_POST['MIDW-482'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW482', 'MIDW482')");
        $NURS462  = $_POST['NURS-462'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS462', 'NURS462')");

        // year 4     semister II
        $MIDW525  = $_POST['MIDW-525'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW525', 'MIDW525')");
        $MIDW552   = $_POST['MIDW-552'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW552', 'MIDW552')");
        $MIDW522  = $_POST['MIDW-522'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW522', 'MIDW522')");
        $PHYL202  = $_POST['PHYL-202'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$PHYL202', 'PHYL202')");
        $ANAT202  = $_POST['ANAT-202'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$ANAT202', 'ANAT202')");

        // year 5     semister I
        $MIDW542   = $_POST['MIDW-542'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW542', 'MIDW542')");
        $MIDW382    = $_POST['MIDW-382'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW382', 'MIDW382')");
        $NURS3144   = $_POST['NURS-3144'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS3144', 'NURS3144')");
        $NURS561   = $_POST['NURS-561'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS561', 'NURS561')");
        $MIDW573  = $_POST['MIDW-573'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW573', 'MIDW573')");
        $MIDW532   = $_POST['MIDW-532'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW532', 'MIDW532')");

        // year 5     semister II
        $NURS522   = $_POST['NURS-522'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$NURS522', 'NURS522')");
        $MIDW562    = $_POST['MIDW-562'];
        $conn->exec("INSERT INTO grade(student_id, grade, course_id) VALUES('$student_id', '$MIDW562', 'MIDW562')");



        $conn->exec("INSERT INTO approval(student_id, where_is,rh_is,ict_is) VALUES('$student_id', 'RH',0,0)");
       
        // commit the transaction
        $conn->commit();
        echo "New records created successfully";
        
    } catch (PDOException $e) {
        // roll back the transaction if something failed
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    // if (mysqli_query($conn, $insert_sql)) {
    //     echo "<h3>data stored in a database successfully."
    //         . " go to home to view the updated data</h3>";
    // } else {
    //     echo "ERROR: Hush! Sorry $sql. "
    //         . mysqli_error($conn);
    // }

}
CloseCon($conn);
