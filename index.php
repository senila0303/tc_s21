<?php
    require_once './config/connect_db.php';

    $days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

    $currentDate = date('Y-m-d');
    $sql = "SELECT * FROM patient_info WHERE discharge_date  >= '$currentDate'";

    $patients = $conn->query($sql);

    $today =  date('Y-m-d');
    $tomorrow =  date("Y-m-d", strtotime("+1 day"));

    $sql = "SELECT count(id) as additional_order FROM additional_meal WHERE meal_date = '$today'";
    $meals = $conn->query($sql);
    $meal_submitted = $meals->fetch_assoc();
    $additionalOrdersToday = $meal_submitted["additional_order"];

    $sql = "SELECT count(id) as additional_order FROM additional_meal WHERE meal_date = '$tomorrow'";
    $meals = $conn->query($sql);
    $meal_submitted = $meals->fetch_assoc();
    $additionalOrdersTomorrow = $meal_submitted["additional_order"];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home Page</title>

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
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>

                    <li><h4 class="mr-3 nav-item-special">Station 1</h4></li>

                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="add-patient.php" class="btn btn-default"><i class="fa fa-plus"></i> Add new patient</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- SEARCH FORM -->
                    <form class="form-inline mr-5">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul class="navbar-nav">
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="btn btn-default mr-3"><i class="fa fa-download"></i> Download</a>
                        </li>

                        <li class="nav-item d-none d-sm-inline-block active">
                            <a href="#" class="btn btn-primary mr-1">English</a>
                        </li>

                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="btn btn-default mr-3">Deutsch</a>
                        </li>
                    </ul>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar elevation-1">
                <!-- Brand Logo -->
                <a href="#" class="brand-link">
                    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Brand</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="./" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Station 1</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-color: #e0e6ff">
                <!-- Main content -->
                <section class="content pt-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="d-inline-flex pb-2 pl-2">
                                <h1 class="title">Today</h1>
                                <div class="date-today">
                                    <i class="sign ml-50">&lt;</i> &nbsp; <button class="btn btn-default">
                                        <i class="fa fa-calendar-day custom-calender"></i><?php echo date('d. F. Y');?>
                                    </button>&nbsp;<i class="sign" style="padding-left: 2px;">&gt;</i>
                                </div>
                            </div>
                        </div>

                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-white">
                                    <div class="inner custom-height">
                                        <p>Patients on the ward</p>
                                        <div class="c100 p25">
                                            <span>12/28</span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-white">
                                    <div class="inner custom-height">
                                        <p>Number of ordered menus</p>
                                        <h3>12</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-white">
                                    <div class="inner custom-height">
                                        <p>Additional Orders</p>
                                        <h3>1</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                        <!-- Main row -->
                        <div class="row">

                        </div>
                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->

                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-5 col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-white">
                                            <div class="inner">
                                                <p>Patient Check-in</p>
                                                <h3>3</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-white">
                                            <div class="inner">
                                                <p>Patient Check-out</p>
                                                <h3>2</h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                </section>

                <section class="content pt-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="d-inline-flex pb-2 pl-2">
                                <h1 class="title">Tomorrow</h1>
                                <div class="date-today">
                                    <i class="sign ml-50">&lt;</i> &nbsp; <button class="btn btn-default">
                                        <i class="fa fa-calendar-day custom-calender"></i><?php echo date("d.F.Y", strtotime("+1 day"));?>
                                    </button>&nbsp;<i class="sign" style="padding-right: 3px;">&gt;</i>
                                </div>
                                <p class="custom-red-text">The order will be transmitted in 01 hours 51 minutes and 30 seconds</p>
                            </div>
                        </div>

                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-white">
                                    <div class="inner custom-height">
                                        <p>Patients on the ward</p>
                                        <div class="c100 p25">
                                            <span>15/28</span>
                                            <div class="slice">
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-white">
                                    <div class="inner custom-height">
                                        <p class="text-danger">Patients with incomplete orders</p>
                                        <h3>5</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-white">
                                    <div class="inner custom-height">
                                        <p>Additional Orders</p>
                                        <h3><?php echo $additionalOrdersTomorrow;?></h3>
                                        <a href="./additional-dish.php">add more orders &gt;</a>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>

                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-5 col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-white">
                                            <div class="inner">
                                                <p>Patient Check-in</p>
                                                <h3>0</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-white">
                                            <div class="inner">
                                                <p>Patient Check-out</p>
                                                <h3>2</h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                </section>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <h1 class="title pl-2">Overview</h1>
                        </div>

                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="small-box bg-white p-3">
                                    <h2 class="title">Missing food orders</h2>

                                    <table class="table table-borderless table-half">
                                        <tr>
                                            <td class="w-50">
                                                <div class="short-name">
                                                    <p>MW</p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="patient-info">
                                                    <p class="name">Mitchell Williamson</p>
                                                    <p class="info">Room 2A</p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w-50">
                                                <div class="short-name">
                                                    <p>SC</p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="patient-info">
                                                    <p class="name">Sam Conner</p>
                                                    <p class="info">New admission(5/5 orders missing)</p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w-50">
                                                <div class="short-name">
                                                    <p>CC</p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="patient-info">
                                                    <p class="name">Christina Castro</p>
                                                    <p class="info">Room 3B(2/2 orders missing)</p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w-50">
                                                <div class="short-name">
                                                    <p>HC</p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="patient-info">
                                                    <p class="name">Harriett Clark</p>
                                                    <p class="info">New admission(3/3 orders missing)</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                </section>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <h1 class="title pl-2">Upcoming discharge of patients</h1>
                        </div>

                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-12">
                                <div class="small-box bg-white p-3">
                                    <p class="title">Change the Date, in case a patient stays longer</p>

                                    <table class="table table-borderless table-half">
                                        <tr>
                                            <td>
                                                <button class="btn btn-default">
                                                    <i class="fa fa-calendar-day custom-calender"></i><?php echo date('d. F. Y');?>
                                                </button>
                                            </td>

                                            <td>
                                                <div class="patient-info">
                                                    <p class="name">Mitchell Williamson</p>
                                                    <p class="info">Room 2A</p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="link">
                                                    <a href="#">change &nbsp; &gt;</a>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <button class="btn btn-default">
                                                    <i class="fa fa-calendar-day custom-calender"></i><?php echo date('d. F. Y');?>
                                                </button>
                                            </td>

                                            <td>
                                                <div class="patient-info">
                                                    <p class="name">Sam Conner</p>
                                                    <p class="info">New admission</p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="link">
                                                    <a href="#">change &nbsp; &gt;</a>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <button class="btn btn-default">
                                                    <i class="fa fa-calendar-day custom-calender"></i><?php echo date('d. F. Y');?>
                                                </button>
                                            </td>

                                            <td>
                                                <div class="patient-info">
                                                    <p class="name">Mitchell Williamson</p>
                                                    <p class="info">Room 2A</p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="link">
                                                    <a href="#">change &nbsp; &gt;</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                </section>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <h1 class="title pl-2">Overview of patients</h1>
                        </div>

                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-12">
                                <div class="small-box bg-white p-3">

                                    <table id="example2" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Room</th>
                                                <th>Admission</th>
                                                <th>Discharge</th>
                                                <th>Orders</th>
                                                <th>Buffer</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                while ($row = $patients->fetch_assoc()):
                                                    if(!empty($row)):
                                                        $staying = $row['day_interval'] + 1;
                                                        $admission_date = $row['admission_date'];
                                                        $discharge_date = $row['discharge_date'];

                                                        $aDate = date("d. F", strtotime($admission_date));
                                                        $aDay = date("w", strtotime($admission_date));
                                                        $dDate = date("d. F", strtotime($discharge_date));
                                                        $dDay = date("w", strtotime($discharge_date));



                                                        $date1 = new DateTime("$admission_date");
                                                        $date2 = new DateTime("$discharge_date");
                                                        $interval = $date1->diff($date2);
                                                        $day = $interval->days;

                                                        $patientId = $row["id"];

                                                        $sql = "SELECT count(id) as meal_no FROM meal_submitted WHERE patient_id = $patientId";
                                                        $meals = $conn->query($sql);
                                                        $meal_submitted = $meals->fetch_assoc();
                                                        $mealNo = $meal_submitted["meal_no"];
                                            ?>
                                            <tr>
                                                <td><?php echo $row["name"];?></td>
                                                <td>Room 2A</td>
                                                <td><?php echo $days[$aDay].', '.$aDate; ?></td>
                                                <td><?php echo $days[$dDay].', '.$dDate ."( $day days left)"; ?></td>
                                                <td><?php echo $mealNo.'/'.$staying;?></td>
                                                <td>2</td>
                                                <td>
                                                    <div class="link">
                                                        <a href="#">change &nbsp; &gt;</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endif; endwhile;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                </section>

            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
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
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script>
            $(function () {
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>

    </body>
</html>
