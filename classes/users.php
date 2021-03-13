<?php
include_once"baseOperations.php";
include_once"Database.php";
ob_start();
class users extends Database implements Operations
{
    var $userid;
    var $name;
    var $email;
    var $password;
    var $type=2;
    
    public function setUserid($id)
    {
        $this->userid=$id;
    }
    public function setname($nam)
    {
        $this->name=$nam;
    }
    public function setemail($mail)
    {
        $this->email=$mail;
    }
    public function setpassword($pass)
    {
        $this->password=$pass;
    }
    public function getUserid()
    {
        return $this->userid;
    }
    public function getname()
    {
        return $this->name;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function getpass()
    {
        return $this->password;
    }
    public function login()
    {
        return parent::GetData("select * from users where (Email='".$this->getemail()."'and password='".$this->getpass()."')");
    }
    public function Add()
    {
        return parent::RunDML("insert into users values(Default,'".$this->getname()."','".$this->getemail()."','".$this->getpass()."','".$this->type."')");
    }
    public function Update()
    {
        return parent::RunDML("update users set userName='".$this->getname()."', Email='".$this->getemail()."', password='".$this->getpass()."' where userId='".$_SESSION["id"]."'");
    }
    public function Delete()
    {
        return parent::RunDML("delete  from users where userId= '".$_SESSION["id"]."'");

    }
   public function GetAll()
   {
       return parent::GetData("select * from users where userId= '".$_SESSION["id"]."'");
   }





}




?>