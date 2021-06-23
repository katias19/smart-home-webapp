<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)  
{
    $menuArray = array("h" => "Home",
        "c" => "Kontakt");
}
elseif(isset($_COOKIE['member_login']) && $_COOKIE['member_login'] === true) 
{
    $menuArray = array("h" => "Home",
        "w" => "Wetter",
        "r" => "Räume",
        "k" => "Kategorien",
        "a" => "Admin",
        "c" => "Kontakt");
}
else
{
    $menuArray = array("h" => "Home",
        "w" => "Wetter",
        "r" => "Räume",
        "k" => "Kategorien",
        "a" => "Admin",
        "c" => "Kontakt");
}
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <ul class="nav navbar-nav navbar-right">
            <?php
                foreach($menuArray as $key=>$eintragTmp)
                {
                    echo "<li><a href='index.php?selectedMenu=$key'>";
                    echo $eintragTmp;
                    echo "</a></li>";
                }
            ?>
           
        </ul>	
    </div>
</nav>

