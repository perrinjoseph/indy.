<?php
    session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Indy - Designer Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@600&family=Heebo:wght@600;900&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <style>
       
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-#D7D7D7">
        <div class="d-flex flex-grow-1">
            <span class="w-100 d-lg-none d-block"><!-- hidden spacer to center brand on mobile --></span>
            <a class="navbar-brand" href="feed.php">
                indy.
            </a>
            <div class="w-100 text-right">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7" >
                    <span class="navbar-toggler-icon" ></span>
                </button>
            </div>
        </div>
        
        <script>
function myFunction() {
    location.reload();
}
</script>

      
        
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar7">
            <ul class="navbar-nav ml-auto flex-nowrap">
              
                  <li class="nav-item">
                    <a href="designer.php" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link">About</a>
                </li>
                
                <li class="nav-item">
                    <a href="feed.php" class="nav-link">Feed</a>
                </li> 
                <li class="nav-item">
                    <a href="signOut.php" class="nav-link">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="content" id="blur">
    <div class="container-fluid">
        <div class="row-bottom-margin">
            <div class="col-sm-2">
                <?php
                //<----------profile picture----------->
                include("database/config.php");
                //first check if emp is logged in
                if(isset($_SESSION["empID"])){
                    $empID = $_SESSION["empID"];
                    $q = @mysqli_query($connection,"select picture from employeeProfileImages where empID = '$empID'");
                    $row = mysqli_fetch_row($q);
                    //if there is no image for the employee in the database then show the default image. 
                    //else means there is an image so print the image to the website
                        if(empty($row))
                            {
                                echo"<img src='images/designerProfilePics/default.jpg' class='rounded-circle img-fluid img-thumbnail' alt='Designer Profile Pic'> <br>";
                            }
                        else{
                            echo"<img src='$row[0]' class='rounded-circle img-fluid img-thumbnail' alt='Designer Profile Pic'><br> ";

                        }
                }
                
                ?>
                        <a href="#" onclick=toggle()>Edit Profile</a>
                        
        <script type="text/javascript">
		function toggle() {
			var blur = document.getElementById('blur');
			blur.classList.toggle('active')
			var popup = document.getElementById('popup');
			popup.classList.toggle('active')
		}
		</script>
                
            </div>
            <div class="col-sm-10">
                    <?php
                        include("database/config.php");
                        // Check if the logged in user is a designer
                        if (isset($_SESSION["empID"])){
                            // Logged in; grab first name, last name, about me, and style from database
                            $empID = $_SESSION["empID"];

                            $result = @mysqli_query($connection, "select fname, lname, aboutme, style from employee where empID = '$empID'") or die("failed to connect to database" .mysql_error());
                            // Order: [0] = fname, [1] = lname, [2] = aboutme, [3] = style
                            $row = mysqli_fetch_row($result);

                            $fname = $row[0];
                            $lname = $row[1];
                            $aboutme = $row[2];
                            $style = $row[3];
                            echo "<h4>$fname $lname</h4>";
                            echo "$aboutme";
                            echo "<br><br>";
                            echo "<h4>Style</h4>";
                              echo "$style";
                        } else {
                            echo "You are not logged in";
                            header("Location: login.php");
                        }
                    ?>
            </div>
            
                <!-- <div class="progress">
                    <div class="progress-bar" style="width:100%"></div>
                </div>
                <h5>Rating:</h5>
                5/5 -->
            </div>
        </div>
        <div class="row-bottom-margin">
            <div class="col-sm-12">
                <h2 class="text-center">Rooms Designed</h2>
                
            </div>

        </div>
                        
        <?php
            //Display the room images
            include("database/config.php");  
            $empID = $_SESSION["empID"];
            $sql = "SELECT pic FROM employeesPortfolioImages  WHERE empID = $empID ";
            $re = mysqli_query($connection,$sql);
            $imagesArray=array();
            
            
            while ($row= mysqli_fetch_assoc($re))
            {
                $imagesArray[]=$row;
            }
        
        

            $roomImages = "images/designer-images";
            
            $numImages = sizeof($imagesArray);
           
            $imageIndex = 0;

            //Calculate how many rows are needed based on the number of total images (each row has 3 images)
           
            // Display up to 3 images and then place a new row, then repeat until out of images
           
            
        ?>

            <hr width="80%">

            <div class="gallery-section">

        
      <div class="inner-width">
      <div class="gallery">
        
            <?php
            
            
            for($x=0; $x < $numImages; $x++){
            ?>
          <div class="image" style="display:flex;  object-fit: cover;">
            <img src=<?php echo" {$imagesArray[$x]['pic']}";?> alt="" style="display:flex;  object-fit: cover; padding:2px;">
            </div>
            <?php
            }
            ?>
          

        
      </div>
    </div>


  <script>
    $(".gallery").magnificPopup({
      delegate: 'a',
      type: 'image',
      gallery:{
        enabled: true
      }
    });
  </script>

    
