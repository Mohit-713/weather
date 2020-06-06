<?php 
   /*if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }*/

?>

<!doctype html>
<html>
<head>
<title>Forecast Weather using OpenWeatherMap with PHP</title>

<style>
body {
    font-family: Arial;
    font-size: 0.95em;
    color: #929292;
}

.report-container {
    /*border: #E0E0E0 1px solid;*/
    padding: 20px 5px 40px 5px;
    border-radius: 2px;
    width: 300px;
    height:350px; 
    margin: 40px;
    margin-left: 20px;
}
.report
{
    padding: 60px 5px 40px 30px;
    
}
.day-report
{
    padding: 60px 5px 100px 30px;
    width: 850px;
    height:350px; 
}
.hour-report
{
    float: left;
    margin-left: 20px;
    margin-right: 20px;
}
.last-hour-report
{
     margin-left: 30px;
}

.weather-icon {
    vertical-align: middle;
    margin-right: 20px;
}

.weather-forecast {
    color: #212121;
    font-size: 1.2em;
    font-weight: bold;
    margin: 20px 0px;
}

span.min-temperature {
    color: #929292;
}

.time {
    line-height: 25px;
}
</style>

</head>
<body>
    <?php 
    
        include("callapi.php");
        $currentTime = time();
    ?>  
        <div>
             <div align="left" style="margin-top: 5px;margin-right: 5px;float: left">
            <a href="home.php" style="color: red;">
            <input type="button" name="test" value="home" "></a>
        </div>  
            <div align="right" style="margin-top: 5px;margin-right: 5px">
            <a href="home.php?logout='1'" style="color: red;">
            <input type="button" name="test" value="Logout" "></a>
        </div> 
        </div> 
        <div>
            <div style="float: left;padding-left: 60px;">
                <div class="report-container" style="padding-left: 60px;">
                    <h2><?php echo $citydatajson->name; ?> Weather Status</h2>
                     <?php include("currentweather.php");?>
                </div>
            </div>
            <div class="report" style="padding-left: 60px;margin-left: 30px;">
                <h2><?php echo $citydatajson->name; ?>'s 3 Hour Weather Status</h2>
                <div>
                    <?php for($h=1;$h<4;$h++){include("hourlyreport.php");   } ?>
                </div>
            </div>
        </div><br><br>
        <div class="day-report" style="padding-left: 200px;" align="center">
            <h2><?php echo $citydatajson->name; ?>'s 5 day Weather Status</h2>
            <?php for($d=0;$d<5;$d++){ include("daywisereport.php"); }?>
        </div>


   
</body>
</html>







        
        
       