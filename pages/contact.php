<!-- PHP -->

<?php
session_start();
$check = false;
if (isset($_SESSION['email']) and isset($_SESSION['password'])) {
    $check = true;
    include "../partials/header.php";
    // To check if the user is logged in and include the header in.

    $query = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
    $result = mysqli_query($link, $query);

    while ($row = mysqli_fetch_array($result)) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
    }
} else {
    $check = false;
    include "../partials/header_guest.php";
    // To include the guest header in.
}
?>

<body>

    <!-- Start your project here-->
    <div class="container" style="margin-top:8%;">
        <!--Section: Contact v.2-->
        <section class="mb-4">

            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4" style="font-size:2.8rem; font-family: 'Ropa Sans',
        sans-serif;margin-top:2%;">Stay in the know</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to
                contact us.<br> Our team will revert back as soon as possible.</p>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="https://formspree.io/contactcodershive@gmail.com" method="POST">


                        <input required type="text" id="name" name="name" class="form-control mb-4" placeholder="Name" value=" <?php
                                                                                                                                if ($check == true) {
                                                                                                                                    echo $firstname . " " . $lastname;
                                                                                                                                } ?>">


                        <input required type="email" id="email" name="email" class="form-control mb-4" value=" <?php
                                                                                                                if ($check == true) {
                                                                                                                    echo $email;
                                                                                                                }
                                                                                                                ?> " placeholder="E-mail">

                        <select id="defaultSelect" class="browser-default custom-select mb-4" name="subject">
                            <option value="" disabled="">Choose Subject</option>
                            <option value="Feedback" selected="" name="Feedback">Feedback</option>
                            <option value="Report_bug" name="Reportbug">Report a bug</option>
                            <option value="Feature_request" name="Featurerequest">Feature request</option>
                            <option value="Other" name="Other">Other</option>
                        </select>

                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message" required name="message"></textarea>

                        <br>
                        <div class="text-center text-md-left">
                            <button class="btn btn-indigo round" style="border-radius:25px;" type="submit" name="submitbtn">Send</button>
                        </div>
                    </form>



                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marked-alt mt-4 fa-2x"></i>
                            <p>GLS University , Ahmedabad</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>+ 1800-CODERS-HIVE</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>contactcodershive@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>


        </section>
        <!--Section: Contact v.2-->
    </div>
    <?php
    include "../partials/footer.php";
    ?>