<!-- PHP -->

<?php
// Starting the session
session_start();
$id = $_SESSION['id'];
include "../db/db.php";

if (!isset($_SESSION['email']) and !isset($_SESSION['password'])) {
  header("Location:../index.php");
  // To check if the user is logged in 
} else {
  // Destroying session if 30 mins have passed after logging in
  $now = time();
  if ($now > $_SESSION['expire']) {
    session_destroy();
    header("Location:../index.php");
  }
}
include '../partials/header.php';
?>

<body>

  <!-- Start your project here-->

  <div class="container" style="margin:9%;">
    <!-- Section heading -->
    <h2 class="h1-responsive font-weight-bold text-center my-5">Leaderboard</h2>
    <!-- Section description -->
    <p class="grey-text text-center w-responsive mx-auto mb-5">Presenting to you, this week's top performers!</p>
    <!--Table-->
    <table id="tablePreview" class="table text-center table-striped">
      <!--Table head-->
      <thead>
        <tr>
          <th>Rank</th>
          <th>First Name</th>
          <th>Last Name</th>

          <th>Points</th>


        </tr>
      </thead>
      <!--Table head-->
      <!--Table body-->
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Wade</td>
          <td>Wilson</td>

          <td>459</td>


        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Bucky</td>
          <td>Barnes</td>

          <td>432</td>


        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Peter</td>
          <td>Parker</td>

          <td>412</td>


        </tr>

        <tr>
          <th scope="row">4</th>
          <td>Steve</td>
          <td>Rogers</td>

          <td>398</td>


        </tr>

        <tr>
          <th scope="row">5</th>
          <td>Diana</td>
          <td>Prince</td>

          <td>386</td>


        </tr>


      </tbody>
      <!--Table body-->
    </table>
    <!--Table-->

  </div>
  <?php
  include '../partials/footer.php';
  ?>