
<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'coffee';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());

 }

  ?>


<?php

    $email = '';

      if(isset($_GET["submit"]) )
   {
        
       $email= $_GET['email'];
       $pass = $_GET['pass'];
       $repass = $_GET['repass'];
       
       
       try
       {

        $sql = "SELECT * FROM account WHERE  email = '$email'";

        $result = mysqli_query($conn, $sql);
 
        if(mysqli_num_rows($result) === 1)
        {
         $row = mysqli_fetch_assoc($result);

         if($pass === $repass)
         {
         
             $sql = "UPDATE account SET pass= $pass WHERE email= '$email'";
             $result = mysqli_query($conn,$sql);
             if($result)
             {
               echo "The password has been updated";
               header("location:/homepage-en/my account tab/sign-in.php");
             }
             else
             {
               echo "try again";
               exit();
             }
             
          }
          
         
        }
        else
        {
          echo 'the email is not found';
        }

        }
        catch(mysqli_sql_exception $e)
        {
          echo ''. $e->getMessage();
        }

        
          
  


        
      }
     

     



       



        


        

      


      ?>







