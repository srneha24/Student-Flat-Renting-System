<!DOCTYPE html>

<html>

<head>

    <title> Welcome - Student Flat Renting System </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Body Tag.css">

    <style type="text/css">
        .txtsize {
            font-size: 20px;
        }
        
        #holder {
            width: 100%;
            height: 560px;
            background-image: url(Images/System\ Images/Front\ Page\ Background.jpg);
        }
        
        .centre {
            text-align: center;
        }
        
        #textbox {
            background-color: rgba(122, 241, 248, 0.7);
            width: 300px;
            height: 400px;
            margin-right: 150px;
            margin-top: 70px;
            float: right;
            padding: 20px;
            text-align: center;
            vertical-align: middle;
            color: black;
            font-weight: bold;
            font-style: oblique;
            font-size: 35px;
            ;
        }
    </style>

</head>

<body>

    <?php include_once "Navigation Bar.php" ?>

    <div id="holder" class="container-fluid">

        <br> <br> <br>

        <h1 class="badge badge-pill badge-warning badge mt-3 p-2"><span class="material-icons" style="font-size: small;">place</span> Dhaka</h1>

        <br> <br> <br> <br>
        <?php

        if (isset($_SESSION['outmessage'])) {
            $popup = $_SESSION['outmessage'];

            if ($popup === "login=success") {
                echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Login Successful</b></p>
                
                </div>';

                    unset($_SESSION['outmessage']);
            }

            elseif ($popup === "error=nolocation") {
                echo '
                <div class = "alert alert-warning fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>You need to choose a location to search</b></p>
                
                </div>';

                    unset($_SESSION['outmessage']);
            }
        }

        ?>

        <div id="textbox">
            Searching For <br> Rooms In <br> The City <br>
            <h3 style="font-size: 85px; font-weight: bolder; font-family: 'Cooper Gothic Black';">MADE <br> EASY</h3>

        </div>

    </div>

    <br> <br> <br> <br> <br>

    <div class="container">
        <div class="mt-5 pb-5" style="background-image: url(Images/System\ Images/Search\ Box.jpg);">
            <div class="p-3 centre">
                <h1><span class="material-icons bg-primary text-danger" style="font-size: 48px;">place</span></h1>
                <i><h3 style="font-family:Georgia, 'Times New Roman', Times, serif">Find A Seat To Rent</h3></i>
            </div>

            <?php include_once "Search Bar.php" ?>
        </div>
    </div>

    <br> <br> <br>

    <div class="d-flex justify-content-end pt-3 pb-3 mr-lg-5">
        <a href="Ad Post.php" class="btn btn-lg text-white" name="ad" role="button" style="background-color: #14276E;">
            <h3 style="font-family: Courgette;"> <strong> <i> Post An Ad </i> </strong> </h3>
        </a>
    </div>

</body>

</html>