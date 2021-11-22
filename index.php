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


    if(isset($_POST["submit"])){


      $inName = $_POST["nameField"];
      $inEmail = $_POST["emailField"];
      $inHidden = $_POST["textFieldHidden"];
      $inSpecial = $_POST["textField"];
     

      if($inHidden != ""){
        echo "<h2>Scammer!</h2>";
      }

      $validForm = true;

      $validateThisForm->validateRequiredNameField($inName);

      $validateThisForm->validateCustomerEmailField($inEmail);

      $validateThisForm->validateTextarea($inSpecial);

      if($validForm) {
          try {
            require_once("connection.php");

            $sql = "
                INSERT INTO indexcontact(name, email, textarea)

                VALUES(:inName, :inEmail, :inSpecial)
            ";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":inName", $inName);
            $stmt->bindParam(":inEmail", $inEmail);
            $stmt->bindParam(":inSpecial", $inSpecial);

            //Execute Statement

            $stmt->execute();

          }
          catch (PDOException $e) {
            $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

            error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
            error_log(var_dump(debug_backtrace()));
        
            //Clean up any variables or connections that have been left hanging by this error.		
        
            header('Location: eventsForm.php');	//sends control to a User friendly page	
        }
      }

    }

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/websiteMain.js"></script>
    <link rel="stylesheet" href="css/websiteMain.css">

</head>
<body>


    <a href="index.php">
        <header>
            <h1>Madeline Edmonds</h1>
        </header>
    </a>

    <img class="hamburMenu" src="img/hambur2.png" alt="Menu bar for navigation">

    <nav class="naviMenu">
        
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="resume.html">Resume</a></li>
        <li><a href="photoshop/index.html">Photoshop</a></li>
        <li><a href="advancedHtml/index.html">Advanced Html</a></li>
        <li><a href="javascript/index.html">Javascript</a></li>
        <li><a href="php/index.php">PHP</a></li>
        <li><a href="jquery/index.html">JQuery</a></li>
        <li><a href="widgets/index.html">Widgets</a></li>
        <li><a href="seniorDmacc/index.html">Senior Project-DMACC</a></li>
        <li><a href="wordpress/index.html">WordPress</a></li>
        <li><a href="softwareDevelopment/index.html">Software Development</a></li>
                
    </nav>

    <div id="container">
        
        <main>
            <p>
                The purpose of this website is to submit and display work from me as I pursue my career in Computer Science and Website Development. Most assignments have been submitted during my time at Des Moines Area Community College <abbr title="Des Moines Area Community College ">(DMACC)</abbr> , however if work has been created at another college or the work is a personal project, then the page will be marked as such.
            </p>

            <p>
            Feel free to look over my work. If you would like to contact me for any questions or comments, please use the form below with your contact information and I will reply back to you as soon as possible. if you would like to offer me a job, please also fill out the form below. 
            </p>         

            <p>Want to see the code? View my <a class="noDesignLink" href="https://github.com/mkedmonds">GitHub</a></p>
            
            <i>Harassment and trolling of any kind are not tolerated and your message will be deleted and ignored.</i>

        </main>

        <?php

            if ($validForm){


        ?>
                <h3>Form Submitted</h3>
                <p>Return to the Home Page <a class="noDesignLink" href="index.php">here.</a></p>
        <?php

            }

            else {

        ?>

                <div class="contact">
                        <form name="form1" action="index.php" method="post" id="contactForm">

                            <h3>Contact Me!</h3>

                            <p>Please fill out the form below if you have any comments or questions</p>


                            <p>
                                <label for="nameField">Name:</label>

                                <input type="text" name="nameField" id="nameField" value="<?php echo $inName ?>">

                                <span class="error"><?php echo $nameError ?></span>
                            </p>

                            <p class="hide">
                                <label for="textFieldHidden">Enter Name or Number</label>
                                <input type="text" name="textFieldHidden" id="textFieldHidden" value="<?php echo $inHidden ?>">
                            </p>

                            <p>
                                <label for="emailField">Email:</label>

                                <input type="text" name="emailField" id="emailField" value="<?php echo $inEmail ?>">

                                <span class="error"><?php echo $emailError ?></span>
                            </p>

                            <p>
                                <label for="textareField">Comments/Questions: <span class="error"><?php echo $specialError?></span></label><br>

                                <textarea name="textField" id="textField" cols="50" rows="10"><?php echo $inSpecial ?></textarea>
                                
                            </p>

                            <p>
                                <button type= "submit" form= "contactForm" name="submit" value = "Submit">Submit</button>

                                <button name="reset" value = "Reset">Reset</button>                    
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