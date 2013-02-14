<?php
//===============================================
//  USER AUTHORIZATION                         //
//===============================================
session_start();
if(!isset($_SESSION['formusername'])){
header("location:login.php");
}

//===============================================
// IF SUCCESSFUL PAGE CONTENT                  //
//===============================================

include('../inc/db_conn.php');

//===========================
//  pull total registered
//===========================

$sql_requestors = "SELECT title AS name, name AS room, start_time, (TIME_TO_SEC(end_time) - TIME_TO_SEC(start_time))/60 AS duration, end_time, authors, email AS contact, released, type AS license, talks.id AS conf_key, \"\" AS conf_url, track AS tags FROM schedules LEFT JOIN talks ON schedules.talk_id = talks.id LEFT JOIN presenters ON presenter_id = presenters.id LEFT JOIN license_types ON license_type_id = license_types.id LEFT JOIN locations ON location_id = locations.id WHERE talks.conference_id = 1 ORDER BY start_time, location_id";

$result = @mysql_query($sql_requestors, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

  //
  // execute sql query
  //
  //$query = sprintf( 'SELECT * FROM MYSQL_TABLE' );
  //$result = mysql_query( $query, $conn ) or die( mysql_error( $conn ) );
  //
  // send response headers to the browser
  // following headers instruct the browser to treat the data as a csv file called export.csv
  //
  header( 'Content-Type: text/csv' );
  header( 'Content-Disposition: attachment;filename=scipy2012_sponsorship_requests.csv' );
  //
  // output header row (if atleast one row exists)
  //
  $row = mysql_fetch_assoc( $result );
  if ( $row )
  {
    echocsv( array_keys( $row ) );
  }
  //
  // output data rows (if atleast one row exists)
  //
  while ( $row )
  {
    echocsv( $row );
    $row = mysql_fetch_assoc( $result );
  }
  //
  // echocsv function
  //
  // echo the input array as csv data maintaining consistency with most CSV implementations
  // * uses double-quotes as enclosure when necessary
  // * uses double double-quotes to escape double-quotes 
  // * uses CRLF as a line separator
  //
  function echocsv( $fields )
  {
    $separator = '';
    foreach ( $fields as $field )
    {
      if ( preg_match( '/\\r|\\n|,|"/', $field ) )
      {
        $field = '"' . str_replace( '"', '""', $field ) . '"';
      }
      echo $separator . $field;
      $separator = ',';
    }
    echo "\r\n";
  }
?>