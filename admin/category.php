<?php
include("inc/ahead.php");
?>



<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <a href="addCategory.php" class="btn bg-gradient-primary">Kategori Ekle</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Kategoriler</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori Adı</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Açıklama</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aktif mi?</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Oluşturulma Tarihi</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sorgu = $baglanti->prepare("SELECT * FROM category where IsDeleted=0 or IsDeleted=null");
                                $sorgu->execute();
                                while ($sonuc = $sorgu->fetch()) {
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
                                            <p class="text-xs font-weight-bold mb-0"><?= $sonuc["Description"] == null ? "Açıklama Girilmemiş" : $sonuc["Description"] ?></p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-<?= $sonuc["IsActive"] == 1 ? "success" : "secondary" ?>"><?= $sonuc["IsActive"] == 1 ? "True" : "False" ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?php $date = strtotime($sonuc["CreatedDate"]); ?>
                                            <span class="text-secondary text-xs font-weight-bold"><?= date('d/m/Y H:i:s', $date) ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="editCategory.php?id=<?=$sonuc["Id"]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                Düzenle
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="passive.php?name=category&id=<?=$sonuc["Id"]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                Pasifleştir
                                            </a>
                                        </td>
                                    </tr>

                                <?php } ?>



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