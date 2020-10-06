<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $name  =$_POST["name"];
    $species = $_POST["species"];
    $des = $_POST["des"];
    $server ="localhost";
    $user="root";
    $pass=""; 
    $nick=$_SESSION['nick'];
    $con= mysqli_connect($server,$user,$pass);
    if (!$con){
        echo "failed to establise connection";
    }else{
       
         $sql = "INSERT INTO `bird`.`birds` (`user`,`birdname`,`species`,`des`)VALUES('$nick','$name','$species','$des');";
        $result = $con ->query($sql);
        if ($result){
            echo $name;
        }
    }
   
}

?>