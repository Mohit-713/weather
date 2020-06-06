<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <style type="text/css">
        .wrapper{
            width: 550px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        tr
        {
            margin-bottom: 25px;
        }

    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();  

        });

    </script>
</head>
<body>
    <div class="wrapper" >
        <div class="container-fluid">
            <div >
                <hr>
                <div style="float: left;">
                    
                    <h4 align="center"><b>Your selected cities list</b></h4>
                    <div style="float: left;">
                    <?php
                            echo "<table  border='3px'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th >No.</th>";
                                        echo '<th width="100" >Name</th>';
                                        echo "<th >country</th>";
                                        echo "<th >Email Alert</th>";
                                        echo "<th >Alert on/off</th>";
                                        echo "<th  >&nbsp
                                            <span class='glyphicon glyphicon-trash'></span>&nbsp
                                        </th>";
                                         echo "<th >Show Weather</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                    $count=1;
                                foreach ($dbcities as $city) {
                                    echo "<tr>";
                                        echo "<td>" . $count++ . "</td>";
                                        echo "<td>" . $city['cityname'] . "</td>";
                                        echo "<td>" . $city['country'] . "</td>";
                                        echo "<td>";
                                            echo "&nbsp<span class='glyphicon glyphicon-envelope'></span>&nbsp";
                                            if($city['alert']=='no')
                                                echo "&nbsp<span class='glyphicon glyphicon-remove-circle'></span>&nbsp"; 
                                            else
                                                echo "&nbsp<span class='glyphicon glyphicon-ok-circle'></span>&nbsp";
                                        echo "</td>";
                                        echo "<td style='padding-left:15px;padding-bottom: 3px;padding-top: 3px'>";
                                            if($city['alert']=='no')
                                            echo "<a href='home.php?op=1&status=1&id=". $city['id'] ."' title='ON/OFF Email Alert' data-toggle='tooltip'> <button  id='on' class='btn'
                                                type='submit' name='save' align='center' >&nbspON&nbsp</button></a>";
                                            else
                                            echo "<a href='home.php?op=1&status=0&id=". $city['id'] ."' title='ON/OFF Email Alert' data-toggle='tooltip'> <button  id='off'class='btn' type='submit' name='save' align='center'>OFF</button></a>";
                                        echo "</td>";
                                        echo "<td>";

                                            echo "<a href='home.php?op=2&id=". $city['id'] ."' title='remove form favourite cities' data-toggle='tooltip'>&nbsp<span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                        echo "<td style='padding-left:35px;'>";

                                            echo "<a href='displaycityweather.php?id=". $city['cityid'] ."' title='show weather forecast' data-toggle='tooltip'><span 
                                            class='glyphicon glyphicon-eye-open'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                } 
                                echo "</tbody>";                            
                            echo "</table>";

                    ?>
                    </div>
                    <div align="center" style="padding: 100px;margin: 20px;">
                    <a href='home.php?sendalert=1' title='Send email alert' data-toggle='tooltip'>
                            <input type='button' name=sendalert value='Send email'></a>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>