<!-- PHP -->

<?php 
session_start();
$check = false;
 if
  (isset($_SESSION['email']) AND isset($_SESSION['password'])) 
    {
        $check = true; 
        include("header.php");
        // To check if the user is logged in and include the header in.
        

            $query = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
            $result = mysqli_query($link, $query);
                
            while($row = mysqli_fetch_array($result)) 
            { 
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];

            }
    }

    else{
        $check = false; 
        include("header_guest.php");
        // To include the guest header in.
    }
?>

<body>

    <!-- Start your project here-->
    <div class="container" style="margin-top:8%;">
        <!--Section: Contact v.2-->
        <section class="mb-4">

            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4">Stay in the know</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to
                contact us
                directly. Our team will come back to you within
                a matter of hours to help you.</p>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" method="POST">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" value="
                                    <?php 
                                    if($check == true)
                                    {
                                     echo $firstname ." ". $lastname;   
                                    }
                                    ?>"name="name" class="form-control">
                                    <label for="name" >Your name</label>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control" value="
                                    <?php 
                                    if($check == true)
                                    {
                                     echo $email;   
                                    }
                                    ?>">
                                    <label for="email" class="">Your email</label>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="feddback" name="feedback" class="form-control">
                                    <label for="name" class="">Feedback</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                    <label for="message">Your message</label>
                                </div>

                            </div>
                        </div>
                        <!--Grid row-->

                    </form>

                    <div class="text-center text-md-left">
                        <a class="btn" style=" background: #1c231c; color:#ffffff; border-radius:25px;" onclick="document.getElementById('contact-form').submit();">Send</a>
                    </div>
                    <div class="status"></div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fa fa-map-marker fa-2x"></i>
                            <p>GLS University , Ahmedabad</p>
                        </li>

                        <li><i class="fa fa-phone mt-4 fa-2x"></i>
                            <p>+ 1800-CODERS-HIVE</p>
                        </li>

                        <li><i class="fa fa-envelope mt-4 fa-2x"></i>
                            <p>codershive@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>


        </section>
        <!--Section: Contact v.2-->
    </div>
<?php 
include("footer.php");
?>