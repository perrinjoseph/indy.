<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Indy - Feed</title>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@600&family=Heebo:wght@600;900&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <nav class="menu">

        <ul>
            <li><a href="feed.php">Feed</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="designer.php">Profile</a></li>
            <li><a href="#">Sign Out</a></li>
        </ul>

    </nav>

    <div class="container-fluid">
        <div class="row-bottom-margin">
            <div class="col-9">
                <h1>I, the future<br/> designer.</h1> 
            </div>
            <div class="col-3">
                <!--empty space-->
            </div>
        </div>
        <div class="row-bottom-margin">
            <div class="col-12">
                <h4 class="text-center">Bedrooms</h4>
            </div>
        </div>
        <div class="scrollmenu">
            <?php 
                $bedroomImages = glob("images/bedrooms/*.jpg");
                foreach ($bedroomImages as $bedroomImage){
                  
            ?>
                    <div class="col-3 px-5">
                        <div class="room">
                            <img src=<?php echo "$bedroomImage";?> class="figure-img img-fluid rounded" alt="Bedroom"><br/>
                            <?php
                                //Insert new line after every 4 words in captions
                                $string = "TODO: get caption from database for each image";

                                $arr = explode (" " , $string);
                                $lines = array_chunk($arr,4);
                                foreach($lines as $line) 
                                   echo implode (" ", $line)."</br>";
                            ?>
                            <br/>
                            <div class="heart float-right">
                                <a href="#">
                                    <img src="images/heart.png" class="img-fluid" alt="Like">
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
        <div class="row-bottom-margin">
            <div class="col-12">
                <h4 class="text-center">Bathrooms</h4>
            </div>
        </div>
        <div class="scrollmenu">
            <?php 
                $bedroomImages = glob("images/bedrooms/*.jpg");
                foreach ($bedroomImages as $bedroomImage){
                  
            ?>
                    <div class="col-3 px-5">
                        <div class="room">
                            <img src=<?php echo "$bedroomImage";?> class="figure-img img-fluid rounded" alt="Bedroom"><br/>
                            <?php
                                //Insert new line after every 4 words in captions
                                $string = "TODO: get caption from database for each image";

                                $arr = explode (" " , $string);
                                $lines = array_chunk($arr,4);
                                foreach($lines as $line) 
                                   echo implode (" ", $line)."</br>";
                            ?>
                            <br/>
                            <div class="heart float-right">
                                <a href="#">
                                    <img src="images/heart.png" class="img-fluid" alt="Like">
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
        <div class="row-bottom-margin">
            <div class="col-12">
                <h4 class="text-center">Living Rooms</h4>
            </div>
        </div>
        <div class="scrollmenu">
            <?php 
                $bedroomImages = glob("images/bedrooms/*.jpg");
                foreach ($bedroomImages as $bedroomImage){
                  
            ?>
                    <div class="col-3 px-5">
                        <div class="room">
                            <img src=<?php echo "$bedroomImage";?> class="figure-img img-fluid rounded" alt="Bedroom"><br/>
                            <?php
                                //Insert new line after every 4 words in captions
                                $string = "TODO: get caption from database for each image";

                                $arr = explode (" " , $string);
                                $lines = array_chunk($arr,4);
                                foreach($lines as $line) 
                                   echo implode (" ", $line)."</br>";
                            ?>
                            <br/>
                            <div class="heart float-right">
                                <a href="#">
                                    <img src="images/heart.png" class="img-fluid" alt="Like">
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
        <div class="row-bottom-margin">
            <div class="col-12">
                <h4 class="text-center">Other Rooms</h4>
            </div>
        </div>
        <div class="scrollmenu">
            <?php 
                $bedroomImages = glob("images/bedrooms/*.jpg");
                foreach ($bedroomImages as $bedroomImage){
                  
            ?>
                    <div class="col-3 px-5">
                        <div class="room">
                            <img src=<?php echo "$bedroomImage";?> class="figure-img img-fluid rounded" alt="Bedroom"><br/>
                            <?php
                                //Insert new line after every 4 words in captions
                                $string = "TODO: get caption from database for each image";

                                $arr = explode (" " , $string);
                                $lines = array_chunk($arr,4);
                                foreach($lines as $line) 
                                   echo implode (" ", $line)."</br>";
                            ?>
                            <br/>
                            <div class="heart float-right">
                                <a href="#">
                                    <img src="images/heart.png" class="img-fluid" alt="Like">
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>