<?php
require "Database.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['action']) and $_REQUEST['action'] == "currency") {
        $currency = htmlentities($_REQUEST['currency']);
        $_SESSION['currency'] = $currency;
    }
// crypto
    if (isset($_REQUEST['action']) and $_REQUEST['action'] == "crypto") {
        $crypto = htmlentities($_REQUEST['crypid']);
        $_SESSION['crypoid'] = $crypto;
    }
    // login
    if (isset($_REQUEST['signin_submit'])) {
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['password'];
        $response=Database::signin_user($email,$pass);
        if($response==true){
             $_SESSION['page']="pages/home.php";
            header("location:dashboard");

        }else{
            $_SESSION['message'] = "Can not verify user";
            header("location:signin");

        }

    }

    if (isset($_REQUEST['signup_submit'])) {
        $fname = $_REQUEST['fullname'];
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['password'];

        $response = Database::register($email, $pass, $fname);
        if ($response == "true") {
            header("location:signin");
        } else {
            $_SESSION['message'] = $response;
            header("location:signup");

        }

    }

    // pages
    if (isset($_REQUEST['page']) and !empty($_REQUEST['page'])) {
       $_SESSION['page']=$_REQUEST['page'];
       $_SESSION['title']=$_REQUEST['title'];
       echo json_encode(array("code"=>200,"message"=>"set"));
    }
    // coverter

    if(isset($_REQUEST['converttobtc']) and !empty($_REQUEST['converttobtc']) ){
        $amt=htmlentities($_REQUEST['converttobtc']);
        $btcprice=$_REQUEST['btc'];
        $price=$amt/$btcprice;
        $price=$price*100000000;
        echo json_encode(array("code"=>200,"price"=>$price),true);

    }


}

