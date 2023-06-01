<?php
require_once( '../db-config.php' );

$id_breed = $_POST['id_breed'];

// Check if we have set the parameter
if( !isset( $id_breed ) ) {
  http_response_code( 400 );
  echo 'Missing parameter';
  exit;
}

// Insert the vote, but if the vote already exists, update it
$sql = 'SELECT * FROM votes WHERE id_breed = :id_breed';
$query = $pdo->prepare( $sql );
$query->execute( [ ':id_breed' => $id_breed ] );

$votes = $query->fetchAll( PDO::FETCH_ASSOC );

$sql = 'INSERT INTO votes ( id_breed, votes ) VALUES ( :id_breed, 1 )';

if( count( $votes ) > 0 ) {
  $sql = 'UPDATE votes SET votes = votes + 1 WHERE id_breed = :id_breed';
}

$query = $pdo->prepare( $sql );
$query->execute( [ ':id_breed' => $id_breed ] );

