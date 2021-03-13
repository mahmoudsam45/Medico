<?php
    class Database
    {   
        var $conn;
        function __construct()
        {
            $this->conn=mysqli_connect("mysql5044.site4now.net","a6e676_mahmoud","mahmoudsam45","db_a6e676_mahmoud");
        }
    //To Insert- Update - delete 
        function RunDML($statment)
        {
            if(!mysqli_query($this->conn,$statment))
                {
                    return  mysqli_error($this->conn);
                }
            else
                return "Done";
        }
    //to search select
      function GetData($select)
      {
        $result= mysqli_query($this->conn,$select);
        return $result;
        
      }
    }
?>