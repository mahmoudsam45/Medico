<?php
include "header.php";
include "classes/suppliesback.php";
include "classes/suppliesperm.php";


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
            <li  class="active">
              <a href="#" class="has-dropdown "><span style="float: right; margin-left: 10px;">الأذونات</span><i class="ion ion-ios-albums-outline"></i></a>
              <ul class="menu-dropdown ">
                <li ><a href="leave_permetion.php" style="text-align: right;"><i class="ion ion-ios-circle-outline" style="float: right; margin-left:10px"></i> اذن خروج</a></li>
                <li ><a href="medicine_permetion.php" style="text-align: right;"><i class="ion ion-ios-circle-outline" style="float: right; margin-left:10px"></i> اذن  أدوية</a></li>
                <li class="active" ><a href="supplies_permetion.php" style="text-align: right;"><i class="ion ion-ios-circle-outline" style="float: right; margin-left:10px"></i> اذن  مستلزمات</a></li>

              </ul>
            </li>
            <li  >
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

        <div class="card">
            <div class="card-header">
                <h2 style="float:right">تفاصيل الإذن</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill" id="myTab" style="float:right;" role="tablist">
                       
                        <li class="nav-item">
                            <a class="nav-link" id="mod-tab3" data-toggle="tab" href="#mod3" role="tab" aria-controls="profile" aria-selected="false">تعديل</a>
                        </li>
                      
                        <li class="nav-item">
                            <a class="nav-link active" id="add-tab3" data-toggle="tab" href="#add3" role="tab" aria-controls="add3" aria-selected="false">إضافة</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent" style="margin-top:5%;">
                        <div class="tab-pane fade active show " id="add3" aria-labelledby="add-tab3" role="tabpanel">
                            <?php 
                            $sup=new supplies();
                            $rs=$sup->GetAll();
                           
                            ?>
                            <form class="form-control" enctype="multipart/form-data" method="post">
                            <p style="float: right;" class="alert alert-warning">اسم الموظف : <?php echo $_SESSION["empname"] ?></p>
              <br>
                            <select  class="form-control" name="matname" placeholder="اختر اسم المادة" style=" text-align:right">
                            <?php  while($row=mysqli_fetch_assoc($rs)){?>
                                <option value="<?php echo $row['supplyname'];?>"><?php echo $row['supplyname'];?></option>
                            <?php   } ?><br><br>
                                <input type="text" class="form-control" name="quan" placeholder="أدخل الكمية " style=" text-align:right">
                                <br>
                                <input type="text" class="form-control" name="stdat" placeholder="تاريخ  الإذن" onfocus="(this.type='date')" onblur="(this.type='text')" value="تاريخ الإذن" style=" text-align:right">
                                <br>
                                <input type="file" class="form-control" name="imag" placeholder="صورة الإذن" value="أدخل صورة الإذن">
                                <br>
                                <div class="form" style="float: right;">
                                    <div class="form-group">
                                        <input class="form-check-input" type="radio" name="out" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <h4> إذن صرف </h4>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-check-input" type="radio" name="hol" id="flexRadioDefault2" >
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <h4> إذن مجانى </h4>
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <input type="submit" class="form-control btn btn-primary" name="adddd" value="إضافة" style="text-align:center">


                                <?php
                                if (isset($_POST["adddd"])) {
                                    $type="";
                                    if(isset($_POST["out"]))
                                         $type="إذن صرف" ;
                                    else
                                         $type="إذن مجانى";
                                    $perm=new supplyperm();
                                    $perm->setpermtype($type);
                                    $perm->setSupname($_POST["matname"]);
                                    $perm->setQuant($_POST["quan"]);
                                    $perm->setSupdate($_POST["stdat"]);
                                    $perm->Add();
                                    $dir = "permetionimage/";
                                    $image = $_FILES["imag"]["name"];
                                    $temp_name = $_FILES['imag']['tmp_name'];
                                    $typ=$perm->getPermtype();
                                    $dat=$perm->getsupdate();


                                    if ($image != "") {
                                        $fdir = $dir . $_SESSION["id"] .$typ.$dat. ".jpg";
                                        move_uploaded_file($temp_name, $fdir);
                                        echo "<br><div class='alert alert-success'style='text-align:right;'>تمت اضافة الإذن</div>";
                                    } else
                                        echo "failed";
                                }




                                ?>




                            </form>
                        </div>
                        <div class="tab-pane fade" id="search3" role="tabpanel" aria-labelledby="search-tab3">
                            <p>

                                wwww</p>
                        </div>
                        <div class="tab-pane fade" id="mod3" role="tabpanel" aria-labelledby="mod-tab3">
                        <div class="table-responsive">
                            <form method="post">
                                <table class="table table-bordered table-striped" style="text-align: right;">
                                    <tr>
                                        <th>الحذف</th>
                                        <th>الكمية </th>
                                        <th>تاريخ الإذن</th>
                                        <th>نوع الإذن</th>
                                        <th>رقم الموظف</th>
                                    </tr>
                                    <?php
                                    $up = new supplyperm();
                                    $rs = $up->GetAll();
                                    while ($row = mysqli_fetch_assoc($rs)) {


                                    ?>
                                        <tr>
                                            <td><input type="submit" name="btn<?php echo $row["suppermid"]; ?>" value="حذف" class="btn btn-danger" /> </td>
                                            <td><?php echo $row['quant']  ?></td>
                                            <td><?php echo $row['Date'] ?> </td>
                                            <td><?php echo $row['type'] ?></td>
                                            <td><?php echo $row['empid'] ?></td>

                                        </tr>
                                        <?php

                                        if (isset($_POST["btn" . $row["suppermid"]])) {
                                            $del = new supplyperm();
                                            $_SESSION["dell"]=$row["suppermid"];
                                            $del->Delete();
                                            header("Location:supplies_permetion.php");
                                        }
                                        ?>

                                    <?php
                                    } ?>
                                </table>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="del3" role="tabpanel" aria-labelledby="del-tab3">
                            <p>

                                sde</p>
                        </div>
                    </div>

                </div>
            </div>
    </section>
</div>
<?php include "footer.php"; ?>