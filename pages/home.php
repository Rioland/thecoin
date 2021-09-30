<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
 
  .rcorners2{
      width: 100%;
  }
}
    .act {
        min-height: 400px;
        height: auto;
        
        /* display: flex; 
        justify-content: space-between ; 
        flex-direction: row; */
        background: #2F2F2F;
        padding-top: 150px;
        /* padding-left: 20px;
        padding-right: 20px; */
        padding-bottom: 24px;
    }

    .rcorners2 {
        border-radius: 15px 50px 30px 5px;
        background: white;
        padding: 20px;
        margin: 15px;
        width: 200px;
        height: 150px;
    }

  

    .camp1 {
        display: flex;
        justify-content: space-around;
    }
    .rcorners3 {
  border-radius: 25px;
  background: #73AD21;
  padding-top:4px ;
  /* padding: 20px; */
  width: 40px;
  height:40px;
  /* align-items: center; */
  text-align: center;
  /* display: flex;
  justify-content: center; */
}
    </style>

</head>

<body>

    <div class="act d-flex flex-row flex-wrap justify-content-around ">

        <!-- <div style=" justify-content:space-between;" > -->
        <!-- 1 -->
            <div class="rcorners2 ">
                <div class="camp1">
                    <div>
                        <div style="font-size:25px; font-weight:bold;">Balance</div>
                        <div style="font-weight:bold;" >USD <?php echo $balance; ?> </div>
                    </div>
                    <div class="rcorners3">
                        

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                            class="bi bi-wallet" viewBox="0 0 16 16">
                            <path
                                d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                        </svg>
                        
                    </div>
                </div>
                <!-- pin down -->
                <div class="camp2">
                    referer:<?php echo $referer; ?>
                    <!-- eeee -->
                </div>
            </div>
            <!-- 2 -->
            <div class="rcorners2 ">
                <div class="camp1">
                    <div>
                        <div style="font-size:25px; font-weight:bold;" >Investment</div>
                        <div style="font-weight:bold;" >USD <?php echo $inves;  ?> </div>
                    </div>
                    <div class="rcorners3" style="background: #FFC300;">
                        

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                            class="bi bi-wallet" viewBox="0 0 16 16">
                            <path
                                d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                        </svg>
                        
                    </div>
                </div>
                <!-- pin down -->
                <div class="camp2">
                    <!-- eeee -->
                </div>
            </div>
            <!-- 3 -->
            <div class="rcorners2 ">
                  <div class="camp1">
                    <div>
                        <div style="font-size:25px; font-weight:bold;" >Earning</div>
                        <div style="font-weight:bold;" >USD <?php echo $earn;   ?> </div>
                    </div>
                    <div class="rcorners3" style="background: #FF5733;">
                        

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                            class="bi bi-wallet" viewBox="0 0 16 16">
                            <path
                                d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                        </svg>
                        
                    </div>
                </div>
                <!-- pin down -->
                <div class="camp2">
                    <!-- eeee -->
                </div>
            </div>
            <!-- 4 -->
            <div class="rcorners2 ">
              <div class="camp1">
                    <div>
                        <div style="font-size:25px; font-weight:bold;" >Withdraw</div>
                        <div style="font-weight:bold;" >USD <?php echo $width;  ?></div>
                    </div>
                    <div class="rcorners3" style="background: #900C3F;">
                        

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                            class="bi bi-wallet" viewBox="0 0 16 16">
                            <path
                                d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                        </svg>
                        
                    </div>
                </div>
                <!-- pin down -->
                <div class="camp2">
                    <!-- eeee -->
                </div>
            </div>
        <!-- </div> -->

    </div>

<?php
//  $root=$_SERVER["SERVER_NAME"];
   require "./coinshow.php";

?>

</body>

</html>