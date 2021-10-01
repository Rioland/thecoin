<?php


// require "app/Database.php";
echo $amt = $_SESSION['amt'];


$address = Database::generateAddress();
$inBtc = Database::USDtoBTC($amt);
$hash = Database::generateQR($address);
Database::createInvoice($amt,$address);
$status = Database::getStatus();
?>





<div class="container">
    <div class="row justify-content-md-center ">
        <center>
            <div class="col col-lg-2"
                style="color:white; width: 40%; height:auto; background:black; margin:100px; padding:20px; ">
                <p> Amount: <?php echo $inBtc; ?>
                </p>
                <p>Address: <?php echo $address; ?> </p>
                <p>
                    <img src="<?php echo $hash; ?>" alt="">
                </p>

                <p>
                    <?php
if ($status == -1) {

    echo " Status:  <label style='color:red;' > UNPaid </label> ";
} else if ($status == 1) {
    echo " Status:  <label style='color:red;' > Partially Confirmed </label> ";

}if ($status == 0) {
    echo " Status:  <label style='color:red;'> Unconfirmed </label> ";

}

?>
                </p>
            </div>
        </center>

    </div>
</div>
</div>