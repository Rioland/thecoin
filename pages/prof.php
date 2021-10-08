<?php

$userdata = Database::getUserDetails();
?>


<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                    width="150px" src="app/uploadimageF/<?php print(trim($userdata->picture));?>"><span
                    class="font-weight-bold">
                    <?php print(trim($userdata->name . " " . $userdata->last_name));?></span><span
                    class="text-black-50">
                    <?php print(trim($userdata->email));?></span><span>
                </span></div>
        </div>
        <!-- <form action="handler" method="post"> -->
        <div class="col-md-5 border-right">
            <form method="post" id="user-update-form">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label>
                            <input type="text" class="form-control" style="text-align: start;" name="fname"
                                placeholder="first name" value="<?php print(trim($userdata->name));?>">
                        </div>

                        <div class="col-md-6"><label class="labels">Last name</label>
                            <input name="lname" style="text-align: start;" type="text" class="form-control"
                                value="<?php print(trim($userdata->last_name));?>" placeholder="Last name">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label>
                            <input style="text-align: start;" name="phone" type="text" class="form-control"
                                placeholder="enter phone number" value="<?php print(trim($userdata->phone));?>">
                        </div>
                        <div class="col-md-12"><label class="labels">Address Line 1</label><input name="address1"
                                type="text" class="form-control" placeholder="enter address line 1"
                                value="<?php print(trim($userdata->address1));?>"></div>

                        <div class="col-md-12"><label class="labels">Address Line 2</label>
                            <input name="address2" type="text" class="form-control" placeholder="enter address line 2"
                                value="<?php print(trim($userdata->address2));?>">
                        </div>
                        <div class="col-md-12"><label class="labels">Postcode</label><input name="pcode" type="text"
                                class="form-control" placeholder="enter address line 2"
                                value="<?php print(trim($userdata->poster_code));?>"></div>
                        <!-- <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div> -->
                        <div class="col-md-12"><label class="labels">City</label><input name="city" type="text"
                                class="form-control" placeholder="enter address line 2"
                                value="<?php print(trim($userdata->city));?>"> </div>
                        <div class="col-md-12"><label class="labels">Email ID</label><input name="email" type="text"
                                class="form-control" placeholder="enter email id" readonly="true"
                                value="<?php print(trim($userdata->email));?>"></div>
                        <div class="col-md-12"><label class="labels">Gender</label><input name="gender" type="text"
                                class="form-control" placeholder="Gender"
                                value="<?php print(trim($userdata->gender));?>"></div>
                    </div>
                    <!-- <input type="hidden" name="update-user" value="update-user"> -->
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><input name="ctry" type="text"
                                class="form-control" placeholder="country"
                                value="<?php print(trim($userdata->country));?>"></div>
                        <div class="col-md-6"><label class="labels">State/Region</label><input name="state" type="text"
                                class="form-control" value="<?php print(trim($userdata->state));?>" placeholder="state">
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                            Profile</button></div>
                </div>
            </form>
        </div>
        <!-- </form> -->
        <!-- <form action="handler" method="post"> -->


        <div class="col-md-4">
            <div class="p-3 py-5">
                <form method="post" id="payment-update-form">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Payment
                            details</span>
                        <span class="border px-3 p-1 add-experience">
                            <i class="fa fa-plus"></i>
                            <button class="btn btn-primary profile-button" type="submit">Save
                            </button>
                            <!-- &nbsp;Save -->

                        </span>

                    </div><br>
                    <input type="hidden" name="update-payment" value="update-payment">
                    <div class="col-md-12"><label class="labels">Method of payment:ony(BTC,ETH,BCH,LITC.USDT)
                        </label><input type="text" class="form-control"
                            value="<?php echo Database::getPayOutMethod(); ?>" name="method" required placeholder="BTC"
                            value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Address:</label><input type="text" class="form-control"
                            placeholder="Address" name="address" value="<?php echo Database::getPayOutAddress(); ?>"
                            required value=""></div>
                </form>
            </div>

            <!-- </form> -->
            <!-- <form action="handler" method="post"> -->


            <!-- password -->
            <div class="p-3 py-5">
                <form method="post" id="pass-update-form">
                    <input type="hidden" name="update-password" value="update-password">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Reset
                            password</span><span class="border px-3 p-1 add-experience">
                            <i class="fa fa-plus"></i>&nbsp;
                            <button class="btn btn-primary profile-button" name="update-password"
                                value="update-password" type="submit">Save
                            </button>

                        </span></div><br>
                    <div class="col-md-12"><label class="labels">new password </label><input type="password"
                            class="form-control" placeholder="Password" value="" required id="password" name="password">
                    </div> <br>
                    <div class="col-md-12"><label class="labels">Comfirm-password:</label><input type="text"
                            id="cpassword" class="form-control" placeholder="Comfirm password" required value=""
                            name="cpassword"></div>
                </form>
            </div>


            <!-- referre -->
            <div class="p-3 py-5">
                <form method="post" id="refer-update-form">
                    <input type="hidden" name="update-reffer" value="update-reffer">
                    <?php 
                     $refby = Database::RefBy();

                    if($refby==null){
                
                        ?>
                    <div class="d-flex justify-content-between align-items-center experience"><span>Refferer
                            Mode</span><span class="border px-3 p-1 add-experience">
                            <i class="fa fa-plus"></i>&nbsp;
                            <button class="btn btn-primary profile-button" name="update-refer" value="update-refer"
                                type="submit">Save
                            </button>

                        </span></div>
                    <?php
                    } 
                    
                    ?>


                    <br>
                    <div class="col-md-12"><label class="labels">My Refferer Code</label><input type="text"
                            class="form-control" placeholder="My Refferer Code" readonly value="<?php echo $reffer; ?>">
                    </div> <br>
                    <div class="col-md-12"><label class="labels">Refferer By</label><input type="text" id="rb"
                            class="form-control" placeholder="Refferer By" required value="<?php  echo $refby; ?>" name="rb"></div>
                            <br>
                               <label >
                               <?php
if (isset($_SESSION['message']) and !empty($_SESSION['message'])) {
    echo @$_SESSION['message'];
    @$_SESSION['message'] = "";
}

?>
                        </label>
                </form>
            </div>

            <!-- </form> -->
        </div>

    </div>


</div>
</div>
</div>

<script>
$(document).ready(function() {

    // update user
    $("#user-update-form").submit(function(e) {
        e.preventDefault();
        var formValues = $(this).serialize();
        // alert(formValues);
        $.ajax({
            type: "post",
            url: "handler",
            data: {
                data: formValues,
                add: "mtt"
            },
            success: function(response) {
                alert(response);
                window.location.reload();
            }
        });

    });






    // payment method
    $("#payment-update-form").submit(function(e) {
        e.preventDefault();
        var formValues = $(this).serialize();
        $.ajax({
            type: "post",
            url: "handler",
            data: formValues,
            success: function(response) {
                alert(response);
                window.location.reload();
            }
        });

    });

    $("#pass-update-form").submit(function(e) {
        e.preventDefault();
        var formValues = $(this).serialize();

        var cpass = $.trim($("#cpassword").val());
        var pass = $.trim($("#password").val());
        if (cpass == pass) {

            $.ajax({
                type: "post",
                url: "handler",
                data: formValues,
                success: function(response) {
                    alert(response);
                    window.location.reload();
                }
            });



        } else {
            alert("password not match")
        }





    });
    // reset password




});
</script>