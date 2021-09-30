<?php
session_start();
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require 'vendor/autoload.php';
class Database
{

    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public static function getBTCPrice($currency)
    {
        try {
            $content = file_get_contents("https://www.blockonomics.co/api/price?currency=" . $currency);
            $content = json_decode($content);
            $price = $content->price;
            if ($price > 0) {
                $_SESSION['btcprice'] = $price;
                return $price;
            } else if (isset($_SESSION['btcprice']) and !empty($_SESSION['btcprice'])) {
                return $_SESSION['btcprice'];
            }
            return $price;
        } catch (Exception $e) {
            print $e;
        }
    }

    public static function updateInvoiceStatus($status, $address)
    {
        $myconn = self::getConn();
        $code = self::GetCode($address);
        $sql = "UPDATE `invoices` SET `status`='$status' WHERE `code`='$code'";
        $stm = $myconn->prepare($sql);
        $stm->execute();

    }

    public static function get_contry()
    {
        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $country = $geo["geoplugin_countryName"];
        $city = $geo["geoplugin_city"];
        return $country;

    }
    public static function createInvoice($amt, $address)
    {
        try {
            $myconn = self::getConn();
            $code = self::generateRandomString(25);
            $_SESSION['code'] = $code;

            // $address = self::generateAddress();
            $status = -1;
            $ip = self::getIp();
            $uid = $_SESSION["userid"];

            $sql = "INSERT INTO `invoices` (`code`, `address`, `price`, `status`, `uid`,`ip`)
    VALUES (:code, :address, :amt, :status, :uid, :ip)";
            $stm = $myconn->prepare($sql);
            $stm->bindParam('status', $status);
            $stm->bindParam('address', $address);
            $stm->bindParam('amt', $amt);
            $stm->bindParam('code', $code);
            $stm->bindParam('uid', $uid);
            $stm->bindParam('ip', $ip);

            if ($stm->execute()) {
                return $code;
            } else {
                return null;
            }

        } catch (\Throwable $th) {
            $th;
        }

    }
    public $url = "https://www.blockonomics.co/api/";
    public static function signin_user($email, $pass): bool
    {
        $pass = md5($pass);

        $myconn = self::getConn();
        $qury = "SELECT `id` FROM `users` WHERE `email`=:email AND `password`=:pass";
        $stm = $myconn->prepare($qury);
        $stm->execute(array(":email" => $email, ":pass" => $pass));
        if ($stm->rowCount() >= 1) {
            $sub = "Welcome to MyCryptoGain";
                   $mess = "
              <img src='https://cryptogaintrade.com/assets/img/brand/blue.png' width='100px' height='50px' />

              <br>
            <h2>
             You have successfully signed in
            </h2>
            <p>
            If you believe you did not initiate this process, kindly contact us to change your password
            </p>
            <br>
            <br>
            <br>
            <p><a href='mailto:riotech2222@gmail.com'>Send mail</a></p>

             ";
// $mess = "please click on the following link to verify your account http://" . $_SERVER['SERVER_NAME'] . '/verify.php?token=' . $token;
self::send_mail($email, $mess, $sub);

            $res = $stm->fetch();
            $_SESSION['userid'] = $res->id;
            $_SESSION['user']=$res;
            return true;
        }
        return false;

    }
    public static function getConn()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=mycoin", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $conn;
        } catch (PDOException $e) {
            echo json_encode(array("message" => $e->getMessage(), "code" => "404"));
        }

    }

    public static function getEmail()
    {
        $myconn = self::getConn();
        $id = $_SESSION["userid"];
        $qury = "SELECT * FROM `users` WHERE id=:id";
        $stm = $myconn->prepare($qury);
        $stm->execute(array(":id" => $id));
        if ($stm->rowCount() >= 1) {
            $res = $stm->fetch();
            return $res->email;
        } else {
            return "";
        }
    }

    public static function GetCode($address)
    {
        $myconn = self::getConn();
        $sql = "SELECT * FROM `invoices` WHERE `address`='$address'";
        $result = $myconn->prepare($sql);
        $result->execute();
        $code = "Error, try again";
        while ($feedback = $result->fetch()) {
            $code = $feedback->code;
            $_SESSION['code'] = $code;

        }
        return $code;
    }

    public static function getStatus()
    {
        $myconn = self::getConn();
        $code = $_SESSION['code'];
        $sql = "SELECT * FROM `invoices` WHERE `code`=:code";
        $stm = $myconn->prepare($sql);
        $stm->execute(array(":code" => $code));

        $status = "Error, try again";
        while ($feedback = $stm->fetch()) {
            $status = $feedback->status;
        }
        return $status;
    }

    public static function is_login()
    {

        if (isset($_SESSION["user"]) and !empty($_SESSION["user"]) and isset($_SESSION['user']) and !empty($_SESSION['user']) ) {
            return true;
        }
        return false;
    }

    public static function getApiPrivate($name)
    {
        try {

            $myconn = self::getConn();
            // $id = $_SESSION["userid"];
            $qury = "SELECT * FROM `apis` WHERE `name`=:name";
            $stm = $myconn->prepare($qury);
            $stm->execute(array(":name" => $name));
            $feedback = $stm->fetch();
            return $feedback->private;
        } catch (\Throwable $th) {

        }
        return "";

    }

    public static function getApiPublic($name)
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $qury = "SELECT * FROM `apis` WHERE `name`=:name";
            $stm = $myconn->prepare($qury);
            $stm->execute(array(":name" => $name));
            $feedback = $stm->fetch();
            return $feedback->public;
        } catch (\Throwable $th) {

        }
        return "";

    }
    public static function getBalance()
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $query = "SELECT * FROM `account` WHERE `id`=:id";
            $stm = $myconn->prepare($query);
            $stm->bindParam(":id", $id);
            $stm->execute();
            $res = $stm->fetch(PDO::FETCH_OBJ);
            return $res->balance;

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public static function getApiredirect($name)
    {
        try {

            $myconn = self::getConn();
//            $id = $_SESSION["userid"];
            $qury = "SELECT * FROM `apis` WHERE `name`=:name";
            $stm = $myconn->prepare($qury);
            $stm->execute(array(":name" => $name));
            $feedback = $stm->fetch();
            return $feedback->redirect;
        } catch (\Throwable $th) {

        }
        return "";

    }

    public static function getEarnsBalance()
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $query = "SELECT * FROM `account` WHERE `id`=:id";
            $stm = $myconn->prepare($query);
            $stm->bindParam(":id", $id);
            $stm->execute();
            $res = $stm->fetch(PDO::FETCH_OBJ);
            return $res->earns;

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public static function getWithdrawBalance()
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $query = "SELECT * FROM `account` WHERE `id`=:id";
            $stm = $myconn->prepare($query);
            $stm->bindParam(":id", $id);
            $stm->execute();
            $res = $stm->fetch(PDO::FETCH_OBJ);
            return $res->withdraw;

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public static function getInvestmentBalance()
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $query = "SELECT * FROM `account` WHERE `id`=:id";
            $stm = $myconn->prepare($query);
            $stm->bindParam(":id", $id);
            $stm->execute();
            $res = $stm->fetch(PDO::FETCH_OBJ);
            return $res->investment;

        } catch (\Throwable $th) {
            throw $th;
        }

    }
  public static function getRefererBalance()
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $query = "SELECT * FROM `account` WHERE `id`=:id";
            $stm = $myconn->prepare($query);
            $stm->bindParam(":id", $id);
            $stm->execute();
            $res = $stm->fetch(PDO::FETCH_OBJ);
            return $res->referer;

        } catch (\Throwable $th) {
            throw $th;
        }

    }
  public static function getPicture()
    {
        try {

            $myconn = self::getConn();
            $id = $_SESSION["userid"];
            $query = "SELECT * FROM `users` WHERE `id`=:id";
            $stm = $myconn->prepare($query);
            $stm->bindParam(":id", $id);
            $stm->execute();
            $res = $stm->fetch(PDO::FETCH_OBJ);
            return $res->picture;

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public static function get_token($table, $auth_token)
    {

        $myconn = self::getConn();
        $qury = "SELECT $table FROM `users` WHERE $table=:token";
        $stm = $myconn->prepare($qury);
        $stm->execute(array(":token" => $auth_token));
        if ($stm->rowCount() >= 1) {
            return true;
        } else {
            return "invalid login details";
        }

    }

    public static function get_time($auth_token)
    {

        $myconn = self::getConn();
        $qury = "SELECT `token_date` FROM `users` WHERE `reset_pass_token` =:token";
        $stm = $myconn->prepare($qury);
        $stm->execute(array(":token" => $auth_token));
        if ($stm->rowCount() >= 1) {
            $res = $stm->fetch();
            return $res->token_date;

        }
        return "";

    }

    public static function ip_visitor_country()
    {

        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];
        $country = "Unknown";

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=" . $ip);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $ip_data_in = curl_exec($ch); // string
        curl_close($ch);

        $ip_data = json_decode($ip_data_in, true);
        $ip_data = str_replace('&quot;', '"', $ip_data); // for PHP 5.2 see stackoverflow.com/questions/3110487/

        if ($ip_data && $ip_data['geoplugin_countryName'] != null) {
            $country = $ip_data['geoplugin_countryName'];
        }

        // return $ip;
        return $country;
    }

    public static function generate_token()
    {
        return str_shuffle("1234678905abcdefghijklmnopqrstuvwzyx@#");
    }

    public static function google_register($name, $email, $pass, $country, $pic, $gender, $id): bool
    {
        $pass = md5($pass);
        $country = self::ip_visitor_country();
        $token = self::generate_token();
        $myconn = self::getConn();
        $qury = "INSERT INTO `users`(`email`, `password`, `country`,`auth_token`,`id`,`name`,`gender`,`picture`) VALUES (:email,:password,:country,:token,:id,:name,:gend,:pic)";
        $stm = $myconn->prepare($qury);
        $feildback = $stm->execute(array(":email" => $email, ":password" => $pass, ":country" => $country, ":token" => $token, ":id" => $id, ":name" => $name, ":gend" => $gender, ":pic" => $pic));
        $qury1 = "INSERT INTO `account`(`id`, `balance`, `investment`, `earns`, `withdraw`,`referer`)
         VALUES (:uid,:bal,:investment,:earns,:withdraw,:referer)";

        $stm1 = $myconn->prepare($qury1);
        $balance = "0";
        $investment = "0";
        $earns = "0";
        $withdraw = "0";
        $referer="0";
        $feildback1 =
        $stm1->execute(array(":uid" => $id,
            ":bal" => $balance,
            ":investment" => $investment,
            ":earns" => $earns,
            ":referer"=>$referer,
             ":withdraw" => $withdraw));

        if ($feildback and $feildback1) {
            $sub = "Welcome to MyCryptoGain";
            $mess = "
              <img src='https://cryptogaintrade.com/assets/img/brand/blue.png' width='100px' height='50px' />
            
              <br>
            <h2>
             Welcome " . $name . "
            </h2>
            <p>To Start Earning, you need to make a deposit, Choose an investment plan, Invest and Earn. </p>
            <br>
            <br>
            <br>
            <p><a href='mailto:riotech2222@gmail.com'>riotech2222@gmail.com</a></p>

             ";
            // $mess = "please click on the following link to verify your account http://" . $_SERVER['SERVER_NAME'] . '/verify.php?token=' . $token;
            self::send_mail($email, $mess, $sub);

            return true;
        } else {
            return false;

        }

    }

    public static function register($email, $pass, $name): string
    {
        $_SESSION["dbroot"] = __DIR__;
        $country = self::ip_visitor_country();
        $myconn = self::getConn();
        $qury = "SELECT `id` FROM `users` WHERE `email`=:email ";
        $stm = $myconn->prepare($qury);

        $stm->execute(array(":email" => $email));
        if ($stm->rowCount() >= 1) {

            return "User already exist please login";
        } else {

            $id = str_shuffle(time());
            $token = self::generate_token();
            $qury = "INSERT INTO `users`(`email`, `password`, `country`,`auth_token`,`id`,`name`) VALUES (:email,:password,:country,:token,:id,:name)";
            $stm = $myconn->prepare($qury);
            $feildback = $stm->execute(array(":email" => $email, ":password" => md5($pass), ":country" => $country, ":token" => $token, ":id" => $id, ":name" => $name));

            $qury1 = "INSERT INTO `account`(`id`, `balance`, `investment`, `earns`, `withdraw`,`referer`)
            VALUES (:uid,:bal,:investment,:earns,:withdraw,:referer)";

            $stm1 = $myconn->prepare($qury1);
            $balance = "0";
            $investment = "0";
            $earns = "0";
            $referer="0";
            $withdraw = "0";
            $feildback1 = $stm1->execute(array(":uid" => $id, ":bal" => $balance, ":investment" => $investment, ":earns" => $earns, ":withdraw" => $withdraw,":referer"=>$referer));

            if ($feildback and $feildback1) {
                $sub = "Welcome to MyCryptoGain";
                $mess = "
              <img src='https://cryptogaintrade.com/assets/img/brand/blue.png' width='100px' height='50px' />
            <br>
            <h2>
             Welcome " . $name . "
            </h2>
            <p>To Start Earning, you need to make a deposit, Choose an investment plan, Invest and Earn. </p>
            <br>
            <br>
            <br>
            <p><a href='mailto:riotech2222@gmail.com'>riotech2222@gmail.com</a></p>

             ";
// $mess = "please click on the following link to verify your account http://" . $_SERVER['SERVER_NAME'] . '/verify.php?token=' . $token;
                self::send_mail($email, $mess, $sub);

                return "true";
            } else {
                return "Error in registeration contact the admin";

            }

        }

    }
    public static function send_mail($email, $mess, $sub)
    {

        require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'mail.erect1.org'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'customercare@erect1.org'; //SMTP username
            $mail->Password = 'erect1office'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('customercare@erect1.org', 'Mailer');
            $mail->addAddress($email, 'Joe User'); //Add a recipient
            // $mail->addAddress('customercare@erect1.org'); //Name is optional
            $mail->addReplyTo('riotech2222@gmail.com', 'Riotech');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $sub;
            $mail->Body = $mess;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return true;
        } catch (Exception $e) {
            // exit();
            // return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }

    }

    public static function generateAddress()
    {

        $apikey = self::getApiPrivate('block') ?? "6NRYdE4XdqnERd0heOsHl3Yda4gdUKQ8fL2jAJOuSx8";
        $url = "https://www.blockonomics.co/api/";

        $options = array(
            'http' => array(
                'header' => 'Authorization: Bearer ' . $apikey,
                'mwithdrawod' => 'POST',
                'content' => '',
                'ignore_errors' => true,
            ),
        );

        $context = stream_context_create($options);
        $contents = file_get_contents($url . "new_address?reset=1", false, $context);
        $object = json_decode($contents);

// Check if address was generated successfully
        if (isset($object->address)) {

            $address = $object->address;
            // $_SESSION["btc_address"] = $address;
        } else {
            return $object;
        }
        return $address;

    }

    public static function BTCtoUSD($amount)
    {
        $price = self::getBTCPrice("USD");
        return intval($amount) * $price;
    }

    public static function USDtoBTC($amount)
    {
        $price = self::getBTCPrice("USD");
        return ((int) $amount / $price);
    }

    public static function getIp()
    {
        // if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //     //ip from share internet
        //     $ip = $_SERVER['HTTP_CLIENT_IP'];
        // } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //     //ip pass from proxy
        //     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        // } else {
        //     $ip = $_SERVER['REMOTE_ADDR'];
        // }
        // return $ip;

        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];
        $country = "Unknown";

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=" . $ip);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $ip_data_in = curl_exec($ch); // string
        curl_close($ch);

        $ip_data = json_decode($ip_data_in, true);
        $ip_data = str_replace('&quot;', '"', $ip_data); // for PHP 5.2 see stackoverflow.com/questions/3110487/

        if ($ip_data && $ip_data['geoplugin_countryName'] != null) {
            $country = $ip_data['geoplugin_countryName'];
        }

        return $ip;

    }

    public static function getBitcoinResponsDetail($apikey, $address)
    {
        $url = "https://www.blockonomics.co/api/merchant_order/$address";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "X-Custom-Header: value",
            "Authorization: Bearer $apikey",
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        return $resp;
        curl_close($curl);

    }

    public static function generateQR($address)
    {
        $cht = "qr";
        $chs = "300x300";
        $chl = $address;
        $choe = "UTF-8";

        $qrcode = 'https://chart.googleapis.com/chart?cht=' . $cht . '&chs=' . $chs . '&chl=' . $chl . '&choe=' . $choe;
        return $qrcode;

    }

}
