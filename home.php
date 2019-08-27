 <!-- PHP -->

 <?php
ob_start();
// Starting the session
session_start();
include "db.php";
include 'header.php';

$id = $_SESSION['id'];

if (!isset($_SESSION['email']) and !isset($_SESSION['password'])) {
    header("Location:index.php");
    // To check if user is logged in
} else {
    // Destroying session if 30 mins have passed after logging in
    $now = time();
    if ($now > $_SESSION['expire']) {
        session_destroy();
        header("Location:index.php?sessiontimedout=true");
    }
}

if (@isset($_GET['passwordchanged'])) {
    echo '
            <script>
    swal({
        title :"Change Successful" ,text : "Your password has been changed successfully" ,
            icon : "success"
    }
    ) . then (function () {
        location.replace("/home.php");
    });

    </script> ';

}

?>


<body>

    <div class="container" style="margin-top:6%;">
        <!-- Section: Ongoing v.1 -->
        <section id="posts" class="my-5">

            <!-- Section heading -->
            <h2 class="h1-responsive font-weight-bold text-center my-5"style="font-size:2.8rem; font-family: 'Ropa Sans',
        sans-serif;">Growing projects</h2>
            <!-- Section description -->
            <p class="text-center w-responsive mx-auto mb-5 grey-text">A brief display of projects in progress.</p>

<?php

// Fetching all the available feed

$query = "SELECT * FROM `projects` ORDER BY created DESC , proj_id DESC";
$result = mysqli_query($link, $query);
$rowcount = mysqli_num_rows($result);
if ($rowcount > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $proj_id = $row['proj_id'];
        $leader_id = $row['leader_id'];
        $cover = $row['cover'];
        $title = $row['title'];
        $idForData = preg_replace('/[^A-Za-z0-9]/', '', $title);
        $brief = $row['brief'];
        $resources = $row['resources'];
        $author = $row['author'];
        $time = $row['created'];
        $description = $row['description'];

        echo '

    <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-5">

                    <!-- Featured image -->
                    <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4 zoom">
                        <img class="img-fluid" src="' . $cover . '"
                            alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-7">

                    <!-- Category -->
                    <!-- Post title -->
                    <h3 class="font-weight-bold mb-3"><strong>' . $title . '</strong></h3>

                    <!-- Excerpt -->
                    <p> ' . $brief . '
                        <p class="grey-text">NEEDS : ' . $resources . '.</p>
                    </p>
                    <!-- Post data -->
                    <p>by <a><strong>' . $author . '</strong></a> ' . $time . '</p>

                    <!-- Read more button -->

         <button class="btn btn-indigo round" type="button" data-toggle="collapse" data-target="#' . $idForData . '"
      aria-expanded="false" aria-controls="collapseData">
            Read More
                    </button>


                <!-- Collapsible element -->

                            <div class="collapse" id="' . $idForData . '">
                            <div class="mt-3">
                              ' . $description . '
                            </div>
                            <br>
                            <form method="POST" action="">
                           <span>
                           <input type="hidden" name="leader_id" value="' . $leader_id . '"/>
                           <input type="hidden" name="proj_id" value="' . $proj_id . '"/>
                           <button name="join" type="submit"
                                  class="btn btn-danger round btn-sm my-0">Join</button>
                                  </span>
                                  </form>
                            </div>
                <!-- / Collapsible element -->

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->
            <br>
               <hr class="my-5">
';

    }

}

if (isset($_POST['join'])) {

    $proj_id_new = $_POST["proj_id"];
    $leader_id_new = $_POST["leader_id"];

    if ($id != $leader_id_new) {

        $query = "INSERT INTO `team_req`(`leader_id`, `mem_id`, `proj_id`) VALUES ('$leader_id_new','$id','$proj_id_new')";
        $result = mysqli_query($link, $query);

        if ($result) {
            $msg = "Request Sent";
            echo '<script>
            swal("Success","Request to join the project sent successfully","success")
    </script>';

        } else {
            $error = mysqli_error($link);
            echo '<script>
            swal("Error","Could not send the request : ' . $error . '","error")
    </script>';
        }
    }
}

?>

        </section>
        <!-- Section: ongoing v.1 -->
    </div>
