<style>
.center {
    width: 300px;
    min-height: 300px;
    height: auto;

}

body {
    background: #1A225C;
}

.closs {
    background: #1A225C;
    height: auto;
    min-height: 700px;
}

.input {
    background: whitesmoke;
    height: 50px;
    width: 100%;
    border-radius: 10px;
    padding-left: 7px;
    padding-right: 7px;
    padding-top: 7px;
    display: flex;
    margin-left: 34px;
    margin-top: 14px;
    color: white;
}
</style>

<div class="closs">
    <nav class="navbar navbar-expand-sm fixed p-3" style="background-color: #1A225C; ">
        <!-- Brand -->
        <a class="navbar-brand" href="#"><img src="https://cryptogaintrade.com/assets/img/brand/blue.png" height="50px"
                alt=""></a>
    </nav>
    <div class="container text-center pt-2" style="background: #1A225C ; ">
        <br>

        <h1 style="color:white; ">Deposit</h1>
        <h2 style="color:white; ">Our Minimum Deposit amount is $100.00</h2>
        <p style="color:white; ">Deposit may take up to 3 hours to reflect in your account.
            <br> Please exercise patience while your transaction is processed <br>
            after successful deposit.
        </p>
        <br>


        <div class="container-sm" style="background:white; 
        width:300px; min-height:300px;
        border-radius:25px;  ">
            <!-- <form action="handler" method="post" id="dp-form"> -->
            <br>
            <label m-2>Enter Deposit Amount</label>
            <br>
            <div class="input">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="35" fill="#1A225C"
                    class="bi bi-currency-dollar" viewBox="0 0 16 16">
                    <path
                        d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                </svg>
                <input style="background:transparent; outline:none; border:none; width: 100%;" height="100%"
                    type="number" name="usd-amt" id="usd-amt" min="1">
            </div>

            <div class="input">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="35" fill="#1A225C"
                    class="bi bi-currency-bitcoin" viewBox="0 0 16 16">
                    <path
                        d="M5.5 13v1.25c0 .138.112.25.25.25h1a.25.25 0 0 0 .25-.25V13h.5v1.25c0 .138.112.25.25.25h1a.25.25 0 0 0 .25-.25V13h.084c1.992 0 3.416-1.033 3.416-2.82 0-1.502-1.007-2.323-2.186-2.44v-.088c.97-.242 1.683-.974 1.683-2.19C11.997 3.93 10.847 3 9.092 3H9V1.75a.25.25 0 0 0-.25-.25h-1a.25.25 0 0 0-.25.25V3h-.573V1.75a.25.25 0 0 0-.25-.25H5.75a.25.25 0 0 0-.25.25V3l-1.998.011a.25.25 0 0 0-.25.25v.989c0 .137.11.25.248.25l.755-.005a.75.75 0 0 1 .745.75v5.505a.75.75 0 0 1-.75.75l-.748.011a.25.25 0 0 0-.25.25v1c0 .138.112.25.25.25L5.5 13zm1.427-8.513h1.719c.906 0 1.438.498 1.438 1.312 0 .871-.575 1.362-1.877 1.362h-1.28V4.487zm0 4.051h1.84c1.137 0 1.756.58 1.756 1.524 0 .953-.626 1.45-2.158 1.45H6.927V8.539z" />
                </svg>
                <input style="background:transparent; outline:none; border:none; width: 100%;" height="100%" type="text"
                    name="btc-amt" id="btc-amt" min="1">
            </div>
            <br>
            <button type="submit" id="payd" name="deposit-btn" class="btn btn-primary">PAY</button>

        </div>
        <!-- </form> -->
    </div>
    <script>
    $(document).ready(function() {
        let url = "app/api.php";
        $("#usd-amt").keyup(function(e) {

            let usdamt = $(this).val();
            let btc = <?php echo $btcprice;  ?>;
            let price = usdamt / btc;
            $("#btc-amt").val(price.toFixed(8));

        });


        $("#usd-amt").change(function(e) {

            let usdamt = $(this).val();
            let btc = <?php echo $btcprice;  ?>;
            let price = usdamt / btc;
            $("#btc-amt").val(price.toFixed(8));

        });
        $("#btc-amt").keyup(function(e) {

            let usdamt = $(this).val();
            let btc = <?php echo $btcprice;  ?>;
            let price = usdamt * btc;
            $("#usd-amt").val(price.toFixed(8));
        });

        $("#payd").click(function(e) {
            let amt = $.trim($("#usd-amt").val());
            // alert(amt);

            if (amt.length > 0 && amt >= "100") {
                // alert(amt);
                 $.ajax({
                     type: "post",
                     url: "handler",
                     data: {
                         amt:amt,
                         deposit:true,
                         page:"pages/gateway.php",
                         title:"Payment"
                         },
                     dataType: "json",
                     success: function (response) {
                         window.location.reload();
                     }
                 });
                  window.location.reload();
            } else {
                alert("Amount cant be less than $100");
            }
        });

    });
    </script>