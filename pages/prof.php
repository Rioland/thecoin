<?php

$userdata=Database::getUserDetails();
?>


<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                    width="150px" src="app/uploadimageF/<?php print(trim($userdata->picture));  ?>"><span
                    class="font-weight-bold">
                    <?php print(trim($userdata->name ." ". $userdata->last_name ));?></span><span class="text-black-50">
                    <?php print(trim($userdata->email));?></span><span>
                </span></div>
        </div>
        <!-- <form action="handler" method="post"> -->
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control"
                            placeholder="first name" value="
                    <?php print(trim($userdata->name));  ?>
                    "></div>
                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control"
                            value="
                    <?php print(trim($userdata->last_name));  ?>
                    " placeholder="surname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                            class="form-control" placeholder="enter phone number" value="
                    <?php print(trim($userdata->phone));  ?>
                    "></div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text"
                            class="form-control" placeholder="enter address line 1" value="
                    <?php print(trim($userdata->address1));  ?>
                    "></div>
                    <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text"
                            class="form-control" placeholder="enter address line 2" value="
                    <?php print(trim($userdata->address2));  ?>
                    "></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control"
                            placeholder="enter address line 2" value="
                    <?php print(trim($userdata->poster_code));  ?>
                    "></div>
                    <!-- <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div> -->
                    <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control"
                            placeholder="enter address line 2" value="
                     <?php print(trim($userdata->city));?>
                    "></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control"
                            placeholder="enter email id" readonly="true" value="
                     <?php print(trim($userdata->email));?>
                    "></div>
                    <div class="col-md-12"><label class="labels">Gender</label><input type="text" class="form-control"
                            placeholder="education" value="
                     <?php print(trim($userdata->gender));?>
                    "></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control"
                            placeholder="country" value="
                     <?php print(trim($userdata->country));?>
                    "></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text"
                            class="form-control" value="
                     <?php print(trim($userdata->state));?>
                    " placeholder="state"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save
                        Profile</button></div>
            </div>
        </div>
        <!-- </form> -->
        <!-- <form action="handler" method="post"> -->


        <div class="col-md-4">
            <div class="p-3 py-5">
                <form action="handler" method="post" id="payment-update-form" >
                    <div class="d-flex justify-content-between align-items-center experience"><span>Payment
                            details</span>
                        <span class="border px-3 p-1 add-experience">
                            <i class="fa fa-plus"></i>
                            <button class="btn btn-primary profile-button" name="update-payment" value="update-payment" type="submit">Save
                            </button>
                            <!-- &nbsp;Save -->

                        </span>

                    </div><br>
                    <div class="col-md-12"><label class="labels">Method of payment:ony(BTC,ETH,BCH,LITC.USDT)
                        </label><input type="text" class="form-control" name="method" required placeholder="BTC"
                            value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Address:</label><input type="text" class="form-control"
                            placeholder="Address" name="address" required value=""></div>
                </form>
            </div>

            <!-- </form> -->
            <!-- <form action="handler" method="post"> -->


            <!-- password -->
            <div class="p-3 py-5">
                <form action="handler" method="post" id="pass-update-form" >
                    <div class="d-flex justify-content-between align-items-center experience"><span>Reset
                            password</span><span class="border px-3 p-1 add-experience">
                                <i
                                class="fa fa-plus"></i>&nbsp;
                                <button class="btn btn-primary profile-button" name="update-password" value="update-password" type="submit">Save
                            </button>
                            
                            </span></div><br>
                    <div class="col-md-12"><label class="labels">new password </label><input type="password"
                            class="form-control" placeholder="Password" value="" required  name="password"></div> <br>
                    <div class="col-md-12"><label class="labels">Comfirm-password:</label><input type="text"
                            class="form-control" placeholder="Comfirm password" required value="" name="cpassword"></div>
                </form>
            </div>

            <!-- </form> -->
        </div>

    </div>


</div>
</div>
</div>

<script>
$(document).ready(function () {
    $("#payment-update-form").submit(function (e) { 
        e.preventDefault();
        var formValues= $(this).serialize();
        alert(formValues);
        $.ajax({
            type: "post",
            url: "handler",
            data: formValues,
            // dataType: "dataType",
            success: function (response) {
                alert(response);
                
            }
        });
        
    });
});

</script>