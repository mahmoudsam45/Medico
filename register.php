<?php
ob_start();

session_start();
if (isset($_COOKIE["usercookie"])) {
header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title> انشاء إيميل</title>

  <link rel="stylesheet" href="dist/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

  <link rel="stylesheet" href="dist/css/demo.css">
  <link rel="stylesheet" href="dist/css/style.css">
</head>

<body style="background-image: url('bg.jpg');background-size: 100%;"">
  <div id=" app">
  <section class="section">
    <div class="container mt-7">
      <div class="row">
        <div class="col-12 col-sm-9 offset-sm-1 col-md-7 offset-md-2 col-lg-7 offset-lg-2 col-xl-6 offset-xl-3">

          <div class="login-brand" style="color: white;">
            Medico
          </div>
          <div class="card card-primary">
            <div class="card-header">
              <h3 style="float:right">إنشاء بريد إلكترونى</h3>
            </div>
            <div class="card-body">
              <form method="post">
                <?php

                if (isset($_POST["reg"])) {
                  include_once "classes/users.php";
                  $user = new users();
                  $user->setname($_POST["name"]);
                  $user->setpassword($_POST["pass"]);
                  $user->setemail($_POST["email"]);

                 // $regu = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";


                  // if (preg_match($regu, $_POST['pass'])) 
                    $msg = $user->Add();
                    if ($msg == "Done") {
                      echo "<div class='alert alert-success'>تم الانشاء بنجاح</div>";
                      header("Location:index.php");
                    } else if (strpos($msg, "users.Email")) { 
                        echo "<div class=' alert alert-danger' >الايميل موجود بالفعل</div>";
                      
                    } else
                      echo $msg;
                  //  else {
                  //   echo "<div class='alert alert-warning'>Password is weak !!! </div>";
                  // }
                }
                ?>
                <div class="form-group" >
                  <label for="name" style="float:right">الاسم</label>
                  <input id="name" type="text" class="form-control" name="name" required>
                  <div class="invalid-feedback">
                  </div>
                </div>

                <div class="form-group" >
                  <label for="email" style="float:right">البريد الإلكترونى</label>
                  <input id="email" type="email" class="form-control" name="email">
                  <div class="invalid-feedback">
                  </div>
                </div>

                <div class="form-group ">
                  <label for="password" class="d-block"style="float:right">كلمة السر</label>
                  <input id="password" type="password" class="form-control" name="pass">
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox"style="float:right">
                    <input type="checkbox" name="agree" class="custom-control-input" id="agree" required="">
                    <label class="custom-control-label" for="agree">أنا أوافق على الشروط</label>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block" name="reg" value="تسجيل">
                </div>

              </form>

            </div>

          </div>
          <center>
            <div class="form-control" style="text-decoration-color: white;">
              لديك حساب؟ <a href="login.php">إضغط هنا</a>
              <br>
              By Mahmoud Samir
            </div>
          </center>

        </div>
      </div>
    </div>
  </section>
  </div>

  <script src="dist/modules/jquery.min.js"></script>
  <script src="dist/modules/popper.js"></script>
  <script src="dist/modules/tooltip.js"></script>
  <script src="dist/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="dist/modules/moment.min.js"></script>
  <script src="dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="dist/js/sa-functions.js"></script>

  <script src="dist/js/scripts.js"></script>
  <script src="dist/js/custom.js"></script>

</body>

</html>