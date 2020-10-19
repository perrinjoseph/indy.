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

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <nav class="menu">

        <ul>
            <li><a href="feed.html">Feed</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="designer.php">Profile</a></li>
            <li><a href="#">Sign Out</a></li>
        </ul>

    </nav>

    <div class="container-fluid">
        <div class="row-bottom-margin">
            <div class="col-sm-2">
                <img src="images/profile1.jpg" class="rounded-circle img-fluid img-thumbnail" alt="Designer"> 
            </div>
            <div class="col-sm-6">
                    <h4>Jason Mendosa</h4>
                    Artist from Toronto. Started interior designing 3 years ago. Looking to build my portfolio and to give you a great experience.
            </div>
            <div class="col-sm-4">
                <div class="progress">
                    <div class="progress-bar" style="width:100%"></div>
                </div>
                <h5>Rating:</h5>
                5/5
            </div>
        </div>
        <div class="row-bottom-margin">
            <div class="col-sm-12">
                <h2 class="text-center">Rooms Designed</h2>
            </div>
        </div>

        <?php
            //Display the room images
            $roomImages = "images/designer-images";
            $images = glob($roomImages . "/*.jpg");
            $numImages = sizeof($images);
            $imageIndex = 0;

            //Calculate how many rows are needed based on the number of total images (each row has 3 images)
            $numRows = 0;
            if($numImages % 3 == 0) {
                $numRows = $numImages / 3;
            } else {
                $numRows = ($numImages / 3) + 1;
            }

            // Display up to 3 images and then place a new row, then repeat until out of images
            for($i = 0; $i < $numRows; $i++) {
                echo "<div class='row-bottom-margin'>";
                for($x=0; $x < 3; $x++) {
                    if($imageIndex < $numImages) {

        ?>
                    <div class="col-sm-4">
                        <img src=<?php echo "$images[$imageIndex]";?> class="img-fluid" alt="Room">
                        <?php $imageIndex++; ?>
                    </div>
        <?php
                    }
                }
                echo "</div>";
            }
        ?>
    </div>
    <script src="script.js"></script>
</body>

</html>