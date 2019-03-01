<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="ROOT Admin - UI Admin Kit Powered by Bootstrap 4">
        <meta name="author" content="Lukasz Holeczek">
        <meta name="keyword" content="ROOT Admin - UI Admin Kit Powered by Bootstrap 4">
        
        <title>Assignment | Login</title>
        <!-- Main styles for this application -->
        <link href="<?php echo base_url('assets/frontuser/css/style.css'); ?>" rel="stylesheet">
    </head>
    <body class="">
        <div class="container">
            <div class="row">
            <!-- <div class="col-sm-12">  
            <?php echo $this->session->flashdata('message'); ?>  
            </div> -->
                <div class="col-md-8 col-md-offset-2">
                    <div class="card-group vamiddle">
                        <div class="card  p-a-2">
                            <div class="card-block">
                                <?php echo form_open('auth/Auth/ForgotPassword'); ?>
                                <h1>Reset Password</h1>
                                <!-- <p class="text-muted">Sign In to your account</p> -->
                                <!-- <div class="input-group m-b-1">
                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                    <span class="text-danger"><?php echo form_error('username'); ?></span>
                                </div> -->
                                <div class="input-group m-b-2">
                                    <span class="input-group-addon"><i class="icon-mail"></i></span>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" >
                                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                                </div>
                                <!-- <div class="input-group m-b-1"> -->
                                    <!-- <span class="input-group-addon"></span> -->
                                    
                                    <!-- <span class="text-danger"><?php echo form_error('username'); ?></span> -->
                                <!-- </div> -->
                                <div class="row">
                                    <div class="col-xs-6">
                                    <!-- <?php echo anchor('forgotPass/forgot','Forgot Password?');?> -->

                                        <?php echo form_submit(array('id' => 'submit', 'value' => 'Reset','class'=>"btn btn-primary p-x-2")); ?>
                                    </div>
                                    <!-- <div class="col-xs-6 text-xs-right">
                                        <button type="button" class="btn btn-link p-x-0">Forgot password?</button>
                                    </div> -->
                                </div>
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