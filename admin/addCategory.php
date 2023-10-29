<?php
include("inc/ahead.php");

if ($_POST) {
    $aktif = 0;
    if (isset($_POST["active"])) {
        $aktif = 1;
    }



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
    if ($uploadOk == 1) {

        if (move_uploaded_file($_FILES["Url"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["Url"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        try {
            $ekleSorgu = $baglanti->prepare("insert into category set Name=:baslik,Description=:metin,CreatedDate=:tarih,
                IsActive=:aktif,ImageUrl=:url");
            $ekle = $ekleSorgu->execute([
                "baslik" => $_POST["Name"],
                "metin" => $_POST["Desc"],
                "tarih" => date('Y-m-d H:i:s'),
                "aktif" => $aktif,
                "url" => basename( $_FILES["Url"]["name"])
            ]);
            if ($ekle) {
                echo "başarılı";
            }
        } catch (Exception $e) {
            echo $e;
        }
    } else {
        echo "hata";
    }
}



?>



<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Kategori Ekle</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <form class="m-3" method="post" action="addCategory.php" enctype="multipart/form-data">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Kategori Adı</label>
                                <input type="text" name="Name" value="<?= @$_POST["Name"] ?>" required class="form-control">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Açıklama</label>
                                <input type="text" name="Desc" value="<?= @$_POST["Desc"] ?>" class="form-control">
                            </div>
                            <div class="input-group input-group-static my-3">
                                <label>ImageUrl</label>
                                <input type="file" name="Url" src="assets/img/<?= @$_POST["Url"] ?>" value="<?= @$_POST["Url"] ?>" required class="form-control">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="x" name="active" <?= @$sonuc["active"] == 1 ? "checked" : "" ?> id="fcustomCheck1">
                                <label class="custom-control-label" for="customCheck1">Aktif mi?</label>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" value="Kaydet" id="save">
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