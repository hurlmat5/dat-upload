<?php
	
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

include('dbconnection.php');
$data1 = "";
$data2 = "";
$myLables = "";
$link = mysqli_connect( $db_hostname, $db_username, $db_password, $db_databasename );

if ( $link === false ) {
  die( "ERROR: Could not connect. "
    . mysqli_connect_error() );
}
$sql = "SELECT * FROM (SELECT * FROM swamp_angel WHERE year=2022 AND arrayid=301 ORDER BY swamp_angel_id DESC LIMIT 30) sub ORDER BY swamp_angel_id ASC";

date_default_timezone_set('America/Denver');
if ( $res = mysqli_query( $link, $sql ) ) {
  if ( mysqli_num_rows( $res ) > 0 ) {

//loop through the returned data
while ( $row = mysqli_fetch_array( $res ) ) {
		$data1 = $data1 . '"'. $row['loair_min_c'].'",';
		$data2 = $data2 . '"'. $row['loair_max_c'] .'",';
		$myLables = $myLables . '"'. $row['hour'] .'",';
		}
	mysqli_free_result( $res );
		
  } else {
    echo "No matching records are found.";
  }
} else {
  echo "ERROR: Could not able to execute $sql. "
    . mysqli_error( $link );
}

mysqli_close( $link );

	$data1 = trim($data1,",");
	$data2 = trim($data2,",");
	$myLables = trim($myLables,",");



?>

<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<title>Swamp Angel Data</title>

		<style type="text/css">			
			body{
				font-family: Arial;
			    margin: 80px 100px 10px 100px;
			    padding: 0;
			    color: #999;
			    text-align: center;
			    background: #ffffff;
			}

			.container {
				color: #999;
				background: #fff;
				border: #ffffff 1px solid;
				padding: 10px;
			}
		</style>

	</head>

	<body>	   
	    <div class="container">	
	    <h1>Swamp Angel Study Plot</h1><br /><h2>Minimum Air Temperature (C°), Lower&nbsp; | &nbsp;Maximum Air Temperature (C°), Lower</h2>        
			<canvas id="chart" style="width: 100%; height: 65vh; background: #fff; border: 1px solid #fff; margin-top: 10px;"></canvas>

			<script>
				var ctx = document.getElementById("chart").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [<?php echo $myLables; ?>],
		            datasets: 
		            [{
		                label: 'loair_min_c',
		                data: [<?php echo $data1; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
		                borderWidth: 1
		            },
{
		                label: 'loair_max_c',
		                data: [<?php echo $data2; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(0,255,255)',
						fill: true,
		                borderWidth: 1
		            }]
		        },
		     
		        options: {
		         
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: '#999', fontSize: 16}},
                    scales: {
                          xAxes: [{

                                  scaleLabel: {
                                  display: true,
                                  labelString: 'Hour'}

                              }],
                        yAxes: [{

                                  scaleLabel: {
                                  display: true,
                                  labelString: 'Temperature (C)'}

                              }]
                    }
                    
		        }
		    });
			</script>
	    </div>
		
		
		
		
		
	    
	</body>
</html>