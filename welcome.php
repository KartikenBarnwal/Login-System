<?php
session_start();
$illegal = false;

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true) {
    $uname = $_SESSION["uname"];
} else {
    $illegal = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php require "partials/_nav.php"; ?>

    <?php
    if ($illegal == true) {
        echo
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failure!</strong> Please Login with valid credentials first.
        </div>';
        $illegal = false;
        exit();
    }
    ?>

    <div class="alert alert-success" role="alert">
        Welcome <?php echo $uname; ?> !
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>