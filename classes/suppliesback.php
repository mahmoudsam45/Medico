<?php
include_once"baseOperations.php";
include_once"Database.php";
session_start();
class supplies extends Database implements Operations
{
    var $suppid;
    var $suppname;
    



    public function setsuppid($id)
    {
        $this->suppid=$id;
    }
    public function setsuppname($nam)
    {
        $this->suppname=$nam;
    }
   
    public function getsuppid()
    {
        return $this->suppidid;
    }
    public function getsuppname()
    {
        return $this->suppname;
    }
   
  
    
   
    
    public function Add()
    {

        return parent::RunDML("insert into supplies values(Default,'".$this->getsuppname()."')");
    }

    public function Update()
    {
        return parent::RunDML("update supplies set supplyname='".$this->getsuppname()."' where supplyid = '".$_SESSION["supid"]."'");

    }
    public function Delete()
    {
        return parent::RunDML("delete  from supplies where supplyid= '".$_SESSION['del']."'");

    }
   public function GetAll()
   {
       return parent::GetData("select * from supplies ");
   }





}




?>