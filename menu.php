
<!DOCTYPE html>
<html>
<head>
    <title>.furniture</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css"> 
    <link rel="stylesheet" href="assets/css/style.css"> 
    <meta charset="utf-8">
	<meta name="keywords" content="furniture, bathroom, bedroom, shop, chair, kitchen, living room"/>
	<meta name="description" content="Shop furniture"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Sandra Mladenovic"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    
</head>
<body>
    <div class="container-fluid">
        <div class="container headerup">
            <div class="row">
                <div class="col-md-12 center">
                    <h1 id="logo"><a href="index.php">.furniture</a></h1>
                </div>
            </div>
        </div>
        <!-- NAVIGATION -->
        <div class="container">
            <div class="row">
            <nav class="col-md-9 col-sm-12 menu-items">
                <ul id="mainMeni" class="col-sm-12 center">
                    <?php 
                        include "connection.php";
                        session_start();
                        if(isset($_SESSION["user"])){
                            if($_SESSION["user"]->name == 'user'){
                                $querMenu="SELECT * FROM menu where permission in (0,1)";
                            }
                            else {
                                $querMenu="SELECT * FROM menu where permission in (0,1,2)"; 
                            }
                        }
                        else{
                            $querMenu="SELECT * FROM menu where permission in (0, 3)";
                        }
                        $rezMenu=$connection->query($querMenu)->fetchAll();
                        foreach($rezMenu as $item):
                    ?>
                    
                     <li><a href="<?= $item->link?>" id="<?=$item->title?>"><?= $item->title?></a></li>
                        <?php endforeach; ?>
                </ul>
            </nav>
            <nav class="col-md-3 col-sm-12 menu-items right">
                <ul id="mainSocial" class="col-sm-12 center right social">
                     <li><a href="https://www.facebook.com/"  target="_blank" id=""><i class="fa fa-facebook soc" aria-hidden="true"></i></a></li>
                     <li><a href="https://www.instagram.com/"  target="_blank" id=""><i class="fa fa-instagram soc" aria-hidden="true"></i></a></li>
                     <li><a href="https://twitter.com/home?lang=en"  target="_blank" id=""><i class="fa fa-twitter soc" aria-hidden="true"></i></a></li>
                     <li><a href="https://www.pinterest.com/"  target="_blank" id=""><i class="fa fa-pinterest-p soc" aria-hidden="true"></i></a></li>
                </ul>
            </nav>
        </div>
        </div>
        <!--END NAVIGATION -->