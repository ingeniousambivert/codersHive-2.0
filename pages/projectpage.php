<!-- PHP -->

<?php
ob_start();
// Starting the session
session_start();
$leader_id = $_SESSION['id'];
$mem_id = $_SESSION['id'];

include '../db.php';
include '../partials/header.php';
if (!isset($_SESSION['email']) and !isset($_SESSION['password'])) {
    header("Location:../index.php");
    // To check if the user is logged in
} else {
    // Destroying session if 30 mins have passed after logging in
    $now = time();
    if ($now > $_SESSION['expire']) {
        session_destroy();
        header("Location:../index.php?sessiontimedout=true");
    }
}
$error = "";
$title = @mysqli_real_escape_string($link, $_POST['title']);
$resources = @mysqli_real_escape_string($link, $_POST['resources']);
$description = @mysqli_real_escape_string($link, $_POST['description']);
$brief = @mysqli_real_escape_string($link, $_POST['brief']);

if (isset($_POST['submit'])) {

    // Prroject Cover

    if (isset($_POST['submit'])) {
        $target_dir = "./img/projects/project_cover_" . $title . "_";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $checkupload = 1;
        $msg = "";
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {

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
        /*if ($_FILES["fileToUpload"]["size"] > 2000000) {
        $msg =  "Sorry, your file is too large.";
        $checkupload = 0;
        }*/
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $msg = '<div class="alert alert-danger" role="alert">
                        <p>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</p>
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

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

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

    $query = @"SELECT * FROM `users` WHERE id = $leader_id LIMIT 1";
    $result = @mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($result)) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $enrollment = $row['enrollment'];
        $author = $firstname . " " . $lastname;
    }
    if (array_key_exists('name', $_POST) or array_key_exists('resources', $_POST) or array_key_exists('title', $_POST) or array_key_exists('description', $_POST)) {

        $query = "INSERT INTO `projects`( `leader_id`, `title`, `description`, `brief`, `resources`, `enrollment`, `author`,`cover`) VALUES ('$leader_id','$title','$description','$brief','$resources','$enrollment','$author','$target_file')";
        $result = @mysqli_query($link, $query);
        $queryP = "SELECT MAX(proj_id) FROM projects";
        $resultP = mysqli_query($link, $queryP);
        $rowP = mysqli_fetch_row($resultP);
        $proj_id = $rowP[0];
        $query1 = "INSERT INTO `team`( `leader_id`, `mem_id` ,`proj_id`,`does`) VALUES ('$leader_id','$mem_id','$proj_id','Not Assigned')";
        $result1 = @mysqli_query($link, $query1);
        if ($result) {

            echo '
            <script>
    swal({
        title :"Submitted" ,text : "You have successfully posted the project" ,
            icon : "success"
    }
    ) . then (function () {
        location.replace("/home.php");
    });

    </script> ';
        } else {
            //echo mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            echo '
            <script>
    swal({
        title :"Error" ,text : "Error submitting the project : ' . mysqli_error($link) . '" ,
            icon : "error"
    }
    )
    </script> ';
        }
    }
}

?>

<body>

    <div class="container" style="margin-top:8%;">
        <!--Section: Contact v.2-->
        <section class="mb-4">

            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4" style="font-size:2.8rem; font-family: 'Ropa Sans',
        sans-serif;margin-top:2%;">Post Your Project</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5"> Have an idea ? Want to accumulate a team ? Post your idea with some brief details and requirements.</p>

        </section>
    </div>
    <div class="container">
        <!-- Default form contact -->
        <form class="text-center" style="margin:3% 0% 3% 0%;" method="POST" enctype="multipart/form-data">


            <!-- Title -->
            <input type="text" id="defaultContactFormSubject" class="form-control mb-4" placeholder="Project Title" name="title">

            <!-- Resources -->
            <input type="text" id="defaultContactFormSubject" class="form-control mb-4" placeholder="Resources Required" name="resources">

            <!-- Brief -->
            <div class="form-group">
                <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" placeholder="Project Brief" name="brief"></textarea>
            </div>

            <!-- Description -->
            <div class="form-group">
                <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Project Description" name="description"></textarea>
            </div>

            <!-- Cover -->

            <div class="input-default-wrapper mt-3 w-50 p-3" style="margin-left:-1.5%;">
                <span class="input-group-text mb-3 white-text indigo" id="input1">Upload</span>
                <input type="file" id="file-with-current" name="fileToUpload" id="fileToUpload" class="input-default-js">
                <label class="label-for-default-js rounded-right mb-3" for="file-with-current"><span class="span-choose-file">Choose
                        file</span>
                    <div class="float-right span-browse white-text indigo">Browse</div>
                </label>
            </div>

            <!-- Submit button -->
            <div class="row">
                <div class="col-2">
                    <button class="btn btn-indigo round" type="submit" style="width:117px;" name="submit">Post</button>
                </div>
                <!--div class="col-4-sm">
               <a href="./home.php" class="btn pink darken-2 round" style="width:127px;color:white;" name="submit">Cancel</a>
         </div-->
            </div>
        </form>
        <!-- Default form contact -->
    </div>


    <?php
    include '../partials/footer.php';
    ?>