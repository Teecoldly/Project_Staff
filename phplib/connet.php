<?php 
  $con;
  $temp;
  $fetch_data;
class  connet    {
     
    public function __construct($server,$username,$password,$db) {
        global  $con;
        $con = new mysqli($server,$username,$password,$db);
        $con->set_charset("UTF8");
    }
    public function querydata($sql )
    {
        global  $con;
        global  $temp;
        $result=  $con->query($sql);
        $temp = $result;
        return $result;
    }
    public function fetch_assoc_select_one($column)
    {
        global  $temp;
        global $fetch_data;
        $fetch_data = $temp->fetch_assoc();
        return $fetch_data[$column];        
    }
    public function fetch_assoc_select($obj,$column)
    {
        return $obj[$column];        
    }
    public function numrows(){
        global  $temp;
        return $temp->num_rows;
    }
    public function querydata_fetch_assoc($sql )
    {
        global  $con;
        $result=   $con->query($sql)->fetch_assoc();
        return $result;
    } 
    public function querydata_fetch_assoc_onone($sql,$select )
    {
        global  $con;
        $result=   $con->query($sql)->fetch_assoc();
        return $result[$select];
    } 
     
}

?>