<?php
    $conn = mysqli_connect("localhost","root","","login-system");
    if(!$conn){
        die("Sorry, We failed to connect! - ".mysqli_connect_error());
    }

?>