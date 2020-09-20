<!-- PHP -->

<?php
ob_start();
// Starting the session
session_start();
$id = $_SESSION['id'];
$checkprofile;
include 'db.php';
include "header.php";

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

if (@isset($_GET['addedtoteam'])) {
    echo ' <script>
    swal({
        title :"Added" ,text : "Member added to your team." ,
            icon : "success"
    }
    ) . then (function () {
        location.replace("/profile.php");
    });

    </script> ';

}

if (@isset($_GET['deletedrequest'])) {
    echo '<script>
    swal({
        title :"Deleted" ,text : "User request has been deleted." ,
            icon : "info"
    }
    ) . then (function () {
        location.replace("/profile.php");
    });

    </script> ';
}

$query = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
$result = mysqli_query($link, $query);
$rowcount = mysqli_num_rows($result);

while ($row = mysqli_fetch_array($result)) {
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
    $gender = $row['gender'];
}

if (is_null($profile)) {
    $checkprofile = false;
} else {
    $checkprofile = true;
}
// Profile Pic Insert

if (isset($_POST['updbtn'])) {
    $target_dir = "./img/user_profile/user_id-" . $id . "_";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $checkupload = 1;
    $msg = "";
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if (isset($_POST["updbtn"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
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
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $msg = '<div class="alert alert-danger" role="alert">
                        <p>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</p>
                        </div>';
        $checkupload = 0;
    }
// Check if $checkupload is set to 0 by an error
    if ($checkupload == 0) {
        $msg = '<div class="alert alert-danger" role="alert">
                        <p>Sorry, your file was not uploaded.</p>
                        </div>';
// if no errors found, try to upload file
    } else {
        $query = "UPDATE `users` SET `profile` =  '$target_file' WHERE id = $id";
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) and mysqli_query($link, $query)) {

            $msg = '<div class="alert alert-success" role="alert">
                        <p>The file ' . basename($_FILES["fileToUpload"]["name"]) . ' has been uploaded.</p>
                        </div>';

        } else {
            $msg = '<div class="alert alert-danger" role="alert">
                        <p>Sorry, your file was not uploaded.</p>
                        </div>';
        }
    }
}

//Update User Details

if (isset($_POST['update_user'])) {
    $firstname = @mysqli_real_escape_string($link, $_POST['firstname']);
    $lastname = @mysqli_real_escape_string($link, $_POST['lastname']);
    $email = @mysqli_real_escape_string($link, $_POST['email']);
    $dob = @$_POST['dob'];
    $enrollment = @$_POST['enrollment'];
    $course = @mysqli_real_escape_string($link, $_POST['course']);
    $gender = @mysqli_real_escape_string($link, $_POST['gender']);
    $bio = @mysqli_real_escape_string($link, $_POST['bio']);
    $bio = preg_replace('~\x{00a0}~', '', $bio);
    $skill = @mysqli_real_escape_string($link, $_POST['skill']);
    $skill = preg_replace('~\x{00a0}~', '', $skill);

    $query = "UPDATE users SET firstname = '$firstname' , lastname ='$lastname', email ='$email', course = '$course', gender ='$gender' , skill ='$skill', bio= '$bio'  ,portfolio = '$portfolio' WHERE id='$id' ";
    $result = mysqli_query($link, $query);

    if ($result) {

        $msg = " <div class='alert alert-success' role=' alert' >
                        <p>Profile successfully updated.</p>
                     </div>";

    } else {
        $msg = "<div class='alert alert-danger' role=valert'>
                        <p>Sorry, your profile was not updated.</p>
                        </div>";
    }

}

