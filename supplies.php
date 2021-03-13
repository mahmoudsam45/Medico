<?php
include "header.php";
include "classes/suppliesback.php";
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
              <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span style="float: right;">الصفحة الرئيسية</span></a>
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
            <li class="active">
              <a href="supplies.php" style="text-align: right;"><i class="fa fa-archive" style="margin-left:5px"></i><span>المستلزمات</span></a>
            </li>
           
      </div>
<div class="main-content">
    <section class="section">

        <div class="card">
            <div class="card-header">
                <h2 style="float:right"> الأجهزة</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill" id="myTab" style="float:right;" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link" id="mod-tab3" data-toggle="tab" href="#mod3" role="tab" aria-controls="mod3" aria-selected="false">تعديل</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" id="add-tab3" data-toggle="tab" href="#add3" role="tab" aria-controls="add3" aria-selected="false">إضافة</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent" style="margin-top:5%;">
                        <div class="tab-pane fade active show " id="add3" aria-labelledby="add-tab3" role="tabpanel">
                            <center>
                                <form class="form-control" style="width: 75%; " method="post">
                                    <input type="text" class="form-control" name="suppname" placeholder="أدخل اسم الجهاز" style=" text-align:right" required>
                                    <br>

                                    <input type="submit" value="حفظ البيانات" class="btn btn-success btn-block" name="btnsave" />
                                    <?php

                                    if (isset($_POST["btnsave"])) {
                                        $save = new supplies();
                                        $save->setsuppname($_POST["suppname"]);
                                        $save->Add();
                                    }

                                    ?>

                                </form>
                            </center>
                        </div>
                        <div class="tab-pane fade" id="mod3" role="tabpanel" aria-labelledby="mod-tab3">
                            <form class="form-control" method="post">
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" style="text-align: right;">
                                        <tr>
                                            <th>الحذف</th>
                                            <th> الاسم</th>
                                            <th>رقم الأداة</th>
                                        </tr>
                                        <?php
                                        $up = new supplies();
                                        $rs = $up->GetAll();
                                        while ($row = mysqli_fetch_assoc($rs)) {
                                        ?>
                                            <tr>
                                                <td><input type="submit" name="btn<?php echo $row["supplyid"];?>" value="حذف" class="btn btn-danger" /> </td>

                                                <td><?php echo $row['supplyname'] ?></td>
                                                <td><?php echo $row['supplyid'] ?></td>

                                            </tr>
                                            <?php

                                            if (isset($_POST["btn".$row["supplyid"]])) {
                                                $del = new supplies();
                                                $_SESSION["del"] = $row["supplyid"];
                                                $del->Delete();
                                                header("Location:supplies.php");
                                            }
                                            ?>

                                        <?php
                                        } ?>
                                    </table>


                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<?php

include "footer.php";

?>