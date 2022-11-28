<?php session_start();
if (!isset($_SESSION["roll"])) {
    header("location: error.php");
    exit; // prevent further execution, should there be more code that follows
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AAMBC Transcript Degree Maker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<script>
    function validateform() {
        var name = document.getElementById('');
        var password = document.myform.password.value;

        if (document.getElementById('grade_input').value) {
            alert("Name can't be blank");
            return false;
        } else if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
            return false;
        }
    }
</script>

<body>
    <?php
    include 'db_connection.php';
    $conn = OpenCon();
    CloseCon($conn);
    ?>
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
                    <span>Grade Entry</span>
                </button>
            </div>
        </nav>
    </header>
    <main>
        <div class="dataentry w-80" style="width: 60%; margin:0 auto;">
            <form name="myform" method="POST" action="data_entry.php" onsubmit="return validateform()">
                <div class="student-info">
                    <fieldset class="border p-2 ">
                        <legend class="w-auto">Student Information</legend>
                        <div class="student-info">
                            <div class="mb-3">
                                <label for="full-name" class="form-label">Full Name</label>
                                <input required type="text" class="form-control" id="full-name" aria-describedby="namehelp" name="full_name">
                                <div id="namehelp" class="form-text">Please copy and pest the name of the student here from
                                    SMIS!</div>
                            </div>
                            <label for="full-name" class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="male" value="M">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="femal" value="F">
                                <label class="form-check-label" for="femal">
                                    Femal
                                </label>
                            </div>

                            <div class="mb-3">
                                <label for="student-id" class="form-label">Student ID</label>
                                <input required type="text" class="form-control" id="student-id" aria-describedby="idhelp" name="student_id">
                                <div id="idhelp" class="form-text">Please copy and pest the ID of the student here from
                                    SMIS!</div>
                            </div>

                            <div class="mb-3">
                                <label for="birth-date" class="form-label">Birth Date</label>
                                <input required type="text" class="form-control" id="birth-date" aria-describedby="birthhelp" name="birth_date">
                                <div id="birthhelp" class="form-text">Please copy and pest the Birth Date of the student
                                    here from SMIS as it is!</div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="">
                    <h3 class="text-center">Student Grade</h3>
                </div>
                <div class="student-grade">
                    <fieldset class="border p-2">
                        <legend class="w-auto">Year 1|2010: Semester I</legend>
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Course code</th>
                                    <th scope="col">Course title</th>
                                    <th scope="col">Credit hour</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Grade point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ANAT 201</td>
                                    <td class="">Human Anatomy</td>
                                    <td>4</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="ANAT-201" name="ANAT-201" minlength="1" maxlength="2">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>SOSA 201</td>
                                    <td class="">Introduction to Sociology</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="SOSA-201" name="SOSA-201">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>FLEn 101</td>
                                    <td class="">Communicating English</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="FLEn-101" name="FLEn-101">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>PHYL 201</td>
                                    <td class="">Human Physiology</td>
                                    <td>4</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="PHYL-201" name="PHYL-201">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>Epsy 201</td>
                                    <td class="">General Psychology</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="Epsy-201" name="Epsy-201">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>Chem 202</td>
                                    <td class="">Biochemistry</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="Chem-202" name="Chem-202">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>


                            </tbody>
                        </table>
                    </fieldset>

                    <fieldset class="border p-2">
                        <legend class="w-auto">Year 1|2010: Semester II</legend>
                        <table class="table table-hover">
                            <thead class="table-warning">
                                <tr>
                                    <th scope="col">Course code</th>
                                    <th scope="col">Course title</th>
                                    <th scope="col">Credit hour</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Grade point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Micro 222</td>
                                    <td class="">Microbiology & immunology</td>
                                    <td>4</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="Micro-222" name="Micro-222">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>NURS 282</td>
                                    <td class="">Pathophysiology</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-282" name="NURS-282">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>PARA 321</td>
                                    <td class="">Parasitology</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="PARA-321" name="PARA-321">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>NURS 231</td>
                                    <td class="">Professional Ethics</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-231" name="NURS-231">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>NURS 202</td>
                                    <td class="">Fundamentals of Nursing</td>
                                    <td>4</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-202" name="NURS-202">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>NURS 211</td>
                                    <td class="">First aid and Accident Prevention</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-211" name="NURS-211">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>

                    <fieldset class="border p-2">
                        <legend class="w-auto">Year 2|2011: Semester I</legend>
                        <table class="table table-hover">
                            <thead class="table-info">
                                <tr>
                                    <th scope="col">Course code</th>
                                    <th scope="col">Course title</th>
                                    <th scope="col">Credit hour</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Grade point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>GeEd</td>
                                    <td class="">Civics and ethical education</td>
                                    <td>4</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="GeEd" name="GeEd">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>NURS 331</td>
                                    <td class="">Operation Room Technique</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-331" name="NURS-331">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>Pharm 302</td>
                                    <td class="">Pharmacology</td>
                                    <td>4</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="Pharm-302" name="Pharm-302">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>NURS 252</td>
                                    <td class="">Nutrition in Health and Illness</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-252" name="NURS-252">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>

                    <fieldset class="border p-2">
                        <legend class="w-auto">Year 2|2011: Semester II</legend>
                        <table class="table table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">Course code</th>
                                    <th scope="col">Course title</th>
                                    <th scope="col">Credit hour</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Grade point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>NURS-301</td>
                                    <td class="">Medical Surgical Nursing</td>
                                    <td>4</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-301" name="NURS-301">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>NURS 341</td>
                                    <td class="">Health Assessment in midwifery</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-341" name="NURS-341">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>MIDW 321</td>
                                    <td class="">Obstetrics I</td>
                                    <td>4</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-321" name="MIDW-321">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>MIDW 312</td>
                                    <td class="">Obstetrics Practicum I</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-312" name="MIDW-312">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>Nurs 311</td>
                                    <td class="">Medical surgical Nursing Practicum</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="Nurs-311" name="Nurs-311">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>MIDW 322</td>
                                    <td class="">Neonatology</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-322" name="MIDW-322">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>MIDW-471</td>
                                    <td class="">Neonatology practice</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-471" name="MIDW-471">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>

                    <fieldset class="border p-2">
                        <legend class="w-auto">Year 3|2012: Semester I</legend>
                        <table class="table table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">Course code</th>
                                    <th scope="col">Course title</th>
                                    <th scope="col">Credit hour</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Grade point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>MIDW 571</td>
                                    <td class="">Psychiatric in midwifery</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-571" name="MIDW-571">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>MIDW 451</td>
                                    <td class="">Pediatrics</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-451" name="MIDW-451">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>MIDW 323</td>
                                    <td class="">Obstetrics II</td>
                                    <td>4</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-323" name="MIDW-323">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>NURS 441</td>
                                    <td class="">Health Education</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-441" name="NURS-441">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>MIDW 412</td>
                                    <td class="">Gynecology</td>
                                    <td>4</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-412" name="MIDW-412">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>Comp 2022</td>
                                    <td class="">Introduction to Computer</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="Comp-2022" name="Comp-2022">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>

                    <fieldset class="border p-2">
                        <legend class="w-auto">Year 3|2012: Semester II</legend>
                        <table class="table table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">Course code</th>
                                    <th scope="col">Course title</th>
                                    <th scope="col">Credit hour</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Grade point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>MIDW 372</td>
                                    <td class="">Obstetric ultrasound</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-372" name="MIDW-372">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>FLEN 201</td>
                                    <td class="">Sophomore English/Writing Skills</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="FLEN-201" name="FLEN-201">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>NURS 442</td>
                                    <td class="">Communicable Disease Control</td>
                                    <td>4</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-442" name="NURS-442">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>NURS 481</td>
                                    <td class="">Environmental health</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-481" name="NURS-481">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>MIDW 472</td>
                                    <td class="">Reproductive Health</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-472" name="MIDW-472">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>NURS 521</td>
                                    <td class="">Epidemiology</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-521" name="NURS-521">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>

                    <fieldset class="border p-2">
                        <legend class="w-auto">Year 4|2013: Semester I</legend>
                        <table class="table table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">Course code</th>
                                    <th scope="col">Course title</th>
                                    <th scope="col">Credit hour</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Grade point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>MIDW 552</td>
                                    <td class="">Teaching methodology and curriculum development</td>
                                    <td>4</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-552" name="MIDW-552">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>MIDW 431</td>
                                    <td class="">Obstetrics II practicum</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-431" name="MIDW-431">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>MIDW 311</td>
                                    <td class="">Family Planning</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-311" name="MIDW-311">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>STAT 322</td>
                                    <td class="">Biostatics</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="STAT-322" name="STAT-322">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>MIDW 482</td>
                                    <td class="">Obstetrics III </td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-482" name="MIDW-482">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>NURS 462</td>
                                    <td class="">Research Methodology</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-462" name="NURS-462">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                            </tbody>
                        </table>
                    </fieldset>

                    <fieldset class="border p-2">
                        <legend class="w-auto">Year 4|2013: Semester II</legend>
                        <table class="table table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">Course code</th>
                                    <th scope="col">Course title</th>
                                    <th scope="col">Credit hour</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Grade point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>MIDW 525</td>
                                    <td class="">Health Service Management</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-525" name="MIDW-525">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>MIDW 552</td>
                                    <td class="">Gynecological clinic(Internship)</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-552" name="MIDW-   552">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>MIDW 522</td>
                                    <td class="">Delivery & postnatal Ward</td>
                                    <td>3</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-522" name="MIDW-522">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>PHYL 202</td>
                                    <td class="">Reproductive Physiology</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="PHYL-202" name="PHYL-202">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>ANAT 202</td>
                                    <td class="">Reproductive Anatomy</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="ANAT-202" name="ANAT-202">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>

                    <fieldset class="border p-2">
                        <legend class="w-auto">Year 5|2014: Semester I</legend>
                        <table class="table table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">Course code</th>
                                    <th scope="col">Course title</th>
                                    <th scope="col">Credit hour</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Grade point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>MIDW 542</td>
                                    <td class="">Community Midwifery practice</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-542" name="MIDW-542">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>MIDW 382</td>
                                    <td class="">Obstetrics III Practicum</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-382" name="MIDW-382">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>NURS 3144</td>
                                    <td class="">Pediatric practicum</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-3144" name="NURS-3144">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>NURS 561</td>
                                    <td class="">Student Research project proposal I</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-561" name="NURS-561">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>MIDW 573</td>
                                    <td class="">Psychiatric in midwifery Practicum</td>
                                    <td>1</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-573" name="MIDW-573">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                                <tr>
                                    <td>MIDW 532</td>
                                    <td class="">Ante-natal clinic</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-532" name="MIDW-532">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>

                    <fieldset class="border p-2">
                        <legend class="w-auto">Year 5|2014: Semester II</legend>
                        <table class="table table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">Course code</th>
                                    <th scope="col">Course title</th>
                                    <th scope="col">Credit hour</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Grade point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>MIDW 525</td>
                                    <td class="">Student research project II</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="NURS-522" name="NURS-522">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>

                                <tr>
                                    <td>MIDW 562</td>
                                    <td class="">Neonatology + pediatrics practicum Comprehensive Exam</td>
                                    <td>2</td>
                                    <td>
                                        <input required maxlength="2" minlength="1" type="text" class="form-control w-50" id="MIDW-562" name="MIDW-562">
                                    </td>
                                    <td>Crh*grade</td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-warning justify-content-end"> Reset </button>
            </form>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>