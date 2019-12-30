<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">

<?php
$masters = $this->db->get('master')->result();
foreach ($masters as $ms) {}
?>

<title><?php echo $ms->master_nama ?></title>
<meta content="Admin Dashboard" name="description">
<meta content="Themesbrand" name="author">
<link rel="shortcut icon" href="<?php echo base_url('assets/img/logo/'.$ms->master_icon) ?>">
<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/metismenu/metismenu.min.css') ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/fontawesome/css/all.min.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datepicker/css/bootstrap-datepicker3.standalone.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/datatables.min.css') ?>">