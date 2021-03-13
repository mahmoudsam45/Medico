<?php
include "header.php";
include "classes/leave.php";
include "classes/employee.php";
include "classes/suppliesperm.php";
include "classes/medicineperm.php";

if (!isset($_COOKIE["usercookie"]))
  echo "<script>window.open('login.php','_self')</script>";
else
  $_SESSION["user"] = $_COOKIE["namecookie"];
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
        <img alt="image" src="../dist/img/avatar/avatar-1.jpeg">
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
      <li class="active">
        <a href="index.php"><span style="float: right;">الصفحة الرئيسية</span><i style="margin-left: 3px;" class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li>
        <a href="#" class="has-dropdown "><span style="float: right; margin-left: 10px;">الأذونات</span><i class="ion ion-ios-albums-outline"></i></a>
        <ul class="menu-dropdown ">
          <li><a href="leave_permetion.php" style="text-align: right;"><i class="ion ion-ios-circle-outline" style="float: right; margin-left:10px"></i> اذن خروج</a></li>
          <li><a href="medicine_permetion.php" style="text-align: right;"><i class="ion ion-ios-circle-outline" style="float: right; margin-left:10px"></i> اذن أدوية</a></li>
          <li><a href="supplies_permetion.php" style="text-align: right;"><i class="ion ion-ios-circle-outline" style="float: right; margin-left:10px"></i> اذن مستلزمات</a></li>

        </ul>
      </li>
      <li>
        <a href="emp.php" style="text-align: right;"><i class="fas fa-address-card"></i><span>الموظفين</span></a>
      </li>
      <li>
        <a href="medicine.php" style="text-align: right;"><i class="fas fa-flask"></i><span>الأدوية</span></a>
      </li>
      <li>
        <a href="supplies.php" style="text-align: right;"><i class="fa fa-archive" style="margin-left:5px"></i><span>المستلزمات</span></a>
      </li>

</div>

<div class="main-content">
  <section class="section">
    <h5 class="section-header ">
      <center>
        <div>الصفحة الرئيسية</div>
      </center>
    </h5>
    <div class="card">
      <div class="row">
        <div class="col-lg-2 col-md-6 col-12">
          <div class="card card-sm-2">
            <div class="card-icon bg-primary">
              <i class="ion ion-person"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>إذن أجازة </h4>
              </div>
              <div class="card-body">
                <?php
                $temp = new leave();
                $rs = mysqli_fetch_assoc($temp->getholiday());
                echo $rs["count(leaveid)"];
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-12">
          <div class="card card-sm-2">
            <div class="card-icon bg-danger">
              <i class="ion ion-ios-paper-outline"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>إذن خروج</h4>
              </div>
              <div class="card-body">
                <?php
                $temp = new leave();
                $rs = mysqli_fetch_assoc($temp->gettimeoff());
                echo $rs["count(leaveid)"];
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-12">
          <div class="card card-sm-2">
            <div class="card-icon bg-warning">
              <i class="ion ion-paper-airplane"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>صرف مستلزمات</h4>
              </div>
              <div class="card-body">
              <?php
                $tempp = new supplyperm();
                $res = mysqli_fetch_assoc($tempp->getpaidsup());
                echo $res["count(suppermid)"];
                ?>              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-12">
          <div class="card card-sm-2">
            <div class="card-icon bg-success">
              <i class="ion ion-record"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>مستلزمات مجانية</h4>
              </div>
              <div class="card-body">
              <?php
                $tempo = new supplyperm();
                $rsu = mysqli_fetch_assoc($tempo->getfreesup());
                echo $rsu["count(suppermid)"];
                ?> 
              </div>
            </div>
          </div>

        </div>
        <div class="col-lg-2 col-md-6 col-12">
          <div class="card card-sm-2">
            <div class="card-icon bg-success">
              <i class="ion ion-record"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>إذن صرف أدوية </h4>
              </div>
              <div class="card-body">
              <?php
                $temp = new medicineperm();
                $rs = mysqli_fetch_assoc($temp->getpaid());
                echo $rs["count(medperm)"];
                ?> 
              </div>
            </div>
          </div>

        </div>
        <div class="col-lg-2 col-md-6 col-12">
          <div class="card card-sm-2">
            <div class="card-icon bg-success">
              <i class="ion ion-record"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>إذن أدوية مجانية</h4>
              </div>
              <div class="card-body">
              <?php
                $temp = new medicineperm();
                $rs = mysqli_fetch_assoc($temp->getfree());
                echo $rs["count(medperm)"];
                ?> 
              </div>
            </div>
          </div>

        </div>
      </div>
    
    <form method="POST">
      <div style="overflow-x:auto;">

        <table class="table table-bordered table-striped" style="text-align: right;">
          <tr>
            <th>الاذن</th>
            <th>القسم</th>
            <th>الوظيفة</th>
            <th> اسم الموظف</th>
            <th>رقم الموظف</th>
          </tr>
          <?php
          $up = new employee();
          $rs = $up->GetAll();

          while ($row = mysqli_fetch_assoc($rs)) {
            $up->setdeptno($row['departid']);
            $dept = $up->getdeptname();
            $depnam = mysqli_fetch_assoc($dept);
          ?>
            <tr >
           

              <td ><input type="submit" name="btnn<?php echo $row["employeid"]; ?>" value="إذن مستلزمات" class="btn btn-warning" />
                <input type="submit" name="bttn<?php echo $row["employeid"]; ?>" value="إذن أدوية" class="btn btn-success" />
                <input type="submit" name="btn<?php echo $row["employeid"]; ?>" value="إذن خروج" class="btn btn-primary" />

              </td>
              <td><?php echo $depnam['name']  ?></td>
              <td><?php echo $row['jobType'] ?> </td>
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['employeid'] ?></td>

            </tr>
            <?php

            if (isset($_POST["btn" . $row["employeid"]])) {
              $del = new employee();
              $_SESSION["empname"] = $row["name"];
              $_SESSION["depname"] = $depname["name"];
              $_SESSION["id"] = $row["employeid"];
              header("Location:leave_permetion.php");
            }
            ?>
            <?php

            if (isset($_POST["bttn" . $row["employeid"]])) {
              $del = new employee();
              $_SESSION["empname"] = $row["name"];
              $_SESSION["depname"] = $depname["name"];
              $_SESSION["id"] = $row["employeid"];

              header("Location:medicine_permetion.php");
            }
            ?>
            <?php

            if (isset($_POST["btnn" . $row["employeid"]])) {
              $del = new employee();
              $_SESSION["empname"] = $row["name"];
              $_SESSION["depname"] = $depname["name"];
              $_SESSION["id"] = $row["employeid"];

              header("Location:supplies_permetion.php");
            }
            ?>

          <?php
          } ?>
        </table>
      </div>
    </form>
    </div>
  </section>
</div>
<footer class="main-footer">
  <div class="footer-left">
  </div>
  <div class="footer-right"></div>
</footer>
</div>
</div>

<script src="../dist/modules/jquery.min.js"></script>
<script src="../dist/modules/popper.js"></script>
<script src="../dist/modules/tooltip.js"></script>
<script src="../dist/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="../dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
<script src="../dist/js/sa-functions.js"></script>

<script src="../dist/modules/chart.min.js"></script>
<script src="../dist/modules/summernote/summernote-lite.js"></script>


<script src="../dist/js/scripts.js"></script>
<script src="../dist/js/custom.js"></script>
<script src="../dist/js/demo.js"></script>
</body>

</html>