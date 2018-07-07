<?php 

	 
	 	include_once 'database.php';
		include_once 'feescategory.php';

		$database = new Database();
		$db = $database->getConnection();

		$fees = new FeesCategory($db);
		$result=$fees->readAll();

		
		echo json_encode($result);

	?>
	 