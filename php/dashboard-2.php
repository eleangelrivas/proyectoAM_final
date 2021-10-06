<?php include 'layouts/header.php'; ?>

<!--Morris Chart CSS -->
<link rel="stylesheet" href="public/plugins/morris/morris.css">

<?php include 'layouts/headerStyle.php'; ?>

    <body class="fixed-left">

    <?php include 'layouts/loader.php'; ?>

        <!-- Begin page -->
        <div id="wrapper">
          
        <?php include 'layouts/navbar.php'; ?>

            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">
                            <!-- Search input -->
                            <div class="search-wrap" id="search-wrap">
                                <div class="search-bar">
                                    <input class="search-input" type="search" placeholder="Search" />
                                    <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                        <i class="mdi mdi-close-circle"></i>
                                    </a>
                                </div>
                            </div>

                            <ul class="list-inline float-right mb-0">
                                <!-- Search -->
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                                        <i class="mdi mdi-magnify noti-icon"></i>
                                    </a>
                                </li>
                                <!-- Fullscreen -->
                                <li class="list-inline-item dropdown notification-list hidden-xs-down">
                                    <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                        <i class="mdi mdi-fullscreen noti-icon"></i>
                                    </a>
                                </li>
                                <!-- language-->
                                <li class="list-inline-item dropdown notification-list hidden-xs-down">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect text-muted" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        English <img src="public/assets/images/flags/us_flag.jpg" class="ml-2" height="16" alt=""/>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right language-switch">
                                        <a class="dropdown-item" href="#"><img src="public/assets/images/flags/germany_flag.jpg" alt="" height="16"/><span> German </span></a>
                                        <a class="dropdown-item" href="#"><img src="public/assets/images/flags/italy_flag.jpg" alt="" height="16"/><span> Italian </span></a>
                                        <a class="dropdown-item" href="#"><img src="public/assets/images/flags/french_flag.jpg" alt="" height="16"/><span> French </span></a>
                                        <a class="dropdown-item" href="#"><img src="public/assets/images/flags/spain_flag.jpg" alt="" height="16"/><span> Spanish </span></a>
                                        <a class="dropdown-item" href="#"><img src="public/assets/images/flags/russia_flag.jpg" alt="" height="16"/><span> Russian </span></a>
                                    </div>
                                </li>
                                <!-- notification-->
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <i class="ion-ios7-bell noti-icon"></i>
                                        <span class="badge badge-danger noti-icon-badge">3</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5>Notification (3)</h5>
                                        </div>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                            <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                            <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                                            <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                                        </a>

                                        <!-- All-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            View All
                                        </a>

                                    </div>
                                </li>
                                <!-- User-->
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <img src="public/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> My Wallet</a>
                                        <a class="dropdown-item" href="#"><span class="badge badge-success pull-right m-t-5">5</span><i class="dripicons-gear text-muted"></i> Settings</a>
                                        <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> Lock screen</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="dripicons-exit text-muted"></i> Logout</a>
                                    </div>
                                </li>
                            </ul>

                            <!-- Page title -->
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">Dashboard 2</h3>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-6 col-xl-3">
                                    <div class="mini-stat widget-chart-sm clearfix bg-white">
                                        <span class="peity-donut float-left" data-peity='{ "fill": ["#3bc3e9", "#f2f2f2"], "innerRadius": 23, "radius": 32 }' data-width="60" data-height="60">226,134</span>
                                        <div class="mini-stat-info text-right">
                                            <span class="counter text-info">9541</span>
                                            Total Sales
                                        </div>
                                        <div class="clearfix"></div>
                                        <p class=" mb-0 m-t-20 text-muted">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="mini-stat widget-chart-sm clearfix bg-white">
                                        <span class="peity-pie float-left" data-peity='{ "fill": ["#4ac18e", "#f2f2f2"]}' data-width="60" data-height="60">0.52/1.561</span>
                                        <div class="mini-stat-info text-right">
                                            <span class="counter text-lime">36521</span>
                                            New Orders
                                        </div>
                                        <div class="clearfix"></div>
                                        <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="mini-stat widget-chart-sm clearfix bg-white">
                                        <span class="peity-donut float-left" data-peity='{ "fill": ["#ea553d", "#f2f2f2"], "innerRadius": 23, "radius": 32 }' data-width="60" data-height="60">520,134</span>
                                        <div class="mini-stat-info text-right">
                                            <span class="counter text-danger">6521</span>
                                            New Users
                                        </div>
                                        <div class="clearfix"></div>
                                        <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="mini-stat widget-chart-sm clearfix bg-white">
                                        <span class="peity-pie float-left" data-peity='{ "fill": ["#1d1e3a", "#f2f2f2"]}' data-width="60" data-height="60">230,134</span>
                                        <div class="mini-stat-info text-right">
                                            <span class="counter text-dark">1002</span>
                                            Unique Visitors
                                        </div>
                                        <div class="clearfix"></div>
                                        <p class="text-muted mb-0 m-t-20">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xl-3">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Monthly Earnings</h4>

                                            <div class="row text-center m-t-20">
                                                <div class="col-6">
                                                    <h5 class="">56241</h5>
                                                    <p class="text-muted font-14">Marketplace</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="">23651</h5>
                                                    <p class="text-muted font-14">Total Income</p>
                                                </div>
                                            </div>

                                            <div id="morris-donut-example" class="morris-charts" style="height: 300px"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Email Sent</h4>

                                            <div class="row text-center m-t-20">
                                                <div class="col-4">
                                                    <h5 class="">56241</h5>
                                                    <p class="text-muted font-14">Marketplace</p>
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="">23651</h5>
                                                    <p class="text-muted font-14">Total Income</p>
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="">23651</h5>
                                                    <p class="text-muted font-14">Last Month</p>
                                                </div>
                                            </div>

                                            <div id="morris-area-example" class="morris-charts" style="height: 300px"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Monthly Earnings</h4>

                                            <div class="row text-center m-t-20">
                                                <div class="col-6">
                                                    <h5 class="">56241</h5>
                                                    <p class="text-muted font-14">Marketplace</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="">23651</h5>
                                                    <p class="text-muted font-14">Total Income</p>
                                                </div>
                                            </div>

                                            <div id="morris-bar-stacked" class="morris-charts" style="height: 300px"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->


                            <div class="row">

                                <div class="col-xl-4">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 m-b-15 header-title">Latest Messages</h4>

                                            <div class="inbox-widget">
                                                <a href="#">
                                                    <div class="inbox-item">
                                                        <div class="inbox-item-img"><img src="public/assets/images/users/avatar-1.jpg" class="rounded-circle" alt=""></div>
                                                        <p class="inbox-item-author">Didier Charpentier</p>
                                                        <p class="inbox-item-text">Hey! there I'm available...</p>
                                                        <p class="inbox-item-date">13:40 PM</p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="inbox-item">
                                                        <div class="inbox-item-img"><img src="public/assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                                                        <p class="inbox-item-author">Sacripant Laderoute</p>
                                                        <p class="inbox-item-text">I've finished it! See you so...</p>
                                                        <p class="inbox-item-date">13:34 PM</p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="inbox-item">
                                                        <div class="inbox-item-img"><img src="public/assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                                                        <p class="inbox-item-author">Huon Chalifour</p>
                                                        <p class="inbox-item-text">This theme is awesome!</p>
                                                        <p class="inbox-item-date">13:17 PM</p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="inbox-item">
                                                        <div class="inbox-item-img"><img src="public/assets/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                                                        <p class="inbox-item-author">Paien Barrientos</p>
                                                        <p class="inbox-item-text">Nice to meet you</p>
                                                        <p class="inbox-item-date">12:20 PM</p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="inbox-item">
                                                        <div class="inbox-item-img"><img src="public/assets/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                                                        <p class="inbox-item-author">Aubrey St-Jean</p>
                                                        <p class="inbox-item-text">Hey! there I'm available...</p>
                                                        <p class="inbox-item-date">10:15 AM</p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="inbox-item">
                                                        <div class="inbox-item-img"><img src="public/assets/images/users/avatar-6.jpg" class="rounded-circle" alt=""></div>
                                                        <p class="inbox-item-author">Maurice Monty</p>
                                                        <p class="inbox-item-text">This theme is awesome!</p>
                                                        <p class="inbox-item-date">9:56 AM</p>
                                                    </div>
                                                </a>

                                                <div class="text-center m-t-15">
                                                    <a href="#" class="btn btn-sm btn-primary waves-light waves-effect">Load More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 m-b-15 header-title">Recent Activity Feed</h4>

                                            <ol class="activity-feed mb-0">
                                                <li class="feed-item">
                                                    <span class="date">Sep 25</span>
                                                    <span class="activity-text">Responded to need “Volunteer Activities”</span>
                                                </li>
                                                <li class="feed-item">
                                                    <span class="date">Sep 24</span>
                                                    <span class="activity-text">Added an interest “Volunteer Activities”</span>
                                                </li>
                                                <li class="feed-item">
                                                    <span class="date">Sep 23</span>
                                                    <span class="activity-text">Joined the group “Boardsmanship Forum”</span>
                                                </li>
                                                <li class="feed-item">
                                                    <span class="date">Sep 21</span>
                                                    <span class="activity-text">Responded to need “In-Kind Opportunity”</span>
                                                </li>
                                                <li class="feed-item">
                                                    <span class="date">Sep 18</span>
                                                    <span class="activity-text">Created need “Volunteer Activities”</span>
                                                </li>
                                                <li class="feed-item">
                                                    <span class="date">Sep 17</span>
                                                    <span class="activity-text">Attending the event “Some New Event”</span>
                                                </li>
                                            </ol>

                                            <div class="text-center">
                                                <a href="#" class="btn btn-sm btn-primary">Load More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-4">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <div class="media">
                                                <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" src="public/assets/images/users/avatar-2.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="mt-0 font-18 mb-1">Pauline I. Bird</h5>
                                                    <p class="text-muted font-14">Webdeveloper</p>

                                                    <ul class="social-links list-inline mb-0">
                                                        <li class="list-inline-item">
                                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="1234567890"><i class="fa fa-phone"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="@skypename"><i class="fa fa-skype"></i></a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card m-b-20">
                                        <div class="card-body text-center">
                                            <h1 class="text-danger"><span class="mdi mdi-heart"></span></h1>
                                            <h5 class="font-light">You have a live Order !!</h5>
                                            <p class="text-muted font-14">Align terms and descriptions horizontally by using our
                                                grid system’s predefined classes (or semantic mixins).
                                                an ellipsis.</p>
                                        </div>
                                    </div>

                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <div class="media">
                                                <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" src="public/assets/images/users/avatar-3.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="mt-0 font-18 mb-1">Ralph L. Alva</h5>
                                                    <p class="text-muted font-14">Webdeveloper</p>

                                                    <ul class="social-links list-inline mb-0">
                                                        <li class="list-inline-item">
                                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="1234567890"><i class="fa fa-phone"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="@skypename"><i class="fa fa-skype"></i></a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- end row -->

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <?php include 'layouts/footer.php'; ?>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->

        <?php include 'layouts/footerScript.php'; ?>

        <!-- Peity chart JS -->
        <script src="public/plugins/peity-chart/jquery.peity.min.js"></script>

        <!--Morris Chart-->
        <script src="public/plugins/morris/morris.min.js"></script>
        <script src="public/plugins/raphael/raphael-min.js"></script>

        <!-- Page specific js -->
        <script src="public/assets/pages/dashborad-2.js"></script>

        <!-- App js -->
        <script src="public/assets/js/app.js"></script>

    </body>
</html>