<?php

if (isset($_POST['userinfo-submit'])) {

    require "Database Connection.Inc.php";

    session_start();

    $new_username = $_POST["username"];
    $new_gender = $_POST["gender"];
    $new_phone = $_POST["phone"];
    $new_email = $_POST["email"];
    $new_district = $_POST["district"];
    $new_institute = $_POST["institute"];
    $user_id = $_SESSION["user_id"];

    if (empty($new_username) || empty($new_phone) || empty($new_email)) {
        $_SESSION["outmessage"] = "error=emptyfields";

        header("Location: ../User Profile.php?".$_SESSION["outmessage"]);
        exit();
    }

    else {
        $query = "SELECT phone, email FROM user WHERE (phone = ? OR email = ?) AND user_id != ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../User Profile.php?error=sqlerror");
            exit();
        }

        else {
            mysqli_stmt_bind_param($stmt, "sss", $new_phone, $new_email, $user_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultRows = mysqli_stmt_num_rows($stmt);

            if ($resultRows > 0) {
                $_SESSION["outmessage"] = "error=Email/Phone-Exists";
            
                header("Location: ../User Profile.php?".$_SESSION["outmessage"]);

                exit();
            }

            else {
                $query = "UPDATE `user` SET `user_name`='$new_username',`phone`='$new_phone',`email`='$new_email',`gender`='$new_gender',`district`='$new_district',`institute`='$new_institute' WHERE user_id = '$user_id'";
                mysqli_query($conn, $query);
                
                $_SESSION["user"] = $new_username;
                $_SESSION["phone"] = $new_phone;
                $_SESSION["email"] = $new_email;
                $_SESSION["gender"] = $new_gender;
                $_SESSION["district"] = $new_district;
                $_SESSION["institute"] = $new_institute;

                $_SESSION["outmessage"] = "user=infoupdated";
                header("Location: ../User Profile.php?".$_SESSION["outmessage"]);
                
                
                exit();
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

elseif (isset($_POST['dp-submit'])) {
    session_start();

    $dir = "../Images/Profile Photographs";

    $files = $_FILES['dpselect'];

    $exts = array('jpg', 'jpeg');

    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $fileSize = $files['size'];
    $fileError = $files['error'];
    $fileType = $files['type'];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if (in_array($fileActualExt, $exts)) {
        if ($fileError === 0) {
            $fileNameNew = $_SESSION["user_id"].".".$fileActualExt;

            $fileDestination = $dir."/".$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);                        

            $_SESSION["outmessage"] = "dpupload=success";
            header("Location: ../User Profile.php?".$_SESSION["outmessage"]);
        }

        else {
            $_SESSION["outmessage"] = "error=uploaderror";
            header("Location: ../User Profile.php?".$_SESSION["outmessage"]);
            exit();
        }
    }

    else{
        $_SESSION["outmessage"] = "error=wronguploadformat";
        header("Location: ../User Profile.php?".$$_SESSION["outmessage"]);
        exit();
    }
}

else {
    header("Location: ../User Profile.php");
    exit();
}