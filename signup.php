<!-- PHP -->

<?php
$error ="";
include('db.php');
if(isset($_POST['submitbtn']))

{
        if (array_key_exists('email', $_POST) OR array_key_exists('firstname', $_POST) OR array_key_exists('lastname', $_POST) OR array_key_exists('enrollment', $_POST) OR array_key_exists('course', $_POST) ) {
                
                    
                    $query = "SELECT `id` FROM `users` WHERE email = '".@mysqli_real_escape_string($link, $_POST['email'])."'";
                
                    $result = @mysqli_query($link, $query);

            }   
                    // Checking if the email is taken 
                    if (@mysqli_num_rows($result) > 0 AND isset($_POST['email'])) {
                        
                        $error = '<div class="alert alert-danger" role="alert">
                        <p>That email address has already been taken.</p>
                        </div>';
                     
                          
                    }  
                    
                    else {


                    // Filtering all the inputs for special characters
                $firstname = @mysqli_real_escape_string($link, $_POST['firstname']);
                $lastname = @mysqli_real_escape_string($link, $_POST['lastname']);
                $email = @mysqli_real_escape_string($link, $_POST['email']);
                $password = @mysqli_real_escape_string($link, $_POST['password']); 
                $confpassword = @mysqli_real_escape_string($link, $_POST['confpassword']); 
                $dob =  @$_POST['dob'];
                $enrollment = @$_POST['enrollment'];
                $course = @mysqli_real_escape_string($link, $_POST['course']);
               
                // Hashing the password
                $hashedpass = password_hash($password, PASSWORD_DEFAULT);

                if ($password === $confpassword)
                {   
                $query = "INSERT INTO `users`( `firstname`, `lastname`, `email`,  `course`, `password`,`enrollment`, `dob`) VALUES ('$firstname','$lastname','$email','$course','$hashedpass','$enrollment','$dob')";
                
                       

                        if (mysqli_query($link, $query) ) {
                        // Redirect to Index for Sign In 
                            header("Location:index.php?registered=true");
                            
                        } else {
                            $error = mysqli_error($link);
                            
                        }
                        
                    }
                    else {
                        $error = '<div class="alert alert-danger" role="alert">
                        <p>Passwords doesnt match. Please try again.</p>
                        </div>';
                        
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
    <link href="css/signup.css" rel="stylesheet">

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
        sans-serif;" href="./index.php"
            id="cd">cHive</a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
                <ul class="navbar-nav mr-auto" >
                 <li class="nav-item ">
                    <a class="nav-link" style="color: #fff;"href="./contact.php" id="cn">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #fff;"href="./about.php" id="ab">About Us</a>
                </li>
                
            </ul>
         
        </div>
        <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->
</head>


<body>

    <!-- Start your project here-->

    <div class="container" id="sub-form" style="margin-top:10%;">
        <!-- Material form register -->
        <div class="card">

            <h5 class="card-header indigo white-text text-center py-4">
                <strong>Register To The Community</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form class="text-center" enctype="multipart/form-data" style="color: #757575;" method="POST">

                    <div class="form-row">
                        <div class="col">
                            <!-- First name -->
                            <div class="md-form">
                                <input name="firstname" type="text" id="firstname" class="form-control" required> 
                                <label for="firstname">First name</label>
                            </div>
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <div class="md-form">
                                <input name="lastname" type="text" id="lastname" class="form-control" required>
                                <label for="lastname">Last name</label>
                            </div>
                        </div>
                    </div>


                <div class="form-row" >
                        <div class="col">
                              <label for="custom-control-input" style="float:left;">Gender</label>
                              
                             <!-- Gender 1-->
                    <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="defaultInline1" name="gender" checked>
                    <label class="custom-control-label" for="defaultInline1" >Male</label>
                    </div>
                     <!-- Gender 2-->
                    <div class="custom-control custom-radio custom-control-inline" >
                    <input type="radio" class="custom-control-input" id="defaultInline2" name="gender">
                    <label class="custom-control-label" for="defaultInline2" >Female</label>
                    </div>
                        </div>
                    
                        <div class="col">
                             <label for="custom-control-input" style="float:left;">Date Of Birth</label>
                           <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                            <input class="span2" size="16" type="date" placeholder="12-02-2012" name="dob" required>
                            <span class="add-on"><i class="icon-th"></i></span>
                            </div>
                 
                        </div>
                    </div>
  
                    <div class="form-row">
                        <div class="col">
                            <!-- Enrollment -->
                            <div class="md-form">
                                <input name="enrollment" type="text" id="enrollment" class="form-control" required>
                                <label for="enrollment">Enrollment </label>
                            </div>
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <div class="md-form">
                                <input name="course" type="text" id="course" class="form-control" required>
                                <label for="course">Course</label>
                            </div>
                        </div>
                        </div>

                    <!-- E-mail -->
                    <div class="md-form mt-0">
                        <input type="email" id="email" class="form-control" name="email" required>
                        <label for="email">E-mail</label>
                    </div>


                    <!-- Password -->
                    <div class="md-form mt-0">
                        <input type="password" id="password" class="form-control" name="password" required>
                        <label for="password">Password</label>
                    </div>

                  
                    <!-- Confirm Password -->
                    <div class="md-form mt-0">
                        <input type="password" id="confpassword" class="form-control" name="confpassword" required>
                        <label for="confpassword">Confirm Password</label>
                    </div>

                         <div class="md-form mt-0">
                          <div class="input-group">         
                      <?php 
                      echo $error;
                      ?>
                          </div>
                           </div>
                        </div>

                    <!-- Submit button -->
                    <button class="btn cbtn btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="submitbtn" style="width:150px; margin-left:4%;" id="sbbtn">Submit
                    </button>


                </form>
                <!-- Form -->

            </div>
           
        </div>
        <!-- Material form register -->
    </div>

   <?php 
include("footer.php");
?>