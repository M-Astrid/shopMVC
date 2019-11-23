<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Главная</title>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/font-awesome.min.css" rel="stylesheet">
        <link href="/css/prettyPhoto.css" rel="stylesheet">
        <link href="/css/price-range.css" rel="stylesheet">
        <link href="/css/animate.css" rel="stylesheet">
        <link href="/css/main.css" rel="stylesheet">
        <link href="/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="/js/html5shiv.js"></script>
        <script src="/js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
    <!-- header -->
    <?=$username?>
        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +38 093 000 11 22</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> zinchenko.us@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="/"><img src="/images/home/logo.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">                                    
                                    <li><a href="/cart/"><i class="fa fa-shopping-cart"></i> Корзина
                                            (<span id="cart-count"><?=\Components\Cart::count_items()?></span>)</a></li>
                                    <?php if (isset($_SESSION['logged_user'])): ?>
                                    <li><a href="/profile/"><i class="fa fa-user"></i> Аккаунт</a></li>
                                    <li><a href="/logout/"><i class="fa fa-unlock"></i> Выйти</a></li>
                                    <?php else: ?>
                                    <li><a href="/login/"><i class="fa fa-lock"></i> Вход </a></li>
                                    <li><a href="/signup/"> Регистрация </a></li>
                                    <?php endif ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="/">Главная</a></li>
                                    <li><a href="/catalog/">Каталог</a></li>
                                    <li><a href="/blog/">Блог</a></li>
                                    <li><a href="/about/">О магазине</a></li>
                                    <li><a href="/contact/">Связаться с нами</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
            
        </header><!--/header-->


    <!-- content -->


    <?php include 'application/views/'.$content_view; ?>


    <!-- footer -->

        <footer id="footer"><!--Footer-->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2015</p>
                        <p class="pull-right">Курс PHP Start</p>
                    </div>
                </div>
            </div>
        </footer><!--/Footer-->



        <script src="/js/jquery.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/jquery.scrollUp.min.js"></script>
        <script src="/js/price-range.js"></script>
        <script src="/js/jquery.prettyPhoto.js"></script>
        <script src="/js/main.js"></script>

        <script>
             function add_to_cart() {
                 var id = $(".add").attr("data-id");
                 var quantity = $(".quantity").val();
                 $.post("/cart/add/"+id+"/"+quantity, {}, function(data){
                     $("#cart-count").html(data);
                 });
                 return false;
             }
        </script>

        <script>
            $(document).ready(function(){
                $(".add-to-cart").click(function() {
                    var id = $(this).attr("data-id");
                    $.post("/cart/add/"+id, {}, function(data){
                        $("#cart-count").html(data);
                    });
                    return false;
                });
            });
        </script>

        <script>
            $(document).ready(function(){
                $(".cart_quantity_up").click(function() {
                    var id = $(this).attr("data-id");
                    $.get('/cart/q_up/'+id, function(data){
                        $("#quantity_input"+id).val(data);
                    });
                    $.getJSON('/cart/refresh_prices/'+id, function(data){
                        $(".cart_total_price"+id).html(data.cart_total_price);
                        $(".subtotal").html(data.subtotal);
                        $("#cart-count").html(data.cart_count);
                    });
                    return false;
                });
            });
        </script>

        <script>
            $(document).ready(function(){
                $(".cart_quantity_down").click(function() {
                    var id = $(this).attr("data-id");
                    $.get('/cart/q_down/'+id, function(data){
                        $("#quantity_input"+id).val(data);
                    });
                    $.getJSON('/cart/refresh_prices/'+id, function(data){
                        $(".cart_total_price"+id).html(data.cart_total_price);
                        $(".subtotal").html(data.subtotal);
                        $("#cart-count").html(data.cart_count);
                    });
                    return false;
                });
            });
        </script>
    </body>
</html>