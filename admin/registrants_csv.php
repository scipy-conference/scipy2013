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

$sql_registrants = sprintf( 'SELECT participants.id, registrations.id, last_name AS "Last Name", first_name AS "First Name", email AS "Email Address", affiliation AS "Affiliation", registrations.created_at AS "Registration Date", type AS "Rate", MAX(IF(session_id = "5",amt_paid,"")) AS Conference, MAX(IF(session_id = "6",amt_paid,"")) AS Sprints, MAX(IF(session_id = "4",amt_paid,"")) AS Tutorials, ordernumber AS OrderNum, IF(tshirt_size_id = "5",1,"") AS S, IF(tshirt_size_id = "4",1,"") AS M, IF(tshirt_size_id = "3",1,"") AS L, IF(tshirt_size_id = "2",1,"") AS XL, IF(tshirt_size_id = "1",1,"") AS XXL, SUM(IF(registered_tutorials.talk_id = 100 ,1,"")) AS "NumPy and IPython", SUM(IF(registered_tutorials.talk_id = 101 ,1,"")) AS "Symbolic Computing", SUM(IF(registered_tutorials.talk_id = 102 ,1,"")) AS "Data Processing", SUM(IF(registered_tutorials.talk_id = 103 ,1,"")) AS "Anatomy of Matplotlib", SUM(IF(registered_tutorials.talk_id = 104 ,1,"")) AS "IPython in depth", SUM(IF(registered_tutorials.talk_id = 105 ,1,"")) AS "Cython", SUM(IF(registered_tutorials.talk_id = 106 ,1,"")) AS "Version Control", SUM(IF(registered_tutorials.talk_id = 107 ,1,"")) AS "scikit-learn (I)", SUM(IF(registered_tutorials.talk_id = 108 ,1,"")) AS "Diving into NumPy code", SUM(IF(registered_tutorials.talk_id = 109 ,1,"")) AS "Statistical Data Analysis", SUM(IF(registered_tutorials.talk_id = 110 ,1,"")) AS "Using geospatial data", SUM(IF(registered_tutorials.talk_id = 111 ,1,"")) AS "scikit-learn (II)" FROM registrations LEFT JOIN participants ON participant_id = participants.id LEFT JOIN participant_types ON participant_type_id = participant_types.id LEFT JOIN tshirt_sizes ON tshirt_size_id = tshirt_sizes.id LEFT JOIN registered_sessions ON registration_id = registrations.id LEFT JOIN registered_tutorials ON registered_sessions.id = registered_session_id LEFT JOIN sessions ON session_id = sessions.id WHERE registrations.conference_id = 2 GROUP BY participants.id;');

$result = @mysql_query($sql_registrants, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

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
  header( 'Content-Disposition: attachment;filename=scipy2013_registrants.csv' );
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