<div class="container">
     <!-- Section: Projects START -->
        <section class="text-center my-5 sec" id="projects">

            <!-- Section heading -->
            <h2 class="h1-responsive font-weight-bold text-center my-5" style="font-size:2.8rem; font-family: 'Ropa Sans',
        sans-serif;">Top of the line work </h2>
            <!-- Section description -->
           <p class="text-center grey-text w-responsive mx-auto mb-5">An expo of all the best projects by cHive team and the users.</p>

            <div id="learn-more" class="container">
                <!-- Section: Projects START -->
                <section id="projects" class="text-center py-5 svgbg">
                    <!-- Grid row -->
                    <div class="row text-center">
                        <!-- Grid column -->
                        <div class="col-lg-4 col-md-6">
                            <!--Featured image-->
                            <div class="view overlay rounded z-depth-1 zoom">
                                <img src="./img/projects/weather.jpg" class="img-fluid" alt=" Project image">
                                <a id="dwn"
                                href="https://github.com/ingeniousambivert/weather-fetching"
                                    target="_blank">
                                    <div class="mask flex-center rgba-indigo-light">
                                        <p class="white-text mask flex-center rgba-teal-light">Solo Project</p>
                                    </div>
                                </a>
                            </div>
                            <!--Excerpt-->
                            <div class="card-body pb-0">
                                <h4 class="font-weight-bold my-3">Weather-Fetcher App</h4>
                                <p class="pCol">It is a basic weather fetching web based application. The back-end
                                    of
                                    this project uses PHP and the front-end uses Bootstrap v4.
                                </p>

                            </div>
                        </div>
                        <!-- Grid column -->


                        <!-- Grid column -->
                        <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
                            <!--Featured image-->
                            <div class="view overlay rounded z-depth-1 zoom">
                                <img src="./img/projects/omnifood.png" class="img-fluid" alt="Sample project image">
                                <a>
                                    <a target="_blank" href="https://omni-food-project.000webhostapp.com/web.html">
                                        <div class="mask flex-center rgba-white-slight">
                                            <p class="white-text mask flex-center rgba-black-light">Solo Project</p>
                                        </div>
                                    </a>
                                </a>
                            </div>
                            <!--Excerpt-->
                            <div class="card-body pb-0">
                                <h4 class="font-weight-bold my-3">Omnifood</h4>
                                <p class="pCol">
                                    It is a website built for food delivery.It uses no front-end frameworks and is
                                    purely built from scratch.

                                </p>

                            </div>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
                            <!--Featured image-->
                            <div class="view overlay rounded z-depth-1 zoom">
                                <img src="./img/projects/diary.png" class="img-fluid" alt="Project image">
                                <a target="_blank" href="https://github.com/ingeniousambivert/diary" >
                                    <div class="mask flex-center rgba-teal-slight">
                                        <p class="white-text mask flex-center rgba-green-light">Solo Project</p>
                                    </div>
                                </a>
                            </div>
                            <!--Excerpt-->
                            <div class="card-body pb-0">
                                <h4 class="font-weight-bold my-3">Secret Diary</h4>
                                <p class="pCol">An online diary to store your data securely.The back-end of this
                                    project
                                    uses PHP and the front-end uses Bootstrap v4.

                                </p>

                            </div>
                        </div>
                        <!-- Grid column -->
                    </div>

                    <!--Grid row -->
                    <div class="row text-center" style="margin-top:30px;">
                        <!-- Grid column -->
                        <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
                            <!--Featured image-->
                            <div class="view overlay zoom rounded z-depth-1 zoom">
                                    <img src="./img/projects/ngo.png" class="img-fluid" alt="Sample project image">
                                <a target="_blank" href="https://github.com/ingeniousambivert/ngo">
                                    <div class="mask flex-center rgba-grey-light">
                                        <p class="white-text mask flex-center rgba-black-light">Collaborated
                                            Project</p>
                                    </div>
                                </a>
                            </div>
                            <!--Excerpt-->
                            <div class="card-body pb-0">
                                <h4 class="font-weight-bold my-3">NGO Website</h4>
                                <p class="pCol"> A basic website for donating money to the needy. The back-end of
                                    this
                                    project uses PHP and the
                                    front-end uses Bootstrap v4.
                                </p>

                            </div>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
                            <!--Featured image-->
                            <div class="view overlay rounded z-depth-1 zoom">
                                <img src="./img/projects/shout.png" class="img-fluid" alt="Sample project image">
                                <a target="_blank" href="https://github.com/ingeniousambivert/shout-it">
                                    <div class="mask flex-center rgba-white-strong">
                                        <p class="black-text mask flex-center rgba-grey-slight">Solo Project</p>
                                    </div>
                                </a>
                            </div>
                            <!--Excerpt-->
                            <div class="card-body pb-0">
                                <h4 class="font-weight-bold my-3">Shout-It</h4>
                                <p class="pCol">Basic chatroom for strangers to chat and get acquainted.The
                                    back-end of
                                    this
                                    project uses PHP and the
                                    front-end uses Bootstrap v4.
                                </p>

                            </div>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
                            <!--Featured image-->
                            <div class="view overlay zoom rounded z-depth-1 zoom">
                                <img src="./img/projects/glsinfo.jpg" class="img-fluid" alt="Project image">
                                <a href="https://github.com/ingeniousambivert/glsinfo" target="_blank">
                                    <div class="mask flex-center rgba-grey-light">
                                        <p class="white-text mask flex-center rgba-black-light">Collaborated
                                            Project</p>
                                    </div>
                                </a>
                            </div>
                            <!--Excerpt-->
                            <div class="card-body pb-0">
                                <h4 class="font-weight-bold my-3">GLS Info Website</h4>
                                <p class="pCol">It is a basic online manual concerning
                                    The Faculty of Computer applications & IT. It uses no front-end frameworks and
                                    is
                                    purely built from scratch.
                                </p>

                            </div>
                        </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

            </div>
            <!-- Container -->
                </section>
        <!--Section: projects-->
        </section>
        <!--  Section: Projects END-->
