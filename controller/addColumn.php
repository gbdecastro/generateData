<?php 
	require($_SERVER['DOCUMENT_ROOT'].'/generateData/classes/tableFill.php');

	$objFill = new tableFill();

	$typeColumn = strtolower($_POST['typeColumn']);
	$typeColumn_explode = explode('|', $typeColumn);
	$tabela = strtolower($_POST['nameTableC']);
	$coluna = strtolower($_POST['nameColumn']);
	$fokey = strtolower($_POST['ForeginKey']);

	$response = $objFill->alterTable(
		 $tabela,
		"addC",
		"" ,
		array($coluna." ".$typeColumn_explode[0])
	);


	if(strpos($response, 'added with success')){
		echo $response;
		if($typeColumn_explode[1] == "fk")
			$response2 = $objFill->insertTable($tabela,$coluna,$typeColumn_explode[1],$fokey);
		$response2 = $objFill->insertTable($tabela,$coluna,$typeColumn_explode[1],"");

		if(strpos($response2, 'generated'))
			echo $response2;
		else
			echo $response2;					
	}else{
		echo $response;		
	}
 ?>