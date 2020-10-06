<?php  
session_start();
$_SESSION['nick']= $_POST["nick"];
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $server = "localhost";
        $user= "root";
        $pass = "";
        $con= mysqli_connect($server,$user,$pass);
      
        if (!$con){
            echo "not working";
        }
        function present(){
            $nick = $_POST["nick"];
            
            $password = $_POST["password"];
            $sql = "SELECT * FROM `bird`.`users` WHERE username= '$nick' AND password = '$password'; ";
            $result = $GLOBALS['con']->query($sql);
            $num = mysqli_num_rows($result);
            if ($num>0){
                $row = $result->fetch_assoc();
                if ($row["email"] && $row["username"]){
                   if ($row["password"]==$password){
                        echo '<a href ="add.php" ><h1>"add morebirds"</h1></a>' ;
                   }else{
                       echo '<a href = "sinup.php"><h1>yo dont exist in our database plseease register first</h1></a>';
                   }
                }
                
            }
            if (!$result){
                return  $GLOBALS['con']->error;
            }
            return '<p>seems like you are not present in our database please signup first
            <a href ="sinup.php">welcome</a></p>';
        }
        $val = present();
        echo $val;
    }else{
        echo "invalid request method";
    }
?>