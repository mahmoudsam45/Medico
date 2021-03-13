<?php
include_once"baseOperations.php";
include_once"Database.php";
session_start();
class employee extends Database implements Operations
{
    var $empid;
    var $empname;
    var $address;
    var $jobtype;
    var $phone;
    var $deptno;

    public function setdeptno($dep)
    {
        $this->deptno=$dep;
    }
    public function setphone($empphone)
{
    $this->phone=$empphone;
}
    public function setempid($id)
    {
        $this->empid=$id;
    }
    public function setempname($nam)
    {
        $this->empname=$nam;
    }
    public function setaddress($adr)
    {
        $this->address=$adr;
    }
    public function setjobtype($job)
    {
        $this->jobtype=$job;
    }
    public function getdeptno()
    {
        return $this->deptno;
    }
    public function getempid()
    {
        return $this->empid;
    }
    public function getempname()
    {
        return $this->empname;
    }
    public function getaddress()
    {
        return $this->address;
    }
    public function getjobtype()
    {
        return $this->jobtype;
    }
    public function getphone()
    {
        return $this->phone;
    }
    public function getdept()
    {
        
        $rs=( parent::GetData("select * from department where name='".$_SESSION["deptname"]."'"));
        $row=mysqli_fetch_assoc($rs);
        return $row["departid"];

    }
    public function getdeptname()
    {
        
        return  parent::GetData("select * from department where departid='".$this->getdeptno()."'");
        

    }

     public function getdeptid()
    {
        $resu=$this->GetAll();
        $rowi=mysqli_fetch_assoc($resu);
        return $rowi["departid"];
    }
   
    
    public function Add()
    {

        return parent::RunDML("insert into employee values(Default,'".$this->getempname()."','".$this->getjobtype()."','".$this->getaddress()."','".$this->getdept()."', '".$this->getphone()."')");
    }

    public function Update()
    {
        return parent::RunDML("update employee set name='".$this->getempname()."', jobType='".$this->getjobtype()."', address='".$this->getaddress()."', phone='".$this->getphone()."' where employeid = '".$_SESSION["Emplid"]."'");

    }
    public function Delete()
    {
        return parent::RunDML("delete  from employee where employeid= '".$_SESSION["del"]."'");

    }
   public function GetAll()
   {
       return parent::GetData("select * from employee ");
   }





}




?>