<?php
include("inc/db.php");
include("inc/head.php");
?>



<style>
    body.dark {
        background-image: url(https://i.hizliresim.com/rgeik1r.png) !important;
    }
</style>
<header>
    <div class="container">
        <div class="back">
            <a href="javascript:javascript:history.go(-1)">
                <i class="text-white fa-solid fa-arrow-left fa-2x"></i>
            </a>
        </div>

        <div class="logo">

            <a href="categories.php"> <img src="https://notifybee.com.tr/public/upload/profil/202206091145531514308565.png" alt="" class="nav-icon-logo" />
            </a>
        </div>

        <div class="menu">
            <a href="javascript:void(0)">
                <i class="text-white fa-sharp fa-solid fa-bars fa-2x"></i>
            </a>
        </div>
    </div>
</header>
<section class="vertical-menu">
    <div class="container">

        <nav>

            <!-- <ul class="vertical-menu-container mb-3" style="display: block;">
                <li class="vertical-menu__item--black-bg container-shadowed-2">
                    <a href="https://notifybee.com.tr/menudetay?menu=442&id=233"> <img class="menu-bg" src="https://notifybee.com.tr/public/upload/menu/202211190411171629386190.jpg" style="width:100%;">
                        <div class="pb-0">
                            <span>Kahvaltılar</span>
                        </div>
                    </a>
                </li>
            </ul> -->
            <?php
        $sorgu = $baglanti->prepare("SELECT * FROM category WHERE IsActive=1");
        $sorgu->execute();
        while ($sonuc = $sorgu->fetch()) {
        ?>
            <ul class="vertical-menu-container mb-3" style="display: block;">
                <li class="vertical-menu__item--black-bg container-shadowed-2">
                    <a href="menus.php?id=<?=$sonuc["Id"]?>"> <img class="menu-bg" src="admin/assets/img/<?= $sonuc["ImageUrl"] ?>" style="width:100%;">
                        <div class="pb-0">
                            <h5><?=$sonuc["Name"]?></h5>
                        </div>
                    </a>
                </li>
            </ul>

            <?php
        }
            ?>





            <?php
            include("inc/footer.php");
            ?>