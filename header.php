<!-- PHP -->
<?php
@session_start();
$id = $_SESSION['id'];
include('db.php');

$sql = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
$result = @mysqli_query($link, $sql);
    
while($row = mysqli_fetch_array($result)) 
{ 
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!--FAVICON-->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="{{"/img/favicon.ico" | relURL}}" type="image/x-icon" />
    <link rel="icon" href="{{"/img/favicon.ico" | relURL}}" type="image/x-icon" />
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.16/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/" rel="stylesheet">

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Six+Caps" rel="stylesheet">

    <style>
        html {
overflow: scroll;
overflow-x: hidden;
}

::-webkit-scrollbar {
width: 0px;
background: transparent;

}
nav {
transition: 1.5s background-color;
font-size: 17px;
font-family: 'Roboto-condensed',
sans-serif;
font-weight: bolder;
background: #4842B7;

}
img{
padding:2%;
}
a:hover {

color: white;
}
#ebutton{
    border-radius: 25px;
}
#updbtn{
border-radius: 25px;
}
a {
    color:white;
transition: 1s all;

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
        <a class="navbar-brand" style="font-size:1.8rem; font-family: 'Ropa Sans',
        sans-serif;" href="#"
            id="cd">cHive</a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" style="color:white; background:white;" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" id="hm" href="home.php">Home
                    </a>
                </li>

                <!-- Dropdown -->
                

                <li class="nav-item">
                    <a class="nav-link" id="lr" href="learn.php">Learn
                    </a>
                </li>

                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="cu" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Submit</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="./projectpage.php">Project</a>
                        <a class="dropdown-item" href="./newsform.php">News</a>

                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="ac" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Activities</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/challenge.php">Challenges</a>
                        <a class="dropdown-item" href="/leaderboard.php">Leaderboard</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="cu" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">cH team</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/contact.php">Contact Us</a>
                        <a class="dropdown-item" href="/about.php">About Us</a>

                    </div>
                </li>
            </ul>
            <!-- Links -->

            <form class="form-inline">
                <ul class="navbar-nav mr-auto">
                    <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="cu" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><?php echo $firstname." ".$lastname;?></a>
                    <div class="dropdown-menu dropdown-primary dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item " href="/home.php">Home</a>   
                    <a class="dropdown-item" href="/profile.php">Profile</a> 
                    <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="/logout.php">Logout</a>

                    </div>
                </li>
                </ul>
            </form>
        </div>
        <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->
</head>

