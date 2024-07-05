
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=URL_IMG ?>logo.png">
    <link rel="icon" sizes="64x64" type="image/png" href="<?=URL_IMG ?>bookLogo.png">
    <title>Librairie - catalogue</title>
    <link href="<?=URL_CSS2?>header.css" rel="stylesheet" type="text/css" />
    <link href="<?=URL_CSS2?>footer.css" rel="stylesheet" type="text/css" />
    <link href="<?=URL_CSS2?>book_register.css" rel="stylesheet" type="text/css" />
    <link href="<?=URL_CSS2?>find_book.css" rel="stylesheet" type="text/css" />
    <link href="<?=URL_CSS2?>successfull.css" rel="stylesheet" type="text/css" />
    <link href="<?=URL_CSS2?>edit_book.css" rel="stylesheet" type="text/css" />
    <link href="<?=URL_CSS2?>boutique.css" rel="stylesheet" type="text/css" />
    <link href="<?=URL_CSS2?>voir_caddie.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=URL_CSS2?>fontawesome-free-6.5.1-web/css/all.css">
    <!-- <link rel="stylesheet" href="<?=URL_CSS2?>fontawesome5/css/all.css"> -->
</head>

<body>

    <div id="container-<?=$page?>" class="container">
        <header>
            <div class="header-lang-tools">
                <div class="lang">
                    <a href="#">ENIT </a><span>FR | EN</span>
                </div>
                <div class="header-tools">
                    <div class="tools">
                        <img src="<?=URL_IMAGES?>face.png" alt="" class="facebook-icon">
                        <img src="<?=URL_IMAGES?>twitter.png" alt="" class="twitter-icon">
                        <img src="<?=URL_IMAGES?>youtube.png" alt="" class="youtube-icon">
                        <img src="<?=URL_IMAGES?>insta.png" alt="" class="instagram-icon">
                        <img src="<?=URL_IMAGES?>in.png" alt="" class="in-icon">
                        <img src="" alt="">
                        <img src="" alt="">
                        <img src="" alt="">

                    </div>
                </div>
            </div>

            <div class="nav-fixed">
                <div class="logo-part">
                    <img src="<?=URL_IMG ?>logo.png" alt="logo" class="logo">
                </div>
                <nav class="menu">
                    <div class="menu-icon">
                        <img id="" src="<?=URL_IMAGES?>menu-white.png" alt="">
                    </div>
                    <ul class="menu-ul">
                        <?php 
                            if (!empty($_COOKIE['monpanier']) && $page=="boutique") {
                                $tab = explode(",", $_COOKIE['monpanier']);
                                $nblivres = sizeof($tab) - 1;
                        ?>
                        <a href="<?= URL_CONTROLLER2."voir_caddieController.php" ?>" class="cart">
                            <div class="panier">
                                <img src="<?= URL_IMG."cart.png"?>" alt="">
                                <span><?=$nblivres?></span>
                            </div>
                            
                        </a>
                        <?php
                            }
                            menuLi('boutique',$page);
                            menuLi('find_book',$page);
                            if ($admin) {
                                menuLi('book_register',$page);
                            }
                            menuLi('sign_in',$page);
                            menuLi('sign_up',$page);
                            menuLi('log_out',$page,"icon/contacts.png");
                        ?>
                        <div class="user" id="user">
                            <p><?= $_SESSION['nameUser'] ?></p>
                            <p><?= $_SESSION['emailUser']?></p>
                            <a href="<?=URL_CONTROLLER2."log_outController.php" ?>">log out</a>
                        </div>
                    </ul>
                </nav>
            </div>
        </header>