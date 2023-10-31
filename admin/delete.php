<?php
include("inc/ahead.php");

$id=$_GET["id"];
$name=$_GET["name"];
$image=$_GET["image"];

$query="delete from ".$name." WHERE Id=".$id;
$sorgu = $baglanti->prepare($query);
if(unlink("assets/img/".$image)){
    $sorgu->execute();
}

$sorgu = $baglanti->prepare($query);
$sorgu->execute();
?>
<script>
    window.location.href='<?php echo $name.".php";?>'
</script>


