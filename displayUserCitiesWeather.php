<body style="align-content: center">
<div class="row" >

		<?php $citiesWeather=$citydatajson->list;
			foreach ($citiesWeather as $citydatajson) {?>
	<div class="col" style="float: left;">
				 <?php include('displaycityweather.php');?> 
				 </div>
		<?php	}
		?>
		
	
	<div>
		
	</div>

</div>
</body>