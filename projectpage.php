<!-- PHP -->

<?php
// Starting the session
session_start();
$id = $_SESSION['id'];
include('db.php');
    if (!isset($_SESSION['email']) AND !isset($_SESSION['password'])) 
    {
        header("Location:index.php");
        // To check if the user is logged in 
    }
   else {
      // Destroying session if 30 mins have passed after logging in
        $now = time();
        if ($now > $_SESSION['expire']) {
            session_destroy();
            header("Location:index.php");
        }
    }
$error =""; 
  if(isset($_POST['button'])){
    echo "Button clicked"; 
    if (array_key_exists('name', $_POST) OR array_key_exists('resources', $_POST) OR array_key_exists('title', $_POST) OR array_key_exists('description', $_POST) )
    {
          $title = mysqli_real_escape_string($link, $_POST['title']);
          $resources = mysqli_real_escape_string($link, $_POST['resources']);
          $description = mysqli_real_escape_string($link, $_POST['description']);
          $enrollment = $_POST['enrollment'];
          $query = "INSERT INTO `userinfo`.`project` ( `title`, `description`, `resources`, `enrollment`) VALUES ( '$title', '$description', '$resources','$enrollment');";
                
                if (mysqli_query($link, $query)) {
                    
                    echo "<p>You have successfully submitted the form!";
                    
                } else {
                    
                    echo "<p>Error :</p>".mysqli_error($query),E_USER_ERROR;
                    
                }
                
            }}
    include("header.php");
?>

<body>

  <!-- Start your project here-->
  <div class="container" style="margin-top:8%;">
    <!--Section: Contact v.2-->
    <section class="mb-4">

      <!--Section heading-->
      <h2 class="h1-responsive font-weight-bold text-center my-4">Post Your Project</h2>
      <!--Section description-->
      <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to
        contact us
        directly. Our team will come back to you within
        a matter of hours to help you.</p>

    </section>
  </div>
  <div class="container">
    <!-- Default form contact -->
    <form class="text-center border border-light p-5" style="margin:3% 0% 3% 0%;" method="POST"> 


      <!-- Title -->
      <input type="text" id="defaultContactFormSubject" class="form-control mb-4" placeholder="Project Title" name="title">

      <!-- Resources -->
      <input type="text" id="defaultContactFormSubject" class="form-control mb-4" placeholder="Resources Required" name="resources">

        <!-- Enroll -->
       <input type="number" id="defaultContactFormEmail" class="form-control mb-4" placeholder="Enrollment" name="enrollment">
      <!-- Message -->
      <div class="form-group">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Project Description" name="description"></textarea>
      </div>

      <!-- Send button -->
      <button class="btn btn-primary btn-block" type="submit" style="width:117px;border-radius: 25px;" name="button">Submit</button>

    </form>
    <!-- Default form contact -->
  </div>


 <?php
 include("footer.php");
 ?>