<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Biro Hukum Jakarta | Admin Login</title>

    <link rel="stylesheet" href="<?php echo assets_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo assets_url('plugins/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?php echo assets_url('css/custom.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo assets_url('css/style.css'); ?>">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="<?=base_url('admin/do_login')?>">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Email" name="email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class=""></i> Biro Hukum Jakarta</h1>
                  <p>©2018 All Rights Reserved. Biro Hukum Jakarta. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
    </div>
  </body>
</html>