// TABLE ARRAY
$data = array();
$indexcount = 0;
$queryT = "SELECT DISTINCT(projects.proj_id),projects.title,projects.leader_id,projects.created from projects inner join team on team.proj_id=projects.proj_id where team.mem_id=$id OR team.leader_id=$id";
$resultT = @mysqli_query($link, $queryT);
$rowcountT = @mysqli_num_rows($resultT);
while ($rowT = mysqli_fetch_array($resultT)) {
    $proj_title = $rowT['title'];
    $proj_id = $rowT['proj_id'];

    {
        $team = array();
        $teamcount = 0;

        // TABLE INFO
        $queryI = @"SELECT * FROM team inner join users on users.id = team.mem_id where team.proj_id=$proj_id";
        $resultI = @mysqli_query($link, $queryI);
        $rowcountI = @mysqli_num_rows($resultI);
        while ($rowI = @mysqli_fetch_assoc($resultI)) {
            $team["$teamcount"] = array("firstname" => $rowI['firstname'], "lastname" => $rowI['lastname'], "course" => $rowI['course'], "joined" => $rowI['joined'], "mem_id" => $rowI['mem_id'], "proj_id" => $rowI['proj_id'], "does" => $rowI['does']);
            $teamcount++;

        }

        $data["$indexcount"] = array("proj_id" => $proj_id, "proj_title" => $proj_title, "proj_start" => $rowT['created'], "leader_id" => $rowT['leader_id'], "team" => $team);

    }
    $indexcount++;
}

//CHATS
$queryM = "SELECT * FROM chats";
//$query = "SELECT * FROM chats ORDER BY id DESC"; // To get new posts at top
$chat = mysqli_query($link, $queryM);

?>

<style>
body{}

table {
table-layout: fixed;
width: 100%;
word-wrap: break-word;
 }
</style>

<body>

    <div style="margin:3%;margin-top: 6%;">
    <!-- TABS -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            
            <li class="nav-item">
                <a class="nav-link active" id="ongoing-tab" data-toggle="tab" href="#ongoing" role="tab" aria-controls="ongoing"
                    aria-selected="false" style="color: #b9b9b9;">Ongoing Projects</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users"
                    aria-selected="false" style="color: #b9b9b9;">Member Requests</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats" role="tab" aria-controls="chats"
                    aria-selected="false" style="color: #b9b9b9;">Chat Rooms</a>
            </li>



        </ul>
<!--/TABS-->
        <div class="tab-content" id="myTabContent">
         
 <!-- CHATS -->
 <div class="tab-pane fade" id="chats" role="tabpanel" aria-labelledby="chats-tab">


  <div class="w-auto h-100" style="padding:2%;margin-top:2%;">
		<div class="row justify-content-center h-100">
			<div class="col-md-3 chat">
				<div class="card mb-sm-3 mb-md-0 contacts w-75 p-3 " style="height: 400px;
			border-radius: 15px;">
					<div class="card-header text-center" style="background-color: #4842B7;color:white;">
                    <h6>Your Projects</h6>
                    </div>

					<div class="card-body contacts_body" style="border: 0.5px solid #f2f2f2;">
						<ul class="contacts text-center" style="text-align:center; align-content:center;">
							<li class="active">
								<div class="d-flex bd-highlight">

									<div class="user_info ">
                                                <span class="text-center"><?php $query1 = @"SELECT * FROM projects WHERE projects.leader_id = $id";
$result1 = @mysqli_query($link, $query1);
$rowcount1 = @mysqli_num_rows($result1);
if ($rowcount1 > 0) {
    while ($row1 = mysqli_fetch_array($result1)) {
        $proj_id = $row1['proj_id'];
        $proj_title = $row1['title'];
        ?>
                <table class="table table-striped table-borderless text-center table-hover">
                <tbody class="text-center">
                    <tr>
                    <td class="text-center" style="border-radius:15px;"><?=$proj_title?></td>
                    </tr>
                </tbody>
                </table>
                <?php
}
}
?>

                                    </div>

                                </div>


							</li>

                        </ul>

					</div>
					<div class="card-footer" style="background-color: #4842B7;color:white;"></div>
				</div>
            </div>

			<div class="col-md-9 chat">
				<div class="card" style="height: 500px;
			border-radius: 15px;">
					<div class="card-header msg_head" style="background-color: #4842B7;color:white;">
						<div class="d-flex bd-highlight">

							<div class="user_info">
								<span>Chatroom For Project 1</span>

							</div>

						</div>

					</div>
					<div class="card-body msg_card_body">
                    <!-- CHATS -->
					<div id="container">
            <div class="shouts">


                    <?php while ($row = @mysqli_fetch_assoc($chat)):
    $name = $row['name'];
    $message = $row['message'];
    $decmsg = base64_decode($message);?>
																																																																																																																																																							<div class="d-flex justify-content-start mb-4">
																																																																																																																					<div class="msg_cotainer">
																																																																																																																																																							<?php echo '<small class="text-muted"> ' . $name . '</small><br>' . $decmsg; ?>
																																																																																																																																																							<span class="msg_time"><?php echo $row['time']; ?></span>
																																																																																																																					</div>
																																																																																																																																																							</div> <?php endwhile;?>

            </div>
        </div>
        <div id="form">
            <br />
            <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <strong>Sorry</strong>
                <?php echo $_GET['error'] ?>
            </div>
        <?php endif?>
        </div>
