<?php
    $servername = "localhost";
    $username = "u668699538_patient_dish";
    $password = "3]NL]sZtjm";
    $database = "u668699538_patient_dish";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }