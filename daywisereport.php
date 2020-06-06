      
      <div class="hour-report" >
      <div class="time">
            <div><?php echo date("h:i:s", $citydatajson_HourAndDay->daily[$d]->dt); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($citydatajson_HourAndDay->daily[$d]->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $citydatajson_HourAndDay->daily[$d]->weather[0]->icon; ?>.png"
                class="weather-icon" /><br>Max-<?php echo $citydatajson_HourAndDay->daily[$d]->temp->max; ?>&deg;C<br> <span
                class="min-temperature">MIN-<?php echo $citydatajson_HourAndDay->daily[$d]->temp->min; ?>&deg;C</span> 

                <br> <span
                class="min-temperature">Morn-<?php echo $citydatajson_HourAndDay->daily[$d]->temp->morn; ?>&deg;C</span> 
                <br> <span
                class="min-temperature">Eve-<?php echo $citydatajson_HourAndDay->daily[$d]->temp->eve; ?>&deg;C</span> 
                <br> <span
                class="min-temperature">Night-<?php echo $citydatajson_HourAndDay->daily[$d]->temp->night; ?>&deg;C</span> 


        </div>
        <div class="time">
            <div>Humidity: <?php echo $citydatajson_HourAndDay->daily[$d]->humidity; ?> %</div>
            <div>Wind: <?php echo $citydatajson_HourAndDay->daily[$d]->wind_speed; ?> km/h</div>
        </div>
        </div>