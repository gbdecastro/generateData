<?php 
	require($_SERVER['DOCUMENT_ROOT'].'/generateData/classes/tableFill.php');

	$objFill = new tableFill();

	$response = $objFill->alterTable($_POST['nameTableDrop'],
									 "dropC",
									 "",
									 array($_POST['nameColumnDrop']));
	echo $response;
 ?>