</div>
    <div class="sec">
        <div class="container">
            <!-- Section: Magazine v.2 -->
            <section class="magazine-section my-5" >

                <!-- Section heading -->
                <h2 class="h1-responsive font-weight-bold text-center my-5" style="font-size:2.8rem; font-family: 'Ropa Sans',
        sans-serif;margin-top:2%;">Whats Going On ?</h2>
                <!-- Section description -->
                <p class="text-center dark-grey-text w-responsive mx-auto mb-5">We also present a continuous,
                    customized
                    flow of articles
                    organized from ratified publishers and magazines.</p>

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-lg-6 col-md-12">

                        <!-- Featured news -->
                        <div class="single-news mb-lg-0 mb-4">

                            <!-- Image -->
                            <div class="view overlay rounded z-depth-1-half mb-4">
                                <img class="img-fluid" src="https://images.unsplash.com/photo-1533895328642-8035bacd565a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                                    alt="Sample image">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!-- Data -->
                            <div class="news-data d-flex justify-content-between">

                                <p class="font-weight-bold dark-grey-text"><i class="fa fa-clock-o pr-2"></i>27/12/2018</p>
                            </div>

                            <!-- Excerpt -->
                            <h3 class="font-weight-bold dark-grey-text mb-3"><a>Mark Zuckerberg is ‘proud’ of how
                                    Facebook
                                    handled its scandals this year</a></h3>
                            <p class="dark-grey-text mb-lg-0 mb-md-5 mb-4">“I’m proud of the progress we’ve made,” he
                                said in
                                an end-of-year note posted on his Facebook page for everyoe to see. Acknowledging that
                                the
                                social network played its part in the spread of hate speech, election interference and
                                misinformation, Zuckerberg’s note seemed more upbeat about his response to the
                                hurricane of
                                hurt caused by the company’s
                                <p> <a target="_blank" class="grey-text" href="https://techcrunch.com/2018/12/28/mark-zuckerberg-tonedeaf-end-of-year-remarks/">
                                        Read More ...
                                    </a></p>

                        </div>
                        <!-- Featured news -->

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-6 col-md-12" style="margin-top:6%;">

                        <!-- Small news -->
                        <div class="single-news mb-4">

                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-md-3">

                                    <!--Image-->
                                    <div class="view overlay rounded z-depth-1 mb-4">
                                        <img class="img-fluid" src="https://techcrunch.com/wp-content/uploads/2018/12/bird-box.jpg"
                                            alt="Sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-md-9">

                                    <!-- Excerpt -->
                                    <p class="font-weight-bold dark-grey-text">29/12/2018</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-11 text-truncate pl-0 mb-3">
                                            <a class="dark-grey-text">Sandra Bullock’s star power can still sell a movie, apparently. Though reviews for the Netflix horror film “Bird Box” have been lukewarm — the movie has a respectable, but not outstanding, score of 65 percent on Rotten Tomatoes — it has still managed to break records for the streaming service, Netflix said this afternoon.

