<!DOCTYPE html>

<html>

<head>

    <title>Contact Details</title>

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

    <div class="container bg-primary text-center">
        <h2>Contact Details</h2>
    </div>

    <br>

    <div class="container">
        <div class="p-3 bg-white">

            <div class="m-1 p-4">
                <div style="float: right;">
                    <?php
                
                        $dp = "Images/Profile Photographs/".$_SESSION["uploader_id"].".jpg";

                        if (file_exists($dp)) {
                            echo '<img src="Images/Profile Photographs/'.$_SESSION["uploader_id"].'.jpg" width="200" height="200">';
                        }

                        else {
                            if ($_SESSION["uploader_gender"] == "Female") {
                                echo '<img src="Images/Profile Photographs/Female Icon.jpg" width="200" height="200">';
                            }
                
                            else {
                                echo '<img src="Images/Profile Photographs/Male Icon.jpg" width="200" height="200">';
                            }
                        }
                    
                    ?>
                </div>

                <p>
                    <?php

                        echo '<b>NAME: </b> &emsp; <i>'. $_SESSION["uploader_name"] .'</i> <br><br>
                        <b>PHONE NUMBER: </b> &emsp; <i>'. $_SESSION["uploader_phone"] .'</i> <br><br>
                        <b>EMAIL ADDRESS: </b> &emsp; <i>'. $_SESSION["uploader_email"] .'</i> <br><br>
                        <b>GENDER: </b> &emsp; <i>'. $_SESSION["uploader_gender"] .'</i>';

                        if (!empty($_SESSION["uploader_district"])) {
                            echo '<br><br><b>HOME DISTRICT: </b> &emsp; <i>'. $_SESSION["uploader_district"] .'</i>';
                        }

                        if (!empty($_SESSION["uploader_institute"])) {
                            echo '<br><br><b>INSTITUTE: </b> &emsp; <i>'. $_SESSION["uploader_institute"] .'</i>';
                        }
                    ?>

                </p>
            </div>

        </div>
    
    </div>

    <br> <br>

</body>

</html>