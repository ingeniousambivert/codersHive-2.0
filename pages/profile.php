<!-- PHP -->

<?php
ob_start();
// Starting the session
session_start();
$id = $_SESSION['id'];
$checkprofile;
include '../db.php';
include '../partials/header.php';

if (!isset($_SESSION['email']) and !isset($_SESSION['password'])) {
    header("Location:../index.php");
    // To check if user is logged in
} else {
    // Destroying session if 30 mins have passed after logging in
    $now = time();
    if ($now > $_SESSION['expire']) {
        session_destroy();
        header("Location:../index.php?sessiontimedout=true");
    }
}

if (@isset($_GET['addedtoteam'])) {
    echo ' <script>
    swal({
        title :"Added" ,text : "Member added to your team." ,
            icon : "success"
    }
    ) . then (function () {
        location.replace("/profile.php");
    });

    </script> ';
}

if (@isset($_GET['deletedrequest'])) {
    echo '<script>
    swal({
        title :"Deleted" ,text : "User request has been deleted." ,
            icon : "info"
    }
    ) . then (function () {
        location.replace("/profile.php");
    });

    </script> ';
}

$query = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
$result = mysqli_query($link, $query);
$rowcount = mysqli_num_rows($result);

while ($row = mysqli_fetch_array($result)) {
    // Fetching all the user info
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
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

if (is_null($profile)) {
    $checkprofile = false;
} else {
    $checkprofile = true;
}


// User account delete 


if (isset($_POST['delete-btn'])) {
    $del_pass = mysqli_real_escape_string($link, $_POST['del_pass']);
    $query = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die('Invalid query: ' . mysqli_error($link));
    }

    while ($row = mysqli_fetch_array($result)) {
        // Fetching password
        $conf_password  = $row['password'];
    }

    if (password_verify($del_pass, $conf_password)) {
        $query1 = "DELETE FROM `users` WHERE `users`.`id` = $id";
        $query2 = "DELETE FROM `projects` WHERE `projects`.`leader_id` = $id";

        $result1 = mysqli_query($link, $query1);
        $result2 = mysqli_query($link, $query2);

        if ($result2 && $result2) {
            // Redirect to index 
            session_start();
            unset($_SESSION['email']);
            session_destroy();
            header("Location:../index.php?deletedaccount");
        } else {
            $error = mysqli_error($link);
            echo '<script>
                    swal("Error","There was an error : ' . $error . '","error")
                    </script>';
        }
    }
}


// Profile Pic Insert

if (isset($_POST['updbtn'])) {
    $target_dir = "./img/user_profile/user_id-" . $id . "_";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $checkupload = 1;
    $msg = "";
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["updbtn"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $checkupload = 1;
        } else {
            $msg = '<div class="alert alert-danger" role="alert">
                        <p> File is not an image.</p>';
            $checkupload = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $msg = '<div class="alert alert-danger" role="alert">
                        <p> Sorry, file already exists.</p>';
        $checkupload = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 2000000) {
        $msg =  "Sorry, your file is too large.";
        $checkupload = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $msg = '<div class="alert alert-danger" role="alert">
                        <p>Sorry, only JPG, JPEG, PNG files are allowed.</p>
                        </div>';
        $checkupload = 0;
    }
    // Check if $checkupload is set to 0 by an error
    if ($checkupload == 0) {
        $msg = '<div class="alert alert-danger" role="alert">
                        <p>Sorry, your file was not uploaded.</p>
                        </div>';
        // if no errors found, try to upload file
    } else {
        $query = "UPDATE `users` SET `profile` =  '$target_file' WHERE id = $id";
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) and mysqli_query($link, $query)) {

            $msg = '<div class="alert alert-success" role="alert">
                        <p>The file ' . basename($_FILES["fileToUpload"]["name"]) . ' has been uploaded.</p>
                        </div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">
                        <p>Sorry, your file was not uploaded.</p>
                        </div>';
        }
    }
}

//Update User Details

