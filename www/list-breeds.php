<?php
  require_once( 'db-config.php' );

  // Get all breeds
  $sql = 'SELECT * FROM breed';
  $query = $pdo->prepare( $sql );
  $query->execute();
  $breeds = $query->fetchAll( PDO::FETCH_ASSOC );
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DogShow PHP</title>
  </head>
  <body>
    <ul>
      <?php foreach( $breeds as $breed ): ?>
        <li>
          <a href="votes.php?id=<?php echo $breed['id_breed']; ?>">
            <?php echo $breed['name']; ?>
          </a>
        </li>
      <?php endforeach; ?>
  </body>
</html>
