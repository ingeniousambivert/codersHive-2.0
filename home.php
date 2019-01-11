 <!-- PHP -->

 <?php
 // Starting the session 
 session_start();

    if (!isset($_SESSION['email']) AND !isset($_SESSION['password'])) 
    {
        header("Location:index.php");
        // To check if user is logged in 
    }
   else {
       // Destroying session if 30 mins have passed after logging in 
        $now = time();
        if ($now > $_SESSION['expire']) {
            session_destroy();
            header("Location:index.php");
        }
    }
include('header.php');
?>

<body>

    <div class="container" style="margin-top:6%;">
        <!-- Section: Ongoing v.1 -->
        <section id="posts" class="my-5">

            <!-- Section heading -->
            <h2 class="h1-responsive font-weight-bold text-center my-5"style="font-size:2.8rem; font-family: 'Ropa Sans',
        sans-serif;">Ongoing Projects</h2>
            <!-- Section description -->
            <p class="text-center w-responsive mx-auto mb-5">Here are some of the projects on which we
                are
                working. We
                all work in
                a team beacause everyone has different idea of different things which made cHive
                a
                union of minds
                with codes..</p>

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-5">

                    <!-- Featured image -->
                    <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                        <img class="img-fluid" src="https://www.fatbit.com/fab/wp-content/uploads/2015/09/reservation-1.png"
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
                    <a href="#!" class="green-text">

                    </a>
                    <!-- Post title -->
                    <h3 class="font-weight-bold mb-3"><strong>Restaurant Reservation</strong></h3>
                    <!-- Excerpt -->
                    <p>A web application for reserving seats at local restaurants.
                        <p class="grey-text">NEEDS : Designer , Database Analyst.</p>
                    </p>
                    <!-- Post data -->
                    <p>by <a><strong>Bruce Wayne</strong></a>, 19/08/2018</p>
                    <!-- Read more button -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#basicExampleModal">
                        Read More
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Restaurant Reservation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    What is Lorem Ipsum?
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard
                                    dummy text ever since the 1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen
                                    book. It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially
                                    unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                    containing Lorem Ipsum passages, and
                                    more recently with desktop publishing software like Aldus PageMaker including
                                    versions of Lorem Ipsum.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" >Join</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <hr class="my-5">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-7">

                    <!-- Category -->
                    <a href="#!" class="pink-text">

                    </a>
                    <!-- Post title -->
                    <h3 class="font-weight-bold mb-3"><strong>Stat.us</strong></h3>
                    <!-- Excerpt -->
                    <p>
                        Python Library for Probabilistic Graphical Models
                        <p class="grey-text">NEEDS : High-level Developer , System Analyst.</p>
                    </p>
                    <!-- Post data -->
                    <p>by <a><strong>Arthur Curry</strong></a>, 14/08/2018</p>
                    <!-- Read more button -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-pink" data-toggle="modal" data-target="#basicExampleModal">
                        Read More
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Stat.us</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    What is Lorem Ipsum?
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard
                                    dummy text ever since the 1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen
                                    book. It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially
                                    unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                    containing Lorem Ipsum passages, and
                                    more recently with desktop publishing software like Aldus PageMaker including
                                    versions of Lorem Ipsum.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" >Join</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-5">

                    <!-- Featured image -->
                    <div class="view overlay rounded z-depth-2">
                        <img class="img-fluid" src="https://www.edureka.co/blog/wp-content/uploads/2017/06/Python-Programming-Edureka.png"
                            alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <hr class="my-5">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-5">

                    <!-- Featured image -->
                    <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                        <img class="img-fluid" src="https://imagescdn.tweaktown.com/news/5/3/53750_9083720594374535056458225636817_boost-app-making-skills-ruby-rails-training.jpg"
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
                    <a href="#!" class="indigo-text">

                    </a>
                    <!-- Post title -->
                    <h3 class="font-weight-bold mb-3"><strong>Find Friends</strong></h3>
                    <!-- Excerpt -->
                    <p> Find friends with common interests and hobbies to hang out with.
                        <p class="grey-text">NEEDS : Frontend Developer , Middle-tier Developer.</p>
                    </p>
                    <!-- Post data -->
                    <p>by <a><strong>Barry Allen</strong></a>, 11/08/2018</p>
                    <!-- Read more button -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#basicExampleModal">
                        Read More
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> ind Friends</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    What is Lorem Ipsum?
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard
                                    dummy text ever since the 1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen
                                    book. It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially
                                    unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                    containing Lorem Ipsum passages, and
                                    more recently with desktop publishing software like Aldus PageMaker including
                                    versions of Lorem Ipsum.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" >Join</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <hr class="my-5">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-7">

                    <!-- Category -->
                    <a href="#!" class="pink-text">

                    </a>
                    <!-- Post title -->
                    <h3 class="font-weight-bold mb-3"><strong>Architectural Space
                    </strong></h3>
                    <!-- Excerpt -->
                    <p>
                        You can experiment with design elements and mix and match styles. With VR tools, the range of color options gives you a better visualization than a standard pencil blueprint.
                        <p class="grey-text">NEEDS : Low-level Developer , C++ Developer(Unreal).</p>
                    </p>
                    <!-- Post data -->
                    <p>by <a><strong>Wanda Maximoff</strong></a>, 14/08/2018</p>
                    <!-- Read more button -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-pink" data-toggle="modal" data-target="#basicExampleModal">
                        Read More
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Architectural Space</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    What is Lorem Ipsum?
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard
                                    dummy text ever since the 1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen
                                    book. It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially
                                    unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                    containing Lorem Ipsum passages, and
                                    more recently with desktop publishing software like Aldus PageMaker including
                                    versions of Lorem Ipsum.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" >Join</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-5">

                    <!-- Featured image -->
                    <div class="view overlay rounded z-depth-2">
                        <img class="img-fluid" src="https://d3b8hk1o42ev08.cloudfront.net/wp-content/uploads/2017/11/VR4.jpg"
                            alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <hr class="my-5">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-5">

                    <!-- Featured image -->
                    <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                        <img class="img-fluid" src="https://hackster.imgix.net/uploads/attachments/279343/upload_front-01-01_wCzutCbYqr.jpg?auto=compress%2Cformat&w=900&h=675&fit=min"
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
                    <a href="#!" class="indigo-text">

                    </a>
                    <!-- Post title -->
                    <h3 class="font-weight-bold mb-3"><strong>J.A.R.V.I.S. : A Virtual Home Assistant</strong></h3>
                    <!-- Excerpt -->
                    <p> J.A.R.V.I.S. is a personal home automation assistant for controlling electrical home appliances integrated with an augmented reality app.


                        <p class="grey-text">NEEDS : Low-level Developer ,  UX Developer.</p>
                    </p>
                    <!-- Post data -->
                    <p>by <a><strong>Tony Stark</strong></a>, 11/08/2018</p>
                    <!-- Read more button -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#basicExampleModalJ">
                        Read More
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="basicExampleModalJ" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">J.A.R.V.I.S. : A Virtual Home Assistant</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                Why tackle the Smart Home problem?
Nowadays, people have smartphones with them all the time. So it makes sense to use these to control home appliances. Presented here is a home automation system using a simple Android app which you can use to control electrical appliances with voice commands. Using the app you can control all the appliances like TV, fans, light etc. It’s like a Siri which can be controlled using voice (command given by user). You can give the command to switch on or off the devices (like light, fan etc) and also manipulate them like fan speed, light intensity. Commands are sent via a Bluetooth module to Arduino. So there is no need for you to get up to switch on or switch off the device while watching a movie or doing some important work.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-secondary" >Join</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </section>
        <!-- Section: ongoing v.1 -->
    </div>
