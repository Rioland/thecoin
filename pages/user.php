<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="choplan.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <title>Profile Details</title>
</head>
<body>
    <center>
        <section class="sec21">
            <div class="overallflexsec21">
                <div class="colsec21">
                    <div class="inputs">
                        <h1>Profile Details</h1>
                        <div class="inputimg">
                            <img src="" alt="Profile Picture">
                        </div>
                        <h4><b>Upload your new profile image.</b></h4>
                        <input type="file" name="picture" id="picture" class="inputtii">
                        <p>You can change your profile picture on <b>Gravatar</b></p>
                     </div>
                    
                        <div class="fieldflex">
                            <div class="flex1">
                                <label for="Username">Username *</label><br>
                                <input type="text" name="Username" id="Username" placeholder="Ongod">
                            </div>
                    
                            <div class="flex2">
                                <label for="Username">User Email *</label><br>
                                <input type="Email" name="Username" id="Username" placeholder="aribigbola2018@gmail.com"> <br><br>
                    
                                <label for="Username">Bitcoin Address *</label><br>
                                <input type="text" name="Username" id="Username" placeholder="jahsissksnsowunsmslaoanhniajnssjns"> <br>

                                <div class="butalign">
                                    <button type="submit" class="savvii">SAVE CHANGES</button>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="colsec21">
                    <h1 class="colsec21h1">Edit Details</h1>
                    <div class="fieldflexcolsec2">
                        <div class="flex1">
                            <label for="Username">First name *</label><br>
                            <input type="text" name="firstname" id="firstname" placeholder="h">
                        </div>
                    
                        <div class="flex2">
                            <label for="Username">Last name *</label><br>
                            <input type="text" name="lastname" id="lastname"> <br><br><br>
                    
                        </div>

                    </div>
                    <div class="gridnorm">
                        <label for="displayname">Dispaly name *</label><br>
                        <input type="text" name="displayname" id="displayname" placeholder="Ongod"> 
                        <span class="spanni">This will be how your name will be displayed in the account section and in reviews</span><br><br>
                    
                        <label for="editemail">Email Address*</label><br>
                        <input type="Email" name="editemail" id="editemail" placeholder="aribigbola2018@gmail.com"> <br><br>

                        <h2 class="h2stylii">Password Change</h2><br><br>

                        <label for="password">Current Password* <span class="passstyle">(leave blank to leave unchanged)</span></label><br>
                        <input type="password" name="password" id="password"> <br><br>

                        <label for="newpassword">New Password* <span class="passstyle">(leave blank to leave unchanged)</span></label><br>
                        <input type="password" name="newpassword" id="newpassword"> <br><br>

                        <label for="confirmpassword">Confirm Password* <span class="passstyle">(leave blank to leave unchanged)</span></label><br>
                        <input type="password" name="confirmpassword" id="confirmpassword"> <br><br>

                        <div class="butaligncolsec2">
                            <button type="submit" class="savviicol2">SAVE CHANGES</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </center>
</body>
</html>