<?php
    require_once './config/connect_db.php';

    $token = isset($_GET["ref"]) ? $_GET["ref"]: "";
    $day = isset($_GET["day"]) ? $_GET["day"]: "";
    $max_day = isset($_GET["max_day"]) ? $_GET["max_day"]: "";
    $nutrition = isset($_GET["nutrition"]) ? $_GET["nutrition"]: "";


    if(!$token && !$day && !$max_day){
        header("location: welcome.php?ref=$token");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Favourite Dish</title>

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

    <style></style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper select-dish">
    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav special-navbar-nav">
            <li class="nav-center"><h4 class="ml-5 nav-item-special">PLEASE SELECT YOUR FAVOURITE DISH <br>DAY <?php echo $day; ?></h4></li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="custom-content-wrapper">
        <!-- Main content -->
        <section class="content pt-3">
            <div class="container custom-container">
                <form method="POST" action="./save_meal.php" id="meal_form">
                    <input type="hidden" name="ref" value="<?php echo $token;?>">
                    <input type="hidden" name="day" value="<?php echo $day;?>">

                    <div class="dish-row breakfast">
                        <h2>Breakfast</h2>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="dish-col">
                                    <h6>Light breakfast</h6>

                                    <ul>
                                        <li>Kaisersemmel</li>
                                        <li>Multigrain bun</li>
                                        <li>Jam</li>
                                        <li>Elbländer Semi-hard cheese</li>
                                        <li>Smoked turkey breast</li>
                                        <li>Butter</li>
                                        <li>Coffee or tea</li>
                                    </ul>

                                    <div class="form-check text-center">
                                        <input class="regular-checkbox big-checkbox" type="radio" name="breakfast" value="1" id="sweet_breakfast"/>
                                        <label class="form-check-label" for="sweet_breakfast">

                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="dish-col">
                                    <h6>Vegetarian breakfast</h6>

                                    <ul>
                                        <li>Kaisersemmel</li>
                                        <li>Multigrain bun</li>
                                        <li>Jam</li>
                                        <li>Elbländer Semi-hard cheese</li>
                                        <li>Brie</li>
                                        <li>Butter</li>
                                        <li>Coffee or tea</li>
                                    </ul>

                                    <div class="form-check text-center">
                                        <input class="regular-checkbox big-checkbox" type="radio" name="breakfast" value="1" id="sweet_breakfast3"/>
                                        <label class="form-check-label" for="sweet_breakfast3">

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="dish-col">
                                    <h6>Sweet breakfast</h6>

                                    <ul>
                                        <li>Kaisersemmel</li>
                                        <li>Multigrain bun</li>
                                        <li>Jam</li>
                                        <li>Blossom honey</li>
                                        <li>Butter</li>
                                        <li>Coffee or tea</li>
                                    </ul>

                                    <div class="form-check text-center">
                                        <input class="regular-checkbox big-checkbox" type="radio" name="breakfast" value="2" id="sweet_breakfast2"/>
                                        <label class="form-check-label" for="sweet_breakfast2">

                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="dish-row lunch">
                        <h2>Lunch</h2>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="dish-col text-center">
                                    <h6>Menu 1 (Whole food)</h6>

                                    <div class="food-img">
                                        <img src="dist/img/food1.jpg" alt="" />
                                    </div>

                                    <p>Beef goulash with Spätzle and red cabbage</p>

                                    <div class="form-check text-center">
                                        <input class="regular-checkbox big-checkbox" type="radio" name="lunch" value="1" id="menu1"/>
                                        <label class="form-check-label" for="menu1">

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="dish-col text-center">
                                    <h6>Menu 2 (Vegetarian)</h6>

                                    <div class="food-img">
                                        <img src="dist/img/food2.jpg" alt="" />
                                    </div>

                                    <p>Burger with grilled halloumi, homemade tomatorelish, olive-caper-tapenade</p>

                                    <div class="form-check text-center">
                                        <input class="regular-checkbox big-checkbox" type="radio" name="lunch" value="2" id="menu2"/>
                                        <label class="form-check-label" for="menu2">

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="dish-col text-center">
                                    <h6>Menu 3 (Light cuisine)</h6>

                                    <div class="food-img">
                                        <img src="dist/img/food3.jpg" alt="" />
                                    </div>

                                    <p>Salmon with rice and vegetables.</p>

                                    <div class="form-check text-center">
                                        <input class="regular-checkbox big-checkbox" type="radio" name="lunch" value="3" id="menu3"/>
                                        <label class="form-check-label" for="menu3">

                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="dish-row lunch">
                        <h2>Dinner</h2>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="dish-col">
                                    <h6>Menu 1 </h6>

                                    <p>Fish plate with smoked salmon, trout fillet, herring salad, horseradish and wholemeal bread</p>

                                    <div class="form-check text-center">
                                        <input class="regular-checkbox big-checkbox" type="radio" name="dinner" value="1" id="menu12"/>
                                        <label class="form-check-label" for="menu12">

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="dish-col">
                                    <h6>Menu 2</h6>

                                    <p>Pasta salad Tuscan style with panini</p>

                                    <div class="form-check text-center">
                                        <input class="regular-checkbox big-checkbox" type="radio" name="dinner" value="2" id="menu22"/>
                                        <label class="form-check-label" for="menu22">

                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="dish-col">
                                    <h6>Menu 3</h6>

                                    <p>Mixed salad plate with mozzarella balls served with panini and butter</p>

                                    <div class="form-check text-center">
                                        <input class="regular-checkbox big-checkbox" type="radio" name="dinner" value="2" id="menu23"/>
                                        <label class="form-check-label" for="menu23">

                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="dish-col">
                                    <h6>Menu 4</h6>

                                    <p>Cheese plate with variation of Elbländer cheese served with wholemeal bread</p>

                                    <div class="form-check text-center">
                                        <input class="regular-checkbox big-checkbox" type="radio" name="dinner" value="2" id="menu24"/>
                                        <label class="form-check-label" for="menu24">

                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="dish-row lunch">
                        <h2 class="mb-3">Soup</h2>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="dish-col2 text-center">
                                    <div class="food-img">
                                        <img src="dist/img/food4.jpg" alt="" />
                                    </div>

                                    <p>Tomato soup</p>

                                    <div class="input-group inline-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-sm btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input class="form-control quantity" min="0" name="soup_quantity" value="1" type="number"/>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-sm btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <input type="submit" name="submit" value="submit" id="submit_meal_form" style="display: none;">
                    <div class="w-100 text-center mb-5">
                        <button type="button" class="btn btn-outline-success pl-5 pr-5" id="submit">Send</button>
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

    function checkValidity(){
        if(!$('#meal_form')[0].checkValidity())
            return false;
        else
            return  true;
    }

    $(document).ready(function (){
        $(document).on("click", '.btn-plus, .btn-minus', function (e){
		  const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
		  const input = $(e.target).closest('.input-group').find('input');
		  if (input.is('input')) {
			input[0][isNegative ? 'stepDown' : 'stepUp']()
		  }
		});

        $(document).on("click", '.dish-col', function (){
            var radioButton = $(this).find('input:radio');
            radioButton.attr('checked', !radioButton.attr('checked'));
        });

        $(document).on("click", "#submit", function (){
            let breakfast, lunch, dinner = false;

            $('input[name=breakfast]').each(function () {
                if($(this).prop("checked") === true)
                    breakfast = true;
            });

            if(!breakfast){
                $.notify({
                    message: 'Please select breakfast item'
                },{
                    // settings
                    type: 'danger'
                });

                return false;
            }

            $('input[name=lunch]').each(function () {
                if($(this).prop("checked") === true)
                    lunch = true;
            });

            if(!lunch){
                $.notify({
                    message: 'Please select lunch item'
                },{
                    // settings
                    type: 'danger'
                });

                return false;
            }

            $('input[name=dinner]').each(function () {
                if($(this).prop("checked") === true)
                    dinner = true;
            });

            if(!dinner){
                $.notify({
                    message: 'Please select dinner item'
                },{
                    // settings
                    type: 'danger'
                });

                return false;
            }

            if(breakfast && lunch && dinner){
                $("#submit_meal_form").click();
            }else{
                $.notify({
                    // options
                    message: 'Something wrong in the selection.'
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
