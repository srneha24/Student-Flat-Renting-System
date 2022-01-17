<?php

if (isset($_POST['signup-submit'])) {

    require "Database Connection.Inc.php";

    session_start();

    $username = $_POST["username"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $conpwd = $_POST["conpwd"];
    $district = $_POST["district"];
    $institute = $_POST["institute"];

    if (empty($username) || empty($phone) || empty($email) || empty($pwd) || empty($conpwd)) {
        $_SESSION["outmessage"] = "error=emptyfields";

        header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);
        exit();
    }

    elseif ($pwd !== $conpwd) { 
        $_SESSION["outmessage"] = "error=PasswordMismatch";

        header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);
        exit();
    }

    else {
        $query = "SELECT phone, email FROM user WHERE phone = ? OR email = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../Sign Up.php?error=sqlerror");
            exit();
        }

        else {
            mysqli_stmt_bind_param($stmt, "ss", $phone, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultRows = mysqli_stmt_num_rows($stmt);

            if ($resultRows > 0) {
                $_SESSION["outmessage"] = "error=Email/Phone-Exists";
            
                header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);

                exit();
            }

            else {
                $query = "SELECT MAX(user_id) FROM user";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $query)) {
                    header("Location: ../Sign Up.php?error=sqlerror");
                    exit();
                }

                else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION["new_user_id"] = $row['MAX(user_id)'];
                    }
                }

                $_SESSION["new_user_id"] = $_SESSION["new_user_id"] + 1;

                $query = "INSERT INTO `user`(`user_id`, `user_name`, `user_pwd`, `phone`, `email`, gender, `district`, `institute`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $query)) {
                    header("Location: ../Sign Up.php?error=sqlerror");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "ssssssss", $_SESSION["new_user_id"], $username, $pwd, $phone, $email, $gender, $district, $institute);
                mysqli_stmt_execute($stmt);                

                $_SESSION["outmessage"] = "signup=success";
                header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);
                
                
                exit();
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else {
    header("Location: ../Sign Up.php");
    exit();
}