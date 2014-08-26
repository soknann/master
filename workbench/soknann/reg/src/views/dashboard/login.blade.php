<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Master Information Technology Center | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- PAGE LEVEL STYLES -->
    <?php echo HTML::style("packages/soknann/reg/bs-admin/plugins/bootstrap/css/bootstrap.css");?>
    <?php echo HTML::style("packages/soknann/reg/bs-admin/css/login.css");?>
    <?php echo HTML::style("packages/soknann/reg/bs-admin/plugins/magic/magic.css");?>
    <!-- END PAGE LEVEL STYLES -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body >
<div class="navbar navbar-inner navbar-fixed-top" style="background-color: #008AB8; color: #ffffff; padding-top: 6px;">
    <div class="container">
        <h4 style="text-align: center;">Master Information Technology Center</h4>
    </div>
</div>
    <div class="navbar" style="background-color: #E7E7E9; color: #9da0a4; padding-top: 8px;">
        <div class="container" style="text-align: center; height: 100px; color: #000000;">
            <h2><i class="glyphicon glyphicon-log-in g"></i> Log in</h2>
        </div>
    </div>
    <div class="container">
        <!--<div class="page-header" style="margin-top: -15px; text-align: center;">
            <?php echo HTML::image('packages/soknann/reg/bs-admin/img/shicon.png');?>
        </div>-->
    </div>
<!-- PAGE CONTENT -->
<div class="container" style="margin-top: 40px;">
    @include('soknann/reg::template.msg')
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <!--<div class="container">
                <?php echo HTML::image('packages/soknann/reg/bs-admin/img/shicon.png');?>
            </div>-->
                {{ Former::open(route('reg.login'))->method('POST')->class('form-signin')}}
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your username and password
                </p>
            <input name="username" type="text" placeholder="Username" class="form-control" />
            <input name="password" type="password" placeholder="Password" class="form-control" />
            <button class="btn text-muted text-center btn-danger form-control" type="submit">Sign in</button>
            {{ Former::close()}}
        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.html" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
                <input type="email"  required="required" placeholder="Your E-mail"  class="form-control" />
                <br />
                <button class="btn text-muted text-center btn-success" type="submit">Recover Password</button>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form action="index.html" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Please Fill Details To Register</p>
                <input type="text" placeholder="First Name" class="form-control" />
                <input type="text" placeholder="Last Name" class="form-control" />
                <input type="text" placeholder="Username" class="form-control" />
                <input type="email" placeholder="Your E-mail" class="form-control" />
                <input type="password" placeholder="password" class="form-control" />
                <input type="password" placeholder="Re type password" class="form-control" />
                <button class="btn text-muted text-center btn-success" type="submit">Register</button>
            </form>
        </div>
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <!--<li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>-->
        </ul>
    </div>


</div>

<div class="navbar navbar-inner navbar-fixed-bottom" style="background-color: #008AB8; color: #ffffff;">
    <div class="navbar" style="background-color: #E7E7E9; color: #9da0a4; padding-top: 8px; height: 100px;">
        <div class="container">

        </div>
    </div>
    <div>
        <h4 class="container" style="text-align: center;">COPYRIGHT © 2014 Thesis IT Team.</h4>
    </div>
</div>

<!--END PAGE CONTENT -->

<!-- PAGE LEVEL SCRIPTS -->
<?php echo HTML::script("packages/soknann/reg/bs-admin/plugins/jquery-2.0.3.min.js");?>
<?php echo HTML::script("packages/soknann/reg/bs-admin/plugins/bootstrap/js/bootstrap.js");?>
<?php echo HTML::script("packages/soknann/reg/bs-admin/js/login.js");?>
<!--END PAGE LEVEL SCRIPTS -->

</body>
<!-- END BODY -->
</html>
