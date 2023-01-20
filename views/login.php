<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | SiKaPe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <?php if ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form class="login100-form validate-form">
                    <span class="login100-form-title p-b-43">
                        Login to continue
                    </span>

                    <form method="POST">
                        <div class="wrap-input100 validate-input">

                            <input class="input100" type="text" name="username" id="username" required="" placeholder="Masukkan username anda" value="<?= set_value('username') ?>">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Username</span>
                        </div>


                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="password" name="password" required="" id="password" placeholder="Masukkan password anda" value="<?= set_value('password') ?>">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Password</span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit">Login</button>
                        </div>
                    </form>
                    <div class="login100-more" style="background-image: url('<?= base_url(); ?>assets/login/images/bg-01.jpg');">
                    </div>
                </form>
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/js/main.js"></script>

</body>

</html>