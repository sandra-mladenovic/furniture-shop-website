<?php

include "connection.php";
include "menu.php";


$strana = 0;
  if(isset($_GET['strana'])){
     $strana = ($_GET['strana'] - 1) * 6;                               
 }


$query="SELECT a.idArtical, a.title, a.price, a.src, c.catName, a.idCat
         FROM artical a INNER JOIN category c 
        ON a.idCat=c.idCat ORDER BY a.idArtical limit $strana,6";
    $sviArtikli=$connection->query($query)->fetchAll();
?>
<div class="container">

</div>
<div class="row " id="adminProducts">
<?php foreach($sviArtikli as $a):?>

<div class="col-md-4 padd">
        <div class="row">
            <div class="col-md-12">
                <img src="assets/img/<?=$a->src?>" alt="<?=$a->title?>" class="img-fluid"/>
            </div>
            <div class="col-md-12 center">
                <p><?=$a->title?></p>
            </div>
            <div class="col-md-12 center">
                <p class="bold">$<?=$a->price?></p>
            </div>
            <div class="col-sm-12 center">
                <button data-id="<?=$a->idArtical?>" class="btn btn-light deleteArical">DELETE</button>
            </div>
            
        </div>
        
    </div>
    
    <?php endforeach; ?>

</div>
</div>

</div>

</div>

<div id="strane" class="container">
<div class="row center">
    <ul id="str" class="center">
         <?php
            $upit = "SELECT COUNT(*) AS brojArtikala FROM artical";
                    $rezultat = $connection->query($upit)->fetch();
                    $brojArtikala = $rezultat->brojArtikala;
                    $brojLinkova = ceil($brojArtikala / 6); 
                    for($i=1; $i <= $brojLinkova; $i++):
         ?>
                    <li>
                        <a href="admin.php?strana=<?= $i?>">
                            <b> <?= $i ?> </b>
                        </a>
                    </li>
                <?php endfor;?>
    </ul>
 </div>
</div>
<div class="container">
<div class="row">
    <div id="insertForm" class="col-lg-12 modalInsert">
        <div class="row">
            <div class="col-lg-6">
                 <form action="modules/insertArtical.php" onsubmit="return proveriPodatkeInsert()" method="POST" enctype="multipart/form-data" class="footerTextCenter">
                    <h3>INSERT</h3>
                    <span class="col-lg-6">
                        <input type="text" placeholder="ArticalName" name="newName" id="newName" class="update-item insert form-control"/>
                    </span>
                    <span id="errorIn-name" class="col-lg-6"></span>
                    <span class="col-lg-6">
                         <input type="number" name="newPrice" placeholder="Price" id="newPrice" class="update-item form-control insert"/>
                    </span>
                    <span id="errorIn-price" class="col-lg-6"></span>
                    <select id="newDdlCat" class="update-item insert form-control" name="newDdlCat">
                        Category: <option value="Select">Select</option>
                    <?php
                        $queryCat="SELECT * FROM category";
                        $rezCat=$connection->query($queryCat)->fetchAll();
                    foreach($rezCat as $itemCat):
                     ?>
                    <option value="<?=$itemCat->idCat?>"><?=$itemCat->catName?></option>
                    <?php endforeach;?>
                    </select>
                    </span>
                    <span id="errorIn-cat" class="col-lg-6"></span>
                    <span class="col-lg-6">
                         <label for="newPic" class="picLab">Choose an image</label><input type="file" name="newPic" id="newPic"/>
                    </span>
                     <span id="errorIn-pic" class="col-lg-6"></span>
                     <span class="col-lg-6 divBtnInsert">
                        <input type="submit" name="btnInsert" id="btnInsert" value="Insert Aricle" class="btnUpdate btn btn-light"/>
                     </span>
                </form>
        </div>
        <div class="col-lg-6">
            <img src="assets/img/about1.jpg" alt="Picture from instagram" class="img-fluid paddBottom"/>
        </div>
    </div>
</div>
    
 </div>
 
</div>

<?php
include "footer.php";
?>

<?php if (isset($_GET["alert"])): ?>
 <script type="text/javascript">
 alert("<?php echo htmlentities(urldecode($_GET["alert"])); ?>");
 </script>
 <?php endif; ?>


