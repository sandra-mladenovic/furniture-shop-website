
<?php 
include "connection.php";
include "menu.php";
// echo($_SESSION['user']->idUser);
?>
<!-- SLIDER -->
<div class="container-fluid">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" id="slider">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/img/slider3.jpg" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/slider2.jpg" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/slider4.jpg" alt="Third slide">
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
         <!-- END FAVES -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 center padd">
                    <h2>Our fave finds</h2>
                </div>
            </div>
            <div class="row">
                <?php 
                    $query = "SELECT src, title, price FROM `artical` WHERE price >= 900";
                    $rezQuery = $connection->query($query)->fetchAll(); 
                    foreach($rezQuery as $item):
                ?>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="assets/img/<?=$item->src?>" alt="<?=$item->title?>" class="img-fluid"/>
                        </div>
                        <div class="col-md-12 center">
                            <p><?=$item->title?></p>
                        </div>
                        <div class="col-md-12 center">
                            <p class="bold">$<?=$item->price?></p>
                        </div>
                    </div>
                </div>
                    <?php endforeach; ?>
            </div>
        </div>

          <!-- END FAVES -->

          <!--  INSTAGRAM -->
        <div class="container padd paddBottom">
            <div class="row">
                <div class="col-md-4">
                   <a href="https://www.instagram.com/"><img src="assets/img/insta4.jpg" class="img-fluid"/></a>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 center topPadd">
                            <h2>Instagram Shop</h2>
                        </div>
                        <div class="col-sm-12 center">
                            <p>Share your home #goals using #furnitureDesign and mention @furnituredotcom for the chance to be featured on our site</p>
                        </div>
                        <div class="col-sm-12 center">
                            <img src="assets/img/instagram.png"/>
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
  