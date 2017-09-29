<?php

require "db.php";
unset($_SESSION['logged_user']);
echo ' <script>window.location=\'index.php\'</script> ';

?>