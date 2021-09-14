<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <?= $this->include('layouts/head') ?>
  <!-- Animate.css -->
  <link href="<?= base_url('assets/gentelella/vendors/animate.css/animate.min.css') ?>" rel="stylesheet">

</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <h2><i class="fa fa-tint"></i> WATER RESOURCE MANAGEMENT SYSTEM <i class="fa fa-cloud"></i></h2>
          <?php
          if (session()->getFlashData('logingagal')) {
          ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="alert alert-danger alert-dismissible " role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <?= session()->getFlashData('logingagal') ?>
            </div>
          <?php
          }
          ?>
          <form action="<?php echo base_url('Users/login'); ?>" method="POST">
            <h1>Login Form</h1>
            <div>
              <input type="email" class="form-control" name="emaillogin" placeholder="Email" required="required" />
            </div>
            <div>
              <input type="password" class="form-control" name="passwordlogin" placeholder="Password" required="required" />
            </div>
            <div>
              <button type="submit" class="btn btn-default submit" title="Log in">Log in</button>
              <a class="reset_pass" href="#">lupa password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Pengguna Baru?
                <a href="#signup" class="to_register"> Buat Akun </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>

                <p>@2021 All Rights Reserved. Perum Jasa Tirta II</p>
              </div>
            </div>
          </form>
        </section>
      </div>

      <div id="register" class="animate form registration_form">
        <section class="login_content">
          <form>
            <h1>Create Account</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="<?= base_url('dashboard') ?>">Submit</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Already a member ?
                <a href="#signin" class="to_register"> Log in </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h2><i class="fa fa-paw"></i> Gentelella Alela! with <i class="fa fa-cloud"></i> Awan</h2>
                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>

</html>