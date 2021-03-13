<?php
include_once "baseOperations.php";
include_once "Database.php";
ob_start();

class leave extends Database implements Operations
{
    var $empname;
    var $depname;
    var $startdate;
    var $enddate;
    var $type;

    public function setempname($na)
    {
        $this->empname = $na;
    }
    public function setdepname($nam)
    {
        $this->depname = $nam;
    }
    public function setstartdate($start)
    {
        $this->startdate = $start;
    }
    public function setenddate($end)
    {
        $this->enddate = $end;
    }
    public function settype($typ)
    {
        $this->type = $typ;
    }
    public function gettype()
    {
        return $this->type;
    }
    public function getempname()
    {
        return $this->empname;
    }
    public function getdepname()
    {
        return $this->depname;
    }
    public function getstartdate()
    {
        return $this->startdate;
    }
    public function getenddate()
    {
        return $this->enddate;
    }
    public function getempid()
    {
        $rs = parent::GetData("select employeid from employee where (name='" . $this->getempname() . "')");
        if ($row = mysqli_fetch_assoc($rs))
            return $row["employeid"];
        else
            echo "تأكد من الاسم";
    }
    public function Add()
    {

        return parent::RunDML("insert into leave_permession values(Default,'" . $this->gettype() . "','" . $this->getstartdate() . "','" . $this->getenddate() . "','" . $this->getempid() . "')");
    }
    public function Update()
    {
        // return parent::RunDML("update users set userName='".$this->getname()."', Email='".$this->getemail()."', password='".$this->getpass()."' where userId='".$_SESSION["id"]."'");
    }
    public function Delete()
    {
        return parent::RunDML("delete  from leave_permession where ( leaveid='".$_SESSION["dell"]."')");
    }
    public function GetAll()
    {
        return parent::GetData("select * from leave_permession where employeid= '" . $_SESSION["id"] . "' ");
    }
    public function getholiday()
    {
        return parent::GetData("select  count(leaveid) from leave_permession where Type='إذن أجازة'  AND startdate='".date("Y-m-d")."'
       ");
    }
    public function gettimeoff()
    {
        return parent::GetData("select count(leaveid) from leave_permession where Type='إذن خروج'AND startdate='".date("Y-m-d")."'");
    }
}
