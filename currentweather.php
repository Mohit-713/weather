<div class="time">
            <div><?php date_default_timezone_set($citydatajson_HourAndDay->timezone);
             //echo date("l g:i a", $currentTime);
            echo date("h:i:s", $citydatajson->dt); 
            ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($citydatajson->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $citydatajson->weather[0]->icon; ?>.png"
                class="weather-icon" /><br>Max-<?php echo $citydatajson->main->temp_max; ?>&deg;C<br><span
                class="min-temperature">MIN-<?php echo $citydatajson->main->temp_min; ?>&deg;C</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $citydatajson->main->humidity; ?> %</div>
            <div>Wind: <?php echo $citydatajson->wind->speed; ?> km/h</div>
        </div>