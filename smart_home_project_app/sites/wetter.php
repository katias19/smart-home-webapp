<?php
$apiKey = "ac9e93f33d9c4939a945e7af37e753c4";
$cityId = "London";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $cityId . "&lang=de&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>

<section id='wetter' class="sec5">
          <div class="container">
            <h2>Wetter Service</h2>
            <div class="row" style="margin-top: 50px">
              <div class="col-md-6 col-md-offset-1" style="float: none; margin: auto;">
                <h3>Heute</h3>
                <div class="report-container">
                    <h2><?php echo $data->name; ?></h2>
                    <div class="time">
                        <div><?php echo date("l g:i a", $currentTime); ?></div>
                        <div><?php echo date("jS F, Y",$currentTime); ?></div>
                        <div><?php echo ucwords($data->weather[0]->description); ?></div>
                    </div>
                    <div class="weather-forecast">
                        <img
                            src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                            class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;C<span
                            class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>
                    </div>
                    <div class="time">
                        <div>Windgeschwindigkeit: <?php echo $data->wind->speed; ?> km/h</div>
                        <div>Windrichtung: <?php echo $data->wind->deg; ?> °</div>
                    </div>
                </div>
              </div>

            </div>
          </div>
</section>

