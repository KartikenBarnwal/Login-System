<?php

$login = true;  
require "_dbconnect.php";

if (isset($_POST["password"])) {
    $uname = $_POST["uname"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM `users` WHERE `uname`='$uname' AND `password`='$password'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["uname"] = $user["uname"];
        header("location: welcome.php");
    } else {
        $login = false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <style>
        body {
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
            background-size: 400% 400%;
            animation: gradient 20s ease infinite;
            height: 100vh;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>

<body>
    <?php require "partials/_nav.php"; ?>

    <?php 
    if($login==false){
        echo
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failure!</strong> Invalid Credentials.
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>    
            </button>
        </div>';
        $login = true;
    }
    ?>

    <div class="container my-5" style="width: 60rem;">
        <h1>Please Login Here!</h1>
        <hr>
        <form action="" method="POST">
            <div class="mb-3 col-md-6">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="uname" id="uname" aria-describedby="emailHelp" placeholder="Eg: Kartiken1411">
            </div>
            <!-- <div class="mb-3 col-md-6">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter your Email">
            </div> -->
            <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password Here!">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" style="width: 7rem;">Log In</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>