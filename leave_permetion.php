<?php
include "header.php";
include "classes/leave.php";
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
            <li>
                <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span style="float: right;">الصفحة الرئيسية</span></a>
            </li>
            <li class="active">
                <a href="#" class="has-dropdown "><span style="float: right; margin-left: 10px;">الأذونات</span><i class="ion ion-ios-albums-outline"></i></a>
                <ul class="menu-dropdown ">
                    <li class="active"><a href="leave_permetion.php" style="text-align: right;"><i class="ion ion-ios-circle-outline" style="float: right; margin-left:10px"></i> اذن خروج</a></li>
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
                            <form class="form-control" enctype="multipart/form-data" method="post">
                                <p style="float: right;" class="alert alert-warning">اسم الموظف : <?php echo $_SESSION["empname"] ?></p>
                                <br>
                                <input type="text" class="form-control" name="stdat" placeholder="تاريخ بداية الإذن" onfocus="(this.type='date')" onblur="(this.type='text')" value="تاريخ بداية الإذن" style=" text-align:right">
                                <br>
                                <input type="text" class="form-control" name="endat" placeholder="تاريخ نهاية الإذن" onfocus="(this.type='date')" onblur="(this.type='text')" value="تاريخ انتهاء الإذن" style=" text-align:right">
                                <br>
                                <input type="file" class="form-control" name="imag" placeholder="صورة الإذن" style="text-align:right important" value="أدخل صورة الإذن">
                                <br>
                                <div class="form" style="float: right;">
                                    <div class="form-group">
                                        <input class="form-check-input" type="radio" name="out" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <h4> إذن خروج </h4>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-check-input" type="radio" name="hol" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <h4> إذن أجازة </h4>
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <input type="submit" class="form-control btn btn-primary" name="adddd" value="إضافة" style="text-align:center">


                                <?php
                                if (isset($_POST["adddd"])) {
                                    $type = "";
                                    if (isset($_POST["out"]))
                                        $type = "إذن خروج";
                                    else
                                        $type = "إذن أجازة";
                                    $perm = new leave();
                                    $perm->setempname($_SESSION["empname"]);
                                    $perm->settype($type);
                                    $perm->setstartdate($_POST["stdat"]);
                                    $perm->setenddate($_POST["endat"]);
                                    $perm->Add();
                                    $dir = "permetionimage/";
                                    $image = $_FILES["imag"]["name"];
                                    $temp_name = $_FILES['imag']['tmp_name'];
                                    $typ=$perm->gettype();
                                    $dat=$perm->getstartdate();


                                    if ($image != "") {
                                        $fdir = $dir . $_SESSION["id"] . $typ . $dat . ".jpg";
                                        move_uploaded_file($temp_name, $fdir);
                                        echo "<br><div class='alert alert-success'style='text-align:right;'>تمت اضافة الإذن</div>";
                                    } else
                                        echo "failed";
                                }
                                ?>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="mod3" role="tabpanel" aria-labelledby="mod-tab3">
                            <div class="table-responsive">
                                <form method="post">
                                    <table class="table table-bordered table-striped" style="text-align: right;">
                                        <tr>
                                            <th>الحذف</th>
                                            <th>نهاية الإذن</th>
                                            <th>تاريخ الإذن</th>
                                            <th> النوع</th>
                                            <th>رقم الموظف</th>
                                        </tr>
                                        <?php
                                        $up = new leave();
                                        $rs = $up->GetAll();
                                        while ($row = mysqli_fetch_assoc($rs)) {


                                        ?>
                                            <tr>
                                                <td><input type="submit" name="btn<?php echo $row["leaveid"]; ?>" value="حذف" class="btn btn-danger" /> </td>
                                                <td><?php echo $row['enddate']  ?></td>
                                                <td><?php echo $row['startdate'] ?> </td>
                                                <td><?php echo $row['Type'] ?></td>
                                                <td><?php echo $row['employeid'] ?></td>

                                            </tr>
                                            <?php

                                            if (isset($_POST["btn" . $row["leaveid"]])) {
                                                $del = new leave();
                                                $_SESSION["dell"] = $row["leaveid"];
                                                $del->Delete();
                                                header("Location:leave_permetion.php");
                                            }
                                            ?>

                                        <?php
                                        } ?>
                                    </table>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

    </section>
</div>
<?php include "footer.php"; ?>