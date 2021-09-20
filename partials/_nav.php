<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iSecure</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="welcome.php">
                <img src="shield.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                <span style="margin-left: 5%;">iSecure</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="welcome.php">Home</a>
                    <?php if (!isset($_SESSION["loggedin"])) {
                        echo '<a class="nav-link" href="signup.php">SignUp</a>';
                    } ?>
                    <?php if (!isset($_SESSION["loggedin"])) {
                        echo '<a class="nav-link" href="login.php">LogIn</a>';
                    } ?>
                    <?php if (isset($_SESSION["loggedin"])) {
                        echo '<a class="nav-link" href="logout.php">LogOut</a>';
                    } ?>
                </div>
            </div>
        </div>
    </nav>

</body>

</html>