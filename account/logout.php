<?php
session_start();
include "../connect_db.php";
session_destroy();
?>
<script type="text/javascript">
    window.location = "../account/login.php"
</script>
<?php
?>