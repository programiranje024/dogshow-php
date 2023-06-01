<?php
  require_once( '../db-config.php' );

  $id_breed = $_POST['id_breed'];
  $description = $_POST['description'];

  // Check if we have a valid description, min 8 chars
  if ( !isset( $description ) || strlen( $description ) < 8 ) {
    http_response_code( 400 );
    echo 'Description is required';
    exit;
  }

  // We don't need to check the breed, because that check is done by the database
  // We can just insert the description and the breed id
  $sql = 'INSERT INTO descriptions ( id_breed, description ) VALUES ( :id_breed, :description )';
  $query = $pdo->prepare( $sql );

  if ( !$query ) {
    http_response_code( 500 );
    echo 'Could not prepare query!';
    exit;
  }

  $query->bindParam( ':id_breed', $id_breed, PDO::PARAM_INT );
  $query->bindParam( ':description', $description, PDO::PARAM_STR );

  // Try to execute the query
  if ( !$query->execute() ) {
    http_response_code( 500 );
    echo 'Could not insert description!';
    exit;
  }

  // If we get here, everything went well
  echo 'Description inserted!';
?>
