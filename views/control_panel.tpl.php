<?
    if (empty($_SESSION['member'])) {
        if ($_GET['action'] == 'view' && $_GET['module'] == 'orders') {
            $style = "display : none !important;";
            ?>
            <style type="text/css">
                .logo-box{
                    margin: 0 auto;
                    /*padding-left: 30%;*/
                }
            </style>
        <?}
    }
?>
<!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="d-none d-lg-block" style="<?=$style?>">
                            <form class="app-search">
                                <div class="app-search-box dropdown">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search..." id="top-search">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </li>

                        <li class="dropdown d-inline-block d-lg-none" style="<?=$style?>">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>

                        <li class="dropdown d-none d-lg-inline-block" style="<?=$style?>">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                                <i class="fe-maximize noti-icon"></i>
                            </a>
                        </li>

                        <?
                            if ($_SESSION['member']['id'] != 0) {?>
                                <!-- <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="fe-grid noti-icon"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-lg dropdown-menu-right">

                                        <div class="p-lg-1">
                                            <div class="row no-gutters">
                                                <div class="col">
                                                    <a class="dropdown-icon-item" href="#">
                                                        <img src="assets/images/brands/slack.png" alt="slack">
                                                        <span>Slack</span>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="dropdown-icon-item" href="#">
                                                        <img src="assets/images/brands/github.png" alt="Github">
                                                        <span>GitHub</span>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="dropdown-icon-item" href="#">
                                                        <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                                        <span>Dribbble</span>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="row no-gutters">
                                                <div class="col">
                                                    <a class="dropdown-icon-item" href="#">
                                                        <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                                        <span>Bitbucket</span>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="dropdown-icon-item" href="#">
                                                        <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                                        <span>Dropbox</span>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="dropdown-icon-item" href="#">
                                                        <img src="assets/images/brands/g-suite.png" alt="G Suite">
                                                        <span>G Suite</span>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </li>   -->
                            <?}
                        ?>

                        <!-- <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/flags/us.jpg" alt="user-image" height="16">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">


                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/germany.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">German</span>
                                </a>


                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/italy.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Italian</span>
                                </a>


                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/spain.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>


                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="assets/images/flags/russia.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Russian</span>
                                </a>

                            </div>
                        </li> -->
                        <?
                            if ($_SESSION['member']['id'] != 0) {?>
                                <li class="dropdown notification-list topbar-dropdown">
                                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="fe-bell noti-icon"></i>
                                        <?
                                            if ($_SESSION['notification_count'] > 0) {?>
                                                <span class="badge badge-pill badge-danger noti-icon-badge"><?=$_SESSION['notification_count']?></span>
                                            <?}
                                        ?>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">


                                        <div class="dropdown-item noti-title">
                                            <h5 class="m-0">
                                                <span class="float-right">
                                                    <a href="" class="text-dark">
                                                        <small>View All</small>
                                                    </a>
                                                </span>Notification Panel
                                            </h5>
                                        </div>

                                        <div class="noti-scroll" data-simplebar>


                                            <!-- <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                                <div class="notify-icon">
                                                    <img src="assets/images/users/user-1.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                                <p class="notify-details">Cristina Pride</p>
                                                <p class="text-muted mb-0 user-msg">
                                                    <small>Hi, How are you? What about our next meeting</small>
                                                </p>
                                            </a> -->
                                            <?
                                                if ($_SESSION['notification_count'] < 1) {?>
                                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                                        <div class="notify-icon bg-success">
                                                            <i class="mdi mdi-star-face"></i>
                                                        </div>
                                                        <p class="notify-details">No any notifications</p>
                                                        <p class="text-muted mb-0 user-msg">
                                                            <small>Hi, No any notifications</small>
                                                        </p>
                                                    </a>
                                                <?}
                                            ?>

                                            <?
                                                if (TODAY_PROSPECTS_COUNT > 0) {?>
                                                        <small class="text-muted">&nbsp;&nbsp; Prospectives / New Calls (<?=TODAY_PROSPECTS_COUNT?>)<br></small>
                                                    <?
                                                    foreach (TODAY_PROSPECTS as $key => $TP) {?>
                                                        <a href="?module=calls&action=index&pid=<?=$TP['id']?>" target="_blank" class="dropdown-item notify-item <?if($key == 0){echo "active";}?>">
                                                            <div class="notify-icon bg-blue">
                                                                <i class="mdi mdi-phone-plus"></i>
                                                            </div>
                                                            <p class="notify-details text-capitalize">New Call - <strong><?=$TP['clientName']?></strong>
                                                                <small class="text-muted"><?=$TP['assignedTo']?> <?=$TP['issue_date']?></small>
                                                            </p>
                                                        </a>
                                                    <?}
                                                }

                                                if (TODAY_FOLLOWUP_COUNT > 0) {?>
                                                        <small class="text-muted">&nbsp;&nbsp; Followups (<?=TODAY_FOLLOWUP_COUNT?>)<br></small>
                                                    <?
                                                    foreach (TODAY_FOLLOWUP as $key => $TF) {?>
                                                        <a href="?module=calls&action=index&followupid=<?=$TF['id']?>&calltype=followup&cid=<?=$TF['clientID']?>" target="_blank" class="dropdown-item notify-item <?if($key == 0){echo "active";}?>">
                                                            <div class="notify-icon bg-warning">
                                                                <i class="mdi mdi-phone-return"></i>
                                                            </div>
                                                            <p class="notify-details text-capitalize">Follow Up - <strong><?=$TF['clientName']?></strong>
                                                                <small class="text-muted"><?=$TF['product']?> <br> <?=$TF['followupdate']?></small>
                                                            </p>
                                                        </a>
                                                    <?}
                                                }

                                                if (TODAY_ARRIVALS_COUNT > 0) {?>
                                                        <small class="text-muted">&nbsp;&nbsp; Today Arrivals (<?=TODAY_ARRIVALS_COUNT?>)<br></small>
                                                    <?
                                                    foreach (TODAY_ARRIVALS as $key => $TA) {?>
                                                        <a href="?module=calls&action=index&followupid=<?=$TF['id']?>&calltype=followup&cid=<?=$TA['clientID']?>" target="_blank" class="dropdown-item notify-item <?if($key == 0){echo "active";}?>">
                                                            <div class="notify-icon bg-sisi">
                                                                <i class="mdi mdi-anchor"></i>
                                                            </div>
                                                            <p class="notify-details text-capitalize"> <span class="text-sisi"><?=$TA['orderno']?></span> <strong><?=$TA['brandName']?> <?=$TA['makeName']?> <?=$TA['caryear']?></strong>
                                                                <small class="text-muted"><?=$TA['shipname']?> arrives today from <br> <?=$TA['fromPort']?> to <?=$TA['toPort']?></small>
                                                            </p>
                                                        </a>
                                                    <?}
                                                }
                                            ?>










                                        </div>

                                        <!-- All-->
                                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                            View all
                                            <i class="fe-arrow-right"></i>
                                        </a>

                                    </div>
                                </li>
                                 <?}
                        ?>

                        <li class="dropdown notification-list topbar-dropdown" style="<?=$style?>">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/<?=$_SESSION['member']['image']?>" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ml-1">
                                    <?=$_SESSION['member']['username']?> <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="?module=password&action=index" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="?module=authenticate&action=logout" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list" style="<?=$style?>">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                                <i class="fe-settings noti-icon"></i>
                            </a>
                        </li>

                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="?module=home&action=index" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="assets/images/sisilimitedlogo.png" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="<?=CS_LOGO?>" alt="" height="20">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>

                        <a href="?module=home&action=index" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="assets/images/sisilimitedlogo.png" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="<?=CS_WHITE_LOGO?>" alt="" height="40">
                            </span>
                        </a>
                    </div>

                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i class="fe-menu"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                        <!-- <li class="dropdown d-none d-xl-block">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                Create New
                                <i class="mdi mdi-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu">

                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="fe-briefcase mr-1"></i>
                                    <span>New Projects</span>
                                </a>


                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="fe-user mr-1"></i>
                                    <span>Create Users</span>
                                </a>


                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="fe-bar-chart-line- mr-1"></i>
                                    <span>Revenue Report</span>
                                </a>


                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="fe-settings mr-1"></i>
                                    <span>Settings</span>
                                </a>

                                <div class="dropdown-divider"></div>


                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="fe-headphones mr-1"></i>
                                    <span>Help & Support</span>
                                </a>

                            </div>
                        </li> -->

                        <!-- <li class="dropdown dropdown-mega d-none d-xl-block">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                Mega Menu
                                <i class="mdi mdi-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-megamenu">
                                <div class="row">
                                    <div class="col-sm-8">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5 class="text-dark mt-0">UI Components</h5>
                                                <ul class="list-unstyled megamenu-list">
                                                    <li>
                                                        <a href="javascript:void(0);">Widgets</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Nestable List</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Range Sliders</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Masonry Items</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Sweet Alerts</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Treeview Page</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Tour Page</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-md-4">
                                                <h5 class="text-dark mt-0">Applications</h5>
                                                <ul class="list-unstyled megamenu-list">
                                                    <li>
                                                        <a href="javascript:void(0);">eCommerce Pages</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">CRM Pages</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Email</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Calendar</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Team Contacts</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Task Board</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Email Templates</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-md-4">
                                                <h5 class="text-dark mt-0">Extra Pages</h5>
                                                <ul class="list-unstyled megamenu-list">
                                                    <li>
                                                        <a href="javascript:void(0);">Left Sidebar with User</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Menu Collapsed</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Small Left Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">New Header Style</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Search Result</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Gallery Pages</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Maintenance & Coming Soon</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center mt-3">
                                            <h3 class="text-dark">Special Discount Sale!</h3>
                                            <h4>Save up to 70% off.</h4>
                                            <button class="btn btn-primary btn-rounded mt-3">Download Now</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li> -->
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->
