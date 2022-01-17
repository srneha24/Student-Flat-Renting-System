<?php

if (isset($_POST['login-submit'])) {

    require "Database Connection.Inc.php";

    session_start();

    $useridemail = $_POST["useridemail"];
    $pwd = $_POST["pwd"];

    if (empty($useridemail) || empty($pwd)) {
        $_SESSION["outmessage"] = "error=emptyfields";

        header("Location: ../Log In.php?".$_SESSION["outmessage"]);
        exit();
    }

    else {
        $query = "SELECT * FROM user WHERE (user_id = ? OR email = ?) AND user_pwd = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../Log In.php?error=sqlerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sss", $useridemail, $useridemail, $pwd);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["user"] = $row["user_name"];
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["phone"] = $row["phone"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["gender"] = $row["gender"];
            $_SESSION["district"] = $row["district"];
            $_SESSION["institute"] = $row["institute"];

            $_SESSION["outmessage"] = "login=success";
            header("Location: ../Homepage.php?".$_SESSION["outmessage"]);
            
            
            exit();
        }

        else {
            $_SESSION["outmessage"] = "error=incorrectentry";

            header("Location: ../Log In.php?".$_SESSION["outmessage"]);
            exit();
        }

    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else {
    header("Location: ../Log In.php");
    exit();
}