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
$table = 'social';

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
    $backP = reArrayFiles($_FILES['backP']);
    $fP = reArrayFiles($_FILES['fP']);
    $sP = reArrayFiles($_FILES['sP']);
    $title = $_POST['title'];
    $branch = $_POST['branch'];
    $littleSum = $_POST['litSum'];
    $shortDes = $_POST['smDes'];
    $longDes = $_POST['lnDes'];
    $dateT = $_POST['date'];

    $i = 0;

    $bPD = 'images/soc/backPhotoSoc/' . $backP[$i]['name'];
    $fPD = 'images/soc/firstPhotoSoc/' . $fP[$i]['name'];
    $sPD = 'images/soc/secondPhotoSoc/' . $sP[$i]['name'];

    $bPD2 = 'http://localhost:8000/ieeebackend/images/soc/backPhotoSoc/' . $backP[$i]['name'];
    $fPD2 = 'http://localhost:8000/ieeebackend/images/soc/firstPhotoSoc/' . $fP[$i]['name'];
    $sPD2 = 'http://localhost:8000/ieeebackend/images/soc/secondPhotoSoc/' . $sP[$i]['name'];

    move_uploaded_file($backP[$i]['tmp_name'], $bPD);
    move_uploaded_file($fP[$i]['tmp_name'], $fPD);
    move_uploaded_file($sP[$i]['tmp_name'], $sPD);

    $sql = "INSERT IGNORE INTO $table (title, branch, backGroundPhoto, littleSummary, smallDescription, longDescription, firstPhoto, secondPhoto, dateT) 
    VALUES('$title', '$branch', '$bPD2', '$littleSum', '$shortDes', '$longDes', '$fPD2', '$sPD2', '$dateT')";
    $mysqli->query($sql) or die($mysqli->error);
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
    <title>Add Social Activity</title>
</head>

<body style="background-color:black;font-family: cursive;">
    <header style="background-color: #16161d;color: white;margin-top: 1%; font-weight: bolder; font-size: 50px; text-align: center;">Social Activity Add</header>
    <form style="color: white;background-color:#3a46b78f; border-radius: 15px; font-weight: bold; text-align: center; margin: 0px 20%; border: 2px solid black; padding: 2%" action="" method="POST" enctype="multipart/form-data">
        <table>
            <li>
                Title: <input type="text" name="title"></input>
            </li>
            <br />
            <li>
                Branch: <input type="text" name="branch"></input>
            </li>
            <br />
            <li>
                BackGroundPhoto: <input type="file" name="backP[]" value="" multiple="">
            </li>
            <br />
            <li>
                Little Summary:
                <br /> <textarea name="litSum" rows="5" cols="80"></textarea>
            </li>
            <br />
            <li>
                Small Description:
                <br /><textarea name="smDes" rows="5" cols="80"></textarea>
            </li>
            <br />
            <li>
                Long Description:
                <br /><textarea name="lnDes" rows="9" cols="80"></textarea>
            </li>
            <br />
            <li>
                First Photo: <input type="file" name="fP[]" value="" multiple="">
            </li>
            <br />
            <li>
                Second Photo: <input type="file" name="sP[]" value="" multiple="">
            </li>
            <br />
            <li>
                Date: <input type="datetime-local" name="date" />
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