The company announced in a tweet that more than 45 million Netflix accounts have now streamed “Bird Box,” which set a new record for the best-ever first week for a Netflix film.<a class="grey-text"
href="https://techcrunch.com/2018/12/28/bird-box-breaks-a-netflix-record-with-45m-people-watching-in-its-first-week/" target="_blank" >Read More...</a></a>
                                        </div>
                                        <a  ><i class="fa fa-angle-double-right"></i></a>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                        </div>
                        <!-- Small news -->

                        <!-- Small news -->
                        <div class="single-news mb-4">

                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-md-3">

                                    <!--Image-->
                                    <div class="view overlay rounded z-depth-1 mb-4">
                                        <img class="img-fluid" src="https://techcrunch.com/wp-content/uploads/2018/12/vsmp.jpg?w=1390&crop=1"
                                            alt="Sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-md-9">

                                    <!-- Excerpt -->
                                    <p class="font-weight-bold dark-grey-text">29/12/2018</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-11 text-truncate pl-0 mb-3">
                                            <a class="dark-grey-text">It seems someone took Every Frame a Painting literally: The Very Slow Movie Player is a device that turns cinema into wallpaper, advancing the image by a single second every hour. The result is an interesting household object that makes something new of even the most familiar film.

The idea occurred to designer and engineer Bryan Boyer during one of those times we all have where we are sitting at home thinking of ways to celebrate slowness.<a class="grey-text"
href="https://techcrunch.com/2018/12/28/the-very-slow-movie-player-shows-a-film-over-an-entire-year/" target="_blank"  >Read More...</a></a>
                                        </div>
                                        <a ><i class="fa fa-angle-double-right"></i></a>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                        </div>
                        <!-- Small news -->

                        <!-- Small news -->
                        <div class="single-news mb-4">

                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-md-3">

                                    <!--Image-->
                                    <div class="view overlay rounded z-depth-1 mb-4">
                                      <img class="img-fluid" src="https://i.ytimg.com/vi/jloL2NiqWUE/maxresdefault.jpg"
                                            alt="Sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-md-9">

                                    <!-- Excerpt -->
                                    <p class="font-weight-bold dark-grey-text">29/12/2018</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-11 text-truncate pl-0 mb-3">
                                            <a class="dark-grey-text">

Cydia shuts down purchasing mechanism for its jailbreak app store.Years after becoming one of the go-to destinations for iOS jailbreaks, Cydia’s app store is disabling purchases. Users will be able to access existing downloads through the store and access purchases via third-parties, but beginning this week, they’ll no longer be able to buy apps through the store.

Founder Jay “Saurik “ Freeman revealed the news via a Reddit post this week recommending users remove PayPal accounts from their profile.<a class="grey-text"
href="https://techcrunch.com/2018/12/15/cydia-shuts-down-purchasing-mechanism-for-its-jailbreak-app-store/" target="_blank" >Read More...</a></a>
                                        </div>
                                        <a  ><i class="fa fa-angle-double-right"></i></a>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                        </div>
                        <!-- Small news -->

                        <!-- Small news -->
                        <div class="single-news">

                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-md-3">

                                    <!--Image-->
                                    <div class="view overlay rounded z-depth-1 mb-md-0 mb-4">
                                        <img class="img-fluid" src="https://techcrunch.com/wp-content/uploads/2018/12/krisp_head.png?w=1390&crop=1"
                                            alt="Sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-md-9">

                                    <!-- Excerpt -->
                                    <p class="font-weight-bold dark-grey-text">29/12/2018</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-11 text-truncate pl-0 mb-lg-3">
                                            <a class="dark-grey-text">
Krisp reduces noise on calls using machine learning, and it’s coming to Windows soon.
If your luck is anything like mine, as soon as you jump on an important call, someone decides it’s a great time to blow some leaves off the sidewalk outside your window. 2Hz’s Krisp is a new desktop app that uses machine learning to subtract background noise like that, or crowds, or even crying kids — while keeping your voice intact. It’s already out for Macs and it’s coming to Windows soon.
<a class="grey-text"
href="https://techcrunch.com/2018/12/10/krisp-reduces-noise-on-calls-using-machine-learning-and-its-coming-to-windows-soon/" target="_blank" >Read More...</a></a>
                                        </div>
                                        <a ><i class="fa fa-angle-double-right"></i></a>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                        </div>
                        <!-- Small news -->

                    </div>
                    <!--Grid column-->

                </div>
                <!-- Grid row -->

            </section>
            <!-- Section: Magazine v.2 -->
        </div>
    </div>
<?php
include 'footer.php';
?>