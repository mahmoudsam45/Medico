<?php
include_once"baseOperations.php";
include_once"Database.php";
ob_start();
class medicineperm extends Database implements Operations
{
    var $medname;
    var $meddate;
    var $permtype;
    var $quant;
    
    public function setmedname($na)
    {
        $this->medname=$na;
    }
    public function setdate($dat)
    {
        $this->meddate=$dat;
    }
    public function setpermtype($typ)
    {
        $this->permtype=$typ;
    }
    public function setquant($quan)
    {
        $this->quant=$quan;
    }
      /**
     * Get the value of medname
     */ 
    public function getMedname()
    {
        return $this->medname;
    }

    /**
     * Get the value of meddate
     */ 
    public function getMeddate()
    {
        return $this->meddate;
    }

    /**
     * Get the value of permtype
     */ 
    public function getPermtype()
    {
        return $this->permtype;
    }

    /**
     * Get the value of quant
     */ 
    public function getQuant()
    {
        return $this->quant;
    }
   
    public function getmedicineid()
    {
        $rs= parent::GetData("select medecineid from medicine where (medname='".$this->getmedname()."')");
       if($row=mysqli_fetch_assoc($rs))
          return $row["medecineid"];
       
    }
    public function Add()
    {

        return parent::RunDML("insert into medecinepermetion values(Default,'".$this->getmedicineid()."','".$_SESSION['id']."','".$this->getQuant()."','".$this->getPermtype()."','".$this->getMeddate()."')");
    }
    public function Update()
    {
       // return parent::RunDML("update users set userName='".$this->getname()."', Email='".$this->getemail()."', password='".$this->getpass()."' where userId='".$_SESSION["id"]."'");
    }
    public function Delete()
    {
        return parent::RunDML("delete  from medecinepermetion where medperm= '".$_SESSION["dell"]."'");

    }
   public function GetAll()
   {
       return parent::GetData("select * from medecinepermetion");
   }
   public function getfree()
   {
       return parent::GetData("select  count(medperm) from medecinepermetion where type='إذن مجانى'  AND Date='".date("Y-m-d")."'
      ");
   }
   public function getpaid()
   {
       return parent::GetData("select count(medperm) from medecinepermetion where type='إذن صرف' AND Date ='".date("Y-m-d")."'");
   }






   
  

  
     
}
?>