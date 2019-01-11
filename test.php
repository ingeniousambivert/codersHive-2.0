<?php
include('header_guest.php');

if (isset($_POST['updbtn'])){
$target_dir = "./Assets/UserProfile/";
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
       $msg =  "Sorry, there was an error uploading your file.";
    }
}
}

?>

<body>

<div class="container">
 <?php 
    if (isset($_POST['updbtn'])){
        echo $msg ;
    }
    ?>
</div>

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
</body>


<?php include('footer.php');?>