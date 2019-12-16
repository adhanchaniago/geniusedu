 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-code"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Dinas Peternakan

         </div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider ">

     <div class="sidebar-heading">
         ADMIN
     </div>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="<?php echo site_url('user') ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     </li>
    <li class="nav-item dropdown show<?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="true">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Products</span>
        </a>
        <div class="dropdown-menu show" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('products/add') ?>">New Product</a>
            <a class="dropdown-item" href="<?php echo site_url('products') ?>">List Product</a>
            <a class="dropdown-item" href="<?php echo site_url('products/sms') ?>">Kirim SMS</a>
        </div>
    </li>
     <!-- Heading -->
     <div class="sidebar-heading">
         User
     </div>

     <li class="nav-item">
         <a class="nav-link" href="charts.html">
             <i class="fas fa-fw fa-user"></i>
             <span>My Profile</span></a>
     </li>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Components</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Custom Components:</h6>
                 <a class="collapse-item" href="buttons.html">Buttons</a>
                 <a class="collapse-item" href="cards.html">Cards</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->


     <!-- Nav Item - Pages Collapse Menu -->



     <!-- Divider -->



     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->