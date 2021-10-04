<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="withdraw.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <title>Withdrawal Page</title>
</head>
<body>
    <center>
        <section class="sec51">
            <div class="withdrawwl">
                <h1>Withdrawal</h1>

                <div class="boxxiblue">
                    Please indicate the amount you want to withdraw. It can take up to 15 days to complete a withdrawal request
                </div>

                <div class="currencydiv">
                    <label for="currency">Currency*</label>
                    <select id="currency" id="currency" name="currency" class="selectstyle">
                        <option value=""></option selected>
                        <option value="Mr">USD</option>
                        <option value="Mr">EUR</option>
                        <option value="Mr">Bitcoin</option>
                    </select>
                </div> <br><br><br>

                  <p class="payoutti">Payout Method</p>
                <div class="payoutdiv">
                    <p>Bitcoin address</p> <span>bxuqysisjlsoduwbbeoxnwts</span> <button class="butstylee">Change</button>
                </div>

                <div class="amountdiv">
                    <label for="amount">Amount</label>
                    <input type="text" id="amount" name="amount" class="amountstyl" placeholder="0.00 ">
                </div>

                <div class="buttonwithdrawl">
                    <button class="buttwithdrw">Withdraw</button>
                </div>
            </div>
        </section>
    </center>
</body>
</html>