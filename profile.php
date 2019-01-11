<!-- PHP -->

<?php
// Starting the session
session_start();
$id = $_SESSION['id'];
include('db.php');
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


$query = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
$result = mysqli_query($link, $query);
    
while($row = mysqli_fetch_array($result)) 
{ 
    // Fetching all the user info 
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $enrollment = $row['enrollment'];
    $dob = $row['dob'];
    $course = $row['course'];
    $email = $row['email'];
    $skill = $row['skill'];
    $portfolio = $row['portfolio'];
    $bio = $row['bio'];
    $profile = $row['profile'];
}
// Profile Pic Insert

if (isset($_POST['updbtn'])){
$target_dir = "./assets/user_profile/user_id-".$id."_";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$checkupload = 1;
$msg = "";
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $checkupload = 1;
    } else {
        $msg = '<div class="alert alert-danger" role="alert">
                        <p> File is not an image.</p>';
        $checkupload = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $msg = '<div class="alert alert-danger" role="alert">
                        <p> Sorry, file already exists.</p>';
    $checkupload = 0;
}
// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 2000000) {
    $msg =  "Sorry, your file is too large.";
    $checkupload = 0;
}*/
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $msg = '<div class="alert alert-danger" role="alert">
                        <p>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</p>
                        </div>';
    $checkupload = 0;
}
// Check if $checkupload is set to 0 by an error
if ($checkupload == 0) {
    $msg =  '<div class="alert alert-danger" role="alert">
                        <p>Sorry, your file was not uploaded.</p>
                        </div>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        $msg = '<div class="alert alert-success" role="alert">
                        <p>The file '. basename( $_FILES["fileToUpload"]["name"]). ' has been uploaded.</p>
                        </div>';
    } else {
       $msg =   '<div class="alert alert-danger" role="alert">
                        <p>Sorry, your file was not uploaded.</p>
                        </div>';
    }
}
}
    include("header.php");
?>
<body>

    <div style="margin:3%;margin-top: 6%;">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                    aria-selected="true" style="color:#b9b9b9">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ongoing-tab" data-toggle="tab" href="#ongoing" role="tab" aria-controls="ongoing"
                    aria-selected="false" style="color: #b9b9b9;">Ongoing Project</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="projects"
                    aria-selected="false" style="color: #b9b9b9;">Completed Projects</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="user-tab" data-toggle="tab" href="#users" role="tab" aria-controls="user"
                    aria-selected="false" style="color: #b9b9b9;">Member Requests</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="notify-tab" data-toggle="tab" href="#notify" role="tab" aria-controls="notify"
                    aria-selected="false" style="color: #b9b9b9;">Notifications</a>
            </li>


        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="content" style="margin: 3% 2%">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">


                                <h4 class="title"> Profile</h4>

                                <div class="content">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Enrollement</label>
                                                    <input type="number" class="form-control" name="enrollment" disabled
                                                        placeholder="<?php
                                                        if(isset($id))
                                                        {
                                                        echo $enrollment;} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="fname">First Name</label>
                                                    <input type="text" class="form-control edit" name="firstname"
                                                        placeholder="<?php
                                                        if(isset($id))
                                                        {
                                                        echo $firstname;} ?>"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lname">Last Name</label>
                                                    <input type="text" name="lastname" class="form-control edit"
                                                        placeholder="<?php
                                                        echo $lastname; ?>"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="course">Course</label>
                                                    <input type="text" name="course" disabled class="form-control edit"
                                                        placeholder="<?php
                                                        echo $course; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" name="email" disabled class="form-control edit"
                                                        placeholder="<?php
                                                        echo $email; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <input type="text" disabled class="form-control edit" name="gender edit"
                                                        placeholder="Gender" value="male" id="gender">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>DOB</label>
                                                    <input type="text" disabled class="form-control edit" name="dob"
                                                        placeholder="<?php
                                                        echo $dob; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Point</label>
                                                    <input type="number" disabled name="points" class="form-control"
                                                        placeholder="Phone Number" value="200">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Rank</label>
                                                    <input type="text" disabled class="form-control" name="rank"
                                                        placeholder="Dateofbirth" value="1">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Skills</label>

                                                    <textarea rows="3" disabled class="form-control edit" style="word-break: break-all;" name="skill" id="skill">
                                              <?php
                                                        echo $skill; ?>
                                                </textarea>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-left:-5px;">
                                            <div class="col-sm-6">

                                                <button type="submit" disabled class="btn btn-outline-primary pull-left edit"
                                                    >Update</button>
                                            </div>

                                            <div class="col-sm-6">
                                                <button class="btn btn-outline-indigo pull-right" id="ebutton" onclick="return false">Edit</button>
                                            </div>

                                        </div>

                                        <div class="clearfix"></div>
                                    </form>
                                </div>

                            </div>
                            <div class="col-md-4" style="margin-top:5%;">
                                <div class="card card-user" style="text-align: center;">
                                    <div class="content">
                                        <div class="author">
                                            
                                                <br>
                                              
                                 <div class="md-form mt-0 w-auto p-3">
                            
                                <div class="custom-file" style="margin-bottom:3%;">
                                <a href="<?php echo $portfolio ;?>" target="_blank">
                            <img class="avatar border-gray pull-center" src="<?php echo $profile?>" style="border-radius:25% ;width:120px;height;120px; ">
                            </a>

                         <div class="container" style="margin-bottom:3%;">

