<?php
    session_start();
    
    $_SESSION = array();
    
    session_destroy();
    
    setcookie("member_login", "", time()-3600);
    setcookie("passwort", "", time()-3600);
    
    header("location: ../");
    exit;
?>

