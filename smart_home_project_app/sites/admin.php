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

$json2 = file_get_contents("https://3.66.29.129:44395/api/shutters/", false, stream_context_create($arrContextOptions));
$array2 = json_decode($json2, true);

?>  

<section id='admin' class="sec1">
    <div class="container" id="room">
        <h2>Admin</h2>
        <div class="row">
            <div class="col-md-12" id="rooms">
                    <table class="table">
                        <tr>

                            <td style="vertical-align: top;">
                                <div id="new_light" class="col-md-12" style="float: none; margin: auto; padding: 0;">
                                    <form class = "form-signin" name="new_light" role="form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
                                        <h4>Licht anlegen:</h4>
                                        <br>
                                        <h4 class = "form-signin-heading"><?php echo $err_msg; ?></h4>  
                                        <label for=”room”>Raum:</label>
                                        <select class = "form-control" id="l_rooms" name="room" required>
                                        <?php 
                                        foreach($array1 as $raeume => $value) 
                                        {    
                                            echo "<option value='"  . $value["room"] . "'>" . $value["room"]. "</option>";
                                        }
                                        ?>
                                        </select>
                                        <br>
                                        <br> 
                                        <button class = "btn btn-lg btn-primary btn-block" type="submit" name="submit">Speichern</button>
                                    </form>
                                </div>
                            </td>
                            <td style="vertical-align: top;">
                                <div id="new_shutter"  class="col-md-12" style="float: none; margin: auto; padding: 0;">
                                    <form class = "form-signin" name="new_shutter" role="form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
                                        <h4>Jalousie anlegen:</h4>
                                        <br>
                                        <h4 class = "form-signin-heading"><?php echo $err_msg; ?></h4>                               
                                        <label for=”room”>Raum:</label>
                                        <select class = "form-control" id="l_rooms" name="room" required>
                                        <?php 
                                        foreach($array2 as $raeume => $value) 
                                        {    
                                            echo "<option value='"  . $value["room"] . "'>" . $value["room"]. "</option>";
                                        }
                                        ?>
                                        </select>
                                        <br>
                                        <br> 
                                        <button class = "btn btn-lg btn-primary btn-block" type="submit" name="submit">Speichern</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>

                            <td style="vertical-align: top;">
                                <div id="del_light" class="col-md-12" style="float: none; margin: auto; padding: 0;">
                                    <form class = "form-signin" name="del_light" role="form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
                                        <h4>Licht löschen:</h4>
                                        <br>
                                        <h4 class = "form-signin-heading"><?php echo $err_msg; ?></h4>  
                                        <label for=”room”>Raum:</label>
                                        <select class = "form-control" id="l_rooms" name="room" required>
                                        <?php 
                                        foreach($array1 as $raeume => $value) 
                                        {    
                                            echo "<option value='"  . $value["room"] . "'>" . $value["room"]. "</option>";
                                        }
                                        echo "</select>";
                                        echo "<br>";
                                        echo "<label for='r_light'>Licht:</label>";
                                        echo "<select class = 'form-control' id='r_light' name='r_light' required>";
                                        foreach($array1 as $raeume => $value) 
                                        {
                                            echo "<option value='"  . $value["id"] . "'>" . $value["id"]. "</option>";
                                        }
                                        echo "</select>";
                                        ?>    
                                        <br>
                                        <br> 
                                        <button class = "btn btn-lg btn-primary btn-block" type="submit" name="submit">Löschen</button>
                                    </form>
                                </div>
                            </td>
                            <td style="vertical-align: top;">
                                <div id="del_shutter"  class="col-md-12" style="float: none; margin: auto; padding: 0;">
                                    <form class = "form-signin" name="del_shutter" role="form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
                                        <h4>Jalousie löschen:</h4>
                                        <br>
                                        <h4 class = "form-signin-heading"><?php echo $err_msg; ?></h4>                               
                                        <label for=”room”>Raum:</label>
                                        <select class = "form-control" id="l_rooms" name="room" required>
                                        <?php 
                                        foreach($array2 as $raeume => $value) 
                                        {    
                                            echo "<option value='"  . $value["room"] . "'>" . $value["room"]. "</option>";
                                        }
                                        echo "</select>";
                                        echo "<br>";
                                        echo "<label for='r_shutter'>Jalousie:</label>";
                                        echo "<select class = 'form-control' id='r_shutter' name='r_shutter' required>";
                                        foreach($array2 as $raeume => $value)
                                        {
                                            echo "<option value='"  . $value["id"] . "'>" . $value["id"]. "</option>";
                                        }
                                        echo "</select>";
                                        ?> 
                                        <br>
                                        <br> 
                                        <button class = "btn btn-lg btn-primary btn-block" type="submit" name="submit">Löschen</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>
</section>