<?php
session_start();
session_destroy();
?>
<script>
    window.location.href = '<?php echo "login.php"; ?>'
</script>
<?php
?>