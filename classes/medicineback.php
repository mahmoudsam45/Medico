<?php
include_once"baseOperations.php";
include_once"Database.php";
session_start();
class medicine extends Database implements Operations
{
    var $medid;
    var $medname;
    



    public function setmedid($id)
    {
        $this->medid=$id;
    }
    public function setmedname($nam)
    {
        $this->medname=$nam;
    }
   
    public function getmedid()
    {
        return $this->medid;
    }
    public function getmedname()
    {
        return $this->medname;
    }
    public function Add()
    {

        return parent::RunDML("insert into medicine values(Default,'".$this->getmedname()."')");
    }

    public function Update()
    {
        return parent::RunDML("update medicine set medname='".$this->getmedname()."' where medecineid = '".$_SESSION["medid"]."'");

    }
    public function Delete()
    {
        return parent::RunDML("delete  from medicine where medecineid= '".$_SESSION['dell']."'");

    }
   public function GetAll()
   {
       return parent::GetData("select * from medicine ");
   }





}




?>