<form action ='designer.php' method='post' enctype='multipart/form-data'> 
<input type='file' name='img' style="margin: auto; margin-top: 7%;padding: 40px;display: flex;flex-direction: column; align-items: center; width: 40%;"><br>
<button class = "col9" style="outline: none; border:none;" type="submit" name="share" value="share">
            <img src="images/upload.png" alt="" height='50px' width='50px' class="imgbutton ">
</button>
</form>

<?php
//inserting portfolio images into database.

include("database/config.php");                                   
if(isset($_POST['share'] ))
{
   
    if(isset($_FILES['img']))
    {
       
                //storing the file
                $file = $_FILES['img'];
                
            $fileName = $_FILES['img']['name'];
            $fileTmpName = $_FILES['img']['tmp_name'];
            $fileSize = $_FILES['img']['size'];
            $fileError = $_FILES['img']['error'];
            $fileType = $_FILES['img']['type'];

            //Seperating the file name so we have the name and the format
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            // create an array that has only the type of files we wish to allow the user to upload
            $allowed = array('jpg','jpeg','png','pdf');
            
            // check if any of the extensions in the array- $allowed are present in the $fileActualExt
            if(in_array($fileActualExt, $allowed))
            {
                
                if($fileError ===0)
                {
                    if($fileSize < 1000000000)
                    {
                        //create unique id for each image so that it dosnt replace any image that has the same name 
                        $fileNameNew = uniqid('',true).".".$fileActualExt;
                        $fileDestination = 'images/designer-images/'.$fileNameNew;
                        //move the file from the temp location to actual location
                        move_uploaded_file($fileTmpName, $fileDestination);
                       
                        
                        //this is a unique identifier therefore pictures uploaded by two customers with the same 
                        //picture name will not replace the existing picture. 
                        $pictures = "http://localhost/indy/images/designer-images/$fileNameNew";
                        
                        $empID = $_SESSION["empID"];   
                        //update the immage link emp porfolio images
                        $sql = "INSERT INTO employeesPortfolioImages (empID, pic) VALUES ('$empID','$pictures') ";
                        if(mysqli_query($connection,$sql))
                        {
                            
                        }
                        else{
                            echo "ERROR: Could not execute and update image record. " . mysqli_error($connection);

                        }
                        //updating the employee information in employee table 

                    }
                    else
                    {
                        echo "Error Your file is too big.";
                    }
                }
                else
                {
                    echo"There was an error uploading your image.";
                }
            }
            else
            {
                echo "Error. The file is not an image. Please upload an image.";
            }

            
    }
}


