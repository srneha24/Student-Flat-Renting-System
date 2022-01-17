<!DOCTYPE html>

<html>

<head>

    <title> 
        <?php 
    
            session_start();
            echo $_SESSION["user"]." - Ads";
        
        ?>
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Body Tag.css">

    <script type="text/javascript">

        <?php

            if ($_SESSION["total_result"] > 0) {
                $i = 0;
                while ($i < $_SESSION["total_result"]) {
                    echo '$(function() {
                        $(editad'.$i.').change(function() {
                            var x = this.checked;
                            if (x) {
                                $("#heading'.$i.'").prop("disabled", false);
                                $("#location'.$i.'").prop("disabled", false);
                                $("#seats'.$i.'").prop("disabled", false);
                                $("#gender_pref'.$i.'").prop("disabled", false);
                                $("#house_no'.$i.'").prop("disabled", false);
                                $("#road_no'.$i.'").prop("disabled", false);
                                $("#block_no'.$i.'").prop("disabled", false);
                                $("#section'.$i.'").prop("disabled", false);
                                $("#floor_no'.$i.'").prop("disabled", false);
                                $("#rent'.$i.'").prop("disabled", false);
                                $("#water_bill'.$i.'").prop("disabled", false);
                                $("#electricity_bill'.$i.'").prop("disabled", false);
                                $("#gas_bill'.$i.'").prop("disabled", false);
                                $("#internet_bill'.$i.'").prop("disabled", false);
                                $("#description'.$i.'").prop("disabled", false);
                                $("#adinfo'.$i.'").prop("disabled", false);
                            }
            
                            else {
                                $("#heading'.$i.'").prop("disabled", true);
                                $("#location'.$i.'").prop("disabled", true);
                                $("#seats'.$i.'").prop("disabled", true);
                                $("#gender_pref'.$i.'").prop("disabled", true);
                                $("#house_no'.$i.'").prop("disabled", true);
                                $("#road_no'.$i.'").prop("disabled", true);
                                $("#block_no'.$i.'").prop("disabled", true);
                                $("#section'.$i.'").prop("disabled", true);
                                $("#floor_no'.$i.'").prop("disabled", true);
                                $("#rent'.$i.'").prop("disabled", true);
                                $("#water_bill'.$i.'").prop("disabled", true);
                                $("#electricity_bill'.$i.'").prop("disabled", true);
                                $("#gas_bill'.$i.'").prop("disabled", true);
                                $("#internet_bill'.$i.'").prop("disabled", true);
                                $("#description'.$i.'").prop("disabled", true);
                                $("#adinfo'.$i.'").prop("disabled", true);
                            }
                        });
                    });';
                    
                    $i++;
                }
            }

        ?>

        
    </script>

</head>

