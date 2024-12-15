<?php
include('lib/Session.php');
$session = new Session();
if ($session->get('is_login') === true) {
  
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bebas Tanggungan Polinema</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">

  <!-- Custom CSS -->
  <!-- <link rel="stylesheet" href="assets/css/login.css"> -->
  <style>
    body {
      margin: 0;
      font-family: 'Source Sans Pro', Arial, sans-serif;
      background-image: url('assets/img/bg.jpeg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: -1;
    }

    .login-box {
      width: 360px;
      margin: 7% auto;
    }

    .card {
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: #003366;
      color: #fff;
      border-bottom: 0;
      padding: 20px 0;
    }

    .card-body {
      padding: 20px;
    }

    .btn-primary {
      background-color: #003366;
      border-color: #003366;
    }

    .btn-primary:hover {
      background-color: #00509e;
      border-color: #00509e;
    }

    .alert {
      margin-top: 10px;
    }

    .icheck-primary>label {
      color: #003366;
    }
    .card-header {
      font-size: 25px;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <b>BEBAS TANGGUNGAN</b><br>POLINEMA
      </div>
      <div class="card-body">
        <p class="login-box-msg">Silakan masuk untuk melanjutkan</p>

        <!-- Flash Message -->
        <?php
        $status = $session->getFlash('status');
        if ($status === false) {
          $message = $session->getFlash('message');
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
            . $message .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>

        <form action="action/auth.php?act=login" method="post" id="form-login">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">Ingat Saya</label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="adminlte/plugins/jquery/jquery.min.js"></script>
  <script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="adminlte/dist/js/adminlte.min.js"></script>
  <script src="adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#form-login').validate({
        rules: {
          username: {
            required: true,
            minlength: 3,
            maxlength: 20
          },
          password: {
            required: true,
            minlength: 5,
            maxlength: 255
          },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-group').append(error);
        },
        highlight: function(element) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
          $(element).removeClass('is-invalid');
        },
      });
    });
  </script>
</body>

</html>