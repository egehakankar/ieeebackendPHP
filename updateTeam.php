<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        font-family: "Lato", sans-serif
    }

    .mySlides {
        display: none
    }
</style>

<?php
require './api/config.php';
$table = 'team';

$phpFileUploadErrors = array(
    0 => 'No Error',
    1 => '1',
    2 => '2',
    3 => '3',
    4 => '4',
    5 => '5',
    6 => '6',
    7 => '7',
    8 => '8',
);

if (isset($_POST['submit'])) {
    $photo = reArrayFiles($_FILES['photo']);
    $title = $_POST['title'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $team = $_POST['team'];

    $i = 0;

    $photoD = 'images/team/' . $photo[$i]['name'];
    $photoD2 = 'http://localhost:8000/ieeebackend/images/team/' . $photo[$i]['name'];

    if ($team != '') {
        move_uploaded_file($photo[$i]['tmp_name'], $photoD);
        $sql = "UPDATE $table SET $team = '$photoD2' WHERE id=1";
        $mysqli->query($sql) or die($mysqli->error);

        $sql = "UPDATE $table SET $team = '$title' WHERE id=2";
        $mysqli->query($sql) or die($mysqli->error);

        $sql = "UPDATE $table SET $team = '$email' WHERE id=3";
        $mysqli->query($sql) or die($mysqli->error);

        $sql = "UPDATE $table SET $team = '$name' WHERE id=4";
        $mysqli->query($sql) or die($mysqli->error);
    }
?>
<?php

}
function reArrayFiles(&$file_post)
{
    $isMulti    = is_array($file_post['name']);
    $file_count    = $isMulti ? count($file_post['name']) : 1;
    $file_keys    = array_keys($file_post);

    $file_ary    = [];    //Итоговый массив
    for ($i = 0; $i < $file_count; $i++)
        foreach ($file_keys as $key)
            if ($isMulti)
                $file_ary[$i][$key] = $file_post[$key][$i];
            else
                $file_ary[$i][$key]    = $file_post[$key];

    return $file_ary;
}
?>

<!-- Navbar -->
<div class="w3-top" style="position: sticky;">
    <div class="w3-bar w3-black w3-card">
        <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="./webmaster.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
        <a href="./socAdd.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Add Social</a>
        <a href="./techAdd.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Add Technical</a>
        <a href="./updateBack.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Update Backgrounds</a>
        <a href="./updateTeam.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Update Team</a>
        <a href="./blogAdd.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Add Blog</a>
        <a href="./interAdd.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Add Interview</a>
        <a href="./logout.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small" style= "float: right;">Logout</a>
    </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
    <a href="./socAdd.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Add Social</a>
    <a href="./techAdd.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Add Technical</a>
    <a href="./updateBack.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Update Backgrounds</a>
    <a href="./updateTeam.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Update Team</a>
    <a href="./blogAdd.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Add Blog</a>
    <a href="./interAdd.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Add Interview</a>
    <a href="./logout.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Logout</a>
</div>

<head>
    <title>Update Team</title>
</head>

<body style="background-color:black;font-family: cursive;">
    <header style="background-color: #16161d;color: white;margin-top: 1%; font-weight: bolder; font-size: 50px; text-align: center;">Update Team</header>
    <form style="color: white;background-color:#3a46b78f; border-radius: 15px; font-weight: bold; text-align: center; margin: 0px 20%; border: 2px solid black; padding: 2%" action="" method="POST" enctype="multipart/form-data">
        <div class="radios">
            <p>Please select the team member you want to update:</p>
            <input type="radio" id="techVice" name="team" value="techVice">
            <label for="techVice">Technical Vice President</label><br>

            <input type="radio" id="socVice" name="team" value="socVice">
            <label for="socVice">Social Vice President</label><br>

            <input type="radio" id="President" name="team" value="President">
            <label for="President">President</label><br>

            <input type="radio" id="Secretary" name="team" value="Secretary">
            <label for="Secretary">Secretary</label><br>

            <input type="radio" id="Treasurer" name="team" value="Treasurer">
            <label for="Treasurer">Treasurer</label><br>

            <input type="radio" id="Webmaster" name="team" value="Webmaster">
            <label for="Webmaster">Webmaster</label><br>

            <input type="radio" id="Ras1" name="team" value="Ras1">
            <label for="Ras1">Ras1</label><br>

            <input type="radio" id="Ras2" name="team" value="Ras2">
            <label for="Ras2">Ras2</label><br>

            <input type="radio" id="Cs" name="team" value="Cs">
            <label for="Cs">CS</label><br>

            <input type="radio" id="Ud" name="team" value="Ud">
            <label for="Ud">UD</label><br>

            <input type="radio" id="Wie" name="team" value="Wie">
            <label for="Wie">WIE</label><br>

            <input type="radio" id="Ias" name="team" value="Ias">
            <label for="Ias">IAS</label><br>

            <input type="radio" id="CAS" name="team" value="CAS">
            <label for="CAS">CAS</label><br>

            <input type="radio" id="Graph1" name="team" value="Graph1">
            <label for="Graph1">Graph1</label><br>

            <input type="radio" id="Graph2" name="team" value="Graph2">
            <label for="Graph2">Graph2</label><br>

            <input type="radio" id="Pr1" name="team" value="Pr1">
            <label for="Pr1">PR1</label><br>

            <input type="radio" id="Pr2" name="team" value="Pr2">
            <label for="Pr2">Pr2</label><br>

            <input type="radio" id="Tac" name="team" value="Tac">
            <label for="Tac">TAC</label><br>
        </div>
        <table>
            <li style="padding-top: 10px;">
                Photo: <input type="file" name="photo[]" value="" multiple="">
            </li>
            <br />
            <li>
                Name: <input type="text" name="name"></input>
            </li>
            <br />
            <li>
                Title: <input type="text" name="title"></input>
            </li>
            <br />
            <li>
                Email: <input type="text" name="email"></input>
            </li>
            <br />
            <br />
            <input type="submit" name="submit" value="Upload">
        </table>
    </form>
</body>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>