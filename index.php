<?php 
	require_once('database_connect.php');

	$query = 'SELECT * FROM accounts ORDER BY id';
	$statement = $db->prepare($query);
	$statement->execute();
	$results = $statement->fetchAll();
	$statement->closeCursor();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Todo List</title>
</head>

<body>
	
	<main>
		<?php foreach($results as $oneLine) : ?>
		<div>
			<?php echo $oneLine['FName']; ?>
			<br/><br/>
		</div>
			<?php endforeach; ?>
			</main>
</body>
</html>
