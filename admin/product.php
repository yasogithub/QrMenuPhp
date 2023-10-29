<?php
include("inc/ahead.php");

if ($_POST) {
    $name = $_POST["Name"];
    $category = $baglanti->prepare("SELECT * FROM category where Name=:name");
    $category->execute(['name' => htmlspecialchars($name)]);
    $sonuc = $category->fetch();
    if ($sonuc != null) {
        $Id = $sonuc["Id"];
    } else {
        $Id = 0;
    }
}
?>



<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <!--dropdownlist start-->
            <div class="btn-group dropdown mt-1">
                <button type="button" class="btn bg-gradient-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Kategori Seçiniz...
                </button>
                <form action="product.php" method="post">
                    <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                        <?php
                        $category = $baglanti->prepare("SELECT * FROM category where IsDeleted=0 or IsDeleted=null");
                        $category->execute();
                        while ($sonuc = $category->fetch()) {
                        ?>
                            <li><input href="javascript:;" type="submit" name="Name" class="dropdown-item border-radius-md" value="<?= $sonuc["Name"] ?>"></li>
                        <?php } ?>
                    </ul>
                </form>
            </div>
            <!--dropdownlist end-->
            <a href="addProduct.php" type="button" class="btn bg-gradient-primary" aria-expanded="false">
                Yeni Menü Öğesi Ekle
                        </a>
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Menü Öğeleri</h6>
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ürün Adı</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori Adı</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Açıklama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">İçindekiler</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aktif mi?</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fiyat</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($_POST) {
                                    $sorgu = $baglanti->prepare("SELECT * FROM product WHERE (IsDeleted=0 or IsDeleted=null) and CategoryId=:id");
                                    $sorgu->execute(['id' => htmlspecialchars($Id)]);
                                    while ($sonuc = $sorgu->fetch()) {
                                        $category = $baglanti->prepare("SELECT * FROM category WHERE Id= :id");
                                        $category->execute(['id' => $sonuc["CategoryId"]]);
                                        $categoryName = $category->fetch();
                                ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="assets/img/<?= $sonuc["ImageUrl"] ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?= $sonuc["Name"] ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?= $categoryName["Name"] ?></p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?= $sonuc["Description"] ?></p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?= $sonuc["Ingredients"] ?></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-<?= $sonuc["IsActive"] == 1 ? "success" : "secondary" ?>"><?= $sonuc["IsActive"] == 1 ? "True" : "False" ?></span>
                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0"><?= $sonuc["Price"] ?> TL</p>
                                            </td>
                                            <td class="align-middle">
                                                <a href="editProduct.php?id=<?= $sonuc["Id"] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Düzenle
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <a href="passive.php?name=product&id=<?= $sonuc["Id"] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Pasifleştir
                                                </a>
                                            </td>
                                        </tr>

                                <?php }
                                } ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include("inc/afooter.php");
    ?>