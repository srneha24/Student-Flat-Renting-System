<?php

if (isset($_POST['addesc-submit'])) {

    require "Database Connection.Inc.php";

    session_start();

    $current_ad_no = $_POST["adchoice"];

    $query = "SELECT ad.address_id, ad.rent_id, user_id, location, seats, gender_pref, description, post_date, house_no, road_no, block_no, section, floor_no, rent, water_bill, electricity_bill, gas_bill, internet_bill FROM ad, address, rent WHERE ad_no = ? AND ad.address_id = address.address_id AND ad.rent_id = rent.rent_id ";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("Location: {$_SERVER["HTTP_REFERER"]}?error=sqlerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $current_ad_no);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION["address_id"] = $row["address_id"];
        $_SESSION["rent_id"] = $row["rent_id"];
        $_SESSION["uploader_id"] = $row["user_id"];
        $_SESSION["location"] = $row["location"];
        $_SESSION["seats"] = $row["seats"];
        $_SESSION["gender_pref"] =$row["gender_pref"];
        $_SESSION["description"] = $row["description"];
        $_SESSION["house_no"] = $row["house_no"];
        $_SESSION["road_no"] = $row["road_no"];
        $_SESSION["block_no"] = $row["block_no"];
        $_SESSION["section"] = $row["section"];
        $_SESSION["floor_no"] = $row["floor_no"];
        $_SESSION["rent"] = $row["rent"];
        $_SESSION["water_bill"] = $row["water_bill"];
        $_SESSION["electricity_bill"] = $row["electricity_bill"];
        $_SESSION["gas_bill"] = $row["gas_bill"];
        $_SESSION["internet_bill"] = $row["internet_bill"];

        $date_format = date("F j, Y", strtotime($row["post_date"]));
        $_SESSION["post_date"] = $date_format;

        $query = "SELECT user_name FROM user WHERE user_id = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: {$_SERVER["HTTP_REFERER"]}?error=sqlerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $row["user_id"]);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if ($r = mysqli_fetch_assoc($res)) {
            $_SESSION["uploader_name"] = $r["user_name"];
        }
    }

    header("Location: ../Ad Description.php?Ad=".$current_ad_no);
    
    
    exit();

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}