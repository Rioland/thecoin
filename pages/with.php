<center>
    <section class="sec51">
        <div class="withdrawwl">
            <h1>Withdrawal</h1>

            <div class="boxxiblue">
                Please indicate the amount you want to withdraw. It can take up to 15 days to complete a withdrawal
                request
            </div>

            <!-- <div class="currencydiv">
                    <label for="currency">Currency*</label>
                    <select id="currency" id="currency" name="currency" class="selectstyle">
                        <option value=""></option selected>
                        <option value="Mr">USD</option>
                        <option value="Mr">EUR</option>
                        <option value="Mr">Bitcoin</option>
                    </select>
                </div>  -->
            <br><br><br>

            <p class="payoutti">Payout Method: <?php echo Database:: getPayOutMethod();   ?></p>
            <div class="payoutdiv">
                <p>Bitcoin address</p> <span><?php echo Database:: getPayOutAddress();   ?></span>
                <!-- <button class="butstylee">Change</button> -->
            </div>

            <div class="amountdiv">
                <label for="amount">Amount in USD </label>
                <input type="number" id="amount" name="amount" class="amountstyl" placeholder="0.00 ">
            </div>

            <div class="buttonwithdrawl">
                <button class="buttwithdrw" id="wit">Withdraw</button>
            </div>
        </div>
    </section>
</center>
<script>
$(document).ready(function() {
    $("#wit").click(function(e) {
        let amt = $.trim($("#amount").val());
        let bal = <?php echo $balance; ?>;

        let btc = <?php echo $btcprice; ?>;
        let price = (amt / btc).toFixed(8);
        let addr = <?php  echo strtolower($addr);  ?>;
        let mod = <?php  echo strtolower($method);  ?>;

        if (amt.length > 0) {
            if (price > bal) {
                alert("no enough balance");
            } else {
                if (addr != "no address" && mod != "no method") {
                    $.ajax({
                        type: "post",
                        url: "handler",
                        data: {
                            withdrawamt: price,
                            page: "pages/home.php",
                            title: "home"
                            // id: uid
                        },
                        dataType: "json",
                        success: function(response) {
                            window.location.reload();
                        }

                    });

                } else {
                    alert("Add payment in the profile");
                }


            }
        } else {
            alert("Enter amount");

        }


    });
});
</script>