if (isset($_POST['update_user'])) {
    $firstname = @mysqli_real_escape_string($link, $_POST['firstname']);
    $lastname = @mysqli_real_escape_string($link, $_POST['lastname']);
    $email = @mysqli_real_escape_string($link, $_POST['email']);
    $dob = @$_POST['dob'];
    $enrollment = @$_POST['enrollment'];
    $course = @mysqli_real_escape_string($link, $_POST['course']);
    $gender = @mysqli_real_escape_string($link, $_POST['gender']);
    $bio = @mysqli_real_escape_string($link, $_POST['bio']);
    $bio = preg_replace('~\x{00a0}~', '', $bio);
    $skill = @mysqli_real_escape_string($link, $_POST['skill']);
    $skill = preg_replace('~\x{00a0}~', '', $skill);

    $query = "UPDATE users SET firstname = '$firstname' , lastname ='$lastname', email ='$email', course = '$course', gender ='$gender' , skill ='$skill', bio= '$bio'  ,portfolio = '$portfolio' WHERE id='$id' ";
    $result = mysqli_query($link, $query);

    if ($result) {

        $msg = " <div class='alert alert-success' role=' alert' >
                        <p>Profile successfully updated.</p>
                     </div>";
    } else {
        $msg = "<div class='alert alert-danger' role=valert'>
                        <p>Sorry, your profile was not updated.</p>
                        </div>";
    }
}


?>


