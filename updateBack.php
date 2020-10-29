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
$table = 'backgroundphotos';

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
    $main = reArrayFiles($_FILES['main']);
    $counter = reArrayFiles($_FILES['counter']);
    $about = reArrayFiles($_FILES['about']);
    $technical = reArrayFiles($_FILES['technical']);
    $social = reArrayFiles($_FILES['social']);
    $team = reArrayFiles($_FILES['team']);

    $i = 0;

    $mainD = 'images/back/' . $main[$i]['name'];
    $counterD = 'images/back/' . $counter[$i]['name'];
    $aboutD = 'images/back/' . $about[$i]['name'];
    $technicalD = 'images/back/' . $technical[$i]['name'];
    $socialD = 'images/back/' . $social[$i]['name'];
    $teamD = 'images/back/' . $team[$i]['name'];

    $mainD2 = 'http://localhost:8000/ieeebackend/images/back/' . $main[$i]['name'];
    $counterD2 = 'http://localhost:8000/ieeebackend/images/back/' . $counter[$i]['name'];
    $aboutD2 = 'http://localhost:8000/ieeebackend/images/back/' . $about[$i]['name'];
    $technicalD2 = 'http://localhost:8000/ieeebackend/images/back/' . $technical[$i]['name'];
    $socialD2 = 'http://localhost:8000/ieeebackend/images/back/' . $social[$i]['name'];
    $teamD2 = 'http://localhost:8000/ieeebackend/images/back/' . $team[$i]['name'];

    if ($mainD != 'images/back/') {
        move_uploaded_file($main[$i]['tmp_name'], $mainD);
        $sql = "UPDATE $table SET main= '$mainD2' WHERE id=1";
        $mysqli->query($sql) or die($mysqli->error);
    }
    if ($counterD != 'images/back/') {
        move_uploaded_file($counter[$i]['tmp_name'], $counterD);
        $sql = "UPDATE $table SET counterP = '$counterD2' WHERE id=1";
        $mysqli->query($sql) or die($mysqli->error);
    }
    if ($aboutD != 'images/back/') {
        move_uploaded_file($about[$i]['tmp_name'], $aboutD);
        $sql = "UPDATE $table SET about = '$aboutD2' WHERE id=1";
        $mysqli->query($sql) or die($mysqli->error);
    }
    if ($technicalD != 'images/back/') {
        move_uploaded_file($technical[$i]['tmp_name'], $technicalD);
        $sql = "UPDATE $table SET tech = '$technicalD2' WHERE id=1";
        $mysqli->query($sql) or die($mysqli->error);
    }
    if ($socialD != 'images/back/') {
        move_uploaded_file($social[$i]['tmp_name'], $socialD);
        $sql = "UPDATE $table SET social = '$socialD2' WHERE id=1";
        $mysqli->query($sql) or die($mysqli->error);
    }
    if ($teamD != 'images/back/') {
        move_uploaded_file($team[$i]['tmp_name'], $teamD);
        $sql = "UPDATE $table SET team = '$teamD2' WHERE id=1";
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

    $file_ary    = [];
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
        <a href="./logout.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small" style= "float: right;">Logout</a>
    </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
    <a href="./socAdd.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Add Social</a>
    <a href="./techAdd.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Add Technical</a>
    <a href="./updateBack.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Update Backgrounds</a>
    <a href="./updateTeam.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Update Team</a>
    <a href="./logout.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Logout</a>
</div>

<head>
    <title>Update Background Photo</title>
</head>

<body style="background-color:black;font-family: cursive;">
    <header style="background-color: #16161d;color: white;margin-top: 1%; font-weight: bolder; font-size: 50px; text-align: center;">Update Background Photo</header>
    <form style="color: white;background-color:#3a46b78f; border-radius: 15px; font-weight: bold; text-align: center; margin: 0px 20%; border: 2px solid black; padding: 2%" action="" method="POST" enctype="multipart/form-data">
        <table>
            <li>
                Main: <input type="file" name="main[]" value="" multiple="">
            </li>
            <br />
            <li>
                Counter: <input type="file" name="counter[]" value="" multiple="">
            </li>
            <br />
            <li>
                About: <input type="file" name="about[]" value="" multiple="">
            </li>
            <br />
            <li>
                Team: <input type="file" name="team[]" value="" multiple="">
            </li>
            <br />
            <li>
                Technical: <input type="file" name="technical[]" value="" multiple="">
            </li>
            <br />
            <li>
                Social: <input type="file" name="social[]" value="" multiple="">
            </li>
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