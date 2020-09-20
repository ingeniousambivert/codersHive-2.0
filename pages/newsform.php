<!-- PHP -->

<?php
// Starting the session
session_start();
$id = $_SESSION['id'];
include '../db.php';
if (!isset($_SESSION['email']) and !isset($_SESSION['password'])) {
    header("Location:../index.php");
    // To check if the user is logged in 
} else {
    // Destroying session if 30 mins have passed after logging in
    $now = time();
    if ($now > $_SESSION['expire']) {
        session_destroy();
        header("Location:../index.php");
    }
}
$error = "";

if (array_key_exists('email', $_POST) or array_key_exists('subject', $_POST) or array_key_exists('title', $_POST) or array_key_exists('information', $_POST)) {
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $information = mysqli_real_escape_string($link, $_POST['information']);
    $subject = mysqli_real_escape_string($link, $_POST['subject']);

    $query = "INSERT INTO `userinfo`.`newsfeed`( `title`,`information`,`subject`,`email`) VALUES ('$title','$information','$subject','$email')";

    if (mysqli_query($link, $query)) {

        echo "<p>You have successfully submitted the form!";
    } else {

        echo "<p>Error :</p>" . mysqli_error($query), E_USER_ERROR;
    }
}
include '../partials/header.php';
?>

<body>

    <!-- Start your project here-->
    <div class="container" style="margin-top:8%;">
        <!--Section: Contact v.2-->
        <section class="mb-4">

            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4">Newsform</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to
                contact us
                directly. Our team will come back to you within
                a matter of hours to help you.</p>

        </section>
    </div>
    <div class="container">
        <!-- Default form contact -->
        <form class="text-center border border-light p-5" style="margin:3% 0% 3% 0%;">

            <!-- Title -->
            <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Title" name="title">

            <!-- Email -->
            <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">

            <!-- Enroll -->
            <input type="number" id="defaultContactFormEmail" class="form-control mb-4" placeholder="Enrollment" name="enrollment">

            <!-- Subject -->
            <input type="text" id="defaultContactFormSubject" class="form-control mb-4" placeholder="Subject" name="subject">

            <!-- Message -->
            <div class="form-group">
                <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Information" name="info"></textarea>
            </div>

            <!-- Send button -->
            <button class="btn btn-primary btn-block" type="submit" style="width:110px; border-radius: 25px;">Send</button>

        </form>
        <!-- Default form contact -->
    </div>

    <?php
    include '../partials/footer.php';
    ?>