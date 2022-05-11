<?php
//date_default_timezone_set('America/Los_Angeles');
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

include('dbconnection.php');

$handle = fopen( "../wind/data/SASP.dat", "r" );

if ( $handle ) {
  $con = new mysqli( $db_hostname, $db_username, $db_password, $db_databasename );


  while ( ( $line = fgets( $handle ) ) !== false ) {

    // process the line read.

    $line_exp = explode( ',', $line );


    if ( array_key_exists( 0, $line_exp ) ) {
      $arrayid = $line_exp[ 0 ];
    }
    if ( array_key_exists( 1, $line_exp ) ) {
      $year = $line_exp[ 1 ];
    }
    if ( array_key_exists( 2, $line_exp ) ) {
      $doy = $line_exp[ 2 ];
    }
    if ( array_key_exists( 3, $line_exp ) ) {
      $hour = $line_exp[ 3 ];
    }
    if ( array_key_exists( 4, $line_exp ) ) {
      $loair_min_c = $line_exp[ 4 ];
    }
    if ( array_key_exists( 5, $line_exp ) ) {
      $loair_min_time = $line_exp[ 5 ];
    }
    if ( array_key_exists( 6, $line_exp ) ) {
      $loair_max_c = $line_exp[ 6 ];
    }
    if ( array_key_exists( 7, $line_exp ) ) {
      $loair_max_time = $line_exp[ 7 ];
    }
    if ( array_key_exists( 8, $line_exp ) ) {
      $lo_rh = $line_exp[ 8 ];
    }
    if ( array_key_exists( 9, $line_exp ) ) {
      $upwind_pgust_ms = $line_exp[ 9 ];
    }
    if ( array_key_exists( 10, $line_exp ) ) {
      $upwind_pgust_time = $line_exp[ 10 ];
    }
    if ( array_key_exists( 11, $line_exp ) ) {
      $upwind_savg_ms = $line_exp[ 11 ];
    }
    if ( array_key_exists( 12, $line_exp ) ) {
      $upwind_uavg_ms = $line_exp[ 12 ];
    }
    if ( array_key_exists( 13, $line_exp ) ) {
      $upwind_dir_uavg = $line_exp[ 13 ];
    }
    if ( array_key_exists( 14, $line_exp ) ) {
      $upwind_dir_stdev = $line_exp[ 14 ];
    }
    if ( array_key_exists( 15, $line_exp ) ) {
      $lowind_pgust_ms = $line_exp[ 15 ];
    }
    if ( array_key_exists( 16, $line_exp ) ) {
      $lowind_pgust_time = $line_exp[ 16 ];
    }
    if ( array_key_exists( 17, $line_exp ) ) {
      $lowind_savg_ms = $line_exp[ 17 ];
    }
    if ( array_key_exists( 18, $line_exp ) ) {
      $lowind_uavg_ms = $line_exp[ 18 ];
    }
    if ( array_key_exists( 19, $line_exp ) ) {
      $lowind_dir_uavg = $line_exp[ 19 ];
    }
    if ( array_key_exists( 20, $line_exp ) ) {
      $lowind_dir_stdev = $line_exp[ 20 ];
    }
    if ( array_key_exists( 21, $line_exp ) ) {
      $pydwn_unfilt_w = $line_exp[ 21 ];
    }
    if ( array_key_exists( 22, $line_exp ) ) {
      $pydwn_filt_w = $line_exp[ 22 ];
    }
    if ( array_key_exists( 23, $line_exp ) ) {
      $pyup_unfilt_w = $line_exp[ 23 ];
    }
    if ( array_key_exists( 24, $line_exp ) ) {
      $pyup_filt_w = $line_exp[ 24 ];
    }
    if ( array_key_exists( 25, $line_exp ) ) {
      $pyup_shad_w = $line_exp[ 25 ];
    }
    if ( array_key_exists( 26, $line_exp ) ) {
      $pyrgeom_w = $line_exp[ 26 ];
    }
    if ( array_key_exists( 27, $line_exp ) ) {
      $sno_ir_c = $line_exp[ 27 ];
    }
    if ( array_key_exists( 28, $line_exp ) ) {
      $sno_gd_c = $line_exp[ 28 ];
    }
    if ( array_key_exists( 29, $line_exp ) ) {
      $sno_10cm_c = $line_exp[ 29 ];
    }
    if ( array_key_exists( 30, $line_exp ) ) {
      $sno_20cm_c = $line_exp[ 30 ];
    }
    if ( array_key_exists( 31, $line_exp ) ) {
      $sno_30cm_c = $line_exp[ 31 ];
    }
    if ( array_key_exists( 32, $line_exp ) ) {
      $sno_height_m = $line_exp[ 32 ];
    }
    if ( array_key_exists( 33, $line_exp ) ) {
      $sys_volts = $line_exp[ 33 ];
    }
    if ( array_key_exists( 34, $line_exp ) ) {
      $array_tot_h2o = $line_exp[ 34 ];
    }
    if ( array_key_exists( 35, $line_exp ) ) {
      $day_h2o_mm = $line_exp[ 35 ];
    }
    if ( array_key_exists( 36, $line_exp ) ) {
      $seasn_h2o_mm = $line_exp[ 36 ];
    }
	 if ( array_key_exists( 37, $line_exp ) ) {
      $baro_inhg = $line_exp[ 37 ];
    }
    if ( array_key_exists( 37, $line_exp ) ) {
      $loair_avg_c = $line_exp[ 37 ];
    }
    if ( array_key_exists( 38, $line_exp ) ) {
      $soil_flux_w = $line_exp[ 38 ];
    }
    if ( array_key_exists( 39, $line_exp ) ) {
      $soil_surf_c = $line_exp[ 39 ];
    }
    if ( array_key_exists( 40, $line_exp ) ) {
      $soil_10cm_c = $line_exp[ 40 ];
    }
    if ( array_key_exists( 41, $line_exp ) ) {
      $soil_20cm_c = $line_exp[ 41 ];
    }
    if ( array_key_exists( 42, $line_exp ) ) {
      $soil_40cm_c = $line_exp[ 42 ];
    }
    if ( array_key_exists( 43, $line_exp ) ) {
      $soil_vwc = $line_exp[ 43 ];
    }
    if ( array_key_exists( 44, $line_exp ) ) {
      $upair_min_c = $line_exp[ 44 ];
    }
    if ( array_key_exists( 45, $line_exp ) ) {
      $upair_min_time = $line_exp[ 45 ];
    }
    if ( array_key_exists( 46, $line_exp ) ) {
      $upair_max_c = $line_exp[ 46 ];
    }
    if ( array_key_exists( 47, $line_exp ) ) {
      $upair_max_time = $line_exp[ 47 ];
    }
    if ( array_key_exists( 48, $line_exp ) ) {
      $up_rh = $line_exp[ 48 ];
    }
    if ( array_key_exists( 49, $line_exp ) ) {
      $upair_avg_c = $line_exp[ 49 ];
    }
    
	  

    $stmt = $con->prepare( "INSERT INTO swamp_angel(`arrayid`, `year`, `doy`, `hour`, `loair_min_c`, `loair_min_time`, `loair_max_c`, `loair_max_time`, `lo_rh`, `upwind_pgust_ms`, `upwind_pgust_time`, `upwind_savg_ms`, `upwind_uavg_ms`, `upwind_dir_uavg`, `upwind_dir_stdev`, `lowind_pgust_ms`, `lowind_pgust_time`, `lowind_savg_ms`, `lowind_uavg_ms`, `lowind_dir_uavg`, `lowind_dir_stdev`, `pydwn_unfilt_w`,	`pydwn_filt_w`,	`pyup_unfilt_w`, `pyup_filt_w`,	 `pyup_shad_w`,	`pyrgeom_w`, `sno_ir_c`, `sno_gd_c`, `sno_10cm_c`, `sno_20cm_c`, `sno_30cm_c`,	`sno_height_m`,	`sys_volts`, `array_tot_h2o`, `day_h2o_mm`,	`seasn_h2o_mm`,`baro_inhg`,	`loair_avg_c`,	`soil_flux_w`,	`soil_surf_c`, `soil_10cm_c`, `soil_20cm_c`, `soil_40cm_c`,	`soil_vwc`,	`upair_min_c`, `upair_min_time`, `upair_max_c`,	`upair_max_time`, `up_rh`, `upair_avg_c`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)" );
    $stmt->bind_param( "iiiidididdidddddiddddddddddddddddddiidddddddddididd", $arrayid, $year, $doy, $hour, $loair_min_c, $loair_min_time, $loair_max_c, $loair_max_time, $lo_rh, $upwind_pgust_ms, $upwind_pgust_time, $upwind_savg_ms, $upwind_uavg_ms, $upwind_dir_uavg, $upwind_dir_stdev, $lowind_pgust_ms, $lowind_pgust_time, $lowind_savg_ms, $lowind_uavg_ms, $lowind_dir_uavg, $lowind_dir_stdev, $pydwn_unfilt_w, $pydwn_filt_w, $pyup_unfilt_w, $pyup_filt_w, $pyup_shad_w, $pyrgeom_w, $sno_ir_c, $sno_gd_c, $sno_10cm_c, $sno_20cm_c, $sno_30cm_c, $sno_height_m, $sys_volts, $array_tot_h2o, $day_h2o_mm, $seasn_h2o_mm, $baro_inhg, $loair_avg_c, $soil_flux_w, $soil_surf_c, $soil_10cm_c, $soil_20cm_c, $soil_40cm_c, $soil_vwc, $upair_min_c, $upair_min_time, $upair_max_c, $upair_max_time, $up_rh, $upair_avg_c);
    $stmt->execute();

  }
  $Dquery = "DELETE FROM swamp_angel WHERE year < 2022";	
  $result = mysqli_query($con, $Dquery);

  
  $stmt->close();
  fclose( $handle );


  $to = 'hurlmat@gmail.com';
  $subject = 'FAIL!';
  $message = 'oops something went wrong with the Swamp Angel dat upload.';
  $from = 'beebop@yada.com';

  
} else {
  echo "error opening the file.";
// Sending email
  if ( mail( $to, $subject, $message ) ) {
    echo 'oops something went wrong with the da upload.';
  } else {
    echo 'Unable to send email. Please try again.';
  }
	
}

?>
<html>
<head>
<title>Swamp Angel</title>

<div>Swamp Angel</div>
</head>
</html>