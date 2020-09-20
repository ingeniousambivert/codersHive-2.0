<!-- PHP -->

<?php
ob_start();
include 'db.php';
@session_start();

if (array_key_exists('email', $_POST) and array_key_exists('password', $_POST) and isset($_POST['submitbtn'])) {
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $query = "SELECT * FROM `users` WHERE email = '" . mysqli_real_escape_string($link, $_POST['email']) . "'";

    $result = mysqli_query($link, $query);
    $count = mysqli_num_rows($result);

    // To check if the row exists
    if ($count > 0) {
        $row = mysqli_fetch_assoc($result);

        if (isset($row)) {
            // To store the hashed password in a variable
            $hash = $row['password'];

            // PHP function to verify the POST Password and Hashed & Stored Password
            if (password_verify($password, $hash)) {
                // Creating sesssion variables for later validation and use
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];

                // Creating a session for 30 minutes
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                header("Location: home.php");

            } else {

                $error = "That email/password combination could not be found.";
                if ($error != " ") {
                    echo $error;
                }
            }
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>cHive</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!--FAVICON-->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="{{'./img/favicon.ico' | relURL}}" type="image/x-icon" />
    <link rel="icon" href="{{'./img/favicon.ico' | relURL}}" type="image/x-icon" />
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.16/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/signup.css" rel="stylesheet">

     <!-- Sweet Alerts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Six+Caps" rel="stylesheet">
    
    <script src="sweetalert.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <style>
        html {
overflow: scroll;
overflow-x: hidden;
}

::-webkit-scrollbar {
width: 0px;
background: transparent;

}

body {
    background-color: #ffffff;
    overflow: hidden;
    font-family: 'Roboto condensed',
        sans-serif;
}
nav {
transition: 1.5s background-color;
font-size: 16px;
font-family: 'Roboto-condensed',
sans-serif;
font-weight: bolder;
background: #4842B7;

}
img{
padding:2%;
}
#ebutton{
    border-radius: 25px;
}
#updbtn{
border-radius: 25px;
}
a {
transition: 1s all;
}
.pt-3-half {
padding-top: 1.4rem;
}

#lgbtn{
        border: 1px solid #1c2331;
        color: #0f1521;
        border-radius: 25px;
    }
 #lgbtn:hover{
        border: 1px solid #fff;
        color:white;
        background: #4842B7;
    }


</style>

     <!--Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg animated fadeInDown" style=" color:white;" id="nav">

        <!-- Navbar brand -->
         <!-- Navbar brand -->
        <a class="navbar-brand" id="lg" style=" color: #fff;
    font-size: 1.8rem;
    font-family: 'Ropa Sans',
        sans-serif !important;" href="./index.php">cHive</a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-grip-lines text-white"></i>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" style="color: #fff; font-family:Roboto Condensed;" href="./contact.php" id="cn">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #fff; font-family:Roboto Condensed;" href="./about.php" id="ab">About Us</a>
                </li>

            </ul>
            <!-- Links -->

            <form class="form-inline">
                <a class="btn cbtn" href="login.php" style=" border-radius: 25px;font-family: 'Roboto condensed',
        sans-serif;background:white;color:#4842b7;" id="sgbtn">Sign In</a>


            </form>
        </div>
        </div>
        </div>

        </form>
        </div>
        <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->
</head>
