<!-- PHP -->
<?php
// Starting the session
session_start();
$id = $_SESSION['id'];
$checkprofile;
include 'db.php';

if (!isset($_SESSION['email']) and !isset($_SESSION['password'])) {
    header("Location:index.php");
    // To check if user is logged in
} else {
    // Destroying session if 30 mins have passed after logging in
    $now = time();
    if ($now > $_SESSION['expire']) {
        session_destroy();
        header("Location:index.php");
    }
}

// ACCEPT AND DELETE REQUEST (Profile.php)

if (isset($_POST['accept'])) {
    $proj_id_new = @$_POST["proj_id"];
    $leader_id_new = @$_POST["leader_id"];
    $mem_id_new = @$_POST["mem_id"];

    $queryA = @"DELETE FROM `team_req` WHERE `leader_id` = '$leader_id_new' and `mem_id` = '$mem_id_new' and `proj_id` = '$proj_id_new'";
    $resultA = mysqli_query($link, $queryA);
    $queryB = @"INSERT INTO `team`( `leader_id`, `mem_id`, `proj_id`) VALUES ('$leader_id_new','$mem_id_new','$proj_id_new')";
    $resultB = mysqli_query($link, $queryB);

    if ($resultB and $resultA) {

        header('location:profile.php?addedtoteam=true');

    } else {

        echo mysqli_error($link);
    }
}

if (isset($_POST['decline'])) {
    $proj_id_new = @$_POST["proj_id"];
    $leader_id_new = @$_POST["leader_id"];
    $mem_id_new = @$_POST["mem_id"];
    $query = "DELETE FROM `team_req` WHERE `leader_id` = '$leader_id_new' and `mem_id` = '$mem_id_new' and `proj_id` = '$proj_id_new'";

    $result = mysqli_query($link, $query);
    if ($result) {
        header('location:profile.php?deletedrequest=true');
    } else {
        echo mysqli_error($link);
    }

}
?>

<?php

//CHATS (Profile.php)

$query = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
$result = mysqli_query($link, $query);
$rowcount = mysqli_num_rows($result);
$author;
$email;
while ($row = mysqli_fetch_array($result)) {
    // Fetching all the user info
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $author = $firstname . " " . $lastname;
    $enrollment = $row['enrollment'];
    $dob = $row['dob'];
    $course = $row['course'];
    $email = $row['email'];
    $skill = $row['skill'];
    $portfolio = $row['portfolio'];
    $bio = $row['bio'];
    $profile = $row['profile'];
    $gender = $row['gender'];
}

// Check if form is submitted

if (isset($_POST['sendmsg'])) {

    $message = mysqli_real_escape_string($link, $_POST['message']);
    $encmsg = base64_encode($message);

// Validate input

    if (!isset($author) || $author == '') {

        $error = " username needed ";
        header("Location:profile.php?error=" . urlencode($error));
    } else if (!isset($message) || $message == '') {

        $error = "  message needed ";
        header("Location:profile.php?error=" . urlencode($error));
    } else {
        $query1 = "INSERT INTO `chats` (`name`, `message` , `email` ,`user_id` ) VALUES('$author','$encmsg','$email','$id')";

        if (!mysqli_query($link, $query1)) {

            die('Error' . mysqli_error($link));
        } else {
            header("Location:profile.php");
            exit();

        }

    }
}

?>


<?php
// Profile.php
$query2 = @"SELECT proj_id, mem_id,does FROM team";
$result2 = @mysqli_query($link, $query2); //$link->query($query2);
//$rowcount2 = @mysqli_num_rows($result2);
//$proj_id;
//$mem_id;
while ($row2 = mysqli_fetch_array($result2)) {
    $mem_id = $row2['mem_id'];
    $proj_id = $row2['proj_id'];
    //$does = $row2['does'];
}

// TABLE EDIT

if (isset($_POST['save'])) {

    $does = mysqli_real_escape_string($link, $_POST['does']);

    $query = "UPDATE `team` SET `does` = $does where `mem_id` = $mem_id AND `proj_id` = $proj_id";
    $result = mysqli_query($link, $query);

    if ($result == true) {

        header('location:profile.php');
    } else {
        echo mysqli_error($link);

    }
}
//REMOVE
if (isset($_POST['remove'])) {

    $query = "DELETE FROM `team` WHERE `mem_id` = '$mem_id' and `proj_id` = '$proj_id' ";
    $result = mysqli_query($link, $query);

    if (!($result == true)) {
        echo mysqli_error($link);

    } else {

        $msg = "deleted";
        header('location:profile.php');

    }
}

?>