</div>
                     <form method="post" action="action.php">
					<div class="card-footer" style="background-color: #4842B7;color:white; padding:2%;">
						<div class="input-group">
							<div class="input-group-append">
								<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
							</div>
							<textarea name="message" class="form-control type_msg align-middle" placeholder="Type your message..."></textarea>
							<div class="input-group-append ">
								<button type="submit" name="sendmsg" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>
							</div>
						</div>
                    </div>
                    </form>

				</div>
			</div>
		</div>
	</div>
 </div>
 <!--/CHATS-->


<!-- ONGOING -->


<div class="tab-pane fade show active " id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
 <!--Table-->
    <div class="container">
    <br>
    <br>
    <h5 class="text-center w-responsive mx-auto mb-3">The projects you are working on will be displayed here.</h5>
<br>
    <?php if (count($data) > 0) {

    ?>        <table id="projects" class="table table-borderless table-striped table-hover" >
                    <!--Table head-->
                    <thead>
                        <tr>

                            <th>Project Title</th>
                            <th>Started At</th>
                            <th>Current Status</th>
                            <th colspan="3">Options</th>
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody>

        <?php
foreach ($data as $key => $value) {
        $idForModal = preg_replace('/[^A-Za-z0-9]/', '', $value['proj_title']);
        $proj_id = $value['proj_id'];
        ?>
                    <tr>
                            <td>
                                <!-- Button trigger modal -->
                                <a data-toggle="modal" data-target="#<?=$idForModal?>">
                                   <strong><?=$value['proj_title']?></strong>
                                </a>
                            </td>

                            <td>
                            <?php /*
        $date = @date("d/m/Y", $value['proj_start']);
        echo $date;*/
        echo $value['proj_start']; ?>
                            </td>

                            <td>
                            In Progress
                            </td>
                           
                             <td>
                            <a class="btn round btn-sm" href="./editproject.php" style="color:purple;font-weight:normal;background:white;">Edit</a>
                            </td>
                             <form method="POST">
                             <td>
                                 <input type="hidden" value="<?=$proj_id?>" name= "proj_id_del">
                            <button class="btn round btn-sm" type="submit" name = "delete_proj" style="color:red;font-weight:normal;background:white;">Delete</button>
                            </td>
                             <td>
                                  <input type="hidden" value="<?=$proj_id?>" name= "proj_id_comp">
                            <button class="btn round btn-sm" type="submit" name = "complete_proj"style="color:blue;font-weight:normal;background:white;">Finish</button>
                            </td>
                        </form>
                    </tr>
            <?php
}?>
                    </tbody>
</table>
<?php

} else {
    echo '<div style="margin-top:2%;" class="alert alert-danger container text-center p-3" role="alert">
                        Sorry, you dont have any projects going on.
                        </div>';
}

?>
     </div>
