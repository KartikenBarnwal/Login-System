<?php

$signup = false;
$confirmPassword = true;
$sameUsername = false;

if (isset($_POST["password"])) {
    $uname = $_POST["uname"];
    $password = $_POST["password"];

    if ($password != $_POST["confirmPassword"]) {
        $confirmPassword = false;
    } else {

        include "_dbconnect.php";

        $sql = "SELECT * FROM `users` WHERE `uname`='$uname'";
        $exists = mysqli_query($conn, $sql);
        if ($exists && mysqli_num_rows($exists)>0) {
            $sameUsername = true;
        } else {
            // Hashing the password for safe storage
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`uname`,`password`,`dt`) VALUES ('$uname', '$password', current_timestamp())";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $signup = true;
                // header("Location: login.php");
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
    if ($confirmPassword == false) {
        echo
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failure!</strong> You retyped a different password.
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>    
            </button>
        </div>';
        $confirmPassword = true;
    }
    else if ($sameUsername == true) {
        echo
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> That username already exists.
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>    
            </button>
        </div>';
        $sameUsername = false;
    }
    else if ($signup == true) {
        echo
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account has been created successfully. Please <a href="login.php">Login</a> to Continue.
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>    
            </button>
        </div>';
        $signup = false;
    }
    ?>

    <div class="container my-5" style="width: 60rem;">
        <h1>Registration for New User</h1>
        <hr>
        <form action="" method="POST">
            <div class="mb-3 col-md-6">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="uname" id="uname" aria-describedby="emailHelp" placeholder="Eg: Kartiken1411 (Max Length - 11)" maxlength="11">
            </div>
            <!-- <div class="mb-3 col-md-6">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter your Email">
            </div> -->
            <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Use a Strong Password (Max Length - 16)" maxlength="16">
            </div>
            <div class="mb-3 col-md-6">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Retype your Password" maxlength="16">
                <small id="emailHelp" class="form-text text-danger">Please enter the same password!</small>
            </div>
            <!-- <div class="mb-3 form-check col-md-6 ml-4">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">I Understand and Agree the <a href="#"><u>T&Cs</u></a></label>
            </div> -->
            <br>
            <button type="submit" class="btn btn-primary col-md-6" style="width: 10rem;">Sign Up</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>