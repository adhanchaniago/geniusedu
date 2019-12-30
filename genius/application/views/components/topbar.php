<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <?php
    $masters = $this->db->get('master')->result();
    foreach ($masters as $ms) {}
    ?>
    <div class="topbar-left"><a href="<?php echo base_url('beranda') ?>" class="logo"><span><img src="<?php echo base_url('assets/img/logo/'.$ms->master_logo) ?>" alt="" height="18"> </span><i><img src="<?php echo base_url('assets/img/logo/'.$ms->master_icon) ?>" alt="" height="22"></i></a></div>
    <nav class="navbar-custom">
        <ul class="navbar-right list-inline float-right mb-0">
            <!-- full screen -->
            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block"><a class="nav-link waves-effect" href="#" id="btn-fullscreen"><i class="far fa-square noti-icon"></i></a></li>
            <!-- notification -->
            <li class="dropdown notification-list list-inline-item"><a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="fas fa-bell noti-icon"></i> <span class="badge badge-pill badge-danger noti-icon-badge">3</span></a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                    <!-- item-->
                    <h6 class="dropdown-item-text">Notifications (3)</h6>
                    <div class="slimscroll notification-item-list">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning"><i class="mdi mdi-message-text-outline"></i></div>
                            <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info"><i class="mdi mdi-glass-cocktail"></i></div>
                            <p class="notify-details">Your item is shipped<span class="text-muted">It is a long established fact that a reader will</span></p>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                            <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                        </a>
                    </div>
                    <!-- All--><a href="javascript:void(0);" class="dropdown-item text-center text-primary">View all <i class="fi-arrow-right"></i></a></div>
            </li>

            <li class="dropdown notification-list list-inline-item">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img src="<?php echo base_url('assets/img/logo/'.$ms->master_icon) ?>" alt="user" class="rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="fas fa-user-circle m-r-5"></i> Ubah Password</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="<?php echo base_url('logout') ?>"><i class="fas fa-sign-out-alt text-danger"></i> Logout</a></div>
                </div>
            </li>
        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect"><i class="fas fa-align-justify"></i></button>
            </li>
        </ul>

    </nav>
</div>
<!-- Top Bar End -->