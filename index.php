<?php

$notValid = false;
$error = null;

function treatInput($value, $title)
{
    global $error;
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);

    if (strlen($value) == 0) {
        $error = $title . " was not valid!";
        return null;
    } else {
        return $value;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = treatInput(htmlspecialchars($_POST['course']), "Course Reg");
    $reg = treatInput(htmlspecialchars($_POST['reg']), "Reg Number");
    $lname = treatInput(htmlspecialchars($_POST['lname']), "Last Name");
    $fname = treatInput(htmlspecialchars($_POST['fname']), "First Name");
}

$notValid = (isset($fname) && isset($lname) && isset($reg) && isset($course))
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onukwu Francis - 2020/249371</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>



    <h2>Demo Registration</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="fname">
            <p>First Name</p>
            <input type="text" id="fname" name="fname">
        </label>


        <label for="fname">
            <p>Last Name</p>
            <input type="text" id="lname" name="lname">
        </label>


        <label for="reg">
            <p>Reg Number</p>
            <input type="text" id="reg" name="reg">
        </label>


        <label for="course">
            <p>Course Title</p>
            <input type="text" id="course" name="course">
        </label>

        <input type="submit" value="Register">
    </form>

    <?php if ($error) {
        echo "
    <p class='error'>$error</p>
    ";
    }
    ?>


    <?php
    if ($notValid) {
        echo
        "<div class='output'>
        <p>
        First name - $fname
        </p>
        
        <p>
        Last name - $lname
        </p>

        
        <p>
        Course Reg - $course
        </p>

        
        <p>
        Reg Number - $reg
        </p>

        </div>
        ";
    }
    ?>

</body>

</html>