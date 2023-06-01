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

    p.error {
      color: red;
      margin: 0;
    }

    p.error:empty {
      display: none;
    }

    input.error,
    select.error {
      border: 1px solid red;
    }
  </style>
  <body>
    <form>
      <select id='id_breed' name='id_breed' required>
        <?php foreach ( $breeds as $breed ) : ?>
          <option value='<?php echo $breed['id_breed']; ?>'><?php echo $breed['name']; ?></option>
        <?php endforeach; ?>
      </select>
      <p class='error' id='id_breed_error'></p>
      <textarea id='description' name='description' required></textarea>
      <p class='error' id='description_error'></p>
      <input id='submit' type='submit' value='Submit'>
      <p class='error' id='submit_error'></p>
    </form>
    <script src="/js/descriptions.js"></script>
  </body>
</html>
