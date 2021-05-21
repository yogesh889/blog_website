<?php

//session start
session_start();

//last time login up 
if(isset($_SESSION['last_login_timestamp']))
{
    $sessiontimeval = $_SESSION['last_login_timestamp'];
    if(time()-$sessiontimeval>15*60)
    {
        header('location:logout.php');
        die();
    }
}
//connect db
require 'connection.php';
   $sql="select count(*) as num from blog";
    $res=  mysqli_query($con, $sql);
    $num=  mysqli_fetch_assoc($res);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BLOG | About</title>
        <!--<link rel="stylesheet" type="text/css" href="styles/about.css">-->
        <link rel="stylesheet" href="styles/about.css?v=<?php echo time(); ?>">
        <meta name="description" content="Favicon">
        <link rel="icon" type="image/jpeg" href="image/shopsky.jpg">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet"> 
        <script src="https://kit.fontawesome.com/b1a6e9234b.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
    <div class="modal-login">
            <div class="total-box">
                <div class="close-button">
                    <button>&#10006;</button>
                </div>
                <div class="box-inside">
                    <form action="signup.php" id="log" method="POST">
                    <div class="box2">
                        <h4>Log in</h4>
                        <p>
                            <input id="" type="email" name="u_email" placeholder="Enter Email">
                        </p><p> </p>
                        
                        <p>
                            <input id="" type="password" name="u_password" placeholder="Enter Password">
                        </p>
                        <p>
                            <!--<button class="signup" onclick="login()">Log in</button>-->
                            <input class="signup" type="submit" value="Log in" name="u_submit">
                        </p><br>
                        </div><hr>
                        <p class="message">New User? Click to <a href="#">Sign up</a></p>
                    
                    </form>
                    <?php
           if(isset($_SESSION['role']))
           {
               if($_SESSION['role']=='admin')
               {
                   ?>
                     <form action="signup.php" id="sign" method="POST">
                    <div class="box2">
                    <h4>Sign up</h4>
                    <p>
                        <input id="" type="text" name="name" placeholder="Enter Name">
                    </p><p> </p>
                    <p>
                        <input id="" type="email" name="email" placeholder="Enter Email">
                    </p>
                    
                    <p>
                        <input id="" type="password" name="password" placeholder="Enter Password">
                    </p>
                    <p>
                        <input id="" type="password" name="cpassword" placeholder="confirm Password">
                    </p><br>
                    <p>
                       <input class="signup" type="submit" value="ADD ADMIN" name="admin" style="cursor: pointer;">
                        </p>
                    </div><hr>
                    <p class="message">Already Registered? Click to  <a href="#">Login</a></p>
                </form>
                <?php
               }
               else{
                   ?>
                     <form action="signup.php" id="sign" method="POST">
                    <div class="box2">
                    <h4>Sign up</h4>
                    <p>
                        <input id="" type="text" name="name" placeholder="Enter Name">
                    </p><p> </p>
                    <p>
                        <input id="" type="email" name="email" placeholder="Enter Email">
                    </p>
                    
                    <p>
                        <input id="" type="password" name="password" placeholder="Enter Password">
                    </p>
                    <p>
                        <input id="" type="password" name="cpassword" placeholder="confirm Password">
                    </p><br>
                    <p>
                       <input class="signup" type="submit" value="Sign up" name="reader" style="cursor: pointer;">
                        </p>
                    </div><hr>
                    <p class="message">Already Registered? Click to  <a href="#">Login</a></p>
                </form>
                <?php
               }
           }
           else{
               ?>
                     <form action="signup.php" id="sign" method="POST">
                    <div class="box2">
                    <h4>Sign up</h4>
                    <p>
                        <input id="" type="text" name="name" placeholder="Enter Name">
                    </p><p> </p>
                    <p>
                        <input id="" type="email" name="email" placeholder="Enter Email">
                    </p>
                    
                    <p>
                        <input id="" type="password" name="password" placeholder="Enter Password">
                    </p>
                    <p>
                        <input id="" type="password" name="cpassword" placeholder="confirm Password">
                    </p><br>
                    <p>
                       <input class="signup" type="submit" value="Sign up" name="reader" style="cursor: pointer;">
                        </p>
                    </div><hr>
                    <p class="message">Already Registered? Click to  <a href="#">Login</a></p>
                </form>
                <?php
           }
           ?>
                
                </div>
        </div> 
    </div>
    <div class="modal-contact">
        <div class="box1">
                <div class="close-button">
                    <button>&#10006;</button>
                </div>
                <form action="contact.php" method="POST">
                    <h2>Contact Us</h2>
                    <ul style="padding:0;">
                        <li style="display:inline-block;margin-right:1em;"><a href="">
                            <i class="fas fa-phone-alt"></i>
                            <span> 9999999999</span>
                        </a></li>
                        <li style="display:inline-block;"><a href="">
                            <i class="far fa-envelope"></i>
                            <span> xyz@gmail.com</span>
                            </a></li>
                        </ul>
                    <p>
                        <label for="name">Name:</label><br>
                        <input id="name" type="text" placeholder="First Name">
                        <input id="name" type="text" placeholder="Last Name">
                    </p>
                    <br>
                    <p>
                        <label for="email">Your Email:</label><br>
                        <input id="email" type="email" placeholder="Your Email">
                    </p>
                    <br>
                    <p>
                        <label for="msgsub">Message Subject:</label><br>
                        <input id="msgsub" type="text" placeholder="Message Subject">
                    </p>
                    <br>
                    <p>
                        <label for="message">Your Message:</label><br>
                        <textarea id="message" cols="55" rows="5" placeholder="Type your message here..."></textarea>
                    </p>
                    <p><button type="submit">Submit</button></p>
                </form>
                
        </div>
    </div>
      <header style="height: 100vh;">
            <div class="total-section">
                <!-- Header Left Section -->
                <div class="left-container"></div>
                <!-- Navigation Section -->
                <nav>
                                <img src="image/shopsky.jpg" style="height:50px;position: absolute;margin-top: 5px"/> <h5 style="margin-left:60px;position: absolute;margin-top: 10px;font-family: sans-serif;font-weight: 600;font-size: 30px">Shopsky</h5>

                    <ul>
                        <li class="toggle items"><button onclick="mytoggle()"><span class="bars"></span>
                        </button></li>
                        <li class="activated" id="home"><a href="index.php">Home</a></li>
                        <li class="activated contact" id="contact" style="cursor: pointer;"><b>Contact Us</b></li>
                        <li class="active activated" id="about"><a href="about.php">About Us</a></li>
                         <?php
                        if(isset($_SESSION['aid']))
                        {
                            ?>
                        <li class="" id="home" ><a href="mypost.php" style="text-decoration:none;color:black">Wishlist</a></li>
                        <?php
                        }
                        ?>
                        <?php
                        if(isset($_SESSION['role']))
                        {
                            if($_SESSION['role']=='admin')
                            {
                                ?>
                        <li class="activated" id="about"><a href="add_post.php">Add Post</a> (<?= $num['num'] ?> posts)</li>
                        <?php
                            }
                        }
                        ?>
                        <li class="login activated" id="login" style="cursor: pointer;">
                                <?php 
                                    if(isset($_SESSION['login_val']))
                                    {
                                        if($_SESSION['role']=='reader')
                                        {
                                        echo "<a href='logout.php'></a>";
                                        }
                                    }
                                ?>
                                <?php
                                        if(isset($_SESSION['login_val']))
                                        {
                                            if($_SESSION['role']=='reader')
                                            {
                                            echo "Logout";
                                            }
                                            else{
                                                echo 'Add Admin';
                                            }
                                        }
                                        else
                                        {
                                            echo "Login";
                                        }
                                ?>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Header Matter Section-->
                <div class="container1">
                    <span>Hello!!!</span>
                    <h1>Welcome</h1>
                    <span> To
                        <span class="typed-text">
                        </span>
                        <span class="cursor">&nbsp;</span>
                    </span>
                </div>
            </div>
    </header>
        <section>
            <!-- Who are we Section -->
            <div class="who-are-we">
                <h2>Who are we??</h2>
                <img src="image/wall.jpg">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <!-- What we do Section -->
           <div class="what-we-do">
             <h2>What we do??</h2>
                <div class="box">
                    <div class="box1">
                     <img src="image/wall.jpg">
                        <h3>Lorem Ipsum </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                    </div>
                   <div class="box1">
                       <img src="image/wall1.jpg">
                       <h3>Lorem Ipsum </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                   </div>
                 <div class="box1" >
                        <img src="image/web2.jpg">
                        <h3>Lorem Ipsum </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                 </div>
               </div>  
            </div>
            <!-- Why choose us Section -->
            <div class="why-choose-us">
                <h2>Why choose us??</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>   
            </div>
            
            <!-- Meet out team Section -->
            <div class="meet-our-team">
                <h2>Meet Our Team...</h2>
                <div class="table-content">
                    <div class="column">
                        <div class="row-1">
                            <img src="image/wall.jpg">
                        </div>
                        <div class="row-2">
                             <h4>LOREM IPSUM</h4>
                             <h5>CEO</h5>
                             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="row-1">
                            <img src="image/wall.jpg">
                        </div>
                        <div class="row-2">
                             <h4>LOREM IPSUM</h4>
                             <h5>CEO</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="row-1">
                            <img src="image/wall.jpg">
                        </div>
                        <div class="row-2">
                             <h4>LOREM IPSUM</h4>
                             <h5>CEO</h5>
                               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="row-1"> 
                            <img src="image/wall.jpg">
                        </div>
                        <div class="row-2">
                             <h4>LOREM IPSUM</h4>
                             <h5>CEO</h5>
                             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Additional Section -->
            <div class="additional-section">
                <h2>Additional Section...</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>  
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>   
            </div>
        </section>
        
        
        
        <footer>
            <!-- Footer Section -->
            <div class="footer-container">
                <div class="footer-nav">
                    <!-- Media Section -->
                    <div class="social-media">
                        <h3>Social-Media</h3>
                        <ul>
                            <li><a href="" target="blank">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a></li>
                            <li><a href="" target="blank">
                                <i class="fab fa-facebook-f"></i><span>  Facebook</span>
                            </a></li>
                            <li><a href="" target="blank">
                                <i class="fab fa-instagram"></i><span> Instagram</span>
                            </a></li>
                            <li><a href="" target="blank">
                                <i class="fab fa-linkedin-in"></i><span> Linkedin</span>
                            </a></li>
                        </ul>
                    </div>
                    <!-- Navigation Section -->
                    <div class="footer-navigation">
                        <h3>Navigation</h3>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li class="contact" style="cursor: pointer;"><b>Contact Us</b></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
                    <!-- Contact Section -->
                    <div class="contact_me">
                        <h3>Contact</h3>
                        <ul>
                            <li><a href="">
                                <i class="fas fa-phone-alt"></i>
                                <span> 9999999999</span>
                            </a></li>
                            <li><a href="">
                                <i class="far fa-envelope"></i>
                                <span> xyz@gmail.com</span>
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class="copyright">
                    Copyright © 2020 All rights reserved
                </div>
            </div>
        </footer>
        <script>
            $('.message a').click(function(){
                $('form').animate({
                    height:"toggle",opacity:"toggle"}, "slow");
            });
            $('nav ul li.login').click(function(){
                $('.modal-login').css("display", "flex");
            });
            $('.close-button button').on('click',function(){
                $('.modal-login').css("display", "none");
            });
            $('.contact').click(function(){
                $('.modal-contact').css("display","flex");
            });
            $('.close-button button').on('click',function(){
                $('.modal-contact').css("display", "none");
            });
        </script>
        <script type="text/javascript" src="js/index.js"></script>
        <script>
            $(document).ready(function(){
                $("nav ul li button").on('click',function(){
                    //alert("Button clicked");
                    if($("#home").hasClass("activated") && $("#contact").hasClass("activated") && $("#about").hasClass("activated") && $("#login").hasClass("activated"))
                    {
                        $("#home").removeClass("activated");
                        $("#contact").removeClass("activated");
                        $("#about").removeClass("activated");
                        $("#login").removeClass("activated");
                    }
                    else {
                        $("#home").addClass("activated");
                        $("#contact").addClass("activated");
                        $("#about").addClass("activated");
                        $("#login").addClass("activated");
                    }
                });
            });
        </script>
    </body>
</html>
