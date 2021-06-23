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

$json = file_get_contents("https://3.66.29.129:44395/api/lights/", false, stream_context_create($arrContextOptions));

$array = json_decode($json, true);

echo "<section id='raeume' class='sec21'>";
echo "<div class='container'>";
echo "<h2>Räume</h2>";
echo "<div class='row'>";
echo "<div class='col-md-12' id='rooms'>";
echo "<table class='table'>";
echo "<thead style='font-size: 1.3em;'>";
echo "<tr>"; 
echo "<th style='vertical-align: middle; text-align: center'></th>";
echo "<th style='vertical-align: middle'>Raum</th>";
echo "<th style='vertical-align: middle; text-align: center'>Kontrolle</th>";
echo "<th style='vertical-align: middle; text-align: center'>Licht</th>";
echo "<th style='vertical-align: middle; text-align: center'>Jalousien</th>";
echo "</tr>"; 
echo "</thead>";
echo "<tbody>";
foreach($array as $raeume => $value)
{  
    echo "<tr>";    
        echo "<td style='vertical-align: middle; text-align: center'></td>";
        echo "<td style='vertical-align: middle'>"  . $value["room"] . "</td>";
        echo "<td style='vertical-align: middle; text-align: center'>";
            echo "<div class='btn btn-lg btn-warning' id='ctrl_btn'>";
            echo "<a href='index.php?selectedMenu=x&selectedRoom=" . $value["room"] . "'>Öffnen</a>";
            echo "</div>";
        echo "</td>";
        echo "<td style='vertical-align: middle; text-align: center'>";
            echo "<div class='btn btn-lg btn-danger onoff_btn'>";
            echo "<a href='./'>Aus</a>"; 
            echo "</div>";
            echo "<div class='btn btn-lg btn-success onoff_btn'>";
            echo "<a href='./'>An</a>";
            echo "</div>";
        echo "</td>";
        echo "<td style='vertical-align: middle; text-align: center'>";
            echo "<div class='btn btn-lg btn-danger onoff_btn'>";
            echo "<a href='./'>Runter</a>";
            echo "</div>";
            echo "<div class='btn btn-lg btn-success onoff_btn'>";
            echo "<a href='./'>Hoch</a>";
            echo "</div>";
        echo "</td>";
    echo "</tr>";    
} 
echo "</tbody>";
echo "</table>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</section>";
?> 