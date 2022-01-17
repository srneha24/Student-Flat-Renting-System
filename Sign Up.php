<!DOCTYPE html>

<html>

<head>

    <title> Sign Up - Student Flat Renting System </title>

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
        <h1 class="bg-white text-primary text-center">SIGN UP</h1>
    </div>

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "error=PasswordMismatch") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Passwords Do Not Match</b></p>
                
                </div>';

            unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=Email/Phone-Exists") {
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

        elseif ($popup === "signup=success") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Sign Up Successful. Your User ID is '. $_SESSION["new_user_id"] .'</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }
    }
    
    ?>

    <div class="container">
        <div class="center bg-white m-5 p-5">
            <form role="form" action="Includes/Sign Up.Inc.php" method="post">
                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Name:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="username" maxlength = "50">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Gender:</strong></label>
                    <div class="col-9">
                        <select class="pl-3 pr-3" name="gender">
                            <option value="Female"> Female </option>
                            <option value="Male"> Male </option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Phone Number:</strong></label>
                    <div class="col-9">
                        <input type="tel" class="form-control" name="phone" pattern="[0-9]{11}" placeholder="01---------">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Email Adresss:</strong></label>
                    <div class="col-9">
                        <input type="email" class="form-control" name="email" placeholder="user@email.com">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Password:</strong></label>
                    <div class="col-9">
                        <input type="password" class="form-control" name="pwd">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Confirm Password:</strong></label>
                    <div class="col-9">
                        <input type="password" class="form-control" name="conpwd">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>District:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="district" maxlength = "30">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Institute:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="institute">
                    </div>
                </div>

                <br><br>

                <button class="btn btn-block btn-primary" type="submit" name="signup-submit">Sign Up</button>
            </form>
        </div>
    </div>

</body>

</html>