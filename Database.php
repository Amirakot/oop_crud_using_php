<?php
//connection - modification
class Database{
//4 thing to connect with db
private $serverename='localhost';
private $username='root';
private $password='';
private $dbname='company';
private $conn; 

public function __construct(){
    $this->conn=mysqli_connect($this->serverename,$this->username,$this->password,$this->dbname);
if(!$this->conn){
   //print message  and exit script
//  mysqli-connect-error  eturn the error description from the last connection error
    $this->error();
}
}
//insert not one thing 
public function insert($sql){
if(mysqli_query($this->conn,$sql))
{
    return 'add sucess';
}
else{
   $this->error();
}
}
// Fetch a result row as an associative array:
public function hashpass($pass){
    return sha1($pass);
}
//read data from db
public function read($table){
    $sql="select * from $table";
    $result=mysqli_query($this->conn,$sql);
    $data=[];
    if($result){
        //Return the number of rows in result set
        if(mysqli_num_rows($result)){
           // Fetch a result row as an associative array:
            while($row=mysqli_fetch_assoc($result)){
                $data[]=$row;
            }
            return $data;
        }
        else{
          $this->error();
        }
    }
}
//find id in db
public function find($table,$id){
    $sql="select * from $table where `id`='$id'";
    $result=mysqli_query($this->conn,$sql);

    if($result){
        //Return the number of rows in result set
        if(mysqli_num_rows($result)){
           // Fetch a result row as an associative array:
            return mysqli_fetch_assoc($result);
             
            
        }
       
    }  
    
        else{
         $this->error();
        }

    }
//update
public function update($sql){
if(mysqli_query($this->conn,$sql))
{
    return 'update sucess';
}
else{
   $this->error();
}
}
public function delete($table,$id){
$sql ="Delete from $table where `id`='$id' ";
if(mysqli_query($this->conn,$sql))
{
    return 'deleted sucess';
}
else{
   $this->error();
}
}
public function error(){
    return die('Error'.mysqli_errno($this->conn));
}
}



?>