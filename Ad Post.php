<!DOCTYPE html>

<html>

<head>

    <title> Post An Ad </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Body Tag.css">

    <script type="text/javascript">
        $(function() {
            $(inclusive).change(function() {
                var x = this.checked;
                if (x) {
                    $("#water").prop("disabled", true);
                    $("#electricity").prop("disabled", true);
                    $("#gas").prop("disabled", true);
                    $("#internet").prop("disabled", true);
                }

                else {
                    $("#water").prop("disabled", false);
                    $("#electricity").prop("disabled", false);
                    $("#gas").prop("disabled", false);
                    $("#internet").prop("disabled", false);
                }
            });
        });
    </script>

</head>

<body>

    <?php include_once "Navigation Bar.php" ?>

    <br><br><br><br><br>

    <div class="container-fluid">
        <h1 class="bg-primary text-dark text-center">POST AN AD</h1>
    </div>

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "login=false") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>You need to sign in to post an ad</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "adpost=success") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Ad posted!</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=emptyfields") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Ad Title/Rent Required</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=nolocation") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Please Select A Location</b></p>
                
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
    }
    
    ?>

    <br>

    <div class="container bg-light">
        <div class="d-flex justified-content-center p-5">
            <form id="adpost" role="form" action="Includes/Ad Post.Inc.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Ad Title:</strong></label>
                    <div class="col-7">
                        <input type="text" class="form-control" name="heading" placeholder="Provide an attractive title to your ad">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Location:</strong></label>
                    <div class="col-7">
                        <?php include_once "Locations.php" ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>No. of Seats:</strong></label>
                    <div class="col-7">
                        <select class="pl-3 pr-3" name="seats">
                            <option value="1"> 1 </option>
                            <option value="2"> 2 </option>
                            <option value="3"> 3 </option>
                            <option value="4"> 4 </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Gender Preference:</strong></label>
                    <div class="col-7">
                        <select class="pl-3 pr-3" name="gender_pref">
                            <option value="Female"> Female </option>
                            <option value="Male"> Male </option>
                            <option value="Either"> Either </option>
                        </select>
                    </div>
                </div>

                <br>
                <label><strong>Address</strong></label>
                <br>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>House No. :</strong></label>
                    <div class="col-7">
                        <input type="text" class="form-control" name="house_no">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Road No. :</strong></label>
                    <div class="col-7">
                        <input type="text" class="form-control" name="road_no">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Block No. :</strong></label>
                    <div class="col-7">
                        <input type="text" class="form-control" name="block_no">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Section:</strong></label>
                    <div class="col-7">
                        <input type="text" class="form-control" name="section">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Floor No. :</strong></label>
                    <div class="col-7">
                        <input type="text" class="form-control" name="floor_no">
                    </div>
                </div>

                <br>
                <label><strong>Rent Details</strong></label>
                <br>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Rent:</strong></label>
                    <b class="col-1"><i> Tk. </i></b>
                    <div class="col-6">
                        <input type="text" class="form-control" name="rent">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="inclusive" name="inclusive" value="yes">
                            <label class="form-check-label">All Inclusive</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Water Bill:</strong></label>
                    <b class="col-1"><i> Tk. </i></b>
                    <div class="col-6">
                        <input type="text" class="form-control" name="water_bill" id="water">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Electricity Bill:</strong></label>
                    <b class="col-1"><i> Tk. </i></b>
                    <div class="col-6">
                        <input type="text" class="form-control" name="electricity_bill" id="electricity">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Gas Bill:</strong></label>
                    <b class="col-1"><i> Tk. </i></b>
                    <div class="col-6">
                        <input type="text" class="form-control" name="gas_bill" id="gas">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Internet Bill:</strong></label>
                    <b class="col-1"><i> Tk. </i></b>
                    <div class="col-6">
                        <input type="text" class="form-control" name="internet_bill" id="internet">
                    </div>
                </div>

                <br>
                
                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Upload Images</strong></label>
                    <div class="col-7">
                        <input type="file" name="adimg[]" class="form-control-file" multiple="multiple" accept=".jpg, .jpeg">
                    </div>
                </div>

                <br>

                <div class="form-group row">
                    <label class="col-5 col-form-label"><strong>Additional Comments:</strong></label>
                    <div class="col-7">
                    <textarea name = "description" cols = "45" rows = "5" class="form-control"> </textarea>
                    </div>
                </div>              
            </form>
        </div>

        <button class="btn btn-block btn-dark text-white" form="adpost" type="submit" name="postad-submit">Post</button>

        <br>
        
    </div>

    <br><br><br>

</body>

</html>