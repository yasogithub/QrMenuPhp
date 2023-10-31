<?php
include("inc/ahead.php");

$sorgu = $baglanti->prepare("SELECT * FROM product WHERE Id=:id");
$sorgu->execute(['id' => (int)$_GET["id"]]);
$sonuc = $sorgu->fetch();

if ($_POST) {
    $aktif = 0;
    if (isset($_POST["active"])) {
        $aktif = 1;
    }



    if ($_FILES["Url"]["error"] == 4) {
        $uploadOk = 0;
        $url = $sonuc["ImageUrl"];
    } else {
        $target_dir = "assets/img/";
        $target_file = $target_dir . basename(basename($_FILES["Url"]["name"]));
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST)) {
            $check = getimagesize($_FILES["Url"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        $url = basename($_FILES["Url"]["name"]);
    }
    if ($uploadOk == 1) {

        if (move_uploaded_file($_FILES["Url"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["Url"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    try {
        $ekleSorgu = $baglanti->prepare("update product set Name=:baslik,CategoryId=:category,Description=:metin,Ingredients=:ingred,Price=:price,
                IsActive=:aktif,ImageUrl=:url where Id=:id");
        $ekle = $ekleSorgu->execute([
            "baslik" => $_POST["Name"],
            "category"=>(int)$_POST["Category"],
            "metin" => $_POST["Desc"],
            "ingred"=>$_POST["Ingredi"],
            "price"=>(float)$_POST["Price"],
            "aktif" => $aktif,
            "url" => $url,
            "id" => (int)$_GET["id"]

        ]);
        if ($ekle) {
            echo "başarılı";
?>
            <script>
                window.location.href = 'product.php'
            </script>
<?php

        }
    } catch (Exception $e) {
        echo $e;
    }
}



?>



<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Menü Düzenle & Sil</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <form class="m-3" method="post" action="" enctype="multipart/form-data">
                        <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Kategori</label>
                                <select class="form-control" name="Category" id="exampleFormControlSelect1">
                                    <?php
                                    $category = $baglanti->prepare("SELECT * FROM category where IsActive=1");
                                    $category->execute();
                                    while ($sonuc = $category->fetch()) {
                                    ?>
                                        <option Name="Option" value="<?=$sonuc["Id"]?>"><?=$sonuc["Name"]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="input-group input-group-static my-3">
                                <label class="form-label">Ürün Adı</label>
                                <input type="text" name="Name" value="<?= @$sonuc["Name"] ?>" required class="form-control">
                            </div>
                            <div class="input-group input-group-static my-3">
                                <label class="form-label">Açıklama</label>
                                <input type="text" name="Desc" value="<?= @$sonuc["Description"] ?>" class="form-control">
                            </div>
                            <div class="input-group input-group-static my-3">
                                <label class="form-label">İçindekiler</label>
                                <input type="text" name="Ingredi" value="<?= @$sonuc["Ingredients"] ?>" class="form-control">
                            </div>
                            <div class="input-group input-group-static my-3">
                                <label class="form-label">Fiyat</label>
                                <input type="number" name="Price" value="<?= @$sonuc["Price"] ?>" class="form-control">
                            </div>
                            <div class="input-group input-group-static my-3">
                                <img src="assets/img/<?= $sonuc["ImageUrl"] ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                            </div>
                            <div class="input-group input-group-static my-3">
                                <label>Yeni Resim</label>
                                <input type="file" name="Url" class="form-control">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="x" name="active" <?= @$sonuc["IsActive"] == 1 ? "checked" : "" ?> id="fcustomCheck1">
                                <label class="custom-control-label" for="customCheck1">Aktif mi?</label>
                            </div>
                            <div class="row">
                            <div class="form-group col-3">
                                <input class="btn btn-success" type="submit" value="Kaydet" id="save">
                            </div>
                            <div class="form-group col-3">
                                
                                <a href="delete.php?name=product&id=<?=$sonuc["Id"]?>" class="btn btn-danger" type="button" value="Sil" id="delete">Sil</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include("inc/afooter.php");
    ?>