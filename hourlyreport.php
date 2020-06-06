     <?php if($h!=3){ ?> 
          
        <div class="hour-report" >
            <div class="time">
            <div><?php echo date("h:i:s", $citydatajson_HourAndDay->hourly[$h]->dt); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($citydatajson_HourAndDay->hourly[$h]->weather[0]->description); ?></div>
            </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $citydatajson_HourAndDay->hourly[$h]->weather[0]->icon; ?>.png"
                class="weather-icon" /><br>Max-<?php echo $citydatajson_HourAndDay->hourly[$h]->temp; ?>&deg;C<br>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $citydatajson_HourAndDay->hourly[$h]->humidity; ?> %</div>
            <div>Wind: <?php echo $citydatajson_HourAndDay->hourly[$h]->wind_speed; ?> km/h</div>
        </div>
        </div>

         <?php }
      else { ?>
        <div class="last-hour-report">
            <div class="time">
            <div><?php echo date("h:i:s", $citydatajson_HourAndDay->hourly[$h]->dt); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($citydatajson_HourAndDay->hourly[$h]->weather[0]->description); ?></div>
            </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $citydatajson_HourAndDay->hourly[$h]->weather[0]->icon; ?>.png"
                class="weather-icon" /><br>Max-<?php echo $citydatajson_HourAndDay->hourly[$h]->temp; ?>&deg;C<br>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $citydatajson_HourAndDay->hourly[$h]->humidity; ?> %</div>
            <div>Wind: <?php echo $citydatajson_HourAndDay->hourly[$h]->wind_speed; ?> km/h</div>
        </div>
        </div>
     <?php } ?>
      

      