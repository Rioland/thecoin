<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <title>Registration Page</title>
</head>

<body>
    <center>
        <header class="l-header">
            <nav class="nav bd-grid">
                <div class="textflex">
                    <p>Crypto</p>
                    <p class="colorchg">Trade</p>
                    <p class="colorchg">Gain</p>
                </div>

                <div class="nav_toggle" id="nav-toggle"><i class="fas fa-bars"></i></div>

                <div class="nav_menu" id="nav-menu">
                    <div class="nav_close" id="nav-close"> <i class="fas fa-times"></i> </div>

                    <div class="navminwidth">
                        <ul class="nav_list">
                            <li class="nav_item active"><a href="home" class="nav_link"><i class="fas fa-home"></i>Home</a></li>
                            <li class="nav_item"><a href="account" class="nav_link"><i class="fas fa-clone"></i>Account</a>
                                <div class="sub-menu-1">
                                    <ul>
                                        <li><a href="#" class="sub-style">My Account</a></li>
                                        <li><a href="signin" class="sub-style">Login</a></li>
                                        <li><a href="signup" class="sub-style">Register</a></li>
                                        <li><a href="forgetpassword" class="sub-style">Forgot Password</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav_item"><a href="#" class="nav_link"><i class="fas fa-clone"></i> Docs</a>
                                <div class="sub-menu-1">
                                    <ul>
                                        <li><a href="about" class="sub-style">About Us</a></li>
                                        <li><a href="#" class="sub-style">Testimonials</a></li>
                                        <li><a href="pivacypolicy.html" class="sub-style">Privacy Policy</a></li>
                                        <li><a href="Terms.html" class="sub-style">Terms And Conditions</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav_item"><a href="#" class="nav_link"><i class="fas fa-dollar-sign"></i></i>Payouts</a>
                            </li>
                            <li class="nav_item"><a href="contact.html" class="nav_link"><i class="fas fa-phone"></i>Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- ==========NAVMAXWIDTH=========== -->
                    <div class="navmaxwidth">
                        <nav class="nav__container">
                            <div>
                                <!-- <a href="#" class="nav__link nav__logo">
                                                                                            <i class="fas fa-compact-disc nav__icon"></i>
                                                                                            <span class="nav__logo-name"> Kais</span>
                                                                                        </a> -->

                                <div class="nav__list">
                                    <div class="nav__items">
                                        <!-- <h3 class="nav__subtitle">Profile</h3> -->

                                        <a href="#" class="nav__link">
                                            <i class="fas fa-home nav__icon"></i>
                                            <span class="nav__name">Home</span>
                                        </a>

                                        <div class="nav__dropdown">
                                            <a href="#" class="nav__link .active">
                                                <i class="fas fa-user nav__icon"></i>
                                                <span class="nav__name">Account</span>
                                                <i class="fas fa-chevron-down nav__icon nav__dropdown-icon"></i>
                                            </a>

                                            <div class="nav__dropdown-collapse">
                                                <div class="nav__dropdown-content">
                                                    <a href="" class="nav__dropdown-item">My Account</a>
                                                    <hr>
                                                    <a href="#" class="nav__dropdown-item">Login</a>
                                                    <hr>
                                                    <a href="#" class="nav__dropdown-item">Register</a>
                                                    <hr>
                                                    <a href="#" class="nav__dropdown-item">Forgot Password</a>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="nav__dropdown">
                                            <a href="#" class="nav__link .active">
                                                <i class="fas fa-user nav__icon"></i>
                                                <span class="nav__name">Docs</span>
                                                <i class="fas fa-chevron-down nav__icon nav__dropdown-icon"></i>
                                            </a>

                                            <div class="nav__dropdown-collapse">
                                                <div class="nav__dropdown-content">
                                                    <a href="#" class="nav__dropdown-item"> About Us</a>
                                                    <hr>
                                                    <a href="#" class="nav__dropdown-item">Testimonials</a>
                                                    <hr>
                                                    <a href="#" class="nav__dropdown-item">Privacy Policy</a>
                                                    <hr>
                                                    <a href="#" class="nav__dropdown-item">Terms and Conditions</a>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="#" class="nav__link">
                                            <i class="fas fa-compass nav__icon"></i>
                                            <span class="nav__name">Payouts</span>
                                        </a>

                                        <a href="#" class="nav__link">
                                            <i class="fas fa-compass nav__icon"></i>
                                            <span class="nav__name">Contact Us</span>
                                        </a>
                                    </div>

                                </div>
                            </div>

                            <a href="#" class="nav__link nav__logout">
                                <i class="fas fa-registered nav__icon"></i>
                                <span class="nav__namee">CRYPTO TRADE GAIN</span>
                            </a>
                        </nav>
                    </div>
                </div>
            </nav>
        </header>
        <!-- ================================================  SECTION 41   ======================================================= -->
        <section class="sec41">
            <div class="h1stylisec41">
                <h1>Register</h1>
            </div>
        </section>

        <!-- ================================================  SECTION 42   ======================================================= -->
        <section class="sec42">
            <div class="overallflexxisec42">
                <form action="registrationhandler.php" method="post" enctype="multipart/form-data">

                    <div class="colsec42">
                        <label for="uname">Username*</label>
                        <input type="text" id="uname" name="uname" placeholder="Your Username..">

                        <label for="email">User Email</label>
                        <input type="email" id="email" name="email" placeholder="Your Email..">
                    </div>

                    <div class="colsec42">
                        <label for="password">User Password*</label>
                        <input type="password" id="password" name="password" placeholder="Your Password..">

                        <label for="confpassword">Confirm Password</label>
                        <input type="password" id="confpassword" name="confpassword" placeholder="Confirm your Password..">
                    </div>

                    <div class="colsec42">
                        <label for="uimage">User Image*</label>
                        <input type="file" id="uimage" name="uimage" placeholder="Upload Picture..">

                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone" placeholder="Your Phone Number..">
                    </div>
                    <button type="submit" name="submbtn" class="subm">SEND</button>
                </form>
                <div class="divsubm">

                </div>
            </div>
        </section>

        <!-- ================================================== FOOTER ================================================================ -->

        <section class="sec9">
            <div class="rowsec9">
                <div class="colsec9">
                    <img src="./images/cryptofooter.jfif" class="logosec9">
                    <p>CRYPTO BTC TRADE LIMITED is an investment company founded by commercial traders with five years
                        experience of successful activity in the Forex market, as well as cryptocurrency exchanges</p>
                </div>
                <div class="colsec9">
                    <h3>Office <div class="underline"><span></span></div>
                    </h3>
                    <p>Cardiff City</p>
                    <p>CF14 8LH, United Kingdom</p>
                    <p class="email-id"> cryptotrade@gmail.com</p>
                    <h4>+44 -20 -1372 -6758 </h4>
                </div>
                <div class="colsec9">
                    <h3>Links <div class="underline"><span></span></div>
                    </h3>
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">My account</a></li>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Contact Us</a></li>
                    </ul>
                </div>
                <div class="colsec9">
                    <h3>Newsletter <div class="underline"><span></span></div>
                    </h3>
                    <form action="">
                        <i class="far fa-envelope"></i>
                        <input type="email" placeholder="Enter your email id" required>
                        <button type="submit"><i class="fas fa-arrow-right"></i></button>
                    </form>
                    <div class="social-icons">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-whatsapp"></i>
                        <i class="fab fa-pinterest"></i>
                    </div>
                </div>
            </div>
            <hr>
            <p class="copyright">Cryptotradegain @ 2021 - All Rights Reserved</p>
        </section>
    </center>
    <script src="main.js"></script>
</body>

</html>