<?php

if (isset($_POST['postad-submit'])) {

    require "Database Connection.Inc.php";

    session_start();

    if (isset($_SESSION['user_id'])) {
        $heading = $_POST["heading"];
        $location = $_POST["location"];
        $seats = $_POST["seats"];
        $gender_pref = $_POST["gender_pref"];
        $house_no = $_POST["house_no"];
        $road_no = $_POST["road_no"];
        $block_no = $_POST["block_no"];
        $section = $_POST["section"];
        $floor_no = $_POST["floor_no"];
        $rent = $_POST["rent"];
        $water_bill = $_POST["water_bill"];
        $electricity_bill = $_POST["electricity_bill"];
        $gas_bill = $_POST["gas_bill"];
        $internet_bill = $_POST["internet_bill"];
        $description = $_POST["description"];

        if (empty($heading) || empty($rent)) {
            $_SESSION["outmessage"] = "error=emptyfields";

            header("Location: ../Ad Post.php?".$_SESSION["outmessage"]);
            exit();
        }

        elseif ($location === "choose") { 
            $_SESSION["outmessage"] = "error=nolocation";

            header("Location: ../Ad Post.php?".$_SESSION["outmessage"]);
            exit();
        }

        else {
            if (empty($house_no)) {
                $house_no = "";
            }

            if (empty($road_no)) {
                $road_no = "";
            }

            if (empty($block_no)) {
                $block_no = "";
            }

            if (empty($section)) {
                $section = "";
            }

            if (empty($floor_no)) {
                $floor_no = "";
            }

            if (empty($water_bill)) {
                $water_bill = "";
            }

            if (empty($electricity_bill)) {
                $electricity_bill = "";
            }

            if (empty($gas_bill)) {
                $gas_bill = "";
            }

            if (empty($internet_bill)) {
                $internet_bill = "";
            }
            
            $query = "SELECT MAX(ad_no) FROM ad";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $query)) {
                header("Location: ../Ad Post.php?error=sqlerror");
                exit();
            }

            else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION["new_ad_no"] = $row['MAX(ad_no)'];
                }
            }

            $_SESSION["new_ad_no"] = $_SESSION["new_ad_no"] + 1;
            $_SESSION["new_address_id"] = "A".$_SESSION["user_id"].strval($_SESSION["new_ad_no"]);
            $_SESSION["new_rent_id"] = "R".$_SESSION["user_id"].strval($_SESSION["new_ad_no"]);        

            $query = "INSERT INTO `address`(`address_id`, `house_no`, `road_no`, `block_no`, `section`, `floor_no`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $query)) {
                header("Location: ../Ad Post.php?error=sqlerror");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "ssssss", $_SESSION["new_address_id"], $house_no, $road_no, $block_no, $section, $floor_no);
            mysqli_stmt_execute($stmt);
            
            $query = "INSERT INTO `rent`(`rent_id`, `rent`, `water_bill`, `electricity_bill`, `gas_bill`, `internet_bill`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $query)) {
                header("Location: ../Ad Post.php?error=sqlerror");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "ssssss", $_SESSION["new_rent_id"], $rent, $water_bill, $electricity_bill, $gas_bill, $internet_bill);
            mysqli_stmt_execute($stmt);

            $query = "INSERT INTO `ad`(`ad_no`, `heading`, `user_id`, `address_id`, `location`, `seats`, `gender_pref`, `rent_id`, `description`, `post_date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $query)) {
                header("Location: ../Ad Post.php?error=sqlerror");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "ssssssssss", $_SESSION["new_ad_no"], $heading, $_SESSION["user_id"], $_SESSION["new_address_id"], $location, $seats, $gender_pref, $_SESSION["new_rent_id"], $description, date("Y-m-d"));
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        $newdir = "../Images/Ad Photos/".$_SESSION["new_ad_no"];
        mkdir($newdir);

        $files = array_filter($_FILES['adimg']);
        $total_files = count($_FILES['adimg']['name']);

        $exts = array('jpg', 'jpeg');

        for ($i=0; $i<$total_files; $i++) {
            $fileName = $_FILES['adimg']['name'][$i];
            $fileTmpName = $_FILES['adimg']['tmp_name'][$i];
            $fileSize = $_FILES['adimg']['size'][$i];
            $fileError = $_FILES['adimg']['error'][$i];
            $fileType = $_FILES['adimg']['type'][$i];

            $fileExt = explode(".", $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $j = $i + 1;

            if (in_array($fileActualExt, $exts)) {
                if ($fileError === 0) {
                    $fileNameNew = "Photo ".$j.".".$fileActualExt;

                    $fileDestination = $newdir."/".$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);                        

                    $_SESSION["outmessage"] = "adpost=success";
                    header("Location: ../Ad Post.php?".$_SESSION["outmessage"]);
                }

                else {
                    $_SESSION["outmessage"] = "error=uploaderror";
                    header("Location: ../Ad Post.php?".$_SESSION["outmessage"]);
                    exit();
                }
            }

            else{
                $_SESSION["outmessage"] = "error=wronguploadformat";
                header("Location: ../Ad Post.php?".$_SESSION["outmessage"]);
                exit();
            }
        }    
        
        exit();
    }

    else {
        
        $_SESSION["outmessage"] = "login=false";
        header("Location: ../Ad Post.php?".$_SESSION["outmessage"]);
        exit();
    }
}