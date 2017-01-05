

        <div class="form-container">
            <!-- Horizontal form bootstrap class defined -->
            <div class="row" id="form-messages">
                <div class="col-md-12"><div id="message-div" class="message-div"></div></div>
            </div>
            <form class="form-horizontal" id="form" action="" method="post">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="sr-only" for="firstName">First Name</label>
                        <input class="form-control" type="text" name="firstName" id="firstName" placeholder="First Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="sr-only" for="lastName">Last Name</label>
                        <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="sr-only" for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="E-mail">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="sr-only" for="company">Company Name</label>
                        <input class="form-control" type="text" name="companyName" id="company" placeholder="Company Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="sr-only" for="phoneNumber">Phone Number</label>
                        <input class="form-control" type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="sr-only" for="phoneNumber">Captcha Image</label>
                        <img id="captchaImage" src="View/contact/captcha.php" />
                        <small><a href="#" onclick="
                            document.getElementById('captchaImage').src = 'View/contact/captcha.php?' + Math.random();
                            document.getElementById('captcha').value = '';
                            return false;">Refresh</a></small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="sr-only" for="phoneNumber">Captcha</label>
                        <input class="form-control" type="text" name="captcha" id="captcha" placeholder="Enter captcha here" size="6" maxlength="5" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-9">
                        <button type="submit" value="CHECK" class="btn btn-default submit" style="float: right;">Gönder</button>
                    </div>
                </div>
            </form>
        </div>