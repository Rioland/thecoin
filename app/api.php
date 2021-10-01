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
        $response = Database::signin_user($email, $pass);
        if ($response == true) {
            $_SESSION['page'] = "pages/home.php";
            header("location:dashboard");

        } else {
            $_SESSION['message'] = "Can not verify user";
            header("location:signin");

        }

    }
// register
    if (isset($_REQUEST['signup_submit'])) {
        $username = htmlentities($_POST['uname']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $cpassword = htmlentities($_POST['confpassword']);
        $phone = htmlentities($_POST['phone']);
        $file = $_FILES['uimage'];

        $filename = $file['name'];
        $filesize = $file['size'];
        if ($filesize > 0 and $filesize < 8388608) {
            //  file explode
            $file_exe = explode('.', $filename);
            //  gettimg file exe
            $file_exe = strtolower(end($file_exe));
            //  file $fileAllow
            $fileAllow = array('jpg', 'jpeg', 'png');

            if (in_array($file_exe, $fileAllow)) {
                $dest = "uploadimageF/" . $filename;
                if (move_uploaded_file($file['tmp_name'], $dest)) {
                     $response = Database::register($email, $pass, $fname,$phone,$filename);
                      if ($response == "true") {
        header("location:signin");
    } else {
        $_SESSION['message'] = $response;
        header("location:signup");

    }
                } else {
                    $_SESSION['message'] = "file not moved";

                    header("location:signup");

                }
            } else {
                $_SESSION['message'] = "invalid format";

                header("location:signup");

            }
            // echo'am here sir';

        } else {
            $_SESSION['message'] = "file too large or too small";

            header("location:signup");

        }
    }
    // $response = Database::register($email, $pass, $fname);
    // if ($response == "true") {
    //     header("location:signin");
    // } else {
    //     $_SESSION['message'] = $response;
    //     header("location:signup");

    // }

    // pages
    if (isset($_REQUEST['page']) and !empty($_REQUEST['page'])) {
        $_SESSION['page'] = $_REQUEST['page'];
        $_SESSION['title'] = $_REQUEST['title'];
        echo json_encode(array("code" => 200, "message" => "set"));
    }
    // coverter

    if (isset($_REQUEST['converttobtc']) and !empty($_REQUEST['converttobtc'])) {
        $amt = htmlentities($_REQUEST['converttobtc']);
        $btcprice = $_REQUEST['btc'];
        $price = $amt / $btcprice;
        $price = $price * 100000000;
        echo json_encode(array("code" => 200, "price" => $price), true);

    }

}
