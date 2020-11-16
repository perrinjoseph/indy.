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
    <title>Indy - Login</title>
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
            <li><a href="login.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="packages.html">Packages</a></li>
            <li><a href="login.html">Sign Up</a></li>

        </ul>

    </nav>

    <div class="row">

        <div class="form">
            <form action ="login.php" method="post">
                <h1>Login</h1>
                <input type="text" name="uname" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit" name="submit">Login</button>

                <?php
                    include("database/config.php");
                    
                    if(isset($_POST["submit"])) {
                        //get values from form
                        $username = $_POST['uname'];
                        $password = $_POST['password'];

                        //prevent mysql injection
                        $username = stripcslashes($username);
                        $password = stripcslashes($password);
                        $username = mysqli_real_escape_string($connection, $username);
                        $password = mysqli_real_escape_string($connection, $password);

                        //query database
                        $result = @mysqli_query($connection, "select username, cast(aes_decrypt(psword, 'indy') as char), type from login 
                            where username = '$username' and psword = aes_encrypt('$password', 'indy')") or die("failed to connect to database" .mysql_error());
                        $row = mysqli_fetch_row($result);

                        if($row[2] == "user"){
                            $_SESSION["cusID"] = @mysqli_query($connection, "select cusID from customer where username = '$username'");
                            header("Location: userHomePage.html");
                        } elseif($row[2] == "designer"){
                            $cusID =  @mysqli_query($connection, "select cusID from customer where username = '$username'");
                            $_SESSION["empID"] = "$cusID";
                            header("Location: feed.php");
                        } else {
                            echo "Invalid login";
                        }

                        @mysqli_free_result($result);
                        @mysqli_close($connection);
                    }
                ?>
            </form><br>
        </div>
            
        <div class="center">
            <div style="
                height:900px; width: 1200px; 
                background-image: url(images/bluesplash.png);
                background-repeat: no-repeat;
                background-position: center center;
                background-size: cover;
                margin:10%;
                float: left;
            ">
                <h2 style="font-size: 190px; margin-left:300px; font-family: 'Heebo', sans-serif;"> <b>indy.</b></h2>
                <h2 style=" font-family: 'Poppins', sans-serif; margin-left:300px">Register Now</h2>

                <p style=" margin-left:300px; font-family: Courier; color: black; ">Register as a customer or start your journey<br> as a designer,
                    build a strong portfolio, work <br>with clients, earn money
                    and grow your <br>business.<br> </p>

                <a href='register.html'>
                    <button style=" margin-left:300px;  border: none;
                        outline: none; border-radius: 10px;
                        background: #6FD6FF;
                        box-shadow:  10px 10px 19px #5eb6d9, 
                                -10px -10px 19px #80f6ff; 
                        padding: 10px;	
	                ">Designer</button>
                </a>
                <a href='register.html'>
                    <button style=" margin-left:10px;  border: none;
                        outline: none; border-radius: 10px;
                        background: #6FD6FF;
                        box-shadow:  10px 10px 19px #5eb6d9, 
                                -10px -10px 19px #80f6ff; 
                        padding: 10px;	
                    ">Customer</button>
                </a>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>