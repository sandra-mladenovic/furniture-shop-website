
<?php 
include "connection.php";
include "menu.php";
?>
       

          <!--  INSTAGRAM -->
        <div class="container padd paddBottom">
            <div class="row">
                <div class="col-md-4">
                   <a href="https://www.instagram.com/"><img src="assets/img/insta4.jpg" class="img-fluid"/></a>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div id="forma" class="col-lg-12  footerTextCenter">
                            <form action="loginCheck.php" method="post" id="formLog" class="animated fadeIn" onsubmit="return checkLogin()">
                                <h2 class="blackLetters">Login here</h2>
                                <input type="text" class=" form-control" name="mail" id="mail" placeholder="example@example.com"/><br>
                                <input type="password" class="form-control" name="pass" id="pass" placeholder="password"/><br>
                                <input type="submit" id="btnLogin" name="btnLogin" value="LOGIN" class="btn btn-light btn-lg btn-block"/>
                                <p id="error-login1"></p>
                                <?php if(isset($_SESSION['greska'])): ?>
                                        <p id="error-login"> <?= $_SESSION["greska"] ?> </p>
                                        <?php unset($_SESSION["greska"]); ?>
                                    <?php endif; ?>
                                <p id="signup">Sign up?</p>  
                            </form>
                            <form  action="register.php" method="post" id="formReg" class="animated fadeIn" onsubmit="return checkRegister()">
                                <h2 class="blackLetters">Create your account</h2>
                                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First name"/><br>
                                <p id="errorReg-firstName"></p>
                                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last name"/><br>
                                <p id="errorReg-lastName"></p>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Example@example.com"/><br>
                                <p id="errorReg-mail"></p>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password"/><br>
                                <p id="errorReg-pass"></p>
                                <input type="submit" id="btnSignIn" value="SIGN UP" name="btnSignIn"  class="btn btn-light btn-lg btn-block"/>
                                <p id="feedback"></p>
    
                                <p id="login-link">Login?</p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="https://www.instagram.com/"><img src="assets/img/insta2.jpg" class="img-fluid"/></a>
                </div>
            </div>
        </div>
          <!-- END INSTAGRAM -->

    </div>
    <!--  FOOTER -->
    <?php include "footer.php"; ?>
          <!-- END FOOTER -->