<?php
include "header.php";
session_start();
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


            <div class="container m-3" style="background-color:primary;">
                <form class="form-control" method="post">
                    <table class="table table-striped table-bordered table-dark mr-4">
                        <?php
                            include_once "classes/users.php";

                        if (isset($_POST["upd"])) {
                            $admin = new users();
                            $admin->setname($_POST["myname"]);
                            $admin->setpassword($_POST["pass"]);
                            $admin->setemail($_POST["emaily"]);

                            //$regu = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
                            $msg = $admin->Update();
                            if ($msg == "Done") {
                                echo "<div class='alert alert-success'>User updated succefully</div>";
                            } 
                            else if (strpos($msg, "users.Email")) { 
                                echo "<div class=' alert alert-danger' >email already used</div>";
                              
                            }
                             else {
                                echo $msg;
                            }
                        }

                        ?>
                        <?php
                        include_once "classes/users.php";
                        $user = new users();
                        $rs = $user->GetAll();
                        if ($row = mysqli_fetch_assoc($rs)) {
                        ?>
                            <tr>
                                <td colspan="2">
                                    <center>
                                        <h2>تعديل ملفى الشخصى </h2>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="myname" placeholder="<?php echo $row["userName"]; ?>">
                                </td>

                                <td style="text-align:right">
                                    <h5>الاسم</h5>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="emaily" placeholder="<?php echo $row["Email"]; ?>">

                                </td>
                                <td style="text-align:right">
                                    <h5>الايميل</h5>
                                </td>

                            </tr>
                            <tr>

                                <td>
                                    <input type="text" class="form-control" name="pass" placeholder="<?php echo $row["password"]; ?>">

                                </td>
                                <td style="text-align:right">
                                    <h5>كلمة السر</h5>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr style="text-align: center">

                            <td colspan="2"><input type="submit" name="upd" class="btn btn-warning" value="تحديث الملف الشخصى"></td>
                        </tr>
                    </table>

                </form>
            </div>
        </div>
    </section>
</div>

<script src="dist/modules/jquery.min.js"></script>
<script src="dist/modules/popper.js"></script>
<script src="dist/modules/tooltip.js"></script>
<script src="dist/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
<script src="dist/js/sa-functions.js"></script>

<script src="dist/modules/chart.min.js"></script>
<script src="dist/modules/summernote/summernote-lite.js"></script>
<script src="dist/js/scripts.js"></script>
<script src="dist/js/custom.js"></script>
</body>

</html>