<?php
foreach ($data as $project => $pvalue) {
    $idForModal = preg_replace('/[^A-Za-z0-9]/', '', $pvalue['proj_title']);

    ?>
<!-- Modal -->
<div class="modal fade" id="<?=$idForModal?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content" style="width:690px;">
     <div class="modal-header indigo white-text">
        <h5 class="modal-title" id="exampleModalLabel"><?=$pvalue['proj_title']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white;">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <?php
if (count($pvalue['team']) > 1 || count($pvalue["team"]) != 1 && $id != $pvalue["mem_id"]) {

        ?><form method="POST" action="action.php">
        <table id="teams" class="table table-borderless table-striped" >
                    <!--Table head-->
                    <thead>
                        <tr>

                            <th class="text-center">Person Name</th>
                            <th class="text-center">Joined On</th>
                            <th class="text-center">Does</th>
                           <?php if ($id == $pvalue['leader_id']) {echo '<th class="text-center">Remove</th>';}?>
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody class="text-center">
<?php
foreach ($pvalue["team"] as $team => $tvalue) {
            $mem_id = $tvalue['mem_id'];
            if ($id == $tvalue["mem_id"]) {
                continue;

            }
            ?>

                        <tr>


                        <td class="pt-3-half text-center" >
                <?php if ($tvalue['mem_id'] == $pvalue['leader_id']) {
                echo '<strong>' . $tvalue["firstname"] . ' ' . $tvalue["lastname"] . '</strong>';
            } else {
                echo $tvalue["firstname"] . ' ' . $tvalue["lastname"];
            }?>
                            </td>
                            <td class="pt-3-half text-center" >
                <?=$tvalue["joined"]?>
                            </td>
                           <td class="pt-3-half text-center" contenteditable="false"><input class="text-center grey-text" style="background:none; border:0; text-align:center;"type="text" name="does" value="<?=$tvalue['does'];?>"/><i class="fas fa-pen-square"></i></td>
                           <?php if ($id == $pvalue['leader_id']) {echo ' <td>
<span class=" text-center"><button name="remove" type="submit" class="btn btn-danger round btn-sm my-0">Remove</button></span>
                            </td>';}?>
                        </tr>

<?php
}?>
                    </tbody>
        </table>

      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-indigo round btn-sm" name="save" value="Save"/>
      </div>
</form>
<?php
} else {
        echo '</div>
        <div class="container">
        <div class="alert alert-danger text-center" role="alert">
                        <p>Sorry, no team members found.</p>
                        </div>
        </div>';
    }
    ?>
    </div>
  </div>
</div>
<?php

}?>
</div>

<?php 
//Delete project


if(isset($_POST['delete_proj']))
{   $proj_id_del = $_POST['proj_id_del'];
    $query="DELETE from `projects` WHERE `proj_id` = '$proj_id_del' ";
    $result = @mysqli_query($link,$query);

    if($result)
    {
    echo ' <script>
    swal({
        title :"Deleted" ,text : "Project deleted from your list" ,
            icon : "info"
    }
    ) 
    </script> ';
    } else {
        echo mysqli_error($link);
    }

}

?>



<!-- /ONGOING -->



<!-- REQUESTS -->

 <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">

<div class="container ">
<br>
<br>

<h5 class="text-center w-responsive mx-auto mb-3">Connect with developers and programmers.<br>Accept their requests to add them to your team.</h5>
<br>

 <?php

$queryR = @"SELECT * FROM users INNER JOIN team_req INNER JOIN projects ON team_req.mem_id = users.id && team_req.proj_id = projects.proj_id where team_req.leader_id=$id";
$resultR = @mysqli_query($link, $queryR);
$rowcountR = @mysqli_num_rows($resultR);
if ($rowcountR > 0) {
    while ($rowR = @mysqli_fetch_array($resultR)) {

        $firstname = $rowR['firstname'];
        $lastname = $rowR['lastname'];
        $author = $firstname . " " . $lastname;
        $course = $rowR['course'];
        $profile = $rowR['profile'];
        $portfolio = $rowR['portfolio'];
        $skill = $rowR['skill'];
        $title = $rowR['title'];
        $proj_id = $rowR['proj_id'];
        $leader_id = $rowR['leader_id'];
        $mem_id = $rowR['mem_id'];
        $idForPill = preg_replace('/[^A-Za-z0-9]/', '', $author);

        echo '

<div class="container-fluid w-50 p-3" style="border:1px solid #ededed;box-shadow: 2px 2px 2px 2px rgba(228,228,228,0.5); border-radius:10px;">

<ul class="nav nav-pills mb-3 pills-secondary" id="pills-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="pills-req-tab" data-toggle="pill" href="#pills-' . $idForPill . '-req" role="tab"
aria-controls="pills-req" aria-selected="true" style="margin:5px;">Request</a>
</li>
<li class="nav-item">
<a class="nav-link" id="pills-r-profile-tab" data-toggle="pill" href="#pills-' . $idForPill . '-profile" role="tab"
aria-controls="pills-r-profile" aria-selected="false" style="margin:5px;">Profile</a>
</li>
</ul>
<div class="tab-content pt-2 pl-1" id="pills-tabContent">
<div class="tab-pane fade show active" id="pills-' . $idForPill . '-req" role="tabpanel" aria-labelledby="pills-req-tab">
<div class="text-center"><a style="color:black;" href="' . $portfolio . '"><strong> ' . $author . ' </strong> </a> requests to join your <strong>' . $title . '</strong> project.
<br>
<form method="POST" class="text-center" action="action.php">
<input type="hidden" name="leader_id" value="' . $leader_id . '">
<input type="hidden" name="proj_id" value="' . $proj_id . '"/>
<input type="hidden" name="mem_id" value="' . $mem_id . '"/>
<input type="submit" class="btn btn-indigo round btn-sm" name="accept" value="Accept" />
<input type="submit" class="btn btn-danger round btn-sm" name="decline" value="Decline" />
</form></div></div>
<div class="tab-pane fade" style="font-weight:normal; margin-left:5%; margin-bottom:3% ;" id="pills-' . $idForPill . '-profile" role="tabpanel" aria-labelledby="pills-r-profile-tab">
<div>
Name : ' . $author . '<br>
Course : ' . $course . ' <br> Skills :' . $skill . '
</div>
</div>
</div>
</div>
<br>

';

//Closing while loop
    }

} else {
    echo '<div class="alert alert-danger text-center w-auto  p-3" role="alert">
No member requests at the moment. Try posting some projects.
</div>
</div>
</div>
</div>';
}
?>


            </div>
        </div>
 <!--/REQUESTS -->



 </div>

 </div>


 <!--STYLE CHATS -->

<style>
		body,
		html {
			height: 100%;
			margin: 0;

        }
        hr{
            background:rgba(0, 0, 0, 0.01);
     }

		.chat {
			margin-top: auto;
			margin-bottom: auto;
		}


        ul li {
            text-align: center;
        }
		.contacts_body {

	    	overflow-y: auto;
			white-space: nowrap;
		}

		.msg_card_body {
			overflow-y: auto;
		}

		.card-header {
			border-radius: 15px 15px 0 0 !important;
			border-bottom: 0 !important;
		}

		.card-footer {
			border-radius: 0 0 15px 15px !important;
			border-top: 0 !important;
		}

		.container {
			align-content: center;
		}

		.type_msg {
			background-color: rgba(255, 255, 255, 1) !important;
			border: 0 !important;
			color: black !important;
			height: 60px !important;
            overflow-y: auto;
		}

		.type_msg:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}

		.attach_btn {
			border-radius: 0 0 0 15px !important;
			background-color: rgba(255, 255, 255, 1) !important;
			border: 0 !important;
			color: darkgray !important;
			transition : color 500ms;
        }

        .attach_btn :hover {

			color: black !important;

        }

		.send_btn {
			border-radius: 0 0 15px 0 !important;
			background-color: rgba(255, 255, 255,1) !important;
			border: 0 !important;
			color: darkgray !important;
            transition : color 500ms;
        }
        .send_btn :hover {
			color: black !important;
		}

		.contacts {
			list-style: none;
			padding: 0;
            box-shadow: none
		}

		.contacts li {
			width: 100% !important;
			margin-bottom: 15px !important;
		}

		.msg_cotainer {
			margin-top: auto;
			margin-bottom: auto;
			margin-left: 10px;
			border-radius: 20px;
			background-color: #f2f2f2;
			padding: 12px;
			position: relative;
		}

		.msg_cotainer_send {
			margin-top: auto;
			margin-bottom: auto;
			margin-right: 10px;
			border-radius: 25px;
			background-color: #f2f2f2;
			padding: 10px;
			position: relative;
		}

		.msg_time {
			position: absolute;
			left: 0;
			bottom: -15px;
			color: rgba(0, 0, 0, 0.5);
			font-size: 10px;
		}

		.msg_time_send {
			position: absolute;
			right: 0;
			bottom: -15px;
			color: rgba(0, 0, 0, 0.5);
			font-size: 10px;
		}

		.msg_head {
			position: relative;
		}


		@media(max-width: 576px) {
			.contacts_card {
				margin-bottom: 15px !important;
			}
		}
	</style>

 <!--/STYLE CHATS -->


<?php

include "footer.php";

?>

