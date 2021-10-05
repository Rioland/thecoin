<?php
// session_start();
$data = $_SESSION['newplans'];
// require "./app/Database.php";
// if (Database::is_login() == false) {
//     header("location:signin");
// }
// $balance = Database::getBalance();
// $inves = Database::getInvestmentBalance();
// $earn = Database::getEarnsBalance();
// $width = Database::getWithdrawBalance();
// $referer = Database::getRefererBalance();
// $pic = Database::getPicture();
// $btcprice = Database::getBTCPrice("USD");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="choplan.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <title>Choosed Plan</title>
</head>

<body>
    <center>
        <section class="sec1">
            <div class="overallflex">
                <div class="colsec1">
                    <div class="boxxiplan2">
                        <div class="flexbasisboxxi">
                            <img src="./images/borderadd.jpg">
                            <div class="textti">
                                <h3><?php echo $data->mode ?></h3>
                            </div>
                            <div class="boxxi2">
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Minimum: $<?php echo $data->Minimum ?></p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Maximum: $<?php echo $data->Maximum ?></p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Referral: <?php echo $data->Referral ?>%</p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Duration: <?php echo $data->Duration ?></p>
                                </div>
                                <div class="flexboxxi2">
                                    <i class="fas fa-arrow-right"></i>
                                    <p>Profit: <?php echo $data->Profit ?></p>
                                </div>
                            </div>
                            <h4 class="belowplanee"> <b><?php echo $data->mode ?></b></h4>
                        </div>
                    </div>
                </div>

                <div class="colsec1">
                    <h2 class="h1pp" style="color: black;"><b><?php echo $data->mode ?></b></h2>

                    <div class="descrip">
                        <p style="color: black;">Minimum: $<?php echo $data->Minimum ?></p>
                        <p style="color: black;">Maximum: $<?php echo $data->Maximum ?></p>
                        <p style="color: black;">Referral: <?php echo $data->Referral ?>%</p>
                        <p style="color: black;">Duration: <?php echo $data->Duration ?></p>
                        <p style="color: black;">Profit: <?php echo $data->Profit ?></p>

                    </div>

                    <div class="colsec">
                        <h2 class="amounti"><b>Enter Your Amount</b></h2>

                        <input id="amt" type="text" class="amountsty" name="amt"
                            style="outline: none; border-left: none; border-radius: 10px; height: 30px; padding: 15px;">
                        <br>


                        <label style="color: black;" id="cap"></label>
                        <button id="mdm" type="submit" class="investi">Invest Now</button>
                    </div>

                </div>

            </div>
        </section>
    </center>
    <script>
    $(document).ready(function() {

        $("#mdm").click(function(e) {
            let max = <?php echo $data->Maximum; ?>;
            let min = <?php echo $data->Minimum ?>;
            let amt = $.trim($("#amt").val());
            let bal = <?php echo $balance; ?>;

            let btc = <?php echo $btcprice; ?>;
            let price = (amt / btc).toFixed(8);


            if (amt.length > 0) {
                if (amt < min) {
                    alert("Amount can't be less than " + min);
                } else if (amt > max) {
                    alert("Amount can't be greater than " + max);

                } else {
                    // let uid = <?php echo $_SESSION["userid"]; ?>;
                    if (price > bal) {
                        alert("no enough balance");
                    } else {
                        $.ajax({
                            type: "post",
                            url: "handler",
                            data: {
                                investamt: price,
                                // page: "pages/home.php",
                                // title: "home"
                                // id: uid
                            },
                            dataType: "json",
                            success: function(response) {
                                window.location.reload();
                            }

                        });

                    }

                }

            } else {
                alert("Enter amount");
            }

        });
    });
    </script>
</body>

</html>