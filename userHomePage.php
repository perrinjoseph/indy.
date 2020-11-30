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
		<title>Indy - User Home Page</title>
		<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@600&family=Heebo:wght@600;900&family=Poppins:wght@600&display=swap" rel="stylesheet">
		<link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link href="style.css" rel="stylesheet"> </head>

	<body>
		<div class="content" id="blur">
			<nav class="navbar navbar-expand-lg navbar-light bg-#D7D7D7">
				<div class="d-flex flex-grow-1"> <span class="w-100 d-lg-none d-block"><!-- hidden spacer to center brand on mobile --></span> <a class="navbar-brand" href="userHomePage.php">
                	indy.
            		</a>
					<div class="w-100 text-right">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7"> <span class="navbar-toggler-icon"></span> </button>
					</div>
				</div>

				<?php
					require "customerNav.php";
				?>
				
			</nav>
			<div class="row">
				<div class="col3"> </div>
				<div id="description" class="col8">
					<p style=" margin-left:70px; font-family: Courier; color: black; ">
						<?php
                                include("database/config.php");
                                // Check if the logged in user is a customer
                                if (isset($_SESSION["cusID"])){
                                    // Logged in; grab first name, last name, and about me from database
                                    $cusID = $_SESSION["cusID"];
        
                                    $result = @mysqli_query($connection, "select fname, lname, aboutme from customer where cusID = '$cusID'") or die("failed to connect to database" .mysql_error());
                                    // Order: [0] = fname, [1] = lname, [2] = aboutme
                                    $row = mysqli_fetch_row($result);
        
                                    $fname = $row[0];
                                    $lname = $row[1];
                                    $aboutme = $row[2];
                                    echo "<b>$fname $lname</b>";
                                    echo "<br>$aboutme";
                                } else {
                                    echo "You are not logged in";
                                    header("Location: login.php");
                                }
                            ?>
					</p>
				</div>
				<a href="#" onclick=toggle() class="col">
					<h2 style=" font-size: 90px; margin-left:70px; font-family: 'Heebo', sans-serif;"> <b>Create a post</b></h2>
					<br>
					<p style=" margin-left:70px; font-family: Courier; color: black; "><b>click</b> to upload pictures of your room.
						<br> Add a description of the suggested design theme, dimensions
						<br> and any specific instructions. Let the designers do the magic. </p>
				</a>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script type="text/javascript">
		function toggle() {
			var blur = document.getElementById('blur');
			blur.classList.toggle('active')
			var popup = document.getElementById('popup');
			popup.classList.toggle('active')
		}
		</script>
		<div id="popup">
			<div id="slider">
				<input type="radio" name="slider" id="slide1" checked>
				<input type="radio" name="slider" id="slide2">
				<input type="radio" name="slider" id="slide3">
				<div id="slides">
					<div class="close"> <a href="#" onclick="toggle()" class="x">+</a> </div>
					<div id="overflow">
						<div class="inner">
							<div class="slide slide_1">
								<div class="slide-content">
									<p style="text-align: center; margin-bottom: -3%; padding-top: 5px;">Select A Package</p>
									<div class="radiogroup">
										<div class="wrapper">
											<input class="state" type="radio" name="app" id="a" value="a">
											<label class="label" for="a"> <span class="text"><h1>Expert</h1>
                                    <p>
                                        1 Room<br>
                                        Size: 14x14 or less<br>
                                        Design Revisions: N/A<br>
                                        Furniture Purchase Links Avaialble<br>
                                        <h5>Price: $79.99</h5>                    
                                    </p>               
                                        </span> </label>
										</div>
										<div class="wrapper">
											<input class="state" type="radio" name="app" id="b" value="b">
											<label class="label" for="b"> <span class="text">   <h1>Premium</h1>
                                    <p>
                                        1 Room<br>
                                        Size: Greater than 14x14<br>
                                        Design Revisions: Yes<br>
                                        Furniture Purchase Links Available<br>
                                        <h5>Price: $99.99</h5>
                                    </p>
                                        </span> </label>
										</div>
										<div class="wrapper">
											<input class="state" type="radio" name="app" id="c" value="c">
											<label class="label" for="c"> <span class="text"><h1>Luxe</h1>
                                    <p>
                                        1 Room<br>
                                        Size: Any Size<br>
                                        Design Revisions: Yes<br>
                                        Furniture Purchase Links Available<br>
                                        <h5>Price: $175.00</h5>
                                    </p>
                                        </span> </label>
										</div>
									</div>
								</div>
							</div>
							<div class="slide slide_2">
								<div class="slide-content">
									<h2 style="opacity: .7; text-align: center; padding-top: 30px; font-size: 45px;"> Payment Method</h2>
									<div class="container">
										<div class="box">
											<div class="imgBx"> <img src="images/creditcard.png" alt="Image of credit card"> </div>
											<div class="contentBx"> x x x x &nbsp; x x x x &nbsp; x x x x &nbsp; 0987
												<br>CARD HOLDER
												<br>
												<br>
												<p style="font-size: 13px;">10/2024
													<br> EXP </p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="slide slide_3">
								<div class="slide-content">
									<div class="uploadform">
										<form action="userHomePage.php" method="POST" enctype="multipart/form-data">
											<label for="type" style="font-size: 30px; font-weight: bolder;">Room Type</label>
											<br>
											<p style="font-size: 13px;">Please select a room type</p>
											<input type="radio" id="bedroom" name="type" value="bedroom">
											<label for="bedroom">Bedroom</label>
											<br>
											<input type="radio" id="bathroom" name="type" value="bathroom">
											<label for="bathroom">Bathroom</label>
											<br>
											<input type="radio" id="livingroom" name="type" value="livingroom">
											<label for="livingroom">Living Room</label>
											<br>
											<hr width="80%">
											<label for="dimensions" style="font-size: 30px; font-weight: bolder;">Dimensions</label>
											<br>
											<p style="font-size: 13px;">Enter room dimentions as Length X Width </p>
											<input type="text" name="dimensions" id="dimensions">
											<br>
											<br>
											<input type="file" name="image">
											<br>
											<hr width="80%">
											<label for="description" style="font-size: 30px; font-weight: bolder;">Design Type</label>
											<br>
											<p style="font-size: 13px;">Please select a design preference.</p>
											<input type="radio" id="minimalism" name="description" value="minimalism">
											<label for="minimalism">Minimalism</label>
											<br>
											<input type="radio" id="rustic" name="description" value="rustic">
											<label for="rustic">Rustic</label>
											<br>
											<input type="radio" id="modern" name="description" value="modern">
											<label for="modern">Modern</label>
											<hr width="80%">
											<label for="color" style="font-size: 30px; font-weight: bolder;">Color</label>
											<br>
											<p style="font-size: 13px;">This is just a suggestion. The designer has the option of changing the color as per their will. </p>
											<input type="text" name="color" id="color">
											<hr width="80%">
											<button type="submit" name="submit" value="Upload" class="popupButton">Upload</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="controls">
					<label for="slide1"></label>
					<label for="slide2"></label>
					<label for="slide3"></label>
				</div>
				<div id="bullets">
					<label for="slide1"></label>
					<label for="slide2"></label>
					<label for="slide3"></label>
				</div>
			</div>
		</div>
		<?php
                                    include("database/config.php");                                   
                                    if(isset($_POST['submit']))
                                    {
                                        //storing the file
                                        $file = $_FILES['image'];
                                        //storing information from the file 
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
                                                    $fileDestination = 'images/bedrooms/'.$fileNameNew;
                                                    //move the file from the temp location to actual location
                                                    move_uploaded_file($fileTmpName, $fileDestination);
                                                    //assigning all the variables to the form inputs
                                                    $type= $_POST['type'];
                                                    $dimensions = $_POST['dimensions'];
                                                    $description = $_POST['description'];
                                                    $color = $_POST['color'];
                                                    //this is a unique identifier therefore pictures uploaded by two customers with the same 
                                                    //picture name will not replace the existing picture. 
                                                    $pictures = "http://localhost/indy/images/bedrooms/$fileNameNew";
                                                    
                                                    $cusID = $_SESSION["cusID"];   
                                                    //inserting the immage link with all the information in the project table
                                                    $sql = "INSERT INTO project (pictures, type, dimensions, color, description, cusID) VALUES ('$pictures','$type','$dimensions','$color','$description','$cusID') ";
                                                    if(mysqli_query($connection,$sql))
                                                    {
                                                        echo "Record Added Successfully";
                                                    }
                                                    else{
                                                        echo "ERROR: Could not execute and add record. " . mysqli_error($connection);

                                                    }
                                                    //retrieving the cusID and the projectID for this specific pic.
                                                    $query = "SELECT cusID, projectID FROM project WHERE pictures ='$pictures'";
                                                    $sql=mysqli_query($connection, $query);
                                                    $projectInfo=array();
                                                    while ($row_cus=mysqli_fetch_assoc($sql))
                                                    {
                                                        $projectInfo[]=$row_cus;

                                                    
                                                    }
                                                    //inserting the cusID and the project id into the indeeFeed table. 
                                                    $sql = "INSERT INTO indyFeed (cusID, projectID) VALUES ({$projectInfo[0]['cusID']}, {$projectInfo[0]['projectID']})";
                                                    if(mysqli_query($connection,$sql))
                                                    {
                                                        echo "Record Added Successfully in the indy feed";
                                                    }
                                                    else{
                                                        echo "ERROR: Could not execute and add record to the indy feed " . mysqli_error($connection);

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


                                    @mysqli_close($connection);
                                    ?>
	</body>
	<script type="text/javascript" src="vanilla-tilt.js"></script>
	<script type="text/javascript">
	VanillaTilt.init(document.querySelector(".your-element"), {
		max: 25,
		speed: 400
	});
	//It also supports NodeList
	VanillaTilt.init(document.querySelectorAll(".box"));
	</script>

	</html>