<?php
    //Session start
    session_start();
    $_SESSION['blog']='';
    //last time login time
    if(isset($_SESSION['last_login_timestamp']))
    {
        $sessiontimeval = $_SESSION['last_login_timestamp'];
        if(time()-$sessiontimeval>15*60)
        {
            header('location:logout.php');
            die();
        }
    }
    // Connection to database
    require 'connection.php';
//counting posts
    $sql="select count(*) as num from blog";
    $res=  mysqli_query($con, $sql);
    $num=  mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BLOG | Home</title>
        <!--<link rel="stylesheet" href="styles/styles.css">-->
        <link rel="stylesheet" href="styles/styles.css?v=<?php echo time(); ?>">
        <script src="https://kit.fontawesome.com/b1a6e9234b.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/e-search.js"></script>
        <meta name="description" content="Favicon">
        <link rel="icon" type="image/jpeg" href="image/shopsky.jpg">
    </head>
    <body>
    <div class="modal-login">
            <div class="box">
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
    <header style="height: 100%;">
            <div class="total-section">
                <!-- Header Left Section -->
                <div class="left-container"></div>
                <!-- Navigation Section -->
                <nav>
                                <img src="image/shopsky.jpg" style="height:50px;position: absolute;margin-top: 5px"/> <h5 style="margin-left:60px;position: absolute;margin-top: 10px;font-family: sans-serif;font-weight: 600;font-size: 30px">Shopsky</h5>

                    <ul>
                        <li class="toggle items"><button onclick="mytoggle()"><span class="bars"></span>
                        </button></li>
                        <li class="active activated" id="home"><a href="#">Home</a></li>
                        <li class="activated contact" id="contact" style="cursor: pointer;">Contact Us</li>
                        <li class="activated" id="about"><a href="about.php">About Us</a></li>
                        <?php
                        if(isset($_SESSION['aid']))
                        {
                            ?>
                        <li class="activated" id="home"><a href="mypost.php ">Wishlist</a></li>
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
                                        /*else{
                                            echo 'signup.php';
                                        }*/
                                    }
                                    /*else{
                                        echo "signup.php";
                                    }*/
                                ?>
                                <?php
                                        if(isset($_SESSION['login_val']))
                                        {
                                            if($_SESSION['role']=='reader')
                                            {
                                            echo "<a href='logout.php'>LOGOUT</a>";
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
                        </li>
                    </ul>
                </nav>
                <!-- Header Matter Section-->
                <div class="container">
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
        <section class="all_blogs">
            <!-- Popular Blog Section -->
            <section class="popular">
                <h2>Popular Posts</h2>
                <hr>
                <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <?php
                        $result= $con->query("SELECT * FROM blog ORDER BY likes DESC");
                        $i=0;
                        foreach($result as $row) {
                            $actives = '';
                            if($i == 6)
                            {
                                break;
                            }
                            if($i == 0)
                            {
                                $actives = 'active';
                            }
                    ?>
                    <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>
                    <?php $i++; } ?>
                </ul>
                <div class="carousel-inner">
                <?php
                        $result= $con->query("SELECT * FROM blog ORDER BY likes DESC");
                        $i=0;
                        foreach($result as $row) {
                            $description=  substr($row['description'],0,30);
                            $actives = '';
                            if($i == 6)
                            {
                                break;
                            }
                            if($i == 0)
                            {
                                $actives = 'active';
                            }
                    ?>
                    <div class="carousel-item carousel-blog-item <?= $actives; ?>"><a href="blog.php" id="<?= $row['bid'] ?>">
                        <div class="responsive-image" style="width: 100%; height:500px;">
                            <img src="image/<?php echo $row['image'] ?>" width="100%" height="100%">
                        </div>
                        <div class="carousel-caption">
                            <h3 style="color: #00008B;"><?= $row['title'] ?></h3>
                            <p style="color: c;"><?= $description.'...<span style="color:">(Read more)<span>'?></p>
                            <p style="color: #00008B;"><?= $row['date'] ?></p>
                        </div> 
                    </a>  
                    </div>
                    <?php $i++; }  ?>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
                </div>
            </section>
            <!-- Recent Blog Section -->
            <section class="recent">
                <h2>Recent Blogs</h2>
                <hr>
                <?php

                    $query = "SELECT * FROM blog ORDER BY date DESC";
                    $result = $con->query($query);

                    if(!$result) die($con->error);
                    $rows = $result->num_rows;

                    echo "<div class='popular-container'>";

                    for($j=0 ; $j<6 ; $j++)
                    {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                         $description=  substr($row['description'],0,30);

                        echo "<div class='popular-container-items'><a href='blog.php' id='".$row['bid']."'>";
                        echo "<div class='popular-container-image'>";
                        echo "<img src='image/".$row['image']."' class='image' style='height: -webkit-fill-available; max-height:20em;' >";
                        echo "<div class='popular-container-matter'>".$row['title']."</div>";
                        echo "</div>";
                        echo "<div class='popular-container-bottom'>";
                        echo "<div class='popular-container-bottom-right'>";
                        echo "<p>".$row['date']."</p>";
                        echo "<p>".$row['author']."</p>";
                        echo "</div>";
                        echo "<div class='popular-container-bottom-left'>".$description.'...<span style="color:grey">(Read more)<span>'."</div>";
                        echo "</div>
                        </a>";
                        echo "</div>";
                    }

                    echo "</div>";


                ?>
            </section>
            <!--  All Blog's Section -->
            <section class="all">
                <div class="search-container">
                    <h2>Editor's Blog</h2>
                    <div class="search-box form-search">
                        <input type="search" class="search-item" placeholder="Search here...">
                    </div>
                </div>
                <hr>
                <div class="all_blog_container containerItems">
                    <?php
                        $query = "SELECT * FROM blog";
                        $result = $con->query($query);

                        if(!$result)  die($con->error);
                        $rows = $result->num_rows;

                        for($j=0;$j<$rows;$j++)
                        {
                            $result->data_seek($j);
                            $row = $result->fetch_array(MYSQLI_ASSOC);
                             $description=  substr($row['description'],0,30);
                            echo "<div data-filter='".$row['title']."' data-search='".strtolower($row['title'])."' class='popular-container-items'><a href='blog.php' id='".$row['bid']."'>";
                        echo "<div class='popular-container-image'>";
                        echo "<img src='image/".$row['image']."' class='image' style='height: -webkit-fill-available; max-height:20em;' >";
                        echo "<div class='popular-container-matter'>".$row['title']."</div>";
                        echo "</div>";
                        echo "<div class='popular-container-bottom'>";
                        echo "<div class='popular-container-bottom-right'>";
                        echo "<p>".$row['date']."</p>";
                        echo "<p>".$row['author']."</p>";
                        echo "</div>";
                        echo "<div class='popular-container-bottom-left'>".$description.'...<span style="color:grey">(Read more)<span>'."</div>";
                        echo "</div>
                        </a>";
                        echo "</div>";
                        }
                    ?>
                </div>
            </section>
        </section>
        <!-- Footer Section -->
        <footer>
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
                            <li><a href="#">Home</a></li>
                            <li class="contact" style="cursor: pointer;">Contact Us</li>
                            <li><a href="about.php">About Us</a></li>
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
                <!-- Copyrights Section -->
                <div class="copyright">
                    Copyright © 2020 All rights reserved
                </div>
            </div>
        </footer>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
    	    $('.search-item').search(function(){		
          		//execute after done typing.
            });
        </script>
        <!-- Javascript Section -->
        <script type="text/javascript" src="js/index.js"></script>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        <script>
            $(document).ready(function(){
                $("nav ul li button").on('click',function(){
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
                $(".carousel-blog-item a").on('click',function(e){
                    var elId = $(this).attr("id");
                    $.ajax({
                        url: "checking.php",
                        type : "POST",
                        data : { idq: elId },
                        success : function(data){
                            window.location.href = "blog.php";
                        }
                    });
                });
                $(".popular-container-items a").on('click',function(e){
                    var elId = $(this).attr("id");
                    $.ajax({
                        url: "checking.php",
                        type : "POST",
                        data : { idq: elId },
                        success : function(data){
                            window.location.href = "blog.php";
                        }
                    });
                });
                $(".all_blog_container-list a").on('click',function(e){
                    var elId = $(this).attr("id");
                    $.ajax({
                        url: "checking.php",
                        type : "POST",
                        data : { idq: elId },
                        success : function(data){
                            window.location.href = "blog.php";
                        }
                    });
                });
            });
        </script>
    </body>
</html>