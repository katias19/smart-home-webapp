<?php
if (!isset($_SESSION)) { session_start(); }
$err_msg = '';

# read XML-Studentlist
# $xml=simplexml_load_file("raeumeliste.xml") or die("Error: Räumeliste kann nicht geladen werden!"); 
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
); 

$json1 = file_get_contents("https://3.66.29.129:44395/api/lights/", false, stream_context_create($arrContextOptions));
$array1 = json_decode($json1, true);

echo "<section id='raum' class='sec21'>";
echo "<div class='container'>";
echo "<h2>" . $_GET["selectedRoom"] . "</h2>";
echo "<div class='row'>";
echo "<div class='col-md-12' id='rooms'>";

foreach($array1 as $licht => $value) 
{  
    if ($value["room"] == $_GET["selectedRoom"]): 
        echo "<table class='table'>";

        echo "<thead>";
        echo "<tr>"; 
        echo "<th style='width: 30%; vertical-align: middle; font-weight: bold; font-size: 1.5em;' >Licht</th>";
        echo "<th style='width: 70%; vertical-align: middle; text-align: center'>";
        echo "<div class='btn btn-lg btn-danger onoff_btn'>";
        echo "<a href='./'>Aus</a>"; 
        echo "</div>";
        echo "<div class='btn btn-lg btn-success onoff_btn'>";
        echo "<a href='./'>An</a>";
        echo "</div>";
        echo "</th>";    
        echo "</tr>";
        echo "</thead>";

        echo "<tbody>";
        echo "<tr>"; 
        echo "<td style='width: 30%; vertical-align: middle; font-size: 1.3em'>";
        echo "<div style='float: none; margin: auto;'>";
        echo "Mode";
        echo "</div>";
        echo "</td>";
        echo "<td style='width: 70%; vertical-align: middle; text-align: center'>";
        echo "<div class='form-check form-check-inline' style='float: none; margin: auto'>";
        echo "<input class='form-check-input' type='radio' name='inlineRadioOptions' id='reading' value='lesen' checked>";
        echo "<label style='margin-left: 5px' class='form-check-label' for='reading'>Lesen</label>";
        echo "</div>";
        echo "<div class='form-check form-check-inline' style='float: none; margin: auto'>";
        echo "<input class='form-check-input' type='radio' name='inlineRadioOptions' id='romantic' value='romantisch'>";
        echo "<label style='margin-left: 5px' class='form-check-label' for='romantic'>Romantisch</label>";
        echo "</div>";
        echo "<div class='form-check form-check-inline' style='float: none; margin: auto'>";
        echo "<input class='form-check-input' type='radio' name='inlineRadioOptions' id='party' value='party'>";
        echo "<label style='margin-left: 5px' class='form-check-label' for='party'>Party</label>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
        
        echo "<tr>"; 
        echo "<td style='width: 30%; font-size: 1.3em'>";
        echo "<div style='float: none; margin: auto;'>";
        echo $value["id"];
        echo "</div>";
        echo "</td>";
        echo "<td style='width: 70%; text-align: center; padding: 20px'>";
        echo "<div class='col-md-3 col-md-offset-1 picto' style='float: none; margin: auto; width: 150px'>";
        echo "<a href=''>";
        echo "<img src='res/img/light_off.png' alt='Licht'>";
        echo "</a>";
        echo "</div>";
        echo "<div id='status'>";
        echo "<a style='font-weight: bold; font-size: 1.5em; color: #fff'>";
        
        if($value["status"] == 0):
            echo "0%";
        elseif($value["status"] == 1):
            echo "20%";
        elseif($value["status"] == 2):
            echo "40%";
        elseif($value["status"] == 3):
            echo "60%";
        elseif($value["status"] == 4):
            echo "80%";
        elseif($value["status"] == 5):
            echo "100%";
        else:
            echo "-";
        endif;
        
        echo "</a>";
        echo "</div>";
        echo "<div class='col-md-3 col-md-offset-1 picto' style='float: none; margin: auto; width: 150px'>";
        echo "<a href=''>";
        echo "<img src='res/img/light_on.png' alt='Licht'>";
        echo "</a>";
        echo "</div>";
        echo "<td>";
        echo "</tr>";

        echo "</tbody>";

        echo "</table>";
    endif;
}

$json2 = file_get_contents("https://3.66.29.129:44395/api/shutters/", false, stream_context_create($arrContextOptions));
$array2 = json_decode($json2, true);

foreach($array2 as $shutter => $value)
{   
    if ($value["room"] == $_GET["selectedRoom"]): 
        echo "<table class='table'>";

        echo "<thead>";
        echo "<tr>";
        echo "<th style='width: 30%; vertical-align: middle; font-weight: bold; font-size: 1.5em;' >Jalousien</th>";
        echo "<th style='width: 70%; vertical-align: middle; text-align: center'>";
        echo "<div class='btn btn-lg btn-danger onoff_btn'>";
        echo "<a href='./'>Runter</a>"; 
        echo "</div>";
        echo "<div class='btn btn-lg btn-success onoff_btn'>";
        echo "<a href='./'>Hoch</a>";
        echo "</div>";
        echo "</th>";
        echo "</tr>";
        echo "</thead>";

        echo "<tbody>";
        echo "<tr>"; 
        echo "<td style='width: 30%; font-size: 1.3em'>";
        echo "<div style='float: none; margin: auto;'>";
        echo $value["id"];
        echo "</div>";
        echo "</td>";
        echo "<td style='width: 70%; text-align: center; padding: 20px'>";
        echo "<div class='col-md-3 col-md-offset-1 picto' style='float: none; margin: auto; width: 150px'>";
        echo "<a href=''>";
        echo "<img src='res/img/rollos_up.jpg' alt='Jalousien'>";
        echo "</a>";
        echo "</div>";
        echo "<div id='status'>";
        echo "<a style='font-weight: bold; font-size: 1.5em; color: #fff'>";
        if($value["position"] == 0):
            echo "0%";
        elseif($value["position"] == 1):
            echo "25%";
        elseif($value["position"] == 2):
            echo "50%";
        elseif($value["position"] == 3):
            echo "75%";
        elseif($value["position"] == 4):
            echo "100%";
        else:
            echo "-";
        endif; 
        echo "</a>";
        echo "</div>";
        echo "<div class='col-md-3 col-md-offset-1 picto' style='float: none; margin: auto; width: 150px'>";
        echo "<a href=''>";
        echo "<img src='res/img/rollos_down.jpg' alt='Jalousien'>";
        echo "</a>";
        echo "</div>";
        echo "<td>";
        echo "</tr>";
        echo "</tbody>";

        echo "</table>";
    endif;
}

echo "</div>";
echo "</div>";
echo "</div>";
echo "</section>";
?> 
