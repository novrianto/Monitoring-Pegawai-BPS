<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Aug 2018 21:45:59 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico">

    <!-- third party css -->
    <link href="<?=base_url();?>assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="<?=base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="enlarged" data-keep-enlarged="true">

    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!-- LOGO -->
                <a href="index.html" class="logo text-center">
                    <span class="logo-lg">
                        <img src="<?=base_url();?>assets/images/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="<?=base_url();?>assets/images/logo_sm.png" alt="" height="16">
                    </span>
                </a>

                <!--- Sidemenu -->
                <ul class="metismenu side-nav">

                    <li class="side-nav-title side-nav-item">Navigation</li>

                    <li class="side-nav-item">
                        <a href="<?=base_url('welcome/dashboard');?>" class="side-nav-link">
                            <i class="dripicons-meter"></i>
                            <span class="badge badge-success float-right">7</span>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="<?=base_url('welcome/add');?>" class="side-nav-link">
                            <i class="dripicons-plus"></i>
                            <span class="badge badge-success float-right">7</span>
                            <span> Add </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="<?=base_url('welcome/addquestion');?>" class="side-nav-link">
                            <i class="dripicons-plus"></i>
                            <span class="badge badge-success float-right">7</span>
                            <span> Add Question</span>
                        </a>
                    </li>

                </ul>

                <!-- Help Box -->
                <div class="help-box text-white text-center">
                    <a href="javascript: void(0);" class="float-right close-btn text-white">
                        <i class="mdi mdi-close"></i>
                    </a>
                    <img src="<?=base_url();?>assets/images/help-icon.svg" height="90" alt="Helper Icon Image" />
                    <h5 class="mt-3">Unlimited Access</h5>
                    <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
                    <a href="javascript: void(0);" class="btn btn-outline-light btn-sm">Upgrade</a>
                </div>
                <!-- end Help Box -->
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <div class="content">

                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-bell noti-icon"></i>
                                <span class="noti-icon-badge"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="javascript: void(0);" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                                    </h5>
                                </div>

                                <div class="slimscroll" style="max-height: 230px;">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">1 min ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="<?=base_url();?>assets/images/users/avatar-2.jpg"
                                                class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Hi, How are you? What about our next meeting</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">4 days ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="<?=base_url();?>assets/images/users/avatar-4.jpg"
                                                class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Wow ! this admin looks good and awesome design</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-heart"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked
                                            <b>Admin</b>
                                            <small class="text-muted">13 days ago</small>
                                        </p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item text-center text-primary notify-item notify-all">
                                    View All
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="<?=base_url();?>assets/images/users/avatar-1.jpg" alt="user-image"
                                        class="rounded-circle">
                                </span>
                                <span>
                                    <span class="account-user-name">Dominic Keller</span>
                                    <span class="account-position">Founder</span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-settings-variant"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lifebuoy"></i>
                                    <span>Support</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lock-outline"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left disable-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <div class="app-search">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="mdi mdi-magnify"></span>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                        <li class="breadcrumb-item active">Projects</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Daftar Pertanyaan</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Profile -->
                            <div class="card bg-primary">
                                <div class="card-body profile-user-box">

                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="media">
                                                <span class="float-left m-2 mr-4"><img
                                                        src="<?=base_url();?>assets/images/users/avatar-2.jpg"
                                                        style="height: 100px;" alt=""
                                                        class="rounded-circle img-thumbnail"></span>
                                                <div class="media-body">

                                                    <h4 class="mt-1 mb-1 text-white">BASDAT10</h4>
                                                    <p class="font-13 text-white-50"> Created by Administrator</p>

                                                    <ul class="mb-0 list-inline text-light">
                                                        <li class="list-inline-item mr-3">
                                                            <h5 class="mb-1">10</h5>
                                                            <p class="mb-0 font-13 text-white-50">Total Pertanyaan</p>
                                                        </li>
                                                    </ul>
                                                </div> <!-- end media-body-->
                                            </div>
                                        </div> <!-- end col-->

                                        <div class="col-sm-4">
                                            <div class="text-center mt-sm-0 mt-3 text-sm-right">
                                                <button type="button" class="btn btn-light" data-toggle="modal"
                                                    data-target="#bs-example-modal-lg">
                                                    <i class="dripicons-plus mr-1"></i>Tambah Pertanyaan
                                                </button>
                                            </div>
                                        </div> <!-- end col-->

                                        <!--  Modal content for the above example -->
                                        <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog"
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myLargeModalLabel">Buat Pertanyaan
                                                            Baru
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group mb-3">
                                                            <label for="simpleinput">No Pertanyaan</label>
                                                            <input type="text" id="simpleinput" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="example-textarea">Pertanyaan</label>
                                                            <textarea class="form-control" id="example-textarea"
                                                                rows="3"></textarea>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="simpleinput">Jabawan A</label>
                                                            <input type="text" id="simpleinput" class="form-control">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="simpleinput">Jabawan B</label>
                                                            <input type="text" id="simpleinput" class="form-control">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="simpleinput">Jabawan C</label>
                                                            <input type="text" id="simpleinput" class="form-control">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="simpleinput">Jabawan D</label>
                                                            <input type="text" id="simpleinput" class="form-control">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="example-select">Kunci Jawaban</label>
                                                            <select class="form-control" id="example-select">
                                                                <option>A</option>
                                                                <option>B</option>
                                                                <option>C</option>
                                                                <option>D</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="simpleinput">No Pertanyaan</label>
                                                            <input type="text" id="simpleinput" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="example-textarea">Pertanyaan</label>
                                                            <textarea class="form-control" id="example-textarea"
                                                                rows="3"></textarea>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="example-select">Kunci Jawaban</label>
                                                            <select class="form-control" id="example-select">
                                                                <option>Benar</option>
                                                                <option>Salah</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary float-right"><i
                                                                class="dripicons-checkmark"></i> Simpan</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                    </div> <!-- end row -->

                                </div> <!-- end card-body/ profile-user-box-->
                            </div>
                            <!--end profile/ card -->
                        </div> <!-- end col-->

                        <div class="col-md-12">
                            <div class="card text-xs-center">
                                <div class="card-header">
                                    Pertanyaan 1
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Apa itu database ?</h5>
                                    <ol type="A" style="margin-left:-20px;">
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="customRadio"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">Pilihan A</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="customRadio"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Pilihan B</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio3" name="customRadio"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">Pilihan C</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio4" name="customRadio"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">Pilihan D</label>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                                <div class="card-footer text-muted">
                                    Kunci Jawaban : A
                                </div>
                            </div> <!-- end card-->
                        </div>
                        <div class="col-md-12">
                            <div class="card text-xs-center">
                                <div class="card-header">
                                    Pertanyaan 1
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Pilih salah satu</h5>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio5" name="customRadio"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio5">Benar</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio6" name="customRadio"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio6">Salah</label>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    Kunci Jawaban : Benar
                                </div>
                            </div> <!-- end card-->
                        </div>
                        <div class="col-md-12">
                            <div class="card text-xs-center">
                                <div class="card-header">
                                    Pertanyaan 1
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Apa itu database ?</h5>
                                    <div class="form-group">
                                        <label for="example-textarea">Jawaban Anda</label>
                                        <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    Kunci Jawaban :
                                    <br>
                                    <p class="card-text">With supporting text below as a natural lead-in to
                                        additional content.</p>
                                </div>
                            </div> <!-- end card-->
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            2018 © Hyper - Coderthemes.com
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-right footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <div class="slimscroll-menu">

            <!-- Settings -->
            <hr class="mt-0" />
            <h5 class="pl-3">Basic Settings</h5>
            <hr class="mb-0" />

            <div class="p-3">
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="notifications-check" checked>
                    <label class="custom-control-label" for="notifications-check">Notifications</label>
                </div>

                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="api-access-check">
                    <label class="custom-control-label" for="api-access-check">API Access</label>
                </div>

                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="auto-updates-check" checked>
                    <label class="custom-control-label" for="auto-updates-check">Auto Updates</label>
                </div>

                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="online-status-check" checked>
                    <label class="custom-control-label" for="online-status-check">Online Status</label>
                </div>

                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="auto-payout-check">
                    <label class="custom-control-label" for="auto-payout-check">Auto Payout</label>
                </div>

            </div>


            <!-- Timeline -->
            <hr class="mt-0" />
            <h5 class="pl-3">Recent Activity</h5>
            <hr class="mb-0" />
            <div class="pl-2 pr-2">
                <div class="timeline-alt">
                    <div class="timeline-item">
                        <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="#" class="text-info font-weight-bold mb-1 d-block">You sold an item</a>
                            <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                            <p>
                                <small class="text-muted">5 minutes ago</small>
                            </p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <i class="mdi mdi-airplane bg-primary-lighten text-primary timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="#" class="text-primary font-weight-bold mb-1 d-block">Product on the Bootstrap
                                Market</a>
                            <small>Dave Gamache added
                                <span class="font-weight-bold">Admin Dashboard</span>
                            </small>
                            <p>
                                <small class="text-muted">30 minutes ago</small>
                            </p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <i class="mdi mdi-microphone bg-info-lighten text-info timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="#" class="text-info font-weight-bold mb-1 d-block">Robert Delaney</a>
                            <small>Send you message
                                <span class="font-weight-bold">"Are you there?"</span>
                            </small>
                            <p>
                                <small class="text-muted">2 hours ago</small>
                            </p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <i class="mdi mdi-upload bg-primary-lighten text-primary timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="#" class="text-primary font-weight-bold mb-1 d-block">Audrey Tobey</a>

                            <small>Uploaded a photo
                                <span class="font-weight-bold">"Error.jpg"</span>
                            </small>
                            <p>
                                <small class="text-muted">14 hours ago</small>
                            </p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="#" class="text-info font-weight-bold mb-1 d-block">You sold an item</a>
                            <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                            <p>
                                <small class="text-muted">1 day ago</small>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Right-bar -->

    <!-- bundle -->
    <script src="<?=base_url();?>assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="<?=base_url();?>assets/js/vendor/Chart.bundle.min.js"></script>
    <script src="<?=base_url();?>assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=base_url();?>assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="<?=base_url();?>assets/js/pages/demo.dashboard.js"></script>
    <!-- end demo js-->
</body>


<!-- Mirrored from coderthemes.com/hyper/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Aug 2018 21:46:28 GMT -->







</html>