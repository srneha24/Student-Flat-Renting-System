<!DOCTYPE html>

<html>

<head>

    <title> Search Results </title>

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

    <div class="container bg-white">
        <?php include_once "Search Bar.php" ?>
    </div>

    <br><br>

    <?php

        if (isset($_SESSION['outmessage'])) {
            $popup = $_SESSION['outmessage'];
            
            if ($popup === "error=nolocation") {
                echo '
                <div class = "alert alert-warning fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>You need to choose a location to search</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
            }
        }

        ?>

    <div class="container bg-primary text-center text-white">
            <h2>
                <b>LOCATION: &emsp;</b><i><?php echo $_SESSION["location_searched"]; ?></i>
                &emsp;&emsp;
                <b>NO. OF SEATS: &emsp;</b><i>&#8805;<?php echo $_SESSION["seats_searched"]; ?></i>
            </h2>
    </div>

    <br>

    <div class="container">
        <div class="p-3" style="background-color: #BDC0C7;">

        <?php 
            
            if ($_SESSION["total_result"] === 0) {
                echo '<div class="bg-white">
                    <div class="m-1 p-4">
                        <h2> No Result </h2>
                    </div>
                </div>
                
                <br>';
            }

            else {
                $i = 0;
                while ($i < $_SESSION["total_result"]) {
                    echo '<div class="bg-white">
                        <div class="m-1 p-4">
                            <h3>
                                <form action="Includes/Ad Description.Inc.php" method="post">
                                    <button id="addesc" class="btn btn-outline-light" type="submit" name="addesc-submit">
                                    
                                        <h2 class="text-primary">'. $_SESSION["heading"][$i] .'</h2>
                                        <input type="hidden" name="adchoice" value="'. $_SESSION["ad_no"][$i] .'">
                                    
                                    </button>
                                </form>
                            </h3>
                            <p>
                                Posted By: <i>'. $_SESSION["uploader_name"][$i] .'</i> <br>
                                No. of Seats: <i>'. $_SESSION["seats"][$i] .'</i> <br>
                                Rent: <i>Tk. '. $_SESSION["rent"][$i] .'</i> <br>
                                Posted On: <i>'. $_SESSION["post_date"][$i] .'</i> 
                            </p>
                        </div>
                    </div>
                    
                    <br>';

                    $i++;
                }
            }
        
        ?>
        </div>
    </div>

    <br> <br>

</body>

</html>