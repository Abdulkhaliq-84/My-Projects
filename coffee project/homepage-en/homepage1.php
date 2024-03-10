<!DOCTYPE html>

<html>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Rubik:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
  </head>


  <body>
    
   

      <div class="menubar">

        <div class="main-bar">
          <div class="menu-items">
            <a class="menu-text" href="">Home</a>
          </div>
  
          
          <div class="menu-items recipes-drop-list">

          <a class="menu-text" href="/projectrecipe/project/ViewRecipe.php">Recipes</a>

          </div>

          <div class="menu-items">
            <a class="menu-text" href="/beans/beans/beans.php">Beans</a>
          </div>
  
          <div class="menu-items">
            <a class="menu-text" href="/homepage-en/rating page/rating.php?username=
            
            <?php

            $username = $_GET["username"];

            echo $username;

            ?>
            
            
            ">Rating</a>
          </div>
        </div>

        <div class="myaccount-container  myacount-hoviring">
          <p class="menu-text">

          <?php

            $username = $_GET["username"];

            echo $username;

          ?>





          </p>
            <img class="icon-list" src="chevron.png" alt="">

            <div class="myaccount-border">

              <div class="myaccount-items">
                <a class="recipes-text" href="/homepage-en/homepage.html">Sign out</a>
              </div>

             

            </div>

        </div>
        
      </div>
           
  
            
  
          </div>
  
          

      
        <div class="coffee-images-border">

          <div class="img-container">
           <img class="coffee-images" src="/images/coffee1.webp" alt="">
           <img class="coffee-images" src="/images/coffee3.webp" alt="">
           <img class="coffee-images" src="/images/coffee4.webp" alt="">
           <img class="coffee-images" src="/images/coffee1.webp" alt="">
          
          </div>
   
        
         </div>


         <div class="text-images-container">

          <div class="images">
            <img class="image1" src="/images/image2.jpg" alt="">

            <div class="black-box">
            
              <p class="text"> 
                The "Add recipes" tab offers a selection of drip coffee tools. Users can choose a tool to view its recipe details, including default ratio, temperature, and extraction time. They input the desired coffee amount, and the program calculates the water quantity based on the selected ratio. Users then select their preferred coffee beans, grinder, and grinder setting.
              </p>
            </div>
          </div>

          <div class="images">
            <img class="image2" src="/images/image.jpg" alt="">
            <div class="black-box1">
            
              <p class="text"> 
                The "Beans" tab includes 4 text fields for entering coffee beans information. It also features a table that retrieves and displays the beans previously saved by the user in the database. Additionally, there is a text field available for updating or deleting coffee bean entries.
              </p>
            </div>
          </div>

         </div>


       <div class="footer">

        <div class="contact-us">

          <p class="group-name">
            Hunters Group
          </p>

          
            <a href="https://www.instagram.com/" target="_blank">
              <img class="logo-insta" src="instagram.png" alt="">
            </a>
       
         
            <a href="https://twitter.com/?lang=en" target="_blank">
              <img class="logo-x" src="twitter.png" alt="" >
            </a>
          
        </div>

        <div class="copyright">
          <p >2023 &copy; copyright</p>
        </div>


        

        

       </div>

     
   

      <script src="homepage.js"></script>
  </body>

</html>