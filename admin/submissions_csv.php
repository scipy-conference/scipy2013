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

$sql_submissions = "SELECT ";
$sql_submissions .= "title, ";
$sql_submissions .= "author, ";
$sql_submissions .= "email, ";
$sql_submissions .= "affiliation, ";
$sql_submissions .= "description, ";
$sql_submissions .= "presentation_preference, ";
$sql_submissions .= "prepare_paper, ";
$sql_submissions .= "main_track, ";
$sql_submissions .= "specific_session, ";
$sql_submissions .= "date_submitted ";
$sql_submissions .= "FROM talk_submissions";

$result = @mysql_query($sql_submissions, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

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
  header( 'Content-Disposition: attachment;filename=scipy2012_talk_submissions.csv' );
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