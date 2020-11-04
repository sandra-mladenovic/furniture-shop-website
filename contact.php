<?php
include "connection.php";
include "menu.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-7 padd" id="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.3059445135!2d-74.25986613799748!3d40.69714941774136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2srs!4v1592258945125!5m2!1sen!2srs" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="col-md-5">
        <h2 class="center padd">CONTACT US</h2>
            <form id="contactForm" onsubmit="return contactForm()" method="post" 
            action="sendEmail.php" class="padd">
                <div class="form-group">
                <input type="text" placeholder="Subject" name="subject" id="subject" class="form-control"/>
                <span id="errorSubject" class="col-lg-12"></span>
                </div>
                <div class="form-group">
                <input type="email" class="form-control" id="contactEmail" name="contactEmail" placeholder="example@example.com"/>
                <span id="errorEmail" class="col-lg-12"></span>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="contactTextarea" rows="4" placeholder="Your message" name="contactTextarea"></textarea>
                <span id="errorMessage" class="col-lg-12"></span>
            </div>
            <div class="form-group">
                 <input type="submit" name="btnContact" id="btnContact" class="btn btn-light btn-block" value="CONTACT US">
            </div>
            </form>
        </div>

    </div>
</div>
<?php
include "footer.php";
?>