<body>

    <div style="margin:3%;margin-top: 6%;">
        <!-- TABS -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link dark-grey active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
            </li>

        </ul>
        <!--/TABS-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <!--PROFILE -->
                <div class="content" style="margin: 3% 2%">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-4 text-center" style="margin-top:2.5%;">

                                <div class="card card-user" style="text-align: center;">
                                    <div class="content">
                                        <div class="author">
                                            <br>

                                            <div class="md-form mt-0 w-auto p-3">

                                                <div class="custom-file" style="">
                                                    <a href="<?php
                                                                if ($checkprofile) {
                                                                    echo $portfolio;
                                                                } ?>" target="_blank" data-toggle="<?php
                                                                                                    if (!$checkprofile) {
                                                                                                        echo "modal";
                                                                                                    } ?>" data-target="<?php
                                                                                                                        if (!$checkprofile) {
                                                                                                                            echo "#editProfile";
                                                                                                                        } ?>">
                                                        <img class="avatar border-gray pull-center hoverable" src="<?php

                                                                                                                    if (is_null($profile)) {
                                                                                                                        echo "./img/default/add-profile.png";
                                                                                                                        $checkprofile = false;
                                                                                                                    } else {
                                                                                                                        echo $profile;
                                                                                                                        $checkprofile = true;
                                                                                                                    }

                                                                                                                    ?>" style="border-radius:5%;width:180px;height:180px;margin-bottom:5%;">
                                                    </a>

                                                    <div class="container">

                                                        <a data-toggle="modal" class="pull-right" data-target="#editProfile" id="prof_btn" style="margin:5%;">
                                                            <i class="far fa-edit"></i></a>

                                                        <div class="modal fade w-auto" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfile" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="color:white;background:#4842B7;">
                                                                        <h5 class="modal-title" id="editProfile">Edit Profile Picture</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true" style="color:white;">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <form method="post" enctype="multipart/form-data">
                                                                            <div class="input-group container" style="padding:10%;">
                                                                                <div class="custom-file">
                                                                                    <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload" aria-describedby="inputGroupFileAddon01">
                                                                                    <label class="custom-file-label grey-text" for="inputGroupFile01" placeholder="Choose a file"> </label>
                                                                                </div>
                                                                                <br>
                                                                                <div class="input-group-prepend">
                                                                                    <input type="submit" value="Upload Image" name="updbtn" class="input-group-text mb-3 indigo white-text">
                                                                                </div>

                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                    <div class="modal-footer" style="color:white;background:#4842B7;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="title black-text" style="margin-bottom:5%;"><br />
                                                <?php
                                                echo "<strong>" . $firstname . " " . $lastname . "</strong>";
                                                ?>
                                            </h4>
                                            </a>
                                        </div>
                                        <div class="form- container">

                                            <input type="text" placeholder="Add your bio here" disabled class="form-control edit" name="bio" id="bio" value="<?php
                                                                                                                                                                echo $bio; ?>">

                                        </div>

                                    </div>
                                    <br>
                                    <div class="container">
                                        <div class="form-group">

                                            <input type="email" placeholder="Add your portfolio here" name="email" class="form-control edit" name="portfolio" value="<?php
                                                                                                                                                                        echo $portfolio; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!---->

                            <div class="col-md-8">


                                <div class="content">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Enrollment</label>
                                                    <input type="number" class="form-control" name="enrollment" disabled value="<?php

                                                                                                                                echo $enrollment; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="firstname">First Name</label>
                                                    <input type="text" class="form-control edit" name="firstname" value="<?php

                                                                                                                            echo $firstname;
                                                                                                                            ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname">Last Name</label>
                                                    <input type="text" name="lastname" class="form-control edit" value="<?php
                                                                                                                        echo $lastname; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="course">Course</label>
                                                    <input type="text" name="course" disabled class="form-control edit" value="<?php
                                                                                                                                echo $course; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" name="email" disabled class="form-control edit" value="<?php
                                                                                                                                echo $email; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <input type="text" disabled class="form-control edit" name="gender" value="<?php
                                                                                                                                echo $gender; ?>" id="gender">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>DOB</label>
                                                    <input type="text" disabled class="form-control edit" name="dob" value="<?php
                                                                                                                            echo $dob; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Points</label>
                                                    <input type="number" disabled name="points" class="form-control" value="#">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Rank</label>
                                                    <input type="text" disabled class="form-control" name="rank" value="#">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Skills</label>

                                                    <textarea disabled class="form-control edit" name="skill" id="skill" placeholder="Add your skills here" value="<?php
                                                                                                                                                                    echo $skill; ?>">
                                                                <?php
                                                                echo $skill; ?>
                                                </textarea>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-left:-5px;">

                                            <div class="col-sm-2">
                                                <button class="btn btn-sm round purple darken-4" id="ebutton" onclick="return false">Edit Profile</button>
                                            </div>
                                            <div class="col-sm-2">
                                                <a class="btn indigo btn-sm round" style="color:white;" href="/passwordchange.php">Change Password</a>
                                            </div>

                                            <div class="col-sm-2">
                                                <!-- Button trigger modal-->
                                                <button type="button" class="btn round btn-sm btn-danger" data-toggle="modal" data-target="#modalConfirmDelete">Delete Account</button>

                                                <!--Modal: modalConfirmDelete-->
                                                <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                                        <!--Content-->
                                                        <div class="modal-content text-center">
                                                            <!--Header-->
                                                            <div class="modal-header d-flex justify-content-center">
                                                                <p class="heading">Are you sure?</p>
                                                            </div>

                                                            <!--Body-->
                                                            <div class="modal-body">

                                                                <p class=""><strong>
                                                                        Once you delete this account it will also delete all the projects you have posted and none of the related data can be recovered.
                                                                    </strong>
                                                                    <br>
                                                                </p>
                                                                <!-- Password Confirm -->
                                                                <form class="text-center  p-5">
                                                                    <p class="h6 mb-6">Enter your password to confirm</p>
                                                                    <!-- Password -->
                                                                    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="del_pass" placeholder="Password">
                                                                </form>
                                                            </div>

                                                            <!--Footer-->
                                                            <div class="modal-footer flex-center">
                                                                <button name="delete-btn" type="submit" class="btn round btn-outline-danger">Yes</button>
                                                                <button class="btn round btn-outline-danger" data-dismiss="modal">No</button>
                                                            </div>
                                                        </div>
                                                        <!--/.Content-->
                                                    </div>
                                                </div>
                                                <!--Modal: modalConfirmDelete-->
                                            </div>

                                            <div class="col-sm-2">
                                                <button type="submit" id="up_btn" name="update_user" class="btn btn-sm round pink darken-3">Update Details</button>
                                            </div>


                                        </div>

                                        <div class="clearfix"></div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- / PROFILE-->


        </div>
    </div>
    <!--/REQUESTS -->



    </div>

    </div>


    <?php

    include '../partials/footer.php';

    ?>