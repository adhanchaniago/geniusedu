<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Halaman Login</h5>

            <form class="form-signin">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Email address" required autofocus>
                <label for="inputEmail">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  
  <script src="<?php echo base_url('assets/sweetalert/sweetalert2.min.js') ?>"></script>

  <script>
  $(document).ready(function(){
    $("form").submit(function(event){
      event.preventDefault();
      var user = $("input[name='username']").val();
      var pass = $("input[name='password']").val();
      $.post("<?php echo base_url('login/aksi') ?>",{
        username: user,
        password: pass,
      },function(data){

        if (data == 1) {
          Swal.fire({
            type: 'success',
            title: 'LOGIN BERHASIL',
            text: "Loading ...",
            showConfirmButton: false,
            timer: 1500
          }).then(() => {
            $(location).attr('href',"<?php echo base_url('beranda') ?>");
          });
        }else{
          Swal.fire({
            type: 'error',
            title: 'LOGIN GAGAL',
            text: "Loading ...",
            showConfirmButton: false,
            timer: 1500
          });
        }
      });
    });
  });
  </script>
</body>
</html>