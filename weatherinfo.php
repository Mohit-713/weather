  <div align="right" style="margin-top: 5px;margin-right: 5px">
    <a href="index.php?logout=1"><input type="button" name="test" id="logout" value="logout"  ></a>
  </div>
<?php

include('db/connection.php');
include('fetchcity.php');
if (count($dbcities) > 0) {

    $citylist=array();
    $i=0;
    foreach ($dbcities as $city) {
                //if($city['alert']=='yes')
        $citylist[$i++]=$city['cityid'];
    }
   //
    $cities=join(",",$citylist);
 }
 else{

   echo $nocity;
}
include('callapi.php');

if(isset($cities)&&$cities!='')
{
  include('displayUserCitiesWeather.php');  
}
else    
    include('displaycityweather.php');
?>

