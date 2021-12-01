<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

$type = $_GET['tp'];
if ($type == 'activitiesTech') activitiesTech();
elseif ($type == 'activitiesSoc') activitiesSoc();
elseif ($type == 'getTechId') techGetId();
elseif ($type == 'getSocId') socGetId();
elseif ($type == 'geBackGround') getBackGround();
elseif ($type == 'getTeam') getTeam();
elseif ($type == 'getBlogId') blogGetId();
elseif ($type == 'getInterviewId') interviewGetId();

function techGetId()
{
    require 'config.php';
    $json = json_decode(file_get_contents('php://input'), true);
    $id = $json['id'];

    $query = "SELECT * FROM technical WHERE id=$id";
    $result = $db->query($query);

    $techData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $techData = json_encode($techData);

    echo '{"techData":' . $techData . '}';
}

function socGetId()
{
    require 'config.php';
    $json = json_decode(file_get_contents('php://input'), true);
    $id = $json['id'];

    $query = "SELECT * FROM social WHERE id=$id";
    $result = $db->query($query);

    $socData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $socData = json_encode($socData);

    echo '{"socData":' . $socData . '}';
}

function blogGetId()
{
    require 'config.php';
    $json = json_decode(file_get_contents('php://input'), true);
    $id = $json['id'];

    $query = "SELECT * FROM blog WHERE id=$id";
    $result = $db->query($query);

    $blogData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $blogData = json_encode($blogData);

    echo '{"blogData":' . $blogData . '}';
}

function interviewGetId()
{
    require 'config.php';
    $json = json_decode(file_get_contents('php://input'), true);
    $id = $json['id'];

    $query = "SELECT * FROM interview WHERE id=$id";
    $result = $db->query($query);

    $interviewData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $interviewData = json_encode($interviewData);

    echo '{"interviewData":' . $interviewData . '}';
}

function blog()
{
    require 'config.php';
    $query = "SELECT * FROM blog";
    $result = $db->query($query);

    $blogData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $blogData = json_encode($blogData);

    echo '{"blogData":' . $blogData . '}';
}

function interview()
{
    require 'config.php';
    $query = "SELECT * FROM interview";
    $result = $db->query($query);

    $interviewData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $interviewData = json_encode($interviewData);

    echo '{"interviewData":' . $interviewData . '}';
}

function activitiesTech()
{
    require 'config.php';
    $query = "SELECT * FROM technical";
    $result = $db->query($query);

    $techData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $techData = json_encode($techData);

    echo '{"techData":' . $techData . '}';
}

function activitiesSoc()
{
    require 'config.php';
    $query = "SELECT * FROM social";
    $result = $db->query($query);

    $socData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $socData = json_encode($socData);

    echo '{"socData":' . $socData . '}';
}

function getBackGround()
{
    require 'config.php';
    $json = json_decode(file_get_contents('php://input'), true);
    $id = $json['id'];

    if ($id == 1) {
        $query = "SELECT main FROM backgroundphotos WHERE id= 1";
        $result = $db->query($query);

        $back = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $back = json_encode($back);

        echo '{"back":' . $back . '}';
    } elseif ($id == 2) {
        $query = "SELECT counterP FROM backgroundphotos WHERE id= 1";
        $result = $db->query($query);

        $back = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $back = json_encode($back);

        echo '{"back":' . $back . '}';
    } elseif ($id == 3) {
        $query = "SELECT about FROM backgroundphotos WHERE id= 1";
        $result = $db->query($query);

        $back = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $back = json_encode($back);

        echo '{"back":' . $back . '}';
    } elseif ($id == 4) {
        $query = "SELECT team FROM backgroundphotos WHERE id= 1";
        $result = $db->query($query);

        $back = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $back = json_encode($back);

        echo '{"back":' . $back . '}';
    } elseif ($id == 5) {
        $query = "SELECT tech FROM backgroundphotos WHERE id= 1";
        $result = $db->query($query);

        $back = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $back = json_encode($back);

        echo '{"back":' . $back . '}';
    } elseif ($id == 6) {
        $query = "SELECT social FROM backgroundphotos WHERE id= 1";
        $result = $db->query($query);

        $back = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $back = json_encode($back);

        echo '{"back":' . $back . '}';
    } elseif ($id == 7) {
        $query = "SELECT blog FROM backgroundphotos WHERE id= 1";
        $result = $db->query($query);

        $back = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $back = json_encode($back);

        echo '{"back":' . $back . '}';
    } elseif ($id == 8) {
        $query = "SELECT interview FROM backgroundphotos WHERE id= 1";
        $result = $db->query($query);

        $back = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $back = json_encode($back);

        echo '{"back":' . $back . '}';
    }
}
function getTeam()
{
    require 'config.php';

    $query = "SELECT * FROM team";
    $result = $db->query($query);

    $inff = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $inff = json_encode($inff);

    echo '{"inff":' . $inff . '}';
}
