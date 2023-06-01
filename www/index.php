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
  <style>
    form {
      display: flex;
      flex-direction: column;
      width: 50%;
      gap: 1rem;
    }
  </style>
  <body>
    <form>
      <select id='id_breed' name='id_breed' required>
        <?php foreach ( $breeds as $breed ) : ?>
          <option value='<?php echo $breed['id_breed']; ?>'><?php echo $breed['name']; ?></option>
        <?php endforeach; ?>
      </select>
      <textarea id='description' name='description' required></textarea>
      <input type='submit' value='Submit'>
    </form>
  </body>
</html>
