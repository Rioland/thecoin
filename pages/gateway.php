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

                <p id="state">
                    <?php
if ($status == -1) {

    echo " Status:  <label style='color:red;' > UNPaid </label> ";
} else if ($status == 1) {
    echo " Status:  <label style='color:blue;' > Partially Confirmed </label> ";

}if ($status == 0) {
    echo " Status:  <label style='color:orange;'> Unconfirmed </label> ";

}
if ($status == 2) {
    echo " Status:  <label style='color:green;'> Confirmed but Aproved </label> ";

}


?>
                </p>
                <button id="comfirm" type="button">Comfirm</button>
            </div>
        </center>

    </div>
</div>
</div>

<script>
    $(document).ready(function () {
        $("#comfirm").click(function (e) { 
           
           $.ajax({
               type: "post",
               url: "handler",
               data: {
                   getState:true,
               },
            //    dataType: "dataType",
               success: function (response) {
                   $("#state").val(response)
               }
           }); 
            
        });
    });
</script>