<?php
    require_once './config/connect_db.php';
    $redirectTo = "";

    function url(){
        if(isset($_SERVER['HTTPS'])){
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        }
        else{
            $protocol = 'http';
        }
        return $protocol . "://" . $_SERVER['HTTP_HOST'];
    }


    $token  = isset($_POST['ref']) ? $_POST['ref'] : "";

    if(isset($_REQUEST) && ($_SERVER['REQUEST_METHOD'] === 'POST')){
        if(isset($_POST) && !empty($_POST)){

            $sql = "SELECT * FROM patient_info WHERE token = '$token' LIMIT 1";

            $result = $conn->query($sql);
            $max_day = 0;

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $patientId = $row["id"];
                $max_day = $row["day_interval"] + 1;
                $day    = $_POST['day'];
                $breakfast   = $_POST['breakfast'];
                $lunch   = $_POST['lunch'];
                $dinner   = $_POST['dinner'];
                $soup   = $_POST['soup_quantity'];


                $sql = "INSERT INTO meal_submitted (patient_id, day_no, breakfast, lunch, dinner, soup) VALUES ($patientId, $day, $breakfast, $lunch,  $dinner, $soup)";

                if ($conn->query($sql) === TRUE) {
                    if($day >= $max_day){
                        $redirectTo = url()."/thanks.php?ref=$token";
                        header("location: $redirectTo");
                    }
                    else{
                        $day = $day + 1;
                        $redirectTo = url()."/select-dish.php?ref=$token&day=$day&max_day=$max_day";
                        header("location: $redirectTo");
                    }

                }
                else {
                    echo $error = 'Something went wrong! Try again later.';exit;
                }
            } else {
                $redirectTo = url()."/welcome.php?ref=$token";
                header("$redirectTo");
            }
        }else{
            $redirectTo = url()."/welcome.php?ref=$token";
            header("$redirectTo");
        }
    }else{
        //redirect to
        $redirectTo = url()."/welcome.php?ref=$token";
        header("$redirectTo");
    }