<button type="button" data-toggle="modal" data-target="#basicExampleModal" style="margin:10%;">
<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</button>

 

<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="color:white;background:#4842B7;">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <form method="post" enctype="multipart/form-data">
   <div class="input-group container" style="margin-top:13%;">
  <div class="input-group-prepend">
    <input type="submit" value="Upload Image" name="updbtn" class="input-group-text mb-3">
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload"  aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
  <br>

</div> 

</form>
      </div>
      <div class="modal-footer" style="color:white;background:#4842B7;">
      </div>
    </div>
  </div>
</div>
                              
                         </div>                           
                                                                      
                            </div>
                            
                                </div>
                        
                                           <h4 class="title black-text"><br />
                                            <?php
                                                echo $firstname." ".$lastname;
                                                         ?>
                                                </h4>
                                            </a>
                                        </div>

                                        <div class="form- container">


                                            <textarea rows="3" disabled class="form-control edit" style="word-break: break-all;">
                                              <?php
                                                        echo $bio; ?>
                                                </textarea>

                                        </div>

                                    </div>
                                    <br>
                                    <div class="container">
                                        <div class="form-group">

                                            <input type="email" name="email" class="form-control edit" placeholder="<?php
                                                        echo $portfolio; ?>"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">


                <!--Table-->
                <table id="tablePreview" class="table  table-striped">
                    <!--Table head-->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Title</th>
                            <th>Start Date</th>
                            <th>Current Status</th>
                        </tr>
                    </thead>
                    <!--Table head-->
                    <!--Table body-->
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <!-- Button trigger modal -->
                                <a data-toggle="modal" data-target="#basicExampleModal">
                                    Project 1
                                </a>

                                <!-- Modal -->
                                <div style="left:-15%;" class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="width:690px;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Editable table -->
                                                <div class="card">
                                                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Editable
                                                        table</h3>
                                                    <div class="card-body">
                                                        <div id="table" class="table-editable">
                                                            <span class="table-add float-right mb-3 mr-2"><a href="#!"
                                                                    class="text-success"><i class="fa fa-plus fa-2x"
                                                                        aria-hidden="true"></i></a></span>
                                                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                                                <tr>
                                                                    <th class="text-center">Person Name</th>
                                                                    <th class="text-center">Age</th>
                                                                    <th class="text-center">Company Name</th>
                                                                    <th class="text-center">Country</th>
                                                                    <th class="text-center">City</th>
                                                                    <th class="text-center">Sort</th>
                                                                    <th class="text-center">Remove</th>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-3-half" contenteditable="true">Aurelia
                                                                        Vega</td>
                                                                    <td class="pt-3-half" contenteditable="true">30</td>
                                                                    <td class="pt-3-half" contenteditable="true">Deepends</td>
                                                                    <td class="pt-3-half" contenteditable="true">Spain</td>
                                                                    <td class="pt-3-half" contenteditable="true">Madrid</td>
                                                                    <td class="pt-3-half">
                                                                        <span class="table-up"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-up"
                                                                                    aria-hidden="true"></i></a></span>
                                                                        <span class="table-down"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-down"
                                                                                    aria-hidden="true"></i></a></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button"
                                                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                                    </td>
                                                                </tr>
                                                                <!-- This is our clonable table line -->
                                                                <tr>
                                                                    <td class="pt-3-half" contenteditable="true">Guerra
                                                                        Cortez</td>
                                                                    <td class="pt-3-half" contenteditable="true">45</td>
                                                                    <td class="pt-3-half" contenteditable="true">Insectus</td>
                                                                    <td class="pt-3-half" contenteditable="true">USA</td>
                                                                    <td class="pt-3-half" contenteditable="true">San
                                                                        Francisco</td>
                                                                    <td class="pt-3-half">
                                                                        <span class="table-up"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-up"
                                                                                    aria-hidden="true"></i></a></span>
                                                                        <span class="table-down"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-down"
                                                                                    aria-hidden="true"></i></a></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button"
                                                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                                    </td>
                                                                </tr>
                                                                <!-- This is our clonable table line -->
                                                                <tr>
                                                                    <td class="pt-3-half" contenteditable="true">Guadalupe
                                                                        House</td>
                                                                    <td class="pt-3-half" contenteditable="true">26</td>
                                                                    <td class="pt-3-half" contenteditable="true">Isotronic</td>
                                                                    <td class="pt-3-half" contenteditable="true">Germany</td>
                                                                    <td class="pt-3-half" contenteditable="true">Frankfurt
                                                                        am Main</td>
                                                                    <td class="pt-3-half">
                                                                        <span class="table-up"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-up"
                                                                                    aria-hidden="true"></i></a></span>
                                                                        <span class="table-down"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-down"
                                                                                    aria-hidden="true"></i></a></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button"
                                                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                                    </td>
                                                                </tr>
                                                                <!-- This is our clonable table line -->
                                                                <tr class="hide">
                                                                    <td class="pt-3-half" contenteditable="true">Elisa
                                                                        Gallagher</td>
                                                                    <td class="pt-3-half" contenteditable="true">31</td>
                                                                    <td class="pt-3-half" contenteditable="true">Portica</td>
                                                                    <td class="pt-3-half" contenteditable="true">United
                                                                        Kingdom</td>
                                                                    <td class="pt-3-half" contenteditable="true">London</td>
                                                                    <td class="pt-3-half">
                                                                        <span class="table-up"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-up"
                                                                                    aria-hidden="true"></i></a></span>
                                                                        <span class="table-down"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-down"
                                                                                    aria-hidden="true"></i></a></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button"
                                                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Editable table -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>Otto</td>
                            <td>@mdo</td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>
                                <!-- Button trigger modal -->
                                <a data-toggle="modal" data-target="#basicExampleModal">
                                    Project 2
                                </a>

                                <!-- Modal -->
                                <div style="left:-15%;" class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="width: 690px;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Editable table -->
                                                <div class="card">
                                                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Editable
                                                        table</h3>
                                                    <div class="card-body">
                                                        <div id="table" class="table-editable">
                                                            <span class="table-add float-right mb-3 mr-2"><a href="#!"
                                                                    class="text-success"><i class="fa fa-plus fa-2x"
                                                                        aria-hidden="true"></i></a></span>
                                                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                                                <tr>
                                                                    <th class="text-center">Person Name</th>
                                                                    <th class="text-center">Age</th>
                                                                    <th class="text-center">Company Name</th>
                                                                    <th class="text-center">Country</th>
                                                                    <th class="text-center">City</th>
                                                                    <th class="text-center">Sort</th>
                                                                    <th class="text-center">Remove</th>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-3-half" contenteditable="true">Aurelia
                                                                        Vega</td>
                                                                    <td class="pt-3-half" contenteditable="true">30</td>
                                                                    <td class="pt-3-half" contenteditable="true">Deepends</td>
                                                                    <td class="pt-3-half" contenteditable="true">Spain</td>
                                                                    <td class="pt-3-half" contenteditable="true">Madrid</td>
                                                                    <td class="pt-3-half">
                                                                        <span class="table-up"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-up"
                                                                                    aria-hidden="true"></i></a></span>
                                                                        <span class="table-down"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-down"
                                                                                    aria-hidden="true"></i></a></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button"
                                                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                                    </td>
                                                                </tr>
                                                                <!-- This is our clonable table line -->
                                                                <tr>
                                                                    <td class="pt-3-half" contenteditable="true">Guerra
                                                                        Cortez</td>
                                                                    <td class="pt-3-half" contenteditable="true">45</td>
                                                                    <td class="pt-3-half" contenteditable="true">Insectus</td>
                                                                    <td class="pt-3-half" contenteditable="true">USA</td>
                                                                    <td class="pt-3-half" contenteditable="true">San
                                                                        Francisco</td>
                                                                    <td class="pt-3-half">
                                                                        <span class="table-up"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-up"
                                                                                    aria-hidden="true"></i></a></span>
                                                                        <span class="table-down"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-down"
                                                                                    aria-hidden="true"></i></a></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button"
                                                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                                    </td>
                                                                </tr>
                                                                <!-- This is our clonable table line -->
                                                                <tr>
                                                                    <td class="pt-3-half" contenteditable="true">Guadalupe
                                                                        House</td>
                                                                    <td class="pt-3-half" contenteditable="true">26</td>
                                                                    <td class="pt-3-half" contenteditable="true">Isotronic</td>
                                                                    <td class="pt-3-half" contenteditable="true">Germany</td>
                                                                    <td class="pt-3-half" contenteditable="true">Frankfurt
                                                                        am Main</td>
                                                                    <td class="pt-3-half">
                                                                        <span class="table-up"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-up"
                                                                                    aria-hidden="true"></i></a></span>
                                                                        <span class="table-down"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-down"
                                                                                    aria-hidden="true"></i></a></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button"
                                                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                                    </td>
                                                                </tr>
                                                                <!-- This is our clonable table line -->
                                                                <tr class="hide">
                                                                    <td class="pt-3-half" contenteditable="true">Elisa
                                                                        Gallagher</td>
                                                                    <td class="pt-3-half" contenteditable="true">31</td>
                                                                    <td class="pt-3-half" contenteditable="true">Portica</td>
                                                                    <td class="pt-3-half" contenteditable="true">United
                                                                        Kingdom</td>
                                                                    <td class="pt-3-half" contenteditable="true">London</td>
                                                                    <td class="pt-3-half">
                                                                        <span class="table-up"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-up"
                                                                                    aria-hidden="true"></i></a></span>
                                                                        <span class="table-down"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-down"
                                                                                    aria-hidden="true"></i></a></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button"
                                                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Editable table -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>Thornton</td>
                            <td>@fat</td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>
                                <!-- Button trigger modal -->
                                <a data-toggle="modal" data-target="#basicExampleModal">
                                    Project 3
                                </a>

                                <!-- Modal -->
                                <div style="left:-15%;" class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="width: 690px;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Editable table -->
                                                <div class="card">
                                                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Editable
                                                        table</h3>
                                                    <div class="card-body">
                                                        <div id="table" class="table-editable">
                                                            <span class="table-add float-right mb-3 mr-2"><a href="#!"
                                                                    class="text-success"><i class="fa fa-plus fa-2x"
                                                                        aria-hidden="true"></i></a></span>
                                                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                                                <tr>
                                                                    <th class="text-center">Person Name</th>
                                                                    <th class="text-center">Age</th>
                                                                    <th class="text-center">Company Name</th>
                                                                    <th class="text-center">Country</th>
                                                                    <th class="text-center">City</th>
                                                                    <th class="text-center">Sort</th>
                                                                    <th class="text-center">Remove</th>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-3-half" contenteditable="true">Aurelia
                                                                        Vega</td>
                                                                    <td class="pt-3-half" contenteditable="true">30</td>
                                                                    <td class="pt-3-half" contenteditable="true">Deepends</td>
                                                                    <td class="pt-3-half" contenteditable="true">Spain</td>
                                                                    <td class="pt-3-half" contenteditable="true">Madrid</td>
                                                                    <td class="pt-3-half">
                                                                        <span class="table-up"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-up"
                                                                                    aria-hidden="true"></i></a></span>
                                                                        <span class="table-down"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-down"
                                                                                    aria-hidden="true"></i></a></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button"
                                                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                                    </td>
                                                                </tr>
                                                                <!-- This is our clonable table line -->
                                                                <tr>
                                                                    <td class="pt-3-half" contenteditable="true">Guerra
                                                                        Cortez</td>
                                                                    <td class="pt-3-half" contenteditable="true">45</td>
                                                                    <td class="pt-3-half" contenteditable="true">Insectus</td>
                                                                    <td class="pt-3-half" contenteditable="true">USA</td>
                                                                    <td class="pt-3-half" contenteditable="true">San
                                                                        Francisco</td>
                                                                    <td class="pt-3-half">
                                                                        <span class="table-up"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-up"
                                                                                    aria-hidden="true"></i></a></span>
                                                                        <span class="table-down"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-down"
                                                                                    aria-hidden="true"></i></a></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button"
                                                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                                    </td>
                                                                </tr>
                                                                <!-- This is our clonable table line -->
                                                                <tr>
                                                                    <td class="pt-3-half" contenteditable="true">Guadalupe
                                                                        House</td>
                                                                    <td class="pt-3-half" contenteditable="true">26</td>
                                                                    <td class="pt-3-half" contenteditable="true">Isotronic</td>
                                                                    <td class="pt-3-half" contenteditable="true">Germany</td>
                                                                    <td class="pt-3-half" contenteditable="true">Frankfurt
                                                                        am Main</td>
                                                                    <td class="pt-3-half">
                                                                        <span class="table-up"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-up"
                                                                                    aria-hidden="true"></i></a></span>
                                                                        <span class="table-down"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-down"
                                                                                    aria-hidden="true"></i></a></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button"
                                                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                                    </td>
                                                                </tr>
                                                                <!-- This is our clonable table line -->
                                                                <tr class="hide">
                                                                    <td class="pt-3-half" contenteditable="true">Elisa
                                                                        Gallagher</td>
                                                                    <td class="pt-3-half" contenteditable="true">31</td>
                                                                    <td class="pt-3-half" contenteditable="true">Portica</td>
                                                                    <td class="pt-3-half" contenteditable="true">United
                                                                        Kingdom</td>
                                                                    <td class="pt-3-half" contenteditable="true">London</td>
                                                                    <td class="pt-3-half">
                                                                        <span class="table-up"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-up"
                                                                                    aria-hidden="true"></i></a></span>
                                                                        <span class="table-down"><a href="#!" class="indigo-text"><i
                                                                                    class="fa fa-long-arrow-down"
                                                                                    aria-hidden="true"></i></a></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button"
                                                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Editable table -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>the Bird</td>
                            <td>@twitter</td>

                        </tr>
                    </tbody>
                    <!--Table body-->
                </table>
                <!--Table-->


            </div>


            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">

                <!--Table-->
                <table id="tablePreview" class="table  table-striped">
                    <!--Table head-->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                        </tr>
                    </thead>
                    <!--Table head-->
                    <!--Table body-->
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>

                        </tr>
                    </tbody>
                    <!--Table body-->
                </table>
                <!--Table-->


            </div>



            <div class="tab-pane fade show " id="users" role="tabpanel" aria-labelledby="users-tab">

                <div class="container">
                    <!-- Section: Team v.4 -->
                    <section class="my-2">
                        <br>

                        <!-- Section heading -->

                        <br>
                        <h2 class="h1-responsive font-weight-bold text-center my-3">User Request</h2>
                        <!-- Section description -->
                        <p class="grey-text text-center w-responsive mx-auto mb-3">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis
                            totam voluptas
                            nostrum quisquam eum porro a pariatur veniam.</p>

                        <!-- Grid row -->
                        <div class="row">

                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-3 mb-lg-0 mb-6">
                                <!-- Rotating card -->
                                <div class="card-wrapper">
                                    <div id="card-2" class="card card-rotating text-center">
                                        <!-- Front Side -->
                                        <div class="face front">

                                            <!-- Avatar -->
                                            <div class="avatar mx-auto white">
                                                <a href="#"><img src="https://mdbootstrap.com/img/Photos/Avatars/img(20).jpg"
                                                        alt="Second sample avatar image" width="100" class="rounded-circle"></a>
                                            </div>
                                            <!-- Content -->

                                            <h5 class="font-weight-bold mt-1 mb-2">Hannah</h5>
                                            <h6 class="font-weight-bold mt-1 mb-0">PHP</h6>

                                        </div>
                                        <!-- Front Side -->
                                        <!-- Back Side -->
                                        <div class="face back">
                                            <!-- Content -->
                                            <div class="card-body mt-0">
                                                <!-- Button -->
                                                <a href="#" class="btn-sm btn-primary"><span style="font-size:smaller;">Accept</span></a>
                                                <a href="#" class="btn-sm btn-secondary"><span style="font-size:smaller;">Decline</span></a>
                                                <!-- Content -->
                                                <h5 class="font-weight-bold mt-2 mb-1">
                                                    <strong>Description</strong>
                                                </h5>
                                                <hr>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime
                                                    quae, dolores
                                                    dicta. Blanditiis
                                                    rem amet repellat, voluptatum eum, officia laudantium quaerat? </p>
                                            </div>
                                        </div>
                                        <!-- Back Side -->
                                    </div>
                                </div>
                                <!-- Rotating card -->
                            </div>
                            <!-- Grid column -->


                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-3 mb-lg-0 mb-6">
                                <!-- Rotating card -->
                                <div class="card-wrapper">
                                    <div id="card-2" class="card card-rotating text-center">
                                        <!-- Front Side -->
                                        <div class="face front">

                                            <!-- Avatar -->
                                            <div class="avatar mx-auto white">
                                                <a href="#"><img src="https://mdbootstrap.com/img/Photos/Avatars/img(10).jpg"
                                                        alt="Second sample avatar image" width="100" class="rounded-circle"></a>
                                            </div>
                                            <!-- Content -->
                                            <h5 class="font-weight-bold mt-1 mb-2">Katie</h5>
                                            <h6 class="font-weight-bold mt-1 mb-0">C++</h6>
                                        </div>
                                        <!-- Front Side -->
                                        <!-- Back Side -->
                                        <div class="face back">
                                            <!-- Content -->
                                            <div class="card-body">
                                                <!-- Button -->
                                                <a href="#" class="btn-sm btn-primary"><span style="font-size:smaller;">Accept</span></a>
                                                <a href="#" class="btn-sm btn-secondary"><span style="font-size:smaller;">Decline</span></a>
                                                <!-- Content -->
                                                <h5 class="font-weight-bold mt-2 mb-1">
                                                    <strong>Description</strong>
                                                </h5>
                                                <hr>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime
                                                    quae, dolores
                                                    dicta. Blanditiis
                                                    rem amet repellat, voluptatum eum, officia laudantium quaerat? </p>
                                            </div>
                                        </div>
                                        <!-- Back Side -->
                                    </div>
                                </div>
                                <!-- Rotating card -->
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-3 mb-lg-0 mb-6">
                                <!-- Rotating card -->
                                <div class="card-wrapper">
                                    <div id="card-2" class="card card-rotating text-center">
                                        <!-- Front Side -->
                                        <div class="face front">

                                            <!-- Avatar -->
                                            <div class="avatar mx-auto white">
                                                <a href="#"><img src="https://mdbootstrap.com/img/Photos/Avatars/img(12).jpg"
                                                        alt="Second sample avatar image" width="100" class="rounded-circle"></a>
                                            </div>
                                            <!-- Content -->
                                            <h5 class="font-weight-bold mt-1 mb-2">Kayla</h5>
                                            <h6 class="font-weight-bold mt-1 mb-0">Java</h6>
                                        </div>
                                        <!-- Front Side -->
                                        <!-- Back Side -->
                                        <div class="face back">
                                            <!-- Content -->
                                            <div class="card-body">
                                                <!-- Button -->
                                                <a href="#" class="btn-sm btn-primary"><span style="font-size:smaller;">Accept</span></a>
                                                <a href="#" class="btn-sm btn-secondary"><span style="font-size:smaller;">Decline</span></a>

                                                <!-- Content -->
                                                <h5 class="font-weight-bold mt-2 mb-1">
                                                    <strong>Description</strong>
                                                </h5>
                                                <hr>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime
                                                    quae, dolores
                                                    dicta. Blanditiis
                                                    rem amet repellat, voluptatum eum, officia laudantium quaerat? </p>
                                            </div>
                                        </div>
                                        <!-- Back Side -->
                                    </div>
                                </div>
                                <!-- Rotating card -->
                            </div>
                            <!-- Grid column -->


                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-3 mb-lg-0 mb-6">
                                <!-- Rotating card -->
                                <div class="card-wrapper">
                                    <div id="card-2" class="card card-rotating text-center">
                                        <!-- Front Side -->
                                        <div class="face front">

                                            <!-- Avatar -->
                                            <div class="avatar mx-auto white">
                                                <a href="#"><img src="https://mdbootstrap.com/img/Photos/Avatars/img(15).jpg"
                                                        alt="Second sample avatar image" width="100" class="rounded-circle"></a>
                                            </div>
                                            <!-- Content -->
                                            <h5 class="font-weight-bold mt-1 mb-2">Emily</h5>
                                            <h6 class="font-weight-bold mt-1 mb-0">PHP</h6>

                                        </div>
                                        <!-- Front Side -->
                                        <!-- Back Side -->
                                        <div class="face back">
                                            <!-- Content -->
                                            <div class="card-body">
                                                <!-- Button -->
                                                <a href="#" class="btn-sm btn-primary"><span style="font-size:smaller;">Accept</span></a>
                                                <a href="#" class="btn-sm btn-secondary"><span style="font-size:smaller;">Decline</span></a>
                                                <!-- Content -->
                                                <h5 class="font-weight-bold mt-2 mb-1">
                                                    <strong>Description</strong>
                                                </h5>
                                                <hr>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime
                                                    quae, dolores
                                                    dicta. Blanditiis
                                                    rem amet repellat, voluptatum eum, officia laudantium quaerat? </p>
                                            </div>
                                        </div>
                                        <!-- Back Side -->
                                    </div>
                                </div>
                                <!-- Rotating card -->
                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->
                        <br>

                        <br>
                    </section>
                    <!-- Section: Team v.4 -->
                </div>

            </div>
            <div class="tab-pane fade" id="notify" role="tabpanel" aria-labelledby="notify-tab">

                <div class="container w-50 p-3" style="padding:2%;margin-top:2%;pull-right">

                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>

            </div>
        </div>

    </div>
<?php 

include("footer.php");

?>