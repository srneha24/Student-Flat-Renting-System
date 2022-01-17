<?php

if (isset($_POST['search-submit'])) {

    require "Database Connection.Inc.php";

    session_start();

    $_SESSION["location_searched"] = $_POST["location"];
    $_SESSION["seats_searched"] = $_POST["seats"];

    if ($_SESSION["location_searched"] === "choose") {
        $_SESSION["outmessage"] = "error=nolocation";

        header("Location: {$_SERVER["HTTP_REFERER"]}?".$_SESSION["outmessage"]);
        exit();
    }

    else {
        $query = "SELECT ad_no, ad.rent_id, heading, user_id, seats, post_date, rent FROM ad, rent WHERE location = ? AND seats >= ? AND ad.rent_id = rent.rent_id ORDER BY post_date DESC ";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: {$_SERVER["HTTP_REFERER"]}?error=sqlerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $_SESSION["location_searched"], $_SESSION["seats_searched"]);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $_SESSION["total_result"] = mysqli_num_rows($result);

        if ($_SESSION["total_result"] > 0) {
            $ad_no = array();
            $rent_id = array();
            $user_id = array();
            $user_name = array();
            $seats = array();
            $post_date = array();
            $rent = array();
            $heading = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $ad_no[]= $row["ad_no"];
                $rent_id[] = $row["rent_id"];
                $user_id[] = $row["user_id"];
                $seats[] = $row["seats"];
                $rent[] = $row["rent"];
                $heading[] = $row["heading"];

                $date_format = date("F j, Y", strtotime($row["post_date"]));
                $post_date[] = $date_format;

                $query = "SELECT user_name FROM user WHERE user_id = ?";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $query)) {
                    header("Location: {$_SERVER["HTTP_REFERER"]}?error=sqlerror");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "s", $row["user_id"]);
                mysqli_stmt_execute($stmt);
                $res = mysqli_stmt_get_result($stmt);
                $_SESSION["tr"] = mysqli_num_rows($res);

                if ($_SESSION["tr"] > 0) {
                    while ($r = mysqli_fetch_assoc($res)) {
                        $user_name[] = $r["user_name"];
                    }
                }
            }

            $_SESSION["ad_no"] = $ad_no;
            $_SESSION["rent_id"] = $rent_id;
            $_SESSION["uploader_id"] = $user_id;
            $_SESSION["uploader_name"] = $user_name;
            $_SESSION["seats"] = $seats;
            $_SESSION["post_date"] = $post_date;
            $_SESSION["rent"] = $rent;
            $_SESSION["heading"] = $heading;

            header("Location: ../Search Results.php");
            
            
            exit();
        }

        else {
            $_SESSION["total_result"] = 0;

            header("Location: ../Search Results.php");
            exit();
        }

    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}