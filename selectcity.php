<?php
 $myid="for_crud";
 include('managecity.php') ?>
<html>
 <head>
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div align="right" style="margin-top: 5px;margin-right: 5px">
        <a href="home.php?logout='1'" style="color: red;">
          <input type="button" name="test" value="Logout" "></a>
        </div>
  <div class="container" style="width:auto;height:auto;">
  <div> <h4 align="center"><b>You can select your favourite five cities </b></h4>

  </div><br />
   <?php include('error/error.php'); 
    if($insertdata != "")
    {
   ?>
   <p style="background-color: green">
   <?php
   echo $insertdata."</p>";}
   ?>
    

   <div class="row">
    <div class="col-sm-3 input-lg">Select country:
    </div>
    <div class="col-sm-9"><select name="country" id="country" class="form-control input-lg">
                             <option value="">Select country</option>
                           </select>
      </div>
    </div>
   <br />
  <div class="row">
    <div class="col-sm-3 input-lg">
   Select city:</div>
   <div class="col-sm-9">
    <select name="city" id="city" class="form-control input-lg" >
    <option value="">Select city</option>
   </select></div></div>
      <form method="post" action="home.php" name="savecity" onsubmit = "return validation()" >
     
      <br><div class="col-sm-12" style="" align="right">
      <button class="btn" type="submit" name="save" align="center">Save</button><br>
      </div><br>
     
        <input type="hidden" name="country_name" id="country_name" value=""  /><br>
        <input type="hidden" name="cities_id" id="cities_id" value="" >
        <input type="hidden" id="cities_names" name="cities_names"   >    
     
  </form>

  </div>

  <?php 
  $myid="for_display";
    include('managecity.php')
  ?>
  
 </body>
</html>

<script>
$(document).ready(function(){

  load_json_data('country');

 function load_json_data(id, country_id)
 {
  var html_code = '';
  $.getJSON('citiesdata/citylist.json', function(data){

   html_code += '<option value="">Select '+id+'</option>';
   var countries=[];
   $.each(data, function(key, value){
    if(id == 'country')
    { 
      
      if(countries.indexOf(value.country) == -1)
      {
      html_code += '<option value="'+value.country+'">'+value.country+'</option>';
      countries.push(value.country);
      }
    }
    else
    {
     if(value.country == country_id)
     {
      html_code += '<option value="'+value.id+'">'+value.name+'</option>';
     }
    }
   });
   $('#'+id).html(html_code);
  });

 }

 $(document).on('change', '#country', function(){
  var country_id = $(this).val();
  if(country_id != '')
  {
   load_json_data('city', country_id);
   $("#country_name").val(" "+country_id);
  }
  else
  {
   $('#city').html('<option value="">Select city</option>');
  }

 });
 
});

$("#city").change(function(){

      
        var city_ids = [];
        var city_names =[];
        $.each($("#city option:selected"), function(){            
            city_ids.push($(this).val());
            city_names.push($(this).text());
        });
        

        if ($("#city option:selected").length > 5) {
        $(this).removeAttr("selected");
        city_ids.pop($(this).val());
        city_names.pop($(this).text());
        alert('You can select upto 5 options only');
        }
        $("#cities_id").val(city_ids.join(","));
         $("#cities_names").val(city_names.join("\n"));
        
        //alert("You have selected the country - " + countries.join(", "));
    });

  function validation()  
            {  
                var country_name=document.savecity.country_name.value;  
                var cities_names=document.savecity.cities_names.value;  
                if(country_name.length=="" && cities_names.length=="") {  
                    alert("country Name and city names are not selected");  
                    return false;  
                }  
                else  
                {  
                    if(country_name.length=="") {  
                        alert("country Name is not selected");  
                        return false;  
                    }   
                    if (cities_names.length=="") {  
                    alert("city name is not selected");  
                    return false;  
                    }  
                }                             
            }  

/*parent.child.location.reload();*/

</script>
