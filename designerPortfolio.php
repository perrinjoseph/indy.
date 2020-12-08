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
    <title>Indy - Designer Portfolio</title>
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
      
        <?php
            require "customerNav.php";
        ?>

    </nav>
    <div class="content" id="blur">
    <div class="container-fluid">
        <div class="row-bottom-margin">
            <div class="col-sm-2">
                <?php
                //<----------profile picture----------->
                include("database/config.php");
                //first check if customer is logged in
                if(isset($_SESSION["cusID"])){
                    // Get empID from explore page
                    $empID = $_POST["empID"];
                    $q = @mysqli_query($connection,"select picture from employeeProfileImages where empID = '$empID'");
                    $row = mysqli_fetch_row($q);
                    //if there is no image for the employee in the database then show the default image. 
                    //else means there is an image so print the image to the website
                    if(mysqli_num_rows($q)==0) {
                        echo"<img src='images/designerProfilePics/default.jpg' class='rounded-circle img-fluid img-thumbnail' alt='Designer Profile Pic'> <br>";
                    } else {
                        // Find where images/.... starts and then take a substring starting from that index
                        $start = strpos($row[0], "images");
                        $picPath = substr($row[0], $start);

                        // Even if the designer has an image in the database, check if its on the server too
                        if(file_exists($picPath)) {
                            echo"<img src='$picPath' class='rounded-circle img-fluid img-thumbnail' alt='Designer Profile Pic'><br> ";
                        } else {
                            echo"<img src='images/designerProfilePics/default.jpg' class='rounded-circle img-fluid img-thumbnail' alt='Designer Profile Pic'> <br>";
                        }
                    }
                } else {
                    echo "You are not logged in";
                    header("Location: login.php");
                }
                
                ?>
                
            </div>
            <div class="col-sm-10">
                    <?php
                        include("database/config.php");
                        // Check if the logged in user is a customer
                        if (isset($_SESSION["cusID"])){
                            // Grab first name, last name, about me, and style from database
                            $empID = $_POST["empID"];

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
            $empID = $_POST["empID"];
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>