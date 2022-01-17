<!DOCTYPE html>

<html>

<head>

    <title>
        
    <?php
        
        session_start();
        
        echo "AD No. ". $_SESSION["ad_no"];
    
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
        <h2><?php echo "AD No. ". $_SESSION["ad_no"]; ?></h2>
    </div>

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

        elseif ($popup === "error=emptyfields") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Necessary Fields Empty!</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }
    }
    
    ?>

    <br>

    <div class="container">
        <div class="p-3" style="background-color: #BDC0C7;">
            <div class="bg-dark text-white">
                <div class="m-1 p-4">
                    <p>
                        <form role="form" action="Includes/Ad Update.Inc.php" method="post">
                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Date Posted:</strong></label>
                                <div class="col-7 text-primary">
                                    <b><i><?php echo $_SESSION["post_date"] ?></i></b>
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Ad Title:</strong></label>
                                <div class="col-7">
                                    <input type="text" class="form-control" name="heading" value="<?php echo $_SESSION["heading"] ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Location:</strong></label>
                                <div class="col-7">
                                    <select name="location">
                                        <option value="Mirpur - 1"<?php if ($_SESSION["location"] === 'Mirpur - 1') {echo 'selected';} ?>> Mirpur - 1 </option>
                                        <option value="Mirpur - 2"<?php if ($_SESSION["location"] === 'Mirpur - 2') {echo 'selected';} ?>> Mirpur - 2 </option>
                                        <option value="Dhanmondi - 27"<?php if ($_SESSION["location"] === 'Dhanmondi - 27') {echo 'selected';} ?>> Dhanmondi - 27 </option>
                                        <option value="Rupnagar"<?php if ($_SESSION["location"] === 'Rupnagar') {echo 'selected';} ?>> Rupnagar </option>
                                        <option value="Rayer bazar"<?php if ($_SESSION["location"] === 'Rayer bazar') {echo 'selected';} ?>> Rayer bazar </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>No. of Seats:</strong></label>
                                <div class="col-7">
                                    <select class="pl-3 pr-3" name="seats">
                                        <option value="1"<?php if ($_SESSION["seats"] === '1') {echo 'selected';} ?>> 1 </option>
                                        <option value="2"<?php if ($_SESSION["seats"] === '2') {echo 'selected';} ?>> 2 </option>
                                        <option value="3"<?php if ($_SESSION["seats"] === '3') {echo 'selected';} ?>> 3 </option>
                                        <option value="4"<?php if ($_SESSION["seats"] === '4') {echo 'selected';} ?>> 4 </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Gender Preference:</strong></label>
                                <div class="col-7">
                                    <select class="pl-3 pr-3" name="gender_pref">
                                        <option value="Female"<?php if ($_SESSION["gender_pref"] === 'Female') {echo 'selected';} ?>> Female </option>
                                        <option value="Male"<?php if ($_SESSION["gender_pref"] === 'Male') {echo 'selected';} ?>> Male </option>
                                        <option value="Either"<?php if ($_SESSION["gender_pref"] === 'Either') {echo 'selected';} ?>> Either </option>
                                    </select>
                                </div>
                            </div>

                            <br>
                            <label><strong>Address</strong></label>
                            <br>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>House No. :</strong></label>
                                <div class="col-7">
                                    <input type="text" class="form-control" name="house_no" <?php if (!empty($_SESSION["house_no"])) { echo 'value="'.$_SESSION["house_no"].'"';} ?>>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Road No. :</strong></label>
                                <div class="col-7">
                                    <input type="text" class="form-control" name="road_no" <?php if (!empty($_SESSION["road_no"])) { echo 'value="'.$_SESSION["road_no"].'"';} ?>>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Block No. :</strong></label>
                                <div class="col-7">
                                    <input type="text" class="form-control" name="block_no" <?php if (!empty($_SESSION["block_no"])) { echo 'value="'.$_SESSION["block_no"].'"';} ?>>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Section:</strong></label>
                                <div class="col-7">
                                    <input type="text" class="form-control" name="section" <?php if (!empty($_SESSION["section"])) { echo 'value="'.$_SESSION["section"].'"';} ?>>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Floor No. :</strong></label>
                                <div class="col-7">
                                    <input type="text" class="form-control" name="floor_no" <?php if (!empty($_SESSION["floor_no"])) { echo 'value="'.$_SESSION["floor_no"].'"';} ?>>
                                </div>
                            </div>

                            <br>
                            <label><strong>Rent Details</strong></label>
                            <br>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Rent:</strong></label>
                                <b class="col-1"><i> Tk. </i></b>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="rent" value="<?php echo $_SESSION["rent"] ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Water Bill:</strong></label>
                                <b class="col-1"><i> Tk. </i></b>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="water_bill" <?php if (!empty($_SESSION["water_bill"])) { echo 'value="'.$_SESSION["water_bill"].'"';} ?>>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Electricity Bill:</strong></label>
                                <b class="col-1"><i> Tk. </i></b>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="electricity_bill" <?php if (!empty($_SESSION["electricity_bill"])) { echo 'value="'.$_SESSION["electricity_bill"].'"';} ?>>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Gas Bill:</strong></label>
                                <b class="col-1"><i> Tk. </i></b>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="gas_bill" <?php if (!empty($_SESSION["gas_bill"])) { echo 'value="'.$_SESSION["gas_bill"].'"';} ?>>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Internet Bill:</strong></label>
                                <b class="col-1"><i> Tk. </i></b>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="internet_bill" <?php if (!empty($_SESSION["internet_bill"])) { echo 'value="'.$_SESSION["internet_bill"].'"';} ?>>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label"><strong>Additional Comments:</strong></label>
                                <div class="col-7">
                                <textarea name = "description" cols = "45" rows = "5" class="form-control"> <?php if (!empty($_SESSION["description"])) { echo $_SESSION["description"];} ?> </textarea>
                                </div>
                            </div>

                            <br>

                            <button class="btn btn-success btn-block" type="submit" name="adinfo-submit">Save Changes</button>
                        </form>

                    </p>
                </div>
            </div>

        </div>
    
    </div>

    <br> <br>

</body>

</html>