<?php
require "./app/Database.php";
if (Database::is_login() == false) {
    header("location:signin");
}
$balance = Database::getBalance();
$inves = Database::getInvestmentBalance();
$earn = Database::getEarnsBalance();
$width = Database::getWithdrawBalance();
$referer = Database::getRefererBalance();
$pic = Database::getPicture();
$btcprice=Database::getBTCPrice("USD");
// $usdtobtc=Database::USDtoBTC();


// session_start();
?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <script type='text/javascript' src=''></script>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    :root {
        --header-height: 3rem;
        --nav-width: 68px;
        --first-color: #4723D9;
        --first-color-light: #AFA5D9;
        --white-color: #F7F6FB;
        --body-font: 'Nunito', sans-serif;
        --normal-font-size: 1rem;
        --z-fixed: 100
    }

    *,
    ::before,
    ::after {
        box-sizing: border-box
    }

    body {
        position: relative;
        margin: var(--header-height) 0 0 0;
        padding: 0 1rem;
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        transition: .5s
    }

    a {
        text-decoration: none
    }

    .header {
        width: 100%;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        background-color: #2F2F2F;
        /* var(--white-color); */
        z-index: var(--z-fixed);
        transition: .5s
    }

    .header_toggle {
        color: var(--first-color);
        font-size: 1.5rem;
        cursor: pointer
    }

    .header_img {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden
    }

    .header_img img {
        width: 40px
    }

    .l-navbar {
        position: fixed;
        top: 0;
        left: -30%;
        width: var(--nav-width);
        height: 100vh;
        background-color: #2F2F2F;
        padding: .5rem 1rem 0 0;
        transition: .5s;
        z-index: var(--z-fixed)
    }

    .nav {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden
    }

    .nav_logo,
    .nav_link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding: .5rem 0 .5rem 1.5rem
    }

    .nav_logo {
        margin-bottom: 2rem
    }

    .nav_logo-icon {
        font-size: 1.25rem;
        color: var(--white-color)
    }

    .nav_logo-name {
        color: var(--white-color);
        font-weight: 700
    }

    .nav_link {
        position: relative;
        color: var(--first-color-light);
        margin-bottom: 1.5rem;
        transition: .3s
    }

    .nav_link:hover {
        color: var(--white-color)
    }

    .nav_icon {
        font-size: 1.25rem
    }

    .show {
        left: 0
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 1rem)
    }

    .active {
        color: var(--white-color)
    }

    .active::before {
        content: '';
        position: absolute;
        left: 0;
        width: 2px;
        height: 32px;
        background-color: #2F2F2F;
        /* var(--white-color) */
    }

    .height-100 {
        height: 100vh
    }

    @media screen and (min-width: 768px) {
        body {
            margin: calc(var(--header-height) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 2rem)
        }

        .header {
            height: calc(var(--header-height) + 1rem);
            padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
            background: #2F2F2F;

        }

        .header_img {
            width: 40px;
            height: 40px;
            background:white;
        }

        .header_img img {
            width: 45px;
            
        }

        .l-navbar {
            left: 0;
            padding: 1rem 1rem 0 0
        }

        .show {
            width: calc(var(--nav-width) + 156px)
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 188px)
        }
    }

    a {
        text-decoration: none;
    }

    .rcorners1 {
        border-radius: 25px;
        background: var(--white-color);
        /* padding: 20px; */
        text-align: center;
        width: 40px;
        height: 40px;
    }
    </style>
</head>

