<?php

  include "formValidationClass.php"; //get the class
    
  $validateThisForm = new FormValidation(); //instantiates a new object

    $inName = "";
    $nameError = "";
    $inEmail = "";
    $emailError = "";
    $inHidden = "";
    $inSpecial = "";
    $specialError = "";
    $validForm = false;


    if(isset($_POST["Submit"])){


      $inName = $_POST["textfield"];
      $inEmail = $_POST["textfield3"];
      $inHidden = $_POST["hidden"];
      $inSpecial = $_POST["textarea"];
     

      if($inHidden != ""){
        echo "<h2>Scammer!</h2>";
      }

      $validForm = true;

      $validateThisForm->validateRequiredNameField($inName);

      $validateThisForm->validateCustomerEmailField($inEmail);

      $validateThisForm->validateTextarea($inSpecial);
  

           
      

    }

?> 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/websiteMain.js"></script>
    <link rel="stylesheet" href="css/websiteMain.css">

</head>
<body>


    <a href="index.html">
        <header>
            <h1>Name Place Holder</h1>
        </header>
    </a>
    
    <nav class="naviMenu">
        
        <a href="resume.html">Resume</a>
        <a href="photoshop.html">Photoshop</a>
        <a href="advancedHtml.html">Advanced Html</a>
        <a href="javascriptIntro.html">Javascript</a>
        <a href="php.html">PHP</a>
        <a href="jquery.html">JQuery</a>
        <a href="widgets.html">Widgets</a>
        <a href="seniorProjDmacc.html">Senior Project-DMACC</a>
        <a href="wordPress.html">WordPress</a>
        <a href="softwareDevelop.html">Software Development</a>
                
    </nav>

    <div id="container">
        <img class="hamburMenu" src="img/hambur2.png" alt="Menu bar for navigation">
        <main>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum elementum tincidunt auctor. Aliquam mollis ut urna ut malesuada. Donec sed ante ac eros efficitur imperdiet. Integer auctor erat et blandit lacinia. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget placerat magna, ut ultrices lectus. Fusce volutpat lorem enim, sed dictum quam fermentum eu. Integer tempor tellus ac dolor finibus, id cursus dui bibendum. Sed ullamcorper mi bibendum quam ultrices auctor. Quisque luctus felis orci, et vulputate augue sagittis in. Integer eget nunc ac justo scelerisque posuere at eu mi.
            </p>

            <p>
                Fusce sed sem augue. Sed pretium egestas ullamcorper. Mauris molestie ante sit amet sodales tincidunt. Sed ut lorem bibendum, iaculis enim in, tristique neque. Nullam placerat porttitor sapien, non porttitor nulla dignissim eget. Donec viverra sit amet sem in pharetra. Phasellus rhoncus vehicula maximus.
            </p>          

        </main>

        <?php

            if ($validForm){


        ?>
                <h3>Form Submitted</h3>
                <p>Return to the Home Page <a href="index.php">here.</a></p>
        <?php

            }

            else {

        ?>

                <div class="contact">
                        <form action="" >
                            <h3>Contact Me!</h3>

                            <p>Please fill out the form below if you have any comments or questions</p>


                            <p>
                                <label for="nameField">Name:</label>
                                <input type="text" name="nameField" value="<?php echo $inName ?>">
                                <span class="error"><?php echo $nameError ?></span>
                            </p>

                            <p class="hide">
                                <label for="textFieldHidden">Enter Name or Number</label>
                                <input type="text" name="hidden" id="hidden" value="<?php echo $inHidden ?>">
                            </p>

                            <p>
                                <label for="emailField">Email:</label>
                                <input type="text" name="emailField" value="<?php echo $inEmail ?>">
                                <span class="error"><?php echo $emailError ?></span>
                            </p>

                            <p>
                                <label for="textField">Comments/Questions: <span class="error"><?php echo $specialError?></span></label><br>

                                <textarea name="textField" id="textField" cols="50" rows="10"><?php echo $inSpecial ?></textarea>
                                
                            </p>

                            <p>
                                <button value = "Submit">Submit</button>
                                <button value = "Reset">Reset</button>                    
                            </p>

                        </form>
                    </div>
            </div>

    <?php
            }
    ?>

    <footer>

        <h3 class="footer"><strong> Copyright &copy; 
                    
            <script>
                var d = new Date();
                document.write(d.getFullYear());
            </script>
                
            , All Rights Reserved </strong></h3>

    </footer>
    
</body>
</html>