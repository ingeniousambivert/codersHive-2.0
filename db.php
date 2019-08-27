<!-- PHP -->

<?php

$msg = "";
$link = mysqli_connect("localhost", "id9257310_chive", "codershive", "id9257310_userinfo");
if (mysqli_connect_error()) {
    die("Couldnt Connect");
} else {
    $msg = "connected";
}

?>