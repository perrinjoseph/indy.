<?php
    session_start();
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
   <style>

          
.row {
    height: 100%;
    background-color: #D7D7D7;
    width: 100%;
    max-width:1500px;
    display: flex;
    justify-content: center;
    align-items: center;
    display: flex;
    margin: auto;
}

.row-bottom-margin {
    margin-bottom:30px; 
    height: 100%;
    background-color: #D7D7D7;
    width: 100%;
    justify-content: center;
    align-items: center;
    display: flex;
}

.row .form {
   
    padding: 40px;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #D7D7D7;
    margin:10%;
    padding: 6%;
    height: 100%;
    width: 100%;
    border-radius: 60px;
    background: #D7D7D7;
    box-shadow: 33px 33px 66px #b7b7b7,
        -33px -33px 66px #f7f7f7;
        justify-content: center;   
}

.row .form h1 {
    margin-bottom: 24px;
    margin-top: 7px;
    font-size: 40px;
    text-align: center;

}

.row .form input {
    outline: none;
    border: none;
    margin-bottom: 30px;
    font-size: 12px;
    padding: 13px;
    width: 100%;
    
    font-family: Helvetica;

    border-radius: 68px;
    background: #D7D7D7;
    box-shadow: inset 12px 12px 24px #b7b7b7,
        inset -12px -12px 24px #f7f7f7;
        
}

.row .form button {
    border: none;
    outline: none;
    font-size: 14px;
    padding: 12px;
    margin-top: 20px;
    width: 120px;


    border-radius: 35px;
    background: #D7D7D7;
    box-shadow: 12px 12px 24px #b7b7b7,
        -12px -12px 24px #f7f7f7;

}

.row .form button:hover {
    border-radius: 35px;
    background: #D7D7D7;
    box-shadow: inset 16px 16px 31px #b7b7b7,
        inset -16px -16px 31px #f7f7f7;

}

.row .package {
    margin-bottom: 8%;
    margin-top: 8%;
    margin-left: 8%;
    padding: 40px;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #D7D7D7;

    height: 420px;
    width: 320px;
    border-radius: 68px;
    background: #d7d7d7;
    box-shadow: inset 41px 41px 82px #b7b7b7, 
            inset -41px -41px 82px #f7f7f7;
}

.row .package h1 {
    margin-bottom: 24px;
    margin-top: 7px;
    font-size: 40px;
    text-align: center;

}

.row .package button {
    border: none;
    outline: none;
    font-size: 14px;
    padding: 12px;
    margin-top: 20px;
    width: 120px;

    border-radius: 35px;
    background: #D7D7D7;
    box-shadow: 12px 12px 24px #b7b7b7,
        -12px -12px 24px #f7f7f7;
}

.row .package button:hover {
    border-radius: 35px;
    background: #D7D7D7;
    box-shadow: inset 16px 16px 31px #b7b7b7,
        inset -16px -16px 31px #f7f7f7;
}

.row .package form {
    text-align: center;
}
    </style>
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

    <div class="row">

        <div class="form">
        <form action ="customerRegistration.php" method="post">
                
                <h1>Register: Customer</h1>
                <input type="text" name="fname" placeholder="First Name" required /><br>
                <input type="text" name="lname" placeholder="Last Name" required /><br>
                <input type="text" name="street" placeholder="Street Address" required /><br>
                <input type="text" name="city" placeholder="City" required /><br>
                <input type="text" name="state" placeholder="State" required /><br>
                <input type="text" name="zip" placeholder="Zip Code" required /><br>
                <input type="text" name="email" placeholder="Email" required /><br>
              
                <textarea name="aboutme" rows="5" cols="40" placeholder="Blurb about you" required></textarea><br><br>
                <input type="text" name="username" placeholder="username" required /><br>
                <input type="password" name="psword" placeholder="password" required /><br>
                <input type="password" name="retypedPassword" placeholder="re-type password" required /><br>
                <button type="submit" name="submit">Submit</button><br>

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
                        
                        


                        //query database
                        $result = @mysqli_query($connection, "select email from customer where email = '$email'");
                        $usernameCheck = @mysqli_query($connection, "select username from login where username = '$username'");

                        if(mysqli_num_rows($result)==0){
                            if(mysqli_num_rows($usernameCheck)==0){
                                if($psword == $retypedPassword){
                                    $sqlLogin = "INSERT INTO login (username, psword, type) VALUES ('$username', aes_encrypt('$psword', 'indy'), 'user')";
									@mysqli_query($connection, $sqlLogin);
									
									$loginQuery = "SELECT loginID from login where username=('$username')";
									$loginID = @mysqli_query($connection, $loginQuery);
									$row = mysqli_fetch_row($loginID);
									$id = $row[0];
									$sql = "INSERT INTO customer (fname, lname, street, city, state, zip, email, aboutme, loginID) VALUES('$fname', '$lname', '$street', '$city', '$state', '$zip', '$email', '$aboutme', '$id')";
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