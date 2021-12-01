<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<title>Home</title>
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

<body>

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
            <a href="./logout.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small" style="float: right;">Logout</a>
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

    <!-- Page content -->
    <div class="w3-content" style="max-width:2000px;">
        <!-- Automatic Slideshow Images -->
        <div class="mySlides w3-display-container w3-center">
            <img src="./images/BackGroundPhotos/1.jpg" style="width:99.3vw; height:98vh;">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                <h3>IEEE Bilkent</h3>
                <p><b>Hi guys.</b></p>
            </div>
        </div>
        <div class="mySlides w3-display-container w3-center">
            <img src="./images/BackGroundPhotos/2.jpg" style="width:99.3vw; height:98vh;">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                <h3>IEEE Bilkent</h3>
                <p><b>Hows it goin.</b></p>
            </div>
        </div>
        <div class="mySlides w3-display-container w3-center">
            <img src="./images/BackGroundPhotos/3.jpg" style="width:99.3vw; height:98vh;">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                <h3>IEEE Bilkent</h3>
                <p><b>Have an IEEE day!</b></p>
            </div>
        </div>
    </div>

    <script>
        // Automatic Slideshow - change image every 4 seconds
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 4000);
        }

        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        // When the user clicks anywhere outside of the modal, close it
        var modal = document.getElementById('ticketModal');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>