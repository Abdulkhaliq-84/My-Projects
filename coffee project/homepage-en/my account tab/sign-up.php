<!DOCTYPE html>

<html>
  <head>
    <link rel="stylesheet" href="sign-up.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Rubik:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">

    <title>Sign up</title>
  </head>


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
 
  <body>

    

      <div class="container">

        <img class="sign-up-logo" src="signup.png" alt="">

        <form action="/homepage-en/my account tab/sign-up.php" method="get" >

          <div class="input-container">
            <label for="firstname">FirstName </label>
            <input class="input-style firstname-js" name="firstname" type="text" required>
          </div>

          <div class="input-container">
            <label for="lastname">LastName </label>
            <input class="input-style  lastname-js" name="lastname" type="text" required>
          </div>

          <div class="input-container">
            <label for="age">Age </label>
            <input class="input-style  input-style-age"  name="age" type="number" min="18" required>
          </div>

          <div class="input-container">
            <label for="email">Email </label>
            <input class="input-style  input-style-email" name="email" type="email" required>
          </div>

          <div class="input-container">
            <label for="username">Username </label>
            <input class="input-style input-style-username" name="username" type="text" maxlength="12" minlength="3" required>
          </div>

          <div class="input-container">
            <label for="password">Password </label>
            <input class="input-style  input-style-password" name="pass" type="password" minlength="8"  required>
          </div>


          <div class="input-container">
            <label for="gender">Gender </label>
            <input class="input-style  input-style-radio " name="gender" checked type="radio" value="Male" required>Male
            <input class="input-style  input-style-radio " name="gender" type="radio" value="Female" required>Female
          </div>

          <div class="input-container ">
           
            

           <input class="input-style input-style-button" name="signup" type="submit" value="Sign up">
   
            </div>

        </form>



        <?php
        
       
          if (isset($_GET["signup"])) 
          {
             $fname= $_GET["firstname"];
             $lname= $_GET["lastname"];
             $age= $_GET["age"];
             $email= $_GET["email"];
             $username = $_GET["username"];
             $password= $_GET["pass"];
             $gender= $_GET["gender"];

             
           
           try{
            $sql = "INSERT INTO account(firstname, lastname, age, email, username, pass, gender) VALUES ('$fname','$lname','$age','$email','$username',' $password','$gender')";

            $result = mysqli_query($conn, $sql);
           }
           catch(mysqli_sql_exception $e){
            
            die("The email or username is already taken");
           }
               echo"the account addedd succesfully";
               
               header("location:/homepage-en/homepage1.php?username= $username");
            
             
             
           

            
          }

        ?>


        
             

      </div>

    

    

    
  </body>

</html>