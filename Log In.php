<!DOCTYPE html>

<html>

<head>

    <title> Log In - Student Flat Renting System </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Body Tag.css">

</head>

<body>

    <?php include_once "Navigation Bar.php" ?>

    <br><br><br><br><br>

    <div class="container-fluid">
        <h1 class="bg-white text-primary text-center">LOG IN</h1>
    </div>

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "error=emptyfields") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Necessary Fields Empty!</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=incorrectentry") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Incorrect User ID/Email Or Password. Try Again.</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "login=success") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Log In Successful</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }
    }
    
    ?>

    <div class="container">
        <div class="center bg-white m-5 p-5">
            <form role="form" action="Includes/Log In.Inc.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="useridemail" placeholder="Enter User ID or Email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="pwd" placeholder="Enter Password">
                </div>

                <br><br>

                <button class="btn btn-block btn-primary" type="submit" name="login-submit">Log In</button>
            </form>
        </div>
    </div>

</body>

</html>