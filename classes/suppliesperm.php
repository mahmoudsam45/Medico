<?php
include_once"baseOperations.php";
include_once"Database.php";
ob_start();
class supplyperm extends Database implements Operations
{
    var $supname;
    var $supdate;
    var $permtype;
    var $quant;
    
    
   
    public function getsupplyid()
    {
        $rs= parent::GetData("select supplyid from supplies where (supplyname='".$this->getSupname()."')");
       if($row=mysqli_fetch_assoc($rs))
          return $row["supplyid"];
       
    }
    public function Add()
    {

        return parent::RunDML("insert into supplypermetion values(Default,'".$this->getsupplyid()."','".$_SESSION['id']."','".$this->getQuant()."','".$this->getPermtype()."','".$this->getSupdate()."')");
    }
    public function Update()
    {
       // return parent::RunDML("update users set userName='".$this->getname()."', Email='".$this->getemail()."', password='".$this->getpass()."' where userId='".$_SESSION["id"]."'");
    }
    public function Delete()
    {
        return parent::RunDML("delete  from supplypermetion where suppermid= '".$_SESSION["dell"]."'");

    }
   public function GetAll()
   {
       return parent::GetData("select * from supplypermetion");
   }

   public function getfreesup()
   {
       return parent::GetData("select  count(suppermid) from supplypermetion where type='إذن مجانى'  AND Date='".date("Y-m-d")."'");
   }
   public function getpaidsup()
   {
       return parent::GetData("select count(suppermid) from supplypermetion where type='إذن صرف'AND Date='".date("Y-m-d")."'");
   }




   
  

  
     

    /**
     * Get the value of quant
     */ 
    public function getQuant()
    {
        return $this->quant;
    }

    /**
     * Set the value of quant
     *
     * @return  self
     */ 
    public function setQuant($quant)
    {
        $this->quant = $quant;

    }

    /**
     * Get the value of permtype
     */ 
    public function getPermtype()
    {
        return $this->permtype;
    }

    /**
     * Set the value of permtype
     *
     * @return  self
     */ 
    public function setPermtype($permtype)
    {
        $this->permtype = $permtype;

    }

    /**
     * Get the value of supdate
     */ 
    public function getSupdate()
    {
        return $this->supdate;
    }

    /**
     * Set the value of supdate
     *
     * @return  self
     */ 
    public function setSupdate($supdate)
    {
        $this->supdate = $supdate;

    }

    /**
     * Get the value of supname
     */ 
    public function getSupname()
    {
        return $this->supname;
    }

    /**
     * Set the value of supname
     *
     * @return  self
     */ 
    public function setSupname($supname)
    {
        $this->supname = $supname;

    }
}
?>