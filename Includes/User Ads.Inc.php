<?php

if (isset($_POST['userads-submit']) || isset($_SESSION["adupdated"])) {

    require "Database Connection.Inc.php";

    session_start();

    $query = "SELECT ad_no, ad.rent_id, heading, ad.user_id, ad.address_id, location, seats, gender_pref, description, post_date, house_no, road_no, block_no, section, floor_no, rent, water_bill, electricity_bill, gas_bill, internet_bill FROM ad, rent, user, address WHERE ad.user_id = ? AND ad.rent_id = rent.rent_id AND ad.user_id = user.user_id AND ad.address_id = address.address_id ORDER BY post_date DESC ";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("Location: ../User Ads.php?error=sqlerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $_SESSION["total_result"] = mysqli_num_rows($result);

    if ($_SESSION["total_result"] > 0) {
        $ad_no = array();
        $seats = array();
        $post_date = array();
        $rent = array();
        $heading = array();
        $location = array();
        $gender_pref = array();
        $description = array();
        $house_no = array();
        $road_no = array();
        $block_no = array();
        $section = array();
        $floor_no = array();
        $water_bill = array();
        $gas_bill = array();
        $electricity_bill = array();
        $internet_bill = array();
        $address_id = array();
        $rent_id = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $ad_no[]= $row["ad_no"];
            $seats[] = $row["seats"];
            $rent[] = $row["rent"];
            $heading[] = $row["heading"];
            $location[] = $row["location"];
            $gender_pref[] = $row["gender_pref"];
            $description[] = $row["description"];
            $house_no[] = $row["house_no"];
            $road_no[] = $row["road_no"];
            $block_no[] = $row["block_no"];
            $section[] = $row["section"];
            $floor_no[] = $row["floor_no"];
            $water_bill[] = $row["water_bill"];
            $gas_bill[] = $row["gas_bill"];
            $electricity_bill[] = $row["electricity_bill"];
            $internet_bill[] = $row["internet_bill"];
            $address_id[] = $row["address_id"];
            $rent_id[] = $row["rent_id"];

            $date_format = date("F j, Y", strtotime($row["post_date"]));
            $post_date[] = $date_format;
        }

        $_SESSION["ad_no"] = $ad_no;
        $_SESSION["seats"] = $seats;
        $_SESSION["post_date"] = $post_date;
        $_SESSION["rent"] = $rent;
        $_SESSION["heading"] = $heading;
        $_SESSION["location"] = $location;
        $_SESSION["gender_pref"] = $gender_pref;
        $_SESSION["description"] = $description;
        $_SESSION["house_no"] = $house_no;
        $_SESSION["road_no"] = $road_no;
        $_SESSION["block_no"] = $block_no;
        $_SESSION["section"] = $section;
        $_SESSION["floor_no"] = $floor_no;
        $_SESSION["water_bill"] = $water_bill;
        $_SESSION["gas_bill"] = $gas_bill;
        $_SESSION["electricity_bill"] = $electricity_bill;
        $_SESSION["internet_bill"] = $internet_bill;
        $_SESSION["address_id"] = $address_id;
        $_SESSION["rent_id"] = $rent_id;

        header("Location: ../User Ads.php");
        
        
        exit();
    }

    else {
        $_SESSION["total_result"] = 0;

        header("Location: ../User Ads.php");
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}