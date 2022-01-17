<?php

if (isset($_POST['uploaderprofile-submit'])) {

    require "Database Connection.Inc.php";

    session_start();

    if (isset($_SESSION['user_id'])) {
        $uploader = $_SESSION["uploader_name"];

        $query = "SELECT user_name, phone, email, gender, district, institute FROM user WHERE user_name = ? AND user_id = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: {$_SERVER["HTTP_REFERER"]}?error=sqlerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $_SESSION["uploader_name"], $_SESSION["uploader_id"]);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["uploader_phone"] = $row["phone"];
            $_SESSION["uploader_email"] = $row["email"];
            $_SESSION["uploader_gender"] = $row["gender"];
            $_SESSION["uploader_district"] = $row["district"];
            $_SESSION["uploader_institute"] = $row["institute"];
        }

        header("Location: ../Uploader Profile.php?Uploader=".$uploader);
        
        
        exit();

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

    else {
        $_SESSION["outmessage"] = "login=false";
        header("Location: ../Ad Description.php?Ad=".$_SESSION["current_ad_no"]);
        exit();
    }
}