<main>
    <?php
    if (!empty($_GET["selectedMenu"])) 
    {      
        if ($_GET["selectedMenu"] == "w")
        {
            include 'sites/wetter.php';
        }
        elseif ($_GET["selectedMenu"] == "r") 
        {
            include 'sites/raeume.php';
        }
        elseif ($_GET["selectedMenu"] == "k") 
        {
            include 'sites/kategorien.php';
        }
        elseif ($_GET["selectedMenu"] == "a") 
        {
            include 'sites/admin.php';
        }
        elseif ($_GET["selectedMenu"] == "c") 
        {
            include 'sites/contact.php';
        }
        elseif ($_GET["selectedMenu"] == "h") 
        {
            include 'sites/home.php';
        }
        elseif ($_GET["selectedMenu"] == "i") 
        {
            include 'sites/impressum.php';
        }
        elseif ($_GET["selectedMenu"] == "l") 
        {
            include 'sites/licht.php';
        }
        elseif ($_GET["selectedMenu"] == "s") 
        {
            include 'sites/shutter.php';
        }
        elseif ($_GET["selectedMenu"] == "x") 
        {
            include 'sites/room.php';
        }
    }
    else 
    {
        include 'sites/home.php';
    }
    ?>
</main>