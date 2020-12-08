<?php
    // Clear output buffer
    ob_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Indy - Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@600&family=Heebo:wght@600;900&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link href="registerpage.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-#D7D7D7">
        <div class="d-flex flex-grow-1">
            <span class="w-100 d-lg-none d-block"><!-- hidden spacer to center brand on mobile --></span>
            <a class="navbar-brand" href="login.php">
                indy.
            </a>
            <div class="w-100 text-right">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7" >
                    <span class="navbar-toggler-icon" ></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar7">
            <ul class="navbar-nav ml-auto flex-nowrap">
                <li class="nav-item">
                    <a href="about.html" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="packages.html" class="nav-link">Packages</a>
                </li>
            </ul>
        </div>
    </nav>

    <div  class="row" id="registerStyles">

        <div class="form">
            <form action ="designerRegistration.php" method="post">
                
                <h1>Register: Designer</h1>
                <input type="text" name="fname" placeholder="First Name" required /><br>
                <input type="text" name="lname" placeholder="Last Name" required /><br>
                <input type="text" name="street" placeholder="Street Address" required /><br>
                <input type="text" name="city" placeholder="City" required /><br>
                <input type="text" name="state" placeholder="State" required /><br>
                <input type="text" name="zip" placeholder="Zip Code" required /><br>
                <input type="text" name="email" placeholder="Email" required /><br>
              
                <textarea name="aboutme" rows="5" cols="40"  placeholder="Blurb about you" required></textarea><br>
                <br>

                Select a Style:<span class="error">* </span><br>           
	            <input type="radio" id="rad1" name="style" value="rustic" required>
                <label for="rad1">Rustic</label><br> 
                
                <input type="radio" id="rad2" name="style" value="modern" required>
                <label for="rad2">Modern</label><br> 

                <input type="radio" id="rad3" name="style" value="minimalism" required>
                <label for="rad3">Minimalism</label><br> 

                <input type="radio" id="rad4" name="style" value="contemporary" required>
                <label for="rad4">Contemporary</label><br> 

                <input type="radio" id="rad5" name="style" value="traditional" required>
                <label for="rad5">Traditional</label><br> 
                
                <br><br>

                <input type="text" name="username" placeholder="username" required />
                <input type="password" name="psword" placeholder="password" required />
                <input type="password" name="retypedPassword" placeholder="re-type password" required />
                <button type="submit" name="submit">Submit</button>

                <?php
                    //get database login info
                    include("database/config.php");
                    
                    if(isset($_POST["submit"])) {
                        //get values from form
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $street = $_POST['street'];
                        $city = $_POST['city'];
                        $state = $_POST['state'];
                        $zip = $_POST['zip'];
                        $email = $_POST['email'];
                        $aboutme = $_POST['aboutme'];
                        $style = $_POST['style'];
                        $username = $_POST['username'];
                        $psword = $_POST['psword'];
                        $retypedPassword = $_POST['retypedPassword'];

                        //prevent mysql injection
                        $fname = stripcslashes($fname);
                        $lname = stripcslashes($lname);
                        $street = stripcslashes($street);
                        $city = stripcslashes($city);
                        $state = stripcslashes($state);
                        $zip = stripcslashes($zip);
                        $email = stripcslashes($email);
                        $aboutme = stripcslashes($aboutme);
                        $style = stripcslashes($style);
                        $username = stripcslashes($username);
                        $psword = stripcslashes($psword);
                        $retypedPassword = stripcslashes($retypedPassword);
                        
                        $fname = mysqli_real_escape_string($connection, $fname);
                        $lname = mysqli_real_escape_string($connection, $lname);
                        $street = mysqli_real_escape_string($connection, $street);
                        $city = mysqli_real_escape_string($connection, $city);
                        $state = mysqli_real_escape_string($connection, $state);
                        $zip = mysqli_real_escape_string($connection, $zip);
                        $email = mysqli_real_escape_string($connection, $email);
                        $aboutme = mysqli_real_escape_string($connection, $aboutme);
                        $style = mysqli_real_escape_string($connection, $style);

                        //query database
                        $result = @mysqli_query($connection, "select email from employee where email = '$email'");
                        $usernameCheck = @mysqli_query($connection, "select username from login where username = '$username'");

                        if(mysqli_num_rows($result)==0){
                            if(mysqli_num_rows($usernameCheck)==0){
                                if($psword == $retypedPassword){							
									$sqlLogin = "INSERT INTO login (username, psword, type) VALUES ('$username', aes_encrypt('$psword', 'indy'), 'designer')";
									@mysqli_query($connection, $sqlLogin);
									
									$loginQuery = "SELECT loginID from login where username=('$username')";
									$loginID = @mysqli_query($connection, $loginQuery);
									$row = mysqli_fetch_row($loginID);
									$id = $row[0];
									$sql = "INSERT INTO employee (fname, lname, street, city, state, zip, email, aboutme, style, loginID) VALUES('$fname', '$lname', '$street', '$city', '$state', '$zip', '$email', '$aboutme', '$style', '$id')";
									@mysqli_query($connection, $sql);
									
                                    header("Location: login.php");
                                }
                                else{
                                    echo "Passwords don't match!";
                                }
                            }
                            else{
                                echo "Username is taken.";
                            }                            
                        }
                        else{
                            echo "Email is already registered!";
                        }

                        @mysqli_free_result($result);
                        @mysqli_close($connection);
                    }
                ?>
            </form><br>
        </div>
            
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
