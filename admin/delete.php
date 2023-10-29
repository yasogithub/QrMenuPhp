<?php
include("inc/ahead.php");

$id=$_GET["id"];
$name=$_GET["name"];
echo $id;
echo $name;
$query="update ".$name." set IsActive=0 , IsDeleted=1 WHERE Id=".$id;
$sorgu = $baglanti->prepare($query);
$sorgu->execute();
$sonuc = $sorgu->fetch();

?>
<script>
    window.location.href='<?php echo $name.".php";?>'
</script>