<body>

    <?php include_once "Navigation Bar.php" ?>

    <br><br><br><br><br>

    <div class="container bg-white">
        <?php include_once "Search Bar.php" ?>
    </div>

    <br><br>

    <div class="container bg-primary text-center">
        <h2>MY ADS</h2>
    </div>

    <br>

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "ad=detailsupdated") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Ad Details Updated!</b></p>
                
                </div>';

            unset($_SESSION['outmessage']);

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

        elseif ($popup === "ad=deleted") {
            echo '
            <div class = "alert alert-success fade show">

                <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                <p class="text-center"><b>Ad Deleted!</b></p>
            
            </div>';

                unset($_SESSION['outmessage']);
        }
    }
    
    ?>

    <div class="container">
        <div class="p-3" style="background-color: #BDC0C7;">

        <?php 
            
            if ($_SESSION["total_result"] === 0) {
                echo '<div class="bg-white">
                    <div class="m-1 p-4">
                        <h2> No Ads Posted </h2>
                    </div>
                </div>
                
                <br>';
            }

            else {
                $i = 0;
                while ($i < $_SESSION["total_result"]) {
                    echo '<div class="bg-white">
                        <div class="bg-dark">
                            <div class="m-1 p-4">
                                <!-- CAROUSEL INDICATORS -->
                                <div id="slideshow'.$i.'" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">';
                                        
                                            $directory = "Images/Ad Photos/". $_SESSION["ad_no"][$i] ."/";
                                            $filecount = 0;
                                            $files = glob($directory . "*");
                                            if ($files){
                                                $filecount = count($files);
                                            }
            
                                            $k = 0;
            
                                            while ($k < $filecount) {
                                                if ($k === 0) {
                                                    echo '<li data-target="#slideshow'.$i.'" data-slide-to="0" class="active"></li>';
                                                }
            
                                                else {
                                                    echo '<li data-target="#slideshow'.$i.'" data-slide-to="'. $k .'"></li>';
                                                }
            
                                                $k++;
                                            }
                                    echo '</ol>
            
                                    <!-- THE SLIDE -->
                                    <div class="carousel-inner" role="listbox">';
                                            $k = 1;
            
                                            while ($k <= $filecount) {
                                                if ($k === 1) {
                                                    echo '<div class="carousel-item active">
                                                        <img src="'. $directory .'Photo 1.jpg" width="100%" height="300">
                                                    </div>';
                                                }
            
                                                else {
                                                    echo '<div class="carousel-item">
                                                        <img src="'. $directory .'Photo '. $k .'.jpg" width="100%" height="300">
                                                    </div>';
                                                }
            
                                                $k++;
                                            }
                                    echo '</div>
            
                                    <!-- LEFT AND RIGHT CONTROLS -->
                                    <a class="carousel-control-prev bg-dark" href="#slideshow'.$i.'" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next bg-dark" href="#slideshow'.$i.'" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                </div>
                            </div>
            
                        </div>

                        <br>

                        <div class="m-1 p-4">
                            <h2 class="text-primary">'. $_SESSION["heading"][$i] .'</h2>
                            <p>
                                <b>Ad No. :</b> &emsp; <i>'. $_SESSION["ad_no"][$i] .'</i> <br><br>
                                <b>Date Posted:</b> &emsp; <i>'. $_SESSION["post_date"][$i] .'</i> <br><br>
                                <b>Location:</b> &emsp; <i>'. $_SESSION["location"][$i] .'</i> &emsp; &emsp;
                                <b>No. of Seats:</b> &emsp; <i>'. $_SESSION["seats"][$i] .'</i> &emsp; &emsp;
                                <b>Gender Preference:</b> &emsp; <i>'. $_SESSION["gender_pref"][$i] .'</i> <br><br>
                                <label><strong>Address</strong></label><br>';
                                if (!empty($_SESSION["house_no"][$i])) {echo '<b>House No. :</b> &emsp; <i>'. $_SESSION["house_no"][$i] .'</i> &emsp; &emsp;'; }
                                if (!empty($_SESSION["road_no"][$i])) {echo '<b>Road No. :</b> &emsp; <i>'. $_SESSION["road_no"][$i] .'</i> &emsp; &emsp;'; }
                                if (!empty($_SESSION["block_no"][$i])) {echo '<b>Block No. :</b> &emsp; <i>'. $_SESSION["block_no"][$i] .'</i> &emsp; &emsp;'; }
                                if (!empty($_SESSION["section"][$i])) {echo '<b>Section:</b> &emsp; <i>'. $_SESSION["section"][$i] .'</i> &emsp; &emsp;'; }
                                if (!empty($_SESSION["floor_no"][$i])) {echo '<b>Floor No. :</b> &emsp; <i>'. $_SESSION["floor_no"][$i] .'</i> <br><br>'; }
                                echo '<label><strong>Rent Detailts</strong></label><br>
                                <b>Rent:</b> &emsp; <i>Tk. '. $_SESSION["rent"][$i] .'</i> <br>';
                                if ($_SESSION["water_bill"][$i] !== "0.00") { echo '<b>Water Bill:</b> &emsp; <i>'. $_SESSION["water_bill"][$i] .'</i> &emsp; &emsp;'; }
                                if ($_SESSION["electricity_bill"][$i] !== "0.00") { echo '<b>Electricity Bill:</b> &emsp; <i>'. $_SESSION["electricity_bill"][$i] .'</i> &emsp; &emsp;'; }
                                if ($_SESSION["gas_bill"][$i] !== "0.00") { echo '<b>Gas Bill:</b> &emsp; <i>'. $_SESSION["gas_bill"][$i] .'</i> &emsp; &emsp;'; }
                                if ($_SESSION["internet_bill"][$i] !== "0.00") { echo '<b>Internet Bill:</b> &emsp; <i>'. $_SESSION["internet_bill"][$i] .'</i> <br>'; }
                                if (!empty($_SESSION["description"][$i])) { echo '<br><br><b>Description:</b> &emsp; <i>'. $_SESSION["description"][$i] .'</i> <br>'; }      
                            echo '</p>

                            <br>

                            <div style="float: right;">
                                <form role="form" action="Includes/Ad Update.Inc.php" method="post">
                                    <button class="btn btn-warning" type="submit" name="adedit-submit">
                                    
                                        Edit Ad Details
                                        <input type="hidden" name="adeditchoice" value="'. $_SESSION["ad_no"][$i] .'">
                                    
                                    </button>
                                    &emsp;
                                    <button class="btn btn-danger" type="submit" name="addelete-submit">
                                        
                                        Delete Ad
                                        <input type="hidden" name="addelete" value="'. $_SESSION["ad_no"][$i] .'">
                                    
                                    </button>
                                </form>
                            </div>
                            <br><br>
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