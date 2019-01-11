<!-- PHP -->

<?php 
session_start();
 if
  (isset($_SESSION['email']) AND isset($_SESSION['password'])) 
    {
        include("header.php");
        // To check if the user is logged in and include the header in.
    }

    else{
        include("header_guest.php");
        // To include the guest header in.
    }
?>

<body>

    <!-- Start your project here-->
    <section id="about">
        <div class="container" style="margin-top: 6%;">
            <!-- Section: Team v.1 -->
            <section class="team-section text-center my-5">

                <!-- Section heading -->
                <h1 class="h1-responsive font-weight-bold my-5" style="font-size:3rem;font-family: 'Ropa Sans', sans-serif;">
                    cHive Team</h1>

                <!-- Section description -->
                <p class="grey-text w-responsive mx-auto mb-5">The perfect blend of creativity and technical
                    wizardry.
                    The best people formula for great projects.
                </p>
            </section>
        </div>

        <div class="container w-75 p-3" style="margin-top:4%;">

            <!-- Card deck -->
            <div class="card-deck">

                <!-- Card -->

                <div class="card mb-4" style="background: #4776E6;
    background: -webkit-linear-gradient(to right, #8E54E9, #4776E6);
    background: linear-gradient(to right, #8E54E9, #4776E6);color: white;">


                    <!--Card content-->
                    <div class="card-body text-center">

                        <!--Title-->
                        <a href="https://ingeniousambivert.github.io/" target="_blank">
                            <h4 class="card-title ">Monarch Maisuriya</h4>
                        </a>
                        <!--Text-->
                        <p class="card-text white-text">Co-Founder | Core Developer</p>

                    </div>
                </div>

                <!-- Card -->

                <!-- Card -->
                <div class="card mb-4 " style="background: #4776E6;
    background: -webkit-linear-gradient(to left, #8E54E9, #4776E6);
    background: linear-gradient(to left, #8E54E9, #4776E6);color: white;">

                    <!--Card content-->
                    <div class="card-body text-center">

                        <!--Title-->
                        <h4 class="card-title ">Himanshu Joshi</h4>
                        <!--Text-->
                        <p class="card-text white-text">Co-Founder | Core Developer</p>

                    </div>

                </div>
                <!-- Card -->

            </div>
            <!-- Card deck -->

            <div class="container w-50 p-3 text-center">
                <h3 class="h3-responsive"><strong>Contributors</strong></h3>
                <div class="row" style="margin-top:4%;">

                    <div class="col-md-6">
                        <table class="table table-striped text-center table-hover table-borderless">

                            <tbody>
                                <tr>

                                    <td><strong>Abhidyu Adukia</strong></td>

                                </tr>
                                <tr>

                                    <td><strong>Ronak Parmar</strong></td>


                                </tr>
                                <tr>

                                    <td><strong>Dhiraj Joshi</strong></td>

                                </tr>
                                <tr>

                                    <td><strong>Jolly Sharma</strong></td>

                                </tr>
                                <tr>

                                    <td><strong>Umang Sharma</strong></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <table class="table table-striped text-center table-hover table-borderless">

                            <tbody>
                                <tr>

                                    <td><strong>Parin Patel</strong></td>

                                </tr>
                                <tr>

                                    <td><strong>Jhanvi Sutar</strong></td>

                                </tr>
                                <tr>

                                    <td><strong>Vatsal Mehta</strong></td>

                                </tr>
                                <tr>

                                    <td><strong>Maruf Memon</strong></td>

                                </tr>
                                <tr>
                                    <td><strong>Jeet Kapadia</strong></td>


                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>

    </section>

<?php 
include("footer.php");
?>