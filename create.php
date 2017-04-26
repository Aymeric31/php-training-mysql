<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/php-pdo/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="test">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="7">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="2">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="3">
		</div>
		<button type="submit" name="button">Envoyer</button>
		<?php 
		// $host_db = 'localhost';
		// $name_db = 'reunion_island';
		// $user_db = 'root';
		// $pass_db = 'root';

		// try {
		// 	$dbh = new PDO("mysql:host=$host_db; dbname=$name_db", $user_db, $pass_db);

		// }
		// catch(PDOException $e) {
		// 	echo $e->getMessage();
		// }
		if ($connection){
			echo 'connecté';
		}else{
			echo 'nope';
		}
		if (isset($_POST['button'])) {
			$name = $_POST['name'];
			$distance = intval($_POST['distance']);
			$duration = $_POST['duration'];
			$difficulty = $_POST['difficulty'];
			$height_difference = intval($_POST['height_difference']);
			// echo $name;
			// echo $distance;
			// echo $difficulty;
			// echo $duration;
			// echo $height_difference;

			$sth = $connection->prepare('INSERT INTO hiking(name,difficulty,distance,duration,height_difference) VALUES(:name,:difficulty,:distance,:duration,:height_difference);');
			$res = $sth->execute(array(
				':name' => $name,
				':difficulty'=> $difficulty,
				':distance' => $distance,
				':duration'=> $duration,
				':height_difference'=> $height_difference 
				));
			var_dump($res);
			// if(!$res){
			// 	echo "yolo eror";
			// }else{
			// 	echo "ajout randonné";
			// }
		}
		?>
	</form>
</body>
</html>
