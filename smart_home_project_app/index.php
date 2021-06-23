<!DOCTYPE html>
<?php 

    session_start();
    
?> 
<html lang="de">
    <head>
        <title>Smart Home App</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="res/css/style.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body id="home">
        <?php   
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)  
        {
            include './inc/navi.inc.php';
            include './inc/header.inc.php';
            include './inc/content.inc.php';
            include './inc/footer.inc.php';
            exit;
        }
        elseif(isset($_COOKIE['member_login']) && $_COOKIE['member_login'] === true) 
        {
            include './inc/navi.inc.php';
            include './inc/welcome.inc.php';
            include './inc/content.inc.php';
            include './inc/footer.inc.php';
            exit;
        }
        else 
        {
            include './inc/navi.inc.php';
            include './inc/welcome.inc.php';
            include './inc/content.inc.php';
            include './inc/footer.inc.php';
            exit;
        }
        ?>		
    </body>
</html>
