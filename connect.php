<?php

$con = mysqli_connect("localhost","root","","login");
if ($con) {
    echo"connection successful";
} else {
    die(mysqli_error($con));
}
?>