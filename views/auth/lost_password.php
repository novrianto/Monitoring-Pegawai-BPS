<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/hyper/pages-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Aug 2018 21:48:46 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Lost password | eLearning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.html">
                                <span><img src="<?= base_url(); ?>assets/images/logo.png" alt="" height="18"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Reset Password</h4>
                                <p class="text-muted mb-4">Enter your email address and we'll send you an email with
                                    instructions to reset your password.</p>
                            </div>

                            <form action="#">
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" required=""
                                        placeholder="Enter your email">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary" type="submit">Reset Password</button>
                                </div>
                            </form>
                        </div> <!-- end card-body-->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Back to <a href="<?= base_url('welcome'); ?>"
                                    class="text-dark ml-1"><b>Log
                                        In</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2018 © Hyper - Coderthemes.com
    </footer>

    <!-- App js -->
    <script src="<?= base_url(); ?>assets/js/app.min.js"></script>
</body>

<!-- Mirrored from coderthemes.com/hyper/pages-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Aug 2018 21:48:46 GMT -->


</html>
