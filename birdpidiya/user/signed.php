<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        function checke($s){
            $e ="@gmail.com";
            if (strlen($s)>strlen($e)){
               if (strcmp(substr($s,strlen($s)-strlen($e)),$e)==0){
                   return true;
               }
               return false;
            }
        }
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $server = "localhost";
        $user= "root";
        $password = "";
        $con = mysqli_connect($server,$user,$password);
        if(!$con){
            echo "no";
        }
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            echo "Only letters and white space allowed";
        }else{
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                echo "invalid format of email";
            }else{
                $sql="INSERT INTO `bird`.`users`(`username`,`email`,`password`) VALUES('$name','$email','$pass');";
                $result= $con->query($sql);
                if ($result){
                    echo '<h1>you are inserted in our database login<h1>'; 
                }else{
                    echo "getout- " .$con->error;
                }
            }
        }
        //we ned to build a functio to test if given email id is valid or not
        //one for checking the password is correct or not 
        //one for testing if given email and password already exist
    }
?>