?>


    </div>
        </div>
        <div id="popup">
			<div id="slider">
            <div id="slides">
            <div class="close"> <a href="#" onclick="toggle()" class="x">+</a> </div>
            
            <?php
            //was affraid of storing the image in a global variable because of security stuff so i just did this. Please feel free to make the code more efficient
            if(isset($_SESSION["empID"])){
                $empID = $_SESSION["empID"];
                $q = @mysqli_query($connection,"select picture from employeeProfileImages where empID = '$empID'");
                $result = @mysqli_query($connection, "select fname, lname, aboutme, style from employee where empID = '$empID'") or die("failed to connect to database" .mysql_error());
                $aRow = mysqli_fetch_row($result);

                $row = mysqli_fetch_row($q);
                //if there is no image for the employee in the database then show the default image. 
                //else means there is an image so print the image to the website
                if(empty($row))
                    {
                        echo"<img src='images/designerProfilePics/default.jpg' class='rounded-circle mx-auto d-block img-thumbnail' alt='Designer Profile Pic'  width = '23%'>";
                        echo"<div class = 'pop'>";
                        echo" <form action ='designer.php' method='post' class = 'popText' enctype='multipart/form-data'>  ";
                        echo" <label for='aboutme'>About Me</label>";
                        echo"<textarea name='aboutme' rows='2' cols='40'  placeholder='Blurb about you' id='aboutme'required>$aRow[2]</textarea><br><br>";
                        echo"<label for='style'><b>Please Select your new style</b></label>";
                    $style = $aRow[3];  
                   
                    echo"<br>";     
                        ?>
    
                    <input type='radio' id='rad1' name='style' <?php if($style =='rustic') echo 'checked'; ?>  value='rustic'>              
                    <label for='rad1'>Rustic</label><br> 
                    <input type='radio' id='rad2' name='style'  <?php if($style =='modern') echo 'checked'; ?> value='modern'>
                    <label for='rad2'>Modern</label><br>
                    <input type='radio' id='rad3' name='style' <?php if($style =='minimalism') echo 'checked'; ?> value='minimalism'>
                    <label for='rad3'>Minimalism</label><br> 
                    <input type='radio' id='rad4' name='style'<?php if($style =='contemporary') echo 'checked'; ?>  value='contemporary'>
                    <label for='rad4'>Contemporary</label><br> 
                    <input type='radio' id='rad5' name='style' <?php if($style =='traditional') echo 'checked'; ?> value='traditional'>
                    <label for='rad5'>Traditional</label><br><br>
                   <label for='style'><b>Please upload a new picture here</b></label><br>
                   <input type='file' name='image'><br>
                  
                    <button type="submit" name="submit" value="Upload" class="popupButton">Upload</button>
                    </form>
                        <?php
    
                                        include("database/config.php");                                   
                                        if(isset($_POST['submit'] ))
                                        {
                                           
                                            if(isset($_FILES['image']))
                                            {
                                               
                                                        //storing the file
                                                        $file = $_FILES['image'];
                                                        
                                                    $fileName = $_FILES['image']['name'];
                                                    $fileTmpName = $_FILES['image']['tmp_name'];
                                                    $fileSize = $_FILES['image']['size'];
                                                    $fileError = $_FILES['image']['error'];
                                                    $fileType = $_FILES['image']['type'];
    
                                                    //Seperating the file name so we have the name and the format
                                                    $fileExt = explode('.', $fileName);
                                                    $fileActualExt = strtolower(end($fileExt));
                                                    // create an array that has only the type of files we wish to allow the user to upload
                                                    $allowed = array('jpg','jpeg','png','pdf');
                                                    
                                                    // check if any of the extensions in the array- $allowed are present in the $fileActualExt
                                                    if(in_array($fileActualExt, $allowed))
                                                    {
                                                        
                                                        if($fileError ===0)
                                                        {
                                                            if($fileSize < 1000000000)
                                                            {
                                                                //create unique id for each image so that it dosnt replace any image that has the same name 
                                                                $fileNameNew = uniqid('',true).".".$fileActualExt;
                                                                $fileDestination = 'images/designerProfilePics/'.$fileNameNew;
                                                                //move the file from the temp location to actual location
                                                                move_uploaded_file($fileTmpName, $fileDestination);
                                                                //assigning all the variables to the form inputs
                                                                $aboutMe= $_POST['aboutme'];
                                                                $newStyle = $_POST['style'];
                                                                //this is a unique identifier therefore pictures uploaded by two customers with the same 
                                                                //picture name will not replace the existing picture. 
                                                                $pictures = "http://localhost/indy/images/designerProfilePics/$fileNameNew";
                                                                
                                                                $empID = $_SESSION["empID"];   
                                                                //update the immage link employeeProfileImages table
                                                                $sql = "INSERT INTO employeeProfileImages (empID,picture) VALUES ('$empID','$pictures') ";
                                                                if(mysqli_query($connection,$sql))
                                                                {
                                                                    echo"added";
                                                                }
                                                                else{
                                                                    echo "ERROR: Could not execute and update image record. " . mysqli_error($connection);
    
                                                                }
                                                                //updating the employee information in employee table
                                                                $que = "UPDATE employee SET aboutme ='$aboutMe', style = '$newStyle' WHERE empID = '$empID'";
                                                            
                                                                if(mysqli_query($connection,$que))
                                                                {
                                                                    ?>
                                                                    <script>
                                                                    
                                                                        location.reload();
                                                                   
                                                                    </script>
                                                                <?php }
                                                                else
                                                                {
                                                                    echo "ERROR: Could not execute and employee records record. " . mysqli_error($connection);
                                                                }
    
                                                            }
                                                            else
                                                            {
                                                                echo "Error Your file is too big.";
                                                            }
                                                        }
                                                        else
                                                        {
                                                            echo"There was an error uploading your image.";
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "Error. The file is not an image. Please upload an image.";
                                                    }
    
    
                                            }
                                        }
    
    
                                        @mysqli_close($connection);
                                        
    
    
                        
                        echo"</div>";
                    }
                else{
                    echo"<br><br><img src='$row[0]' class='rounded-circle mx-auto d-block img-thumbnail' alt='Designer Profile Pic'  width = '23%'>";
                    echo"<div class = 'pop'>";
                    echo" <form action ='designer.php' method='post' class = 'popText' enctype='multipart/form-data'>  ";
                    echo" <label for='aboutme'>About Me</label>";
                    echo"<textarea name='aboutme' rows='2' cols='40'  placeholder='Blurb about you' id='aboutme'required>$aRow[2]</textarea><br><br>";
                    echo"<label for='style'><b>Please Select your new style</b></label>";
                $style = $aRow[3];  
               
                echo"<br>";     
                    ?>

                <input type='radio' id='rad1' name='style' <?php if($style =='rustic') echo 'checked'; ?>  value='rustic'>              
                <label for='rad1'>Rustic</label><br> 
	            <input type='radio' id='rad2' name='style'  <?php if($style =='modern') echo 'checked'; ?> value='modern'>
                <label for='rad2'>Modern</label><br>
                <input type='radio' id='rad3' name='style' <?php if($style =='minimalism') echo 'checked'; ?> value='minimalism'>
                <label for='rad3'>Minimalism</label><br> 
	            <input type='radio' id='rad4' name='style'<?php if($style =='contemporary') echo 'checked'; ?>  value='contemporary'>
                <label for='rad4'>Contemporary</label><br> 
	            <input type='radio' id='rad5' name='style' <?php if($style =='traditional') echo 'checked'; ?> value='traditional'>
                <label for='rad5'>Traditional</label><br><br>
               <label for='style'><b>Please upload a new picture here</b></label><br>
               <input type='file' name='image' id="up"><br>
              
                <button type="submit" name="submit" value="Upload" class="popupButton">Upload</button>
                </form>
                    <?php

                                    include("database/config.php");                                   
                                    if(isset($_POST['submit'] ))
                                    {
                                       
                                        if(isset($_FILES['image']))
                                        {
                                           
                                                    //storing the file
                                                    $file = $_FILES['image'];
                                                    
                                                $fileName = $_FILES['image']['name'];
                                                $fileTmpName = $_FILES['image']['tmp_name'];
                                                $fileSize = $_FILES['image']['size'];
                                                $fileError = $_FILES['image']['error'];
                                                $fileType = $_FILES['image']['type'];

                                                //Seperating the file name so we have the name and the format
                                                $fileExt = explode('.', $fileName);
                                                $fileActualExt = strtolower(end($fileExt));
                                                // create an array that has only the type of files we wish to allow the user to upload
                                                $allowed = array('jpg','jpeg','png','pdf');
                                                $reload = 0;
                                                // check if any of the extensions in the array- $allowed are present in the $fileActualExt
                                                if(in_array($fileActualExt, $allowed))
                                                {
                                                    
                                                    if($fileError ===0)
                                                    {
                                                        if($fileSize < 1000000000)
                                                        {
                                                            //create unique id for each image so that it dosnt replace any image that has the same name 
                                                            $fileNameNew = uniqid('',true).".".$fileActualExt;
                                                            $fileDestination = 'images/designerProfilePics/'.$fileNameNew;
                                                            //move the file from the temp location to actual location
                                                            move_uploaded_file($fileTmpName, $fileDestination);
                                                            //assigning all the variables to the form inputs
                                                            $aboutMe= $_POST['aboutme'];
                                                            $newStyle = $_POST['style'];
                                                            //this is a unique identifier therefore pictures uploaded by two customers with the same 
                                                            //picture name will not replace the existing picture. 
                                                            $pictures = "http://localhost/indy/images/designerProfilePics/$fileNameNew";
                                                            
                                                            $empID = $_SESSION["empID"];   
                                                            //update the immage link employeeProfileImages table
                                                            $sql = "UPDATE employeeProfileImages SET picture = '$pictures' WHERE empID ='$empID'";
                                                            if(mysqli_query($connection,$sql))
                                                            {
                                                                
                                                            }
                                                            else{
                                                                echo "ERROR: Could not execute and update image record. " . mysqli_error($connection);

                                                            }
                                                            //updating the employee information in employee table
                                                            $que = "UPDATE employee SET aboutme ='$aboutMe', style = '$newStyle' WHERE empID = '$empID'";
                                                        
                                                            if(mysqli_query($connection,$que))
                                                            {
                                                               
                                                            }
                                                            else
                                                            {
                                                                echo "ERROR: Could not execute and employee records record. " . mysqli_error($connection);
                                                            }

                                                        }
                                                        else
                                                        {
                                                            echo "Error Your file is too big.";
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo"There was an error uploading your image.";
                                                    }
                                                }
                                                else
                                                {
                                                    echo "Error. The file is not an image. Please upload an image.";
                                                }


                                        }
                                    }


                                    @mysqli_close($connection);
                                    


                                    
                    echo"</div>";
                } 

               

            }
            

?>            
			</div>	
			</div>
		</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>