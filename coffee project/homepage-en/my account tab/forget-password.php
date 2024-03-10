<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="forget-password.css">
  <link rel="stylesheet" href="sign-up.css">
  <link rel="stylesheet" href="change-password.css">
  <link rel="stylesheet" href="forget-password.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="homepage.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Rubik:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">

  <title>Forget password</title>

</head>

<body>
  



    <div class="forget-pass">

      <img class="forget-pass-logo" src="forgot-pass.png" alt="">
          
      <form action="/test.php" method="get">
        

        <div class="input-container">
          <label for="email">Email
          </label>
          <input type="email" class="forgetpass-input-style  forgetpass-email-js" name="email" required>
          
        </div>

        

          <div class="changepass-input-container">
            <label for="pass">New password
            </label>
            <input type="password" class="changepass-input-style  newpass-js" name="pass" minlength="8" required>
            
          </div>
          
          <div class="changepass-input-container">
            <label for="repass">Re-Enter password
            </label>
            <input type="password" class="changepass-input-style  repass-js" name="repass" minlength="8" required>
             
          </div>

          <div class="forgetpass-input-button">

            <input type="submit" class="forgetpass-input-style-button changepass-button-js" value="Submit" name="submit">
  
  
          </div>



        </form>

        

       




     

      </div>


      

      







<script src="forget-password.js"></script>
</body>







</html>