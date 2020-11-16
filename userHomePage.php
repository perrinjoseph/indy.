
<!doctype html>
<html lang="en">

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
    
        <div class= "content" id="blur">
    <nav class="navbar navbar-expand-lg navbar-light bg-#D7D7D7">
        <div class="d-flex flex-grow-1">
            <span class="w-100 d-lg-none d-block"><!-- hidden spacer to center brand on mobile --></span>
            <a class="navbar-brand" href="#">
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
                <li class="nav-item">
                    <a href="login.html" class="nav-link">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>
    

    
                <div class="row">
                    <div class="col3">
                        

                        
                    </div>
                    <div id="description" class="col8" >
                        <p style=" margin-left:70px; font-family: Courier; color: black; "><b>BRIAN PAUL</b><br>
                            I am from dubai. I love minimalism and modern<br>
                            interior design. I am a father of 3 and own a dog.<br>
                            looking for a designer that can maximize my space <br>
                            at the same time make my home look fantastic<br>
                            
                            
                            </p>

                        
                    </div>
                    <a href="#" onclick =toggle() class="col" >
                        <h2 style=" font-size: 90px; margin-left:70px; font-family: 'Heebo', sans-serif;"> <b>Create a post</b></h2><br>
                        <p style=" margin-left:70px; font-family: Courier; color: black; "><b>click</b> to upload pictures of your room.<br>
                            Add a description of the suggested design theme, dimensions<br> and any specific instructions. Let the designers do the magic.
                            
                            </p>
                    </a>
                
                </div>
</div>   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type= "text/javascript">
    function toggle(){
        var blur= document.getElementById('blur');
        blur.classList.toggle('active')
        var popup= document.getElementById('popup');
        popup.classList.toggle('active')

    }

</script>

<div id="popup">
    
    
    <div id="slider">
        
        <input type="radio" name="slider" id="slide1" checked>
        <input type="radio" name="slider" id="slide2">
        <input type="radio" name="slider" id="slide3">
        <div id="slides">
            <div class="close">
                <a href="#" onclick ="toggle()" class="x">+</a>
            </div>
            <div id="overflow">
                <div class="inner">
                    <div class="slide slide_1">
                        <div class="slide-content">
                            
                            <p style="text-align: center; margin-bottom: -3%; padding-top: 5px;">Select A Package</p>
                            <div class="radiogroup">
                                <div class="wrapper">
                                  <input class="state" type="radio" name="app" id="a" value="a">
                                  
                                  <label class="label" for="a">
                                   
                                    <span class="text">Expert
                                        
                                            1 Room<br>
                                            Size: 14x14 or less<br>
                                            Design Revisions: N/A<br>
                                            Furniture Purchase Links Avaialble<br>
                                            Price: $79.99                   
                                        </span>
                                  </label>
                                </div>
                                <div class="wrapper">
                                  <input class="state" type="radio" name="app" id="b" value="b">
                                  <label class="label" for="b">
                                   
                                    <span class="text">  Premium
                                        
                                            1 Room<br>
                                            Size: Greater than 14x14<br>
                                            Design Revisions: Yes<br>
                                            Furniture Purchase Links Available<br>
                                            Price: $99.99
                                        </span>
                                  </label>
                                </div>
                                <div class="wrapper">
                                  <input class="state" type="radio" name="app" id="c" value="c">
                                  <label class="label" for="c">
                                    
                                    <span class="text"> Deluxe
                                        
                                            Up to 4 Rooms<br>
                                            Size: Any Size<br>
                                            Design Revisions: Yes<br>
                                            Furniture Purchase Links Available<br>
                                            Price: $300.00
                                        </span>
                                  </label>
                                </div>
                               
                              </div>
                        </div>
                    </div>

                    <div class="slide slide_2">
                        <div class="slide-content">
                            <h2 style="opacity: .7; text-align: center; padding-top: 30px; font-size: 45px;"> Payment Method</h2>
                            <div class="container">
                                <div class="box">
                                   <div class="imgBx">
                                       <img src="images/creditcard.png" alt ="Image of credit card">
                                   </div>
                                   <div class="contentBx">
                                    
                                      x  x  x  x &nbsp; x  x  x  x &nbsp; x  x  x  x &nbsp; 0987
                                       
                                       <br>CARD HOLDER
                                       <br><br>
                                       <p style="font-size: 13px;">10/2024<br>
                                    EXP
                                    </p>

                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="slide slide_3">
                        <div class="slide-content">
                            <div class="uploadform">
                               
                                    <form method="post" action="userHomePage.php" enctype="multipart/form-data">
                                        <label for="title" style="font-size: 30px; font-weight: bolder;">Title </label><br>
                                        <input type="text" name="title" id="title"><br><br>
                                        <label for="dimensions" style="font-size: 30px; font-weight: bolder;">Dimensions</label><br>
                                        <input type="text" name="dimensions" id="dimensions"><br><br>
                                        <label for="dis" style="font-size: 30px; font-weight: bolder;">Description</label><br>
                                        <p style="font-size: 13px;">You may enter information like color preference, style preference etc. Please keep in mind, it is up to designer whether to use these recommendations or not. If you opted for Premium or Delux you are eligible for revisions.</p>
                                        <textarea name="message" rows="7" cols="70" id="dis" style="width: 100%;"></textarea>
                                        <input type="submit" name="upload" value="Upload" class="popupButton" >
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
