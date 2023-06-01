<?php
  require_once( 'db-config.php' );

  // Get all breeds
  $sql = 'SELECT * FROM breed';
  $query = $pdo->prepare( $sql );
  $query->execute();
  $breeds = $query->fetchAll( PDO::FETCH_ASSOC );

  // Get the selected breed
  $id_breed = isset( $_GET['id'] ) ? $_GET['id'] : -1;
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DogShow PHP</title>
  </head>
  <body>
    <form>
      <?php foreach( $breeds as $breed ): ?>
        <input type="radio" name="breed" value="<?php echo $breed['id_breed']; ?>" <?php if( $breed['id_breed'] == $id_breed ) echo 'checked'; ?>>
        <?php echo $breed['name']; ?>
        <br>
      <?php endforeach; ?>
      <br>
      <input type="submit" value="Vote">
    </form>
    <script src="/js/votes.js"></script>
  </body>
</html>
