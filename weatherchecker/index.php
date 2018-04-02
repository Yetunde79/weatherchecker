<?php

	$weather = "";
	$error = "";

	if($_GET['city']) {
		$url = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city'])."&units=imperial&appid=85b02faed133856070e3e8a223c71b5f");
		
		$weatherArray = json_decode($url, true);
		
		if($weatherArray['cod'] == 200) {
		
		 $weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. The temperature is ".intval($weatherArray['main']['temp'])."&deg;F and the wind speed is ".$weatherArray['wind']['speed']."m/s.";
		 }
		 else{
			$error = "This city does not exist. Please try again"; 
		 }
		 
	}
	

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Weather</title>
  </head>
  <body>
  
  <div class="container">
    <h1>Weather Checker</h1>
	
  <form>
  <fieldset class="form-group">
    <label for="city">Enter the name of the city to see the weather.</label>
    <input type="text" class="form-control" name="city" id="city" placeholder="Eg. Paris" value = "<?php echo $_GET['city']; ?>">
  </fieldset>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      
          <div id="weather"><?php 
              if ($weather) {   
                echo '<div class="alert alert-success" role="alert">'.$weather.'
</div>';
                  
              } else if ($error) {
                  echo '<div class="alert alert-danger" role="alert">'.$error.'
</div>';
                  
              }
          ?></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>