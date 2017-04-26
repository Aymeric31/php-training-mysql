<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<?php
	$host_db = 'localhost';
	$name_db = 'reunion_island';
	$user_db = 'root';
	$pass_db = 'root';
	try {
		$connection = new PDO("mysql:host=$host_db; dbname=$name_db;charset=utf8", $user_db, $pass_db);
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
	$id = $_GET['id'];
	$rando = "SELECT * FROM `hiking` WHERE `id`=".$id;
	foreach($connection->query($rando) as $row) {
		$name = $row['name'];
		$difficulty = $row['difficulty'];
		$duration = $row['duration'];
		$distance = $row['distance'];
		$height_difference = $row['height_difference'];
	}
	?>
	<a href="/php-pdo/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">

				<option <?php if ($difficulty=="très facile"){echo " selected "; } ?> value="très facile">Très facile</option>
				<option <?php if ($difficulty=="facile"){echo " selected "; } ?> value="facile">Facile</option>
				<option <?php if ($difficulty=="très facile"){echo " selected "; } ?> value="moyen">Moyen</option>
				<option <?php if ($difficulty=="très facile"){echo " selected "; } ?> value="difficile">Difficile</option>
				<option <?php if ($difficulty=="très facile"){echo " selected "; } ?> value="très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $distance; ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo $duration; ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $height_difference; ?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>

</body>
</html>
