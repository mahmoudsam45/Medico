<?php
include "classes/users.php";
ob_start();
session_start();
if (isset($_COOKIE["usercookie"]))
  echo "<script>window.open('index.php','_self')</script>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>Medico</title>

  <link rel="stylesheet" href="dist/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

  <link rel="stylesheet" href="dist/css/demo.css">
  <link rel="stylesheet" href="dist/css/style.css">
</head>


<body style="background-image: url('bg.jpg');background-size: 100%;">
  <div id="app">
    <section class="section">
      <div class="container mt-6">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              Medico
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h3 style="float:right">تسجيل الدخول</h3>
              </div>

              <div class="card-body">
                <form method="POST" class="needs-validation" novalidate="">
                  <?php
                  if (isset($_COOKIE["usercookie"])) {
                    $_SESSION["id"] = $_COOKIE["usercookie"];
                    $_SESSION["user"] = $_COOKIE["namecookie"];
                    echo "<script>window.open('index.php','_self')</script>";
                  }
                  if (isset($_POST["log"])) {
                    $user = new users();
                    $user->setemail($_POST["email"]);
                    $user->setpassword($_POST["password"]);
                    $res = $user->login();
                    if ($col = mysqli_fetch_assoc($res)) {
                      $_SESSION["user"] = $col["userName"];
                      $_SESSION["id"] = $col["userId"];
                      if (isset($_POST["remember"])) {
                        setcookie("usercookie", $_SESSION["id"], time() + 60 * 60 * 24 * 365);
                        setcookie("namecookie", $_SESSION["user"], time() + 60 * 60 * 24 * 365);
                      }
                      echo "<script>window.open('index.php','_self')</script>";
                    } else {
                      echo "<div class='alert alert-danger'>Invalid user or password</div>";
                    }
                  }



                  ?>
                  <div class="form-group">
                    <label for="email" style="float:right">الحساب</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback" style="float:right">
                      من فضلك أدخل عنوان البريد الإلكترونى </div>
                  </div>

                  <div class="form-group">
                    <label for="password" class="d-block" style="float:right; ">كلمة السر
                        <a href="forgot.html" style="float:left; margin-right:150px" >
                          نسيت كلمة السر؟
                        </a>
                    </label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      من فضلك أدخل كلمة السر </div>
                  </div>

                  <div class="form-group" style="float:right">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me" >تذكرنى</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" tabindex="4" name="log" value="دخول">

                  </div>
                </form>
              </div>
            </div>


            <center>
              <div class="form-control" style="text-decoration-color: white;">
                ليس لديك حساب؟ <a href="register.php">انشاء إيميل</a>
                <br>
                Site By Mahmoud Samir
              </div>
            </center>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="../dist/modules/jquery.min.js"></script>
  <script src="../dist/modules/popper.js"></script>
  <script src="../dist/modules/tooltip.js"></script>
  <script src="../dist/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../dist/modules/moment.min.js"></script>
  <script src="../dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="../dist/js/sa-functions.js"></script>

  <script src="../dist/js/scripts.js"></script>
  <script src="../dist/js/custom.js"></script>
</body>

</html>