<body oncontextmenu='return false' class='snippet-body'>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i>
               
            </div>
            <label style="color: white;"  > <?php 
               if(isset($_SESSION["title"]) and !empty($_SESSION["title"]) ){
                  echo strtoupper($_SESSION["title"]);
               }else{
                  echo strtoupper("Dashboard");
               }
               ?>   </label>
            <!-- profile image -->
            <?php
      if (!empty($pic)) {

    ?>
            <div class="header_img">

                <img src="<?php echo $pic; ?>" alt="">
            </div>
            <?php

} else {

    ?>
            <div class="header_img">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>
            </div>
            <?php

}
?>
            <!-- <div class="rcorners1">
                <label style="font-size:24px;">A</label>
            </div> -->
            <!-- or this -->


        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <!-- sitename -->
                    <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span
                            class="nav_logo-name">Riotech UI</span>
                    </a>

                    <div class="nav_list">
                        <!-- dashboard -->
                        <a id="dash" href="" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <!-- deposite -->
                        <a id="dep" href="" class="nav_link">
                            <!-- <i class='bx bx-user nav_icon'> -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-wallet" viewBox="0 0 16 16">
                                <path
                                    d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                            </svg>
                            </i> <span class="nav_name">Deposit</span>
                        </a>
                        <!-- withdraw -->
                        <a id="with" href="" class="nav_link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-folder2" viewBox="0 0 16 16">
                                <path
                                    d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v7a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 12.5v-9zM2.5 3a.5.5 0 0 0-.5.5V6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5zM14 7H2v5.5a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V7z" />
                            </svg>
                            </i> <span class="nav_name">Withdraw</span> </a>
                        <!-- Invest -->
                        <a id="inv" href="" class="nav_link"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
                            </svg> <span class="nav_name">Invest</span> </a>
                        <!-- transaction -->
                        <a id="tran" href="" class="nav_link"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                            </svg></i> <span class="nav_name">Transaction</span>
                        </a>
                        <!-- profile -->
                        <a id="prof" href="" class="nav_link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg> <span class="nav_name">Profile</span> </a>

                    </div>
                    <!-- end of side bar -->
                    <!-- logout div -->
                </div>
                <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                        class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <?php
            if(isset($_SESSION['page']) and !empty($_SESSION['page']) ){
                require($_SESSION['page']);
            }else{
     require "pages/home.php";

            }

          


?>
        </div>
        <!--Container Main end-->
        <script type='text/javascript'
            src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'>
        document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        // show navbar
                        nav.classList.toggle('show')
                        // change icon
                        toggle.classList.toggle('bx-x')
                        // add padding to body
                        bodypd.classList.toggle('body-pd')
                        // add padding to header
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

            // Your code to run since DOM is loaded and ready
        });
        </script>

       <script>
            $(document).ready(function () {
               
                // dashboard
                $("#dash").click(function (e) { 
                    // alert("hi");
                    $.ajax({
                        type: "post",
                        url: "handler",
                        data: {
                            page:"pages/home.php",
                            title:"home"
                        },
                        dataType: "json",
                        success: function (response) {
                            window.location.reload();
                            console.log(response);
                        }
                    });
                    
                    window.location.reload();
                });
// deposit

               $("#dep").click(function (e) { 
                    // alert("hi");
                    $.ajax({
                        type: "post",
                        url: "handler",
                        data: {
                            page:"pages/dep.php",
                            title:"deposit"
                        },
                        dataType: "json",
                        success: function (response) {
                            
                            console.log(response);
                        }
                    });  
                    window.location.reload();  
                    
                });
                // withdraw

                 $("#with").click(function (e) { 
                    // alert("hi");
                    $.ajax({
                        type: "post",
                        url: "handler",
                        data: {
                            page:"pages/with.php",
                            title:"withdraw"
                        },
                        dataType: "json",
                        success: function (response) {
                            
                            console.log(response);
                        }
                    });  
                    window.location.reload();  
                    
                });

                // profile
                 $("#prof").click(function (e) { 
                    // alert("hi");
                    $.ajax({
                        type: "post",
                        url: "handler",
                        data: {
                            page:"pages/prof.php",
                            title:"profile"
                        },
                        dataType: "json",
                        success: function (response) {
                            
                            console.log(response);
                        }
                    });  
                    window.location.reload();  
                    
                });
                // investment
                $("#inv").click(function (e) { 
                    // alert("hi");
                    $.ajax({
                        type: "post",
                        url: "handler",
                        data: {
                            page:"pages/inv.php",
                            title:"investment"
                        },
                        dataType: "json",
                        success: function (response) {
                            
                            console.log(response);
                        }
                    });  
                    window.location.reload();  
                    
                });
                // transaction
                $("#tran").click(function (e) { 
                    // alert("hi");
                    $.ajax({
                        type: "post",
                        url: "handler",
                        data: {
                            page:"pages/trans.php",
                            title:"transaction"
                        },
                        dataType: "json",
                        success: function (response) {
                            
                            console.log(response);
                        }
                    });  
                    window.location.reload();  
                    
                });
                
 

            });
        </script>
        <!-- convet -->
  
    </body>

</html>