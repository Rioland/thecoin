<?php
require "app/Database.php";
//Match secret for security
if (isset($_GET['txid']) and isset($_GET['value']) and isset($_GET['status']) and isset($_GET['addr']) and isset($_GET['secrete'])) {
    $secret = "Mabcdastthrretyuuerthhherrrreeewbb5554olkdd";
    $value = htmlentities($_GET['value']);

    $txid = htmlentities($_GET['txid']);

    $status = htmlentities($_GET['status']);
    $addr = htmlentities($_GET['addr']);
    $serct = htmlentities($_GET['secrete']);

    if ($serct == $secret) {
        DataBase::updateInvoiceStatus($status, $addr);

        $res = json_decode(Database::getBTCTransaction($txid));
        if ($res->status == "Confirmed" and $status == 2) {
            DataBase::btc_tras_update1($status, $bitc, $txid, $addr);
            $bitc = Database::satochToBtc($value);
            echo Database::updateAccout($colum, $bitc);
        }

        //
        // header("location:buysell");
    }
}

// $uuid = @$_GET['uuid'];

// $status = @$_GET['status'];
// $addr = @$_GET['addr'];

// if (!empty($uuid) and !empty($status) and !empty($addr)) {

//     $apikey = DataBase::getApi("private", "apis", "block") ?: "2KgicsP3iWhaWBNjtgSmNRK7zMWYT4yeHvDQUKfINqU";

//     $respons = DataBase::get_coin_Payment_detail($apikey, $uuid);
//     $respons = json_decode($respons, true);
//     DataBase::btc_tras_update($respons);
//     header("location:buysell");
// }
