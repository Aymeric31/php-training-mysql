<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Randonnées</title>
  <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <h1>Liste des randonnées</h1>
  <table>
    <?php
    $host_db = 'localhost';
    $name_db = 'reunion_island';
    $user_db = 'root';
    $pass_db = 'root';

    try {
  // Connecting using the PDO object.
      $connection = new PDO("mysql:host=$host_db; dbname=$name_db", $user_db, $pass_db);

  // Setting the query and runnin it...
      $sql = "SELECT * FROM `hiking` WHERE `id`";
      $result = $connection->query($sql);

  // Iterating over the data and printing it.
      foreach($result as $row) {
        echo utf8_encode( $row['id']. ' - '. $row['name']. ' - '. $row['difficulty']. ' - '. $row['duration']. '<br />');
      }
  // Closing the connection.
      $connection = null;
    }
// Catching it if something went wrong.
    catch(PDOException $e) {
      echo $e->getMessage();
    }
    ?>
  </table>
</body>
</html>
