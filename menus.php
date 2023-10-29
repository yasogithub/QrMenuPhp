<?php
include("inc/db.php");
include("inc/head.php");

$id=$_GET["id"];

$query="SELECT * FROM category where Id=".$id;
$sorgu = $baglanti->prepare($query);
$sorgu->execute();
$categResult = $sorgu->fetch();
?>




<style>
    body.dark {
        background-image: url(https://i.hizliresim.com/rgeik1r.png) !important;
    }

    .modal-content,
    .modal-content a {
        color: white;
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


        </div>

        <div class="menu">
            <a href="javascript:void(0)">
                <i class="text-white fa-sharp fa-solid fa-bars fa-2x"></i>
            </a>
        </div>
    </div>
</header>

<section class="vertical-menu-list"><!--<form method="post">-->

    </form>
    <div class="container">


        <div class="dark-vertical-menu__options d-flex justify-content-center">
            <a href="https://notifybee.com.tr/menu?id=233" class="d-block text-white text-center mb-3"><?=$categResult["Name"]?><i class="fa-solid fa-angle-down ms-2"></i></a>
        </div>


        <section class="vertical-menu pb-0 ">
            <div class="container">
                <nav>
                    <ul class="vertical-menu-container">
                    </ul>
                </nav>
            </div>
        </section>

        <?php
        $query2="SELECT * FROM product WHERE IsActive=1 and CategoryId=".$id;
        $sorgu = $baglanti->prepare($query2);
        $sorgu->execute();
        while ($sonuc = $sorgu->fetch()) {
        ?>
            <ul class="arabas">
                <li class="vertical-menu-list__item bg-orange-light container-shadowed-2 aramaalan">
                    <div class="row">
                        <div class="col-4 pe-1">
                            <div class="food-background">
                                <div style="background-image:url(admin/assets/img/<?= $sonuc["ImageUrl"] ?>);height:90%;width:90%;background-size:cover;background-position:center;">
                                    <!--<img src="https://notifybee.com.tr/public/upload/menu/20230403121742997961202.jpg" alt="" />-->
                                </div>
                            </div>
                        </div>

                        <div class="col-8">
                            <h6 data-bs-toggle="modal" id="urunclick<?= $sonuc["Id"] ?>" data-bs-target="#menuModal<?= $sonuc["Id"] ?>"><?=$sonuc["Name"]?></h6>
                            <p><?=$sonuc["Description"]?></p>

                            <span class="text-orange float-start mt-2 me-2"><?=$sonuc["Price"]?>TL</span>
                            <div class="float-end">

                                <button type="button" data-bs-toggle="modal" data-bs-target="#menuModal<?= $sonuc["Id"] ?>" class="form__btn">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>



                <div class="modal modal-bottom fade" id="menuModal<?= $sonuc["Id"] ?>" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" data-bs-dismiss="modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="2" viewBox="0 0 29 2">
                                    <line id="Line_1" data-name="Line 1" x2="27" transform="translate(1 1)" fill="none" stroke="#1c1c1c" stroke-linecap="round" stroke-width="2" />
                                </svg>
                            </div>

                            <div class="modal-body pt-0">
                                <div class="card">
                                    <h6 class="card-title text-center"><?=$sonuc["Name"]?> Detayları</h6>
                                    <div class="card-header"> <img src="admin/assets/img/<?= $sonuc["ImageUrl"] ?>" class="card-img-top" data-pagespeed-url-hash="2568255611" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />


                                        <h6 class="mt-3 mb-2 text-white"><?=$sonuc["Name"]?></h6>
                                        <b>Açıklama</b><br>
                                        <p class="text-white"><?=$sonuc["Description"]?></p>
                                        <b>İçindekiler</b><br>
                                        <p class="text-white"><?=$sonuc["Ingredients"]?></p>
                                        <b>Fiyat</b><br>
                                        <p class="text-white"><?=$sonuc["Price"]?>TL</p>

                                    </div>

                                    <div class="card-body">

                                        <div class="accordion" id="variationsAccordion">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>

        <?php
        }
        ?>








        <?php
        include("inc/footer.php");
        ?>