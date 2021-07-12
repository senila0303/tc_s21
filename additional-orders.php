<?php
    require_once './config/connect_db.php';
    $redirectTo = "http://sureal.co/index.php";

    if(isset($_REQUEST) && ($_SERVER['REQUEST_METHOD'] === 'POST')){
        if(isset($_POST) && !empty($_POST)){
            $meal_date = date("Y-m-d", strtotime("+1 day"));
            $breakfast   = $_POST['breakfast'];
            $lunch   = $_POST['lunch'];
            $dinner   = $_POST['dinner'];
            $soup   = $_POST['soup_quantity'];


            $sql = "INSERT INTO `additional_meal` (`meal_date`, `breakfast`, `lunch`, `dinner`, `soup`) VALUES ('$meal_date', $breakfast, $lunch,  $dinner, $soup)";

            if ($conn->query($sql) === TRUE) {
                header("Location: $redirectTo");
            }
            else {
                echo $error = 'Something went wrong! Try again later.';exit;
            }
        }else{
            header("Location: $redirectTo");
        }
    }else{
        header("Location: $redirectTo");
    }