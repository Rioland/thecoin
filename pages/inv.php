<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plansphp.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <title>Investment plans</title>
</head>

<body>
    <center>
        <section class="sec1">
            <p>Say goodbye to low-interest savings accounts. Grow your wealth with profitable bitcoin investment.</p>
            <div class="overallflexsec4">
                <?php
$conn=Database::getConn();
$stm=$conn->prepare("SELECT * FROM `plans`");
$stm->execute();
if($stm->rowCount()>0){


    for ($i=0; $i < $stm->rowCount() ; $i++) { 
       $data=$stm->fetch();
       if ($i==0 or $i==$stm->rowCount()-1) {
           ?>

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
                        <button id="<?php echo $data->sn;  ?>"  class="buttsec4 btn">Enter Your Amount</button>
                    </div>
                </div>




<?php
       }else{

?>
 <div class="boxxiplan2">
                    <div class="flexbasisboxxi">
                        <img src="./images/borderadd.jpg">
                        <div class="texttioinge">
                            <h3><?php echo $data->mode ?></h3>
                        </div>
                        <div class="boxxi2oinge">
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
                        <h4 class="belowplanee"> <b>SILVER PLAN</b></h4>
                        <button id="<?php echo $data->sn;  ?>" class="buttsec4oinge btn">Enter Your Amount</button>
                    </div>
                </div>





<?php
       }

    }

}
 
?>
                

         
             
            </div><br>

             
       
            
            <br><br><br>
        </section>
    </center>

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
    <script>
        $(document).ready(function () {
            $(".btn").click(function (e) { 
               let id=$.trim($(this).attr("id"));
               $.ajax({
                   type:"post",
                   url: "handler",
                   data: {
                       planid:id,
                       page:"pages/chplan.php",
                       title:"plans"
                   },
                   dataType: "json",
                   success: function (response) {
                    //    alert(response);
                       window.location.reload();
                   }
               });
            //    window.location.reload();
                
            });
        });
    </script>
</body>

</html>
