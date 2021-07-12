<?php
    require_once './config/connect_db.php';

    $ref = $_GET["ref"];

    $sql = "SELECT * FROM patient_info WHERE token = '$ref' LIMIT 1";

    $result = $conn->query($sql);

    $max_day = 0;
    $day = 1;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $max_day = $row["day_interval"] + 1;
    } else {
        echo "0 results";exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - <?php echo $row["name"]; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/circle.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <style>
        .nav-center{
            margin-left: 40%!important;
        }
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #0df563;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #0df563;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed" onload="getCss()">
<div class="wrapper select-dish">
    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav special-navbar-nav">
            <li class="nav-center"><h4 class="ml-5 nav-item-special">Welcome <?php echo $row["name"]; ?></h4></li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="custom-content-wrapper" id="set_height">
        <!-- Main content -->
        <section class="content pt-3">
            <div class="container custom-container">
                <form method="GET" action="./select-dish.php" id="nutrition_form">
                    <input type="hidden" name="ref" value="<?php echo $ref;?>">
                    <input type="hidden" name="day" value="<?php echo $day;?>">
                    <input type="hidden" name="max_day" value="<?php echo $max_day;?>">

                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 offset-4">
                                    <p class="text-center">What is your nutrition like?</p>

                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <p>Lactose</p>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="switch">
                                                <input type="checkbox" name="nutrition[]" value="Lactose">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <p>Gluten</p>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="switch">
                                                <input type="checkbox" name="nutrition[]" value="Gluten">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <p>Vegetarian</p>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="switch">
                                                <input type="checkbox" name="nutrition[]" value="Vegetarian">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" value="submit" id="submit_nutrition_form" style="display: none;">
                            <div class="w-100 text-center pt-5">
                                <button type="button" id="submit_next" class="btn btn-outline-success pl-5 pr-5">Next</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer ml-0">
        <strong>Copyright &copy; 2021 <a href="#">mydomain.co</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="plugins/notify/bootstrap-notify.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<script>

    function getCss(){
        var x = parseInt(screen.height) - 200;
        document.getElementById("set_height").style.minHeight = x+'px!important;';
    }

    function checkValidity(){
        if(!$('#meal_form')[0].checkValidity())
            return false;
        else
            return  true;
    }

    $(document).ready(function (){

        $('#submit_next').on('click', function(e) {
            let checked = false;
            $('input[type=checkbox]').each(function () {
                if($(this).prop("checked") === true)
                    checked = true;
            });

            if(checked){
                $("#submit_nutrition_form").click();
            }else{
                $.notify({
                    // options
                    message: 'Please select the option first'
                },{
                    // settings
                    type: 'danger'
                });
            }
        });
    })
</script>

</body>
</html>
