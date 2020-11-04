<?php 
include "connection.php";
include "menu.php";
?>
     <!-- ARTICALS -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 center padd">
                    <h2>Shop here</h2>
                </div>
            </div>
            <div class="row center" id="category">
                <div class="col-lg-3 col-md-1 col-sm-12 center cat">
                <a  data-id="0" href="articals.php?idCat=0">All</a>
                </div>
                <?php
                    $query = "SELECT * FROM category";
                    $rezQuery = $connection ->query($query)->fetchAll();

                    foreach($rezQuery as $cat):
                ?>
                <div class="col-lg-2 col-md-1 col-sm-12 center cat">
                    <a data-id="<?=$cat->idCat?>" href="articals.php?<?=$cat->idCat?>"> <?=$cat->catName?></a>
                </div>
                    <?php endforeach; ?>
                    
                <!-- <div class="col-lg-2 col-md-1 col-sm-12 center">
                    <a  href="articals.php?idCat=0">Sort by v</a>
                </div> -->
            </div>
            <div class="row paddBottom" id="products">

            </div>
        </div>
          <!-- END ARTICALS -->
            

    </div>
  
     <!--  FOOTER -->
     <?php include "footer.php"; ?>
    <!-- END FOOTER -->

    <?php if (isset($_GET["alert"])): ?>
 <script type="text/javascript">
 alert("<?php echo htmlentities(urldecode($_GET["alert"])); ?>");
 </script>
 <?php endif; ?>