<?php
  include "header.php";
  session_start();

if (!isset($_COOKIE["usercookie"]))
  echo "<script>window.open('login.php','_self')</script>";
else
  $_SESSION["user"] = $_COOKIE["namecookie"];
  $_SESSION["id"] = $_COOKIE["usercookie"];

?>
<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <br>
          <div class="sidebar-brand">
            <a href="index.html">Medico</a>
          </div>

          <div class="sidebar-user">
            <br>

            <div class="sidebar-user-picture">
              <img alt="image" src="dist/img/avatar/avatar-1.jpeg">
            </div>
            <div class="sidebar-user-details">
              <div class="user-name"><?php echo $_COOKIE["namecookie"] ?></div>
              <div class="user-role">
                Administrator
              </div>
            </div>
          </div>
          <br>

          <ul class="sidebar-menu ">
            <li >
              <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span style="float: right;margin-left: 10px;">الصفحة الرئيسية</span></a>
            </li>
            <li>
              <a href="#" class="has-dropdown "><span style="float: right; margin-left: 10px;">الأذونات</span><i class="ion ion-ios-albums-outline"></i></a>
              <ul class="menu-dropdown ">
                <li ><a href="leave_permetion.php" style="text-align: right;"><i class="ion ion-ios-circle-outline" style="float: right; margin-left:10px"></i> اذن خروج</a></li>
                <li><a href="medicine_permetion.php" style="text-align: right;"><i class="ion ion-ios-circle-outline" style="float: right; margin-left:10px"></i> اذن  أدوية</a></li>
                <li ><a href="supplies_permetion.php" style="text-align: right;"><i class="ion ion-ios-circle-outline" style="float: right; margin-left:10px"></i> اذن  مستلزمات</a></li>

              </ul>
            </li>
            <li  >
              <a href="emp.php" style="text-align: right;"><i class="fas fa-address-card"></i><span>الموظفين</span></a>
            </li>
            <li >
              <a href="medicine.php" style="text-align: right;"><i class="fas fa-flask"></i><span>الأدوية</span></a>
            </li>
            <li>
              <a href="supplies.php" style="text-align: right;"><i class="fa fa-archive" style="margin-left:5px"></i><span>المستلزمات</span></a>
            </li>
           
      </div>

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <center>
              <h2>ملفى الشخصى</h2>
            </center>

            <div class="container m-2" style="background-color:primary;">
              <form class="form-control" method="post">
                <table class="table table-striped table-bordered table-dark mr-3">
                  <?php
                  include_once "classes/users.php";
                  $user = new users();
                  $rs = $user->GetAll();
                  if ($row = mysqli_fetch_assoc($rs)) {
                  ?>
                    <tr>
                      <td>
                        <?php echo $row["userName"]; ?>
                      </td>

                      <td style="text-align:right">
                        الاسم
                      </td>

                    </tr>
                    <tr>
                      <td>
                        <?php echo $row["Email"]; ?>

                      </td>
                      <td style="text-align:right">
                        الايميل
                      </td>

                    </tr>
                    <tr>

                      <td>
                        <?php echo $row["password"]; ?>

                      </td>
                      <td style="text-align:right">
                        كلمة السر
                      </td>
                    </tr>

                  <?php } ?>
                  <tr style="text-align: center" colspan="2">
                    <td><input type="submit" name="del" class="btn btn-danger" value="حذف الملف الشخصى"></td>
                    <td><input type="submit" name="upd" class="btn btn-warning" value="تعديل الملف الشخصى"></td>
                  </tr>
                  <?php
                  include_once "classes/users.php";
                  if (isset($_POST["upd"]))
                    echo "<script>window.open('editprofile.php','_self')</script>";
                 
                  ?>
                  <?php
                  if (isset($_POST["del"])) {
                    $user = new users();
                    $msg = $user->Delete();
                    if ($msg == "Done") {
                      echo "<script>window.open('logout.php','_self')</script>";
                    }
                  }
                  
                  ?>
                </table>

              </form>
            </div>

          </div>
        </section>
      </div>
    </div>
  </div>

<?php include "footer.php";?>