<div class="container">
     <!-- Section: Projects START -->
        <section class="text-center my-5 sec" id="projects">

            <!-- Section heading -->
            <h2 class="h1-responsive font-weight-bold text-center my-5" style="font-size:2.8rem; font-family: 'Ropa Sans',
        sans-serif;">Our best projects</h2>
            <!-- Section description -->
            <p class="grey-text text-center w-responsive mx-auto mb-5">Nowadays some people see
                documentation
                and
                there are
                some
                smart people who believe in logical presentation that's what we are doing. Here is a showcase of our work.</p>

            <div id="learn-more" class="container">
                <!-- Section: Projects START -->
                <section id="projects" class="text-center py-5 svgbg">
                    <!-- Grid row -->
                    <div class="row text-center">
                        <!-- Grid column -->
                        <div class="col-lg-4 col-md-6">
                            <!--Featured image-->
                            <div class="view overlay rounded z-depth-1 zoom">
                                <img src="./img/weather.jpg" class="img-fluid" alt=" Project image">
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
                                <img src="./img/omnifood.png" class="img-fluid" alt="Sample project image">
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
                                <img src="./img/diary.png" class="img-fluid" alt="Project image">
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
                                    <img src="./img/ngo.png" class="img-fluid" alt="Sample project image">
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
                                <img src="./img/shout.png" class="img-fluid" alt="Sample project image">
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
                                <img src="./img/glsinfo.jpg" class="img-fluid" alt="Project image">
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
                    customizable
                    flow of articles
                    organized from thousands of publishers and magazines.</p>

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
                                        <img class="img-fluid" src="https://yalujailbreak.b-cdn.net/wp-content/uploads/2016/12/cydia-installer.png"
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
include('footer.php');
?>