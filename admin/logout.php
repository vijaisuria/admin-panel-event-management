<?php
   session_start();
   unset($_SESSION['Aname']);
   unset($_SESSION['Apass']);
   unset($_SESSION['Aid']);
   unset($_SESSION['Aaccess']);
   echo '<script>window.location="index.php"</script>';


?>