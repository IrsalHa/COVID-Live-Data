<?php

function http_request($url){

    $ch = curl_init(); 

  
    curl_setopt($ch, CURLOPT_URL, $url);
    
  
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

   
    $output = curl_exec($ch); 

    curl_close($ch);      

  
    return $output;
}


$data = http_request("https://api.kawalcorona.com");
$data = json_decode($data, TRUE);

$positif = http_request("https://api.kawalcorona.com/positif/");
$positif = json_decode($positif, TRUE);

$sembuh = http_request("https://api.kawalcorona.com/sembuh/");
$sembuh = json_decode($sembuh, TRUE);

$meninggal = http_request("https://api.kawalcorona.com/meninggal/");
$meninggal = json_decode($meninggal, TRUE);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

    <title>COVID-19 Live Data </title>
    <style>
        .judul {
            font-family: "Poppins-Regular";
        }
    </style>
</head>

<body>




<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
            <p class="judul text-center h2">COVID-19 Live Data </p>
            <br>
					<div class="table">
                    
						<div class="row header">
							<div class="cell">
							Data Global
							</div>
							<div class="cell">
								Positif
							</div>
							<div class="cell">
								Sembuh
							</div>
							<div class="cell">
								Meninggal
							</div>
						</div>
                        
						<div class="row">
                    
							<div class="cell" data-title="Data Global">
                               
                               
							</div>
							<div class="cell" data-title="Positif">
                            <?php echo $positif["value"] ?>
							</div>
							<div class="cell" data-title="Sembuh">
                            <?php echo $sembuh["value"] ?>
							</div>
							<div class="cell" data-title="Meninggal">
							<?php echo $meninggal["value"] ?>
                            </div>
                         
                        </div>
                    
                    </div>
                    
                    <br>
                    <div class="table">
                    
						<div class="row header">
                            <div class="cell">    
                            Indonesia
							</div>
							<div class="cell">
								Positif
							</div>
							<div class="cell">
								Sembuh
							</div>
							<div class="cell">
								Meninggal
							</div>
						</div>
						<div class="row">
                        <?php foreach ($data[70] as $data1) { ?>
							<div class="cell" data-title="Data Indonesia">
                           
                               
							</div>
                            
                            <div class="cell" data-title="Positif">
                            <?php echo $data1["Confirmed"] ?>
                            </div>
                            
                            <div class="cell" data-title="Sembuh">
                            <?php echo $data1["Recovered"] ?>
                            </div>
                            
                            <div class="cell" data-title="Meninggal">
                            <?php echo $data1["Deaths"] ?>
							</div>


                            <?php } ?>
                         
                        </div>
                    
                    </div>
                    <br>
                            <p class="judul justify-content-center text-center">#StayAtHome <br> made with ❤️ by Irsal.<br> API Data from kawalcorona.com</p>
                    

			</div>
		</div>
	</div>

<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>