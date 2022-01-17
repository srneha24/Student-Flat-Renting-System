<!DOCTYPE html>

<html>

<head>

    <title>
        
    <?php
        
        session_start();
        
        $uri = $_SERVER['REQUEST_URI'];
        $str_loc = strpos($uri, "Ad=");
        $str_loc = $str_loc + 3;
        $_SESSION["current_ad_no"] = substr($uri, $str_loc);
        echo "AD No. ". $_SESSION["current_ad_no"];
    
    ?>

    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Body Tag.css">

    <script type = "text/javascript">

        $(document).ready(function(){
            
            $("#uploader").on({
            
                mouseenter: function(){
                
                    $(this).css("text-decoration", "underline");
                
                },
                
                mouseleave: function(){
                
                    $(this).css("text-decoration", "none");
                
                }
            
            });

        });

    </script>

</head>

<body>

    <?php include_once "Navigation Bar.php" ?>

    <br><br><br><br><br>

    <div class="container bg-white">
        <?php include_once "Search Bar.php" ?>
    </div>

    <br><br>

    <div class="container bg-primary text-white text-center">
        <h2><?php echo "AD No. ". $_SESSION["current_ad_no"]; ?></h2>
    </div>

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "login=false") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>You need to sign up/log in to view ad publisher\'s details</b></p>
                
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

    <br>

    <div class="container">
        <div class="p-3" style="background-color: #BDC0C7;">

            <div class="bg-dark">
                <div class="m-1 p-4">
                    <!-- CAROUSEL INDICATORS -->
                    <div id="slideshow" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php 
                            
                                $directory = "Images/Ad Photos/". $_SESSION["current_ad_no"] ."/";
                                $filecount = 0;
                                $files = glob($directory . "*");
                                if ($files){
                                    $filecount = count($files);
                                }

                                $i = 0;

                                while ($i < $filecount) {
                                    if ($i === 0) {
                                        echo '<li data-target="#slideshow" data-slide-to="0" class="active"></li>';
                                    }

                                    else {
                                        echo '<li data-target="#slideshow" data-slide-to="'. $i .'"></li>';
                                    }

                                    $i++;
                                }
                            
                            ?>
                        </ol>

                        <!-- THE SLIDE -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                                $i = 1;

                                while ($i <= $filecount) {
                                    if ($i === 1) {
                                        echo '<div class="carousel-item active">
                                            <img src="'. $directory .'Photo 1.jpg" width="100%" height="300">
                                        </div>';
                                    }

                                    else {
                                        echo '<div class="carousel-item">
                                            <img src="'. $directory .'Photo '. $i .'.jpg" width="100%" height="300">
                                        </div>';
                                    }

                                    $i++;
                                }
                            
                            ?>
                        </div>

                        <!-- LEFT AND RIGHT CONTROLS -->
                        <a class="carousel-control-prev bg-dark" href="#slideshow" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next bg-dark" href="#slideshow" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>

            </div>

            <div class="bg-dark text-white">
                <div class="m-1 p-4">
                    <p>
                        <?php
                            
                            echo '<div class="d-inline-flex">
                            
                                <b>Posted By:</b>
                                <form action="Includes/Uploader Profile.Inc.php" method="post">
                                    <button id="uploader" class="btn btn-outline-dark text-primary" type="submit" name="uploaderprofile-submit">
                                        <i>' . $_SESSION["uploader_name"] . '</i>
                                    </button>
                                </form>
                            
                            </div> <br>
                            <b>No. of Seats:</b> <i>'. $_SESSION["seats"] .'</i> <br>
                            <b>Posted On:</b> <i>'. $_SESSION["post_date"] .'</i> <br><br>
                            <b>Gender Preference:</b> <i>'. $_SESSION["gender_pref"] .'</i> <br><br>
    
                            <b>Address Details:</b> <br>';
                            if (!empty($_SESSION["house_no"])){
                                echo 'House No. : <i>'. $_SESSION["house_no"] .'</i> &emsp;';
                            }
                            if (!empty($_SESSION["road_no"])){
                                echo 'Road No. : <i>'. $_SESSION["road_no"] .'</i> &emsp;';
                            }
                            if (!empty($_SESSION["block_no"])){
                                echo 'Block No. : <i>'. $_SESSION["block_no"] .'</i> &emsp;';
                            }

                            if (!empty($_SESSION["section"])){
                                echo 'Section: <i>'. $_SESSION["section"] .'</i> &emsp;';
                            }
                            if (!empty($_SESSION["floor_no"])){
                                echo 'Floor No. : <i>'. $_SESSION["floor_no"] .'</i>';
                            }
                            
                            echo '<br><br>
    
                            <b>Rent Details:</b> <br>
                            Rent: <i>'. $_SESSION["rent"] .'</i> <br>';
                            if ($_SESSION["water_bill"] !== "0.00"){
                                echo 'Water Bill: <i>'. $_SESSION["water_bill"] .'</i> &emsp;';
                            }
                            if ($_SESSION["electricity_bill"] !== "0.00"){
                                echo 'Electricity Bill: <i>'. $_SESSION["electricity_bill"] .'</i> &emsp;';
                            }

                            if ($_SESSION["gas_bill"] !== "0.00"){
                                echo 'Gas Bill: <i>'. $_SESSION["gas_bill"] .'</i> &emsp;';
                            }
                            if ($_SESSION["internet_bill"] !== "0.00"){
                                echo 'Internet Bill: <i>'. $_SESSION["internet_bill"] .'</i>';
                            }

                            if (!empty($_SESSION["description"])) {
                                echo '<br><br>
                            
                                <b>Description:</b> <br>
                                <i>'. $_SESSION["description"] .'</i> <br>';
                            }                                

                        ?>

                    </p>
                </div>
            </div>

        </div>
    
    </div>

    <br> <br>

</body>

</html>