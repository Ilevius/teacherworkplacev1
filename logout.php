<?php
        session_start(); 
        $_SESSION = array();
        echo '<script>location.replace("index.php");</script>'; 
        exit;

?>