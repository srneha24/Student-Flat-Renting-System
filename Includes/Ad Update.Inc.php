<?php

session_start();

if (isset($_POST['adinfo-submit'])) {
    require "Database Connection.Inc.php";

    $new_heading = $_POST["heading"];
    $new_location = $_POST["location"];
    $new_seats = $_POST["seats"];
    $new_gender_pref = $_POST["gender_pref"];
    $new_house_no = $_POST["house_no"];
    $new_road_no = $_POST["road_no"];
    $new_block_no = $_POST["block_no"];
    $new_section = $_POST["section"];
    $new_floor_no = $_POST["floor_no"];
    $new_rent = $_POST["rent"];
    $new_water_bill = $_POST["water_bill"];
    $new_electricity_bill = $_POST["electricity_bill"];
    $new_gas_bill = $_POST["gas_bill"];
    $new_internet_bill = $_POST["internet_bill"];
    $new_description = $_POST["description"];
    $address_id = $_SESSION["address_id"];
    $rent_id = $_SESSION["rent_id"];
    $ad_no = $_SESSION["ad_no"];

    if (empty($new_heading) || empty($new_rent)) {
        $_SESSION["outmessage"] = "error=emptyfields";

        header("Location: ../Ad Update.php?".$_SESSION["outmessage"]);
        exit();
    }

    else {
        if (empty($new_house_no)) {
            $new_house_no = "";
        }

        if (empty($new_road_no)) {
            $new_road_no = "";
        }

        if (empty($new_block_no)) {
            $new_block_no = "";
        }

        if (empty($new_section)) {
            $new_section = "";
        }

        if (empty($new_floor_no)) {
            $new_floor_no = "";
        }

        if (empty($new_water_bill)) {
            $new_water_bill = "";
        }

        if (empty($new_electricity_bill)) {
            $new_electricity_bill = "";
        }

        if (empty($new_gas_bill)) {
            $new_gas_bill = "";
        }

        if (empty($new_internet_bill)) {
            $new_internet_bill = "";
        }

        $query = "SET foreign_key_checks = 0";
        mysqli_query($conn, $query);

        $query = "UPDATE `address` SET `house_no`='$new_house_no',`road_no`='$new_road_no',`block_no`='$new_block_no',`section`='$new_section',`floor_no`='$new_floor_no' WHERE address_id = '$address_id'";
        mysqli_query($conn, $query);

        $query = "UPDATE `rent` SET `rent`='$new_rent',`water_bill`='$new_water_bill',`electricity_bill`='$new_electricity_bill',`gas_bill`='$new_gas_bill',`internet_bill`='$new_internet_bill' WHERE rent_id = '$rent_id'";
        mysqli_query($conn, $query);

        $query = "UPDATE `ad` SET `heading`='$new_heading',`location`='$new_location',`seats`='$new_seats',`gender_pref`='$new_gender_pref',`description`='$new_description' WHERE ad_no = $ad_no";
        mysqli_query($conn, $query);

        $query = "SET foreign_key_checks = 1";
        mysqli_query($conn, $query);

        $_SESSION["outmessage"] = "ad=detailsupdated";
        $_SESSION["adupdated"] = 1;
        include_once "User Ads.Inc.php";
    }
}

elseif (isset($_POST['addelete-submit'])) {
    require "Database Connection.Inc.php";

    $ad_no = $_POST['addelete'];
    $address_id = "";
    $rent_id = "";

    $query = "SELECT address_id, rent_id FROM ad WHERE ad_no = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("Location: {$_SERVER["HTTP_REFERER"]}?error=sqlerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $ad_no);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $address_id = $row["address_id"];
        $rent_id = $row["rent_id"];
    }

    $query = "SET foreign_key_checks = 0";
    mysqli_query($conn, $query);    

    $query = "DELETE FROM `address` WHERE address_id = '$address_id'";
    mysqli_query($conn, $query);

    $query = "DELETE FROM `rent` WHERE rent_id = '$rent_id'";
    mysqli_query($conn, $query);

    $query = "DELETE FROM `ad`  WHERE ad_no = $ad_no";
    mysqli_query($conn, $query);

    $query = "SET foreign_key_checks = 1";
    mysqli_query($conn, $query);

    $images = array();
    $dir = "../Images/Ad Photos/".$ad_no."/";
    $files = glob($dir . "*");
    if ($files){
        foreach ($files as $filename) {
            $images[] = $filename;
        }

        for ($i=0; $i<count($images); $i++) {
            $path = $images[$i];
            unlink($path);
        }
    }

    rmdir($dir);

    $_SESSION["outmessage"] = "ad=deleted";
    $_SESSION["adupdated"] = 1;
    include_once "User Ads.Inc.php";
}

elseif (isset($_POST['adedit-submit'])) {
    require "Database Connection.Inc.php";

    session_start();

    $_SESSION["ad_no"] = $_POST['adeditchoice'];

    $query = "SELECT ad.rent_id, heading, ad.address_id, location, seats, gender_pref, description, post_date, house_no, road_no, block_no, section, floor_no, rent, water_bill, electricity_bill, gas_bill, internet_bill FROM ad, rent, address WHERE ad_no = ? AND ad.rent_id = rent.rent_id AND ad.address_id = address.address_id";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("Location: ../User Ads.php?error=sqlerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $_SESSION["ad_no"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $_SESSION["total_result"] = mysqli_num_rows($result);

    if ($_SESSION["total_result"] > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["seats"] = $row["seats"];
            $_SESSION["rent"] = $row["rent"];
            $_SESSION["heading"] = $row["heading"];
            $_SESSION["location"] = $row["location"];
            $_SESSION["gender_pref"] = $row["gender_pref"];
            $_SESSION["description"] = $row["description"];
            $_SESSION["house_no"] = $row["house_no"];
            $_SESSION["road_no"] = $row["road_no"];
            $_SESSION["block_no"] = $row["block_no"];
            $_SESSION["section"] = $row["section"];
            $_SESSION["floor_no"] = $row["floor_no"];
            $_SESSION["water_bill"] = $row["water_bill"];
            $_SESSION["gas_bill"] = $row["gas_bill"];
            $_SESSION["electricity_bill"] = $row["electricity_bill"];
            $_SESSION["internet_bill"] = $row["internet_bill"];
            $_SESSION["address_id"] = $row["address_id"];
            $_SESSION["rent_id"] = $row["rent_id"];

            $date_format = date("F j, Y", strtotime($row["post_date"]));
            $_SESSION["post_date"] = $date_format;
        }
        
        header("Location: ../Ad Update.php?Ad=".$_SESSION["ad_no"]);
        
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}