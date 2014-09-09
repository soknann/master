<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>{{ $title }} | Application </title>
    <link rel="shortcut icon" type="image/icon" href="{{ $shicon }}"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- GLOBAL STYLES -->
    <?php echo HTML::style("packages/soknann/reg/bs-admin/plugins/bootstrap/css/bootstrap.css");?>
    <?php echo HTML::style("packages/soknann/reg/bs-admin/css/main.css"); ?>
    <?php echo HTML::style("packages/soknann/reg/bs-admin/css/theme.css"); ?>
    <?php echo HTML::style("packages/soknann/reg/bs-admin/css/MoneAdmin.css"); ?>
    <?php echo HTML::style("packages/soknann/reg/bs-admin/plugins/Font-Awesome/css/font-awesome.css"); ?>
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
   <!-- --><?php /*echo HTML::style("packages/soknann/reg/bs-admin/css/layout2.css");*/?>
    <?php echo HTML::style("packages/soknann/reg/bs-admin/css/jquery-ui.css"); ?>
    <?php echo HTML::style("packages/soknann/reg/bs-admin/plugins/uniform/themes/default/css/uniform.default.css"); ?>
    <?php echo HTML::style("packages/soknann/reg/bs-admin/plugins/chosen/chosen.min.css");?>
    <?php echo HTML::style("packages/soknann/reg/bs-admin/plugins/flot/examples/examples.css");?>
    <?php echo HTML::style("packages/soknann/reg/bs-admin/plugins/timeline/timeline.css");?>
    <?php echo HTML::style('packages/soknann/reg/datatable/css/jquery.dataTables.css'); ?>
    <?php echo HTML::style("packages/soknann/reg/bs-admin/plugins/daterangepicker/daterangepicker-bs3.css"); ?>
    <?php echo HTML::style("packages/soknann/reg/bs-admin/plugins/datepicker/css/datepicker.css"); ?>
    <style>
        a{
            color: #000000;
        }
        #menu > li > a{
            color: #000000;
        }
        .img-thumbnail {
            border: 0px;
        }

        sup{
            color: red;
        }
    </style>
    @yield('css')
    <!-- END PAGE LEVEL  STYLES -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- GLOBAL SCRIPTS -->
    <?php echo HTML::script("packages/soknann/reg/bs-admin/plugins/jquery-2.0.3.min.js"); ?>
    <?php echo HTML::script("packages/soknann/reg/bootbox/bootbox.min.js"); ?>
    <?php echo HTML::script("packages/soknann/reg/bs-admin/plugins/bootstrap/js/bootstrap.min.js"); ?>
    <?php echo HTML::script("packages/soknann/reg/bs-admin/plugins/modernizr-2.6.2-respond-1.1.0.min.js"); ?>
    <?php echo HTML::script('packages/soknann/reg/datatable/js/jquery.dataTables.min.js'); ?>
    <?php echo HTML::script("packages/soknann/reg/bootbox/box.js");?>
    <!-- END GLOBAL SCRIPTS -->

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="padTop53 " >
<!-- MAIN WRAPPER -->
<div id="wrap">

<!-- HEADER SECTION -->
    @include('soknann/reg::template.header')
<!-- END HEADER SECTION -->

<!-- MENU SECTION -->
    @if(Auth::check())
        @include('soknann/reg::template.left')
    @endif
<!--END MENU SECTION -->

    <div id="content">

            <!--Message Section-->
            @include('soknann/reg::template.msg')
            <!--End Message-->

            <!--Content Section-->
            @yield('content')
            <!--End Content-->

    </div>

<!-- RIGHT STRIP  SECTION -->
    <!--@if(Auth::check())
        @include('soknann/reg::template.right')
    @endif-->
<!-- END RIGHT STRIP  SECTION -->
</div>

<!--END MAIN WRAPPER -->

<!-- FOOTER -->
@if(Auth::check())
    @include('soknann/reg::template.footer')
@endif
<!--END FOOTER -->



<!-- PAGE LEVEL SCRIPTS -->
<?php echo HTML::script("packages/soknann/reg/bs-admin/js/jquery-ui.min.js");?>
<?php echo HTML::script("packages/soknann/reg/bs-admin/plugins/uniform/jquery.uniform.min.js");?>
<?php echo HTML::script("packages/soknann/reg/bs-admin/plugins/chosen/chosen.jquery.min.js"); ?>
<?php echo HTML::script("packages/soknann/reg/bs-admin/plugins/daterangepicker/daterangepicker.js"); ?>
<?php echo HTML::script("packages/soknann/reg/bs-admin/plugins/daterangepicker/moment.min.js"); ?>
<?php echo HTML::script("packages/soknann/reg/bs-admin/plugins/datepicker/js/bootstrap-datepicker.js"); ?>
<?php /*echo HTML::script("packages/soknann/reg/bs-admin/plugins/flot/jquery.flot.js"); */?><!--
<?php /*echo HTML::script("packages/soknann/reg/bs-admin/plugins/flot/jquery.flot.resize.js"); */?>
<?php /*echo HTML::script("packages/soknann/reg/bs-admin/plugins/flot/jquery.flot.time.js"); */?>
--><?php /*echo HTML::script("packages/soknann/reg/bs-admin/plugins/flot/jquery.flot.stack.js"); */?>
<?php /*echo HTML::script("packages/soknann/reg/bs-admin/js/for_index.js"); */?>

<!-- END PAGE LEVEL SCRIPTS -->


@yield('js')
</body>

<!-- END BODY -->
</html>