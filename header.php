<!-- PHP -->
<?php
ob_start();
@session_start();
$id = $_SESSION['id'];
include 'db.php';

$sql = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
$result = @mysqli_query($link, $sql);

while ($row = mysqli_fetch_array($result)) {
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
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
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="{{'./img/favicon.ico' | relURL}}" type="image/x-icon" />
    <link rel="icon" href="{{'./img/favicon.ico' | relURL}}" type="image/x-icon" />
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.16/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="./css/" rel="stylesheet">

        <!-- Sweet Alerts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="./js/sweetalert.min.js"></script>
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Six+Caps" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">


    <style>
.user {
    color:#fff;
    border-radius: 8px;
    box-shadow: 0 -1px #4527a0 inset;
    background: #311b92 ;
    border:none;
    padding:0 5px 0 5px;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
}
@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
    font-family: 'Poppins', sans-serif;

}
        html {
overflow: scroll;
overflow-x: hidden;
}

.dropdown:hover > .dropdown-menu {
    display: block;
}
.dropdown > .dropdown-toggle:active {
    /*Without this, clicking will make it sticky*/
    pointer-events: none;
}


::-webkit-scrollbar {
width: 0px;
background: transparent;

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
a:hover {

color: inherit;
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
#hm , #lr , #pt ,#cd{
    color:white;
}
.pt-3-half {
padding-top: 1.4rem;
}
#lgbtn{
    background: #ffffff;
    color: #1c231c;
}

</style>

    <!--Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg animated fadeInDown" style=" color:white;" id="nav">

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
                <ul class="navbar-nav mr-auto " style="font-family:Roboto Condensed">
                    <li class="nav-item">
                        <a class="nav-link" id="hm" href="home.php">Home
                        </a>
                    </li>

                    <!-- Dropdown -->

                    <li class="nav-item">
                        <a class="nav-link " id="lr" href="learn.php">Learn
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pt" href="projectpage.php">Post
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="cu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Team</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item text-center" href="/contact.php">Contact Us</a>
                            <a class="dropdown-item text-center" href="/about.php">About Us</a>

                        </div>
                    </li>
                </ul>
                <!-- Links -->
                <!-- Dropdown -->

                <form class="form-inline">
                    <ul class="navbar-nav mr-auto" style="">
                        <li class="nav-item dropdown user">
                            <a class="nav-link dropdown-toggle" id="cu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family:'PT Sans', sans-serif; font-size:1.1rem;"><?php echo "<small><strong>" . $firstname . " " . $lastname . "</strong></small>"; ?>
                                <!--i style=""class="far fa-user"></i--> </a>
                            <div class="dropdown-menu dropdown-primary dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item text-center" href="/home.php"><strong>Home</strong></a>
                                <a class="dropdown-item text-center" href="/profile.php"><strong>Profile</strong></a>
                                <a class="dropdown-item text-center" href="/activity.php"><strong>Activities</strong></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-center" href="/logout.php"><strong>Logout</strong></a>

                            </div>
                        </li>
                    </ul>
                </form>
            </div>
            <!-- Collapsible content -->

        </nav>
        <!--/.Navbar-->
      <style>
    .round {
        border-radius:25px;
    }
    </style>
</head>

