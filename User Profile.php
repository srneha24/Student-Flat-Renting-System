<!DOCTYPE html>

<html>

<head>

    <title> 
        <?php 
    
            session_start();
            echo $_SESSION["user"];
        
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
        $(function() {
            $(edit).change(function() {
                var x = this.checked;
                if (x) {
                    $("#username").prop("disabled", false);
                    $("#phone").prop("disabled", false);
                    $("#email").prop("disabled", false);
                    $("#gender").prop("disabled", false);
                    $("#district").prop("disabled", false);
                    $("#institute").prop("disabled", false);
                    $("#save").prop("disabled", false);
                }

                else {
                    $("#username").prop("disabled", true);
                    $("#phone").prop("disabled", true);
                    $("#email").prop("disabled", true);
                    $("#gender").prop("disabled", true);
                    $("#district").prop("disabled", true);
                    $("#institute").prop("disabled", true);
                    $("#save").prop("disabled", true);
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

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "error=Email/Phone-Exists") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Phone/Email Address Already Exists</b></p>
                
                </div>';

            unset($_SESSION['outmessage']);

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

        elseif ($popup === "user=infoupdated") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Information Updated!</b></p>
                
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

        elseif ($popup === "error=wronguploadformat") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>You can only upload .jpg/.jpeg files</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=uploaderror") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Error uploading files</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        echo "<br>";
    }
    
    ?>


    <div class="container d-flex justify-content-center">
        <?php
                
            $dp = "Images/Profile Photographs/".$_SESSION["user_id"].".jpg";

            if (file_exists($dp)) {
                echo '<img src="Images/Profile Photographs/'.$_SESSION["user_id"].'.jpg" width="300" height="300">';
            }

            else {
                if ($_SESSION["gender"] == "Female") {
                    echo '<img src="Images/Profile Photographs/Female Icon.jpg" width="300" height="300">';
                }
    
                else {
                    echo '<img src="Images/Profile Photographs/Male Icon.jpg" width="300" height="300">';
                }
            }
        
        ?>
    </div>

    <br>

    <div class="container d-flex justify-content-center">
        <form role="form" action="Includes/User Profile.Inc.php" method="post" enctype="multipart/form-data">
            <?php
            
            if (file_exists($dp)) {
                echo '<button class="btn btn-white" type="button" id="dp" data-toggle="modal" data-target="#dpselect-modal">Change Profile Image</button> <br>';
                echo '<div class="modal fade" id="dpselect-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Change Profile Image</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Select A File To Upload
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <input type="file" name="dpselect" class="form-control-file" accept=".jpg, .jpeg">
                                <button type="submit" class="btn btn-success" name="dp-submit">Upload</button>
                            </div>

                        </div>
                    </div>
                </div>';
            }

            else {
                echo '<button class="btn btn-white" type="button" id="dp" data-toggle="modal" data-target="#dpselect-modal">Upload Profile Image</button> <br>';
                echo '<div class="modal fade" id="dpselect-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Upload Profile Image</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Select A File To Upload
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <input type="file" name="dpselect" class="form-control-file" accept=".jpg, .jpeg">
                                <button type="submit" class="btn btn-success" name="dp-submit">Upload</button>
                            </div>

                        </div>
                    </div>
                </div>';
            }
            
            ?>
        </form>
    </div>

    <br>

    <div class="container bg-primary text-center">
            <h2><?php echo $_SESSION["user"]; ?></h2>
    </div>

    <br>

    <div class="container">

        <div style="float: right;">
            <form role="form" action="Includes/User Ads.Inc.php" method="post">
                <button class="btn btn-warning btn-lg" type="submit" name="userads-submit"><b><i>My Ads</i></b></button>
            </form>
        </div>

        <br><br><br>
        
        <div class="bg-white border border-secondary m-2 p-5">
            <div style="float: right;">
                <input class="form-check-input" type="checkbox" id="edit" name="editinfo">
                <label class="form-check-label">Edit Information</label>
            </div>

            <br><br><br>

            <form role="form" action="Includes/User Profile.Inc.php" method="post">                
                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>ID:</strong></label>
                    <div class="col-9">
                        <i><b><?php echo $_SESSION["user_id"]; ?></b></i>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Name:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="username" id="username" maxlength = "50" value="<?php echo $_SESSION["user"]; ?>" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Phone Number:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="phone" id="phone" pattern="[0-9]{11}" value="<?php echo $_SESSION["phone"]; ?>" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Email Address:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION["email"]; ?>" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Gender:</strong></label>
                    <div class="col-9">
                        <select class="pl-3 pr-3" id="gender" name="gender" disabled>
                            <option value="Female" <?php if ($_SESSION["gender"] == "Female") {echo "selected";} ?> > Female </option>
                            <option value="Male" <?php if ($_SESSION["gender"] == "Male") {echo "selected";} ?> > Male </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>District:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" id="district" name="district" maxlength = "30" <?php if (!empty($_SESSION["district"])) { echo 'value="'.$_SESSION["district"].'"'; } ?> disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Institute:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" id="institute" name="institute" <?php if (!empty($_SESSION["institute"])) { echo 'value="'.$_SESSION["institute"].'"'; } ?> disabled>
                    </div>
                </div>

                <br>

                <div class="form-group row" style="float: right;">
                    <button class="btn btn-danger" type="submit" name="userinfo-submit" id="save" disabled>Save Changes</button>
                </div>

                <br>
            </form>
        </div>
        
    </div>

    <br><br>

</body>

</html>