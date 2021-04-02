<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login - Organization</title>
        <link href="<?=base_url()?>assets/css/style.default.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/css/bootstrapValidator.min.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet">

    </head>
    <body class="signin">
        <div id="preloader">
            <div id="preloader-status"><i class="fa fa-spinner fa-spin"></i></div>
        </div>
        <section>
            <div class="signinpanel">
                <?php if( !empty($this->session->userdata('isLoggedIn')))
                 { 
                ?>
                <li>
                <div class="btn-group" style="padding-top: 28px; padding-right:15px;">
                <button type="button" class=" dropdown-toggle navbtnout" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu dropdown-menu-usermenu">
                    <li><a href="<?=base_url()?>dashboard"><i class="glyphicon glyphicon-user"></i> Dashboard</a></li>
                    <li><a href="<?=base_url()?><?=$this->session->userdata('userType')?>s/logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                    </ul>
                    </div>
                    </li>
                <?php 
                }
                ?>


                <div class="row">
                    <div class="col-md-6 col-md-offset-3">                        
                        <form method="post" action="<?=base_url('login')?>">
                            <div><center><h4>Organization</h4>
                            <?= (!empty($message))? '<span class="errorMessage">'.$message.'</span>':'' ?>
                            </div>
                            <input type="text" class="form-control uname" name="uname" placeholder="Username" required/>
                            <input type="password" class="form-control pword" name="password" placeholder="Password" required/>
                            <input type="submit" name="usersubmit" value="LOGIN" class="btn btn-primary btn-block" />
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <style type="text/css">
        .errorMessage{
           color: #ff0505;
            text-align: center;
            display: block;
        }
    </style>
    <script src="<?=base_url()?>assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/custom.js"></script>
</html>
