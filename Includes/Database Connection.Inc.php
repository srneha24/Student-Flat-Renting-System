<?php

$dbServername = "localhost";
$dbUser = "root";
$dbPwd = "";
$dbName = "student_flat_renting_system";

$conn = mysqli_connect($dbServername, $dbUser, $dbPwd, $dbName);

if (!$conn) {
    die("Database Connection Failed: ".mysqli_connect_error());
}