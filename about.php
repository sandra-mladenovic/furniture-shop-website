<?php 
include "connection.php";
include "menu.php";
?>
<!-- SLIDER -->
<div class="container-fluid">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/img/carousel.jpg" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/slider3.jpg" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/slider2.jpg" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
         <!-- END SLIDER -->
         

          <!-- ABOUT US BLOCK-->
          <div class="container padd paddBottom">
            <div class="row">
            <div class="col-md-6">
                <img src="assets/img/about.jpg" alt="" class="img-fluid" />
              </div>
              <div class="col-sm-6 center">
                <h3 class="center">We’re into independents</h3>
                <p class=" ">Alongside our in-house design team, we work with makers, suppliers and independent designers, straight from the source. That means no middlemen. So you get a fairer price, and a great new piece. We choose them because they're the best at what they do, and they share our views on things. The result? Quality furniture that looks good (and is kind to your wallet, too).</p>

                <p class="padd">Producing stock in small batches allows us to be more experimental and tune into our customers' needs. We’ll only make an item after you’ve bought it. So there isn’t lots of extra stock sitting around our warehouse (we think it’s more responsible this way). Our designs are handcrafted by artisans with care, love and attention to detail.</p>
              </div>
            </div>
          </div>
          <!-- END ABOUT US BLOCK-->
          <!--  FOOTER -->
          <?php include "footer.php"; ?>
          <!-- END FOOTER -->
