<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="ROOT Admin - UI Admin Kit Powered by Bootstrap 4">
        <meta name="author" content="Lukasz Holeczek">
        <meta name="keyword" content="ROOT Admin - UI Admin Kit Powered by Bootstrap 4">
        <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
        <title>Assignment | SingUp</title>
        <!-- Main styles for this application -->
        <link href="<?php echo base_url('assets/frontuser/css/style.css'); ?>" rel="stylesheet">
    </head>
    <body class="">
        <div class="container">
            <div class="row">
                <div class="col-md-5 center-block pull-xs-none">
                    <div class="card vamiddle">
                    <div class="col-sm-12">  
                        <?php echo $this->session->flashdata('message'); ?>  
                    </div>  
                    <?php echo form_open('auth/Auth/insertnew'); ?>
                        <div class="card-block p-a-2">
                            <h1>Register</h1>
                            <p class="text-muted">Create your account</p>
                            <div class="input-group m-b-1">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
                                <span class="text-danger"><?php echo form_error('firstName'); ?></span>
                            </div>
                            <div class="input-group m-b-1">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
                                <span class="text-danger"><?php echo form_error('lastName'); ?></span>
                            </div>
                            <div class="input-group m-b-1">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <input type="text" class="form-control" id="email" name="email" placeholder="E-Mail">
                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                            </div>
                            <div class="input-group m-b-1">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                <span class="text-danger"><?php echo form_error('username'); ?></span>
                            </div>
                           <div class="input-group m-b-1">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                            </div>
                            <div class="input-group m-b-1">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <!-- <input type="text" class="form-control" name="lastName" placeholder="Last Name"> -->
                                <select name=role class="form-control" value="Pilih">
                                    <option value="Guru">Guru</option>
                                    <option value="Siswa">Siswa</option>
                                </select>
                                <span class="text-danger"><?php echo form_error('role'); ?></span>
                            </div>
                            <!-- <button type="button" class="btn btn-block btn-success">Create Account</button> -->
                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Create Account','class'=>"btn btn-block btn-success")); ?>
                        </div>
                    <?php echo form_close(); ?>
                        <div class="card-footer p-a-2">
                            <a style="text-decoration: none;" href="<?php echo site_url('welcome/view_login'); ?>">
                                <button type="button" class="btn btn-block btn-primary">Login</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap and necessary plugins -->
        <script src="<?php echo base_url('assets/frontuser/js/libs/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/frontuser/js/libs/tether.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/frontuser/js/libs/bootstrap.min.js'); ?>"></script>
        <script>
        function verticalAlignMiddle()
        {
            var bodyHeight = $(window).height();
            var formHeight = $('.vamiddle').height();
            var marginTop = (bodyHeight / 2) - (formHeight / 2);
            if (marginTop > 0)
            {
                $('.vamiddle').css('margin-top', marginTop);
            }
        }
        $(document).ready(function()
        {
            verticalAlignMiddle();
        });
        $(window).bind('resize', verticalAlignMiddle);
        </script>
        
        
    </body>
</html>