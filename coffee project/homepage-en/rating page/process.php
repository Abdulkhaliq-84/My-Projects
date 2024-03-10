<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'coffee';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());

}


 if(isset($_GET["bit"])) {

      $username = $_GET["username"];
      $id = $_GET["id"];
      $bit = $_GET["bit"];
    
      
      $sql2 = "INSERT INTO rating (id,username,rate) VALUES ('$id','$username','$bit')";
      $sql3 = "DELETE  from rating WHERE username = '".$username."' AND id ='".$id."'  ";
     // $result2 = mysqli_query($conn,$sql2);
      $result3 = mysqli_query($conn,$sql3);

      if($result3)
      {
        $result2 = mysqli_query($conn,$sql2);
        echo "The Rating Added Succefully <br>";
        echo"You Can Go Back And Refresh";
      }
      else{
        $result2 = mysqli_query($conn,$sql3);
        echo "The Rating Added Succefully";
        echo"You Can Go Back And Refresh";
      }


     
     

 }


 if(isset($_GET["add-comment"]))
 {
    $id4 = $_GET["id"];
    $username4 = $_GET["username"];
    $comment = $_GET["comment"];

    $sql4 = "INSERT INTO comment (username,comm,id) VALUES ('$username4','$comment','$id4')";
    $result4 = mysqli_query($conn,$sql4);

    if($result4)
    {
      echo"The Comment Added Succefully <br>";
      echo"You Can Go Back And Refresh";
    }
    else
    {
      echo "try again";
    }
  
 }


 

 
 



   

  ?>