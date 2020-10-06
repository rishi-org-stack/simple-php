<?php
if ($_SERVER['REQUEST_METHOD'] =='POST'){
    $server = "localhost";
    $user= "root";
    $pass = "";
    $con =mysqli_connect($server,$user,$pass);
    $name= $_POST["name"];
    $sql= "SELECT * FROM `bird`.`birds`WHERE birdname = '$name';";
    $result =  $con->query($sql);
    if ($result){
        $row = $result->fetch_assoc();
        echo '<br>brd name </br>'.$row["birdname"];
        echo '<br>belongs to  </br>'.$row["species"];
        echo '<br>posted by</br>'.$row["user"];
    }
}
?>