<!-- PHP -->

<?php

$msg =""; 
$link = mysqli_connect("localhost","root","root","userinfo");
if(mysqli_connect_error())
{ 
    die ("Couldnt Connect");
}
else{
   $msg="connected";
}

?>