<?php
	require($_SERVER['DOCUMENT_ROOT'].'/generateData/classes/tableFill.php');
	require($_SERVER['DOCUMENT_ROOT'].'/generateData/api/simple_html_dom.php');

//	error_reporting(0);


	//ACCESS CONTROL
	try {
		$a = new PDO(DB_TYPE.':host=' . DB_HOST . ';port='.DB_PORT.';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
	} catch (PDOException $e) {
		unset($a);
		header('location: http://localhost/generateData/');
	}
	
	//API
	if(isset($_POST['instalarApiNames'])):
		if(DB_TYPE=='pgsql'){
			$dbh = DB::prepare("SELECT table_name FROM information_schema.tables
								WHERE table_schema = 'public' 
								AND table_name LIKE 'names_br'");
		}
		if(DB_TYPE=='mysql'){
			$dbname = DB_NAME;
			$dbh = DB::prepare("SELECT TABLE_NAME
						        FROM information_schema.TABLES
						        WHERE TABLE_SCHEMA = '$dbname'
						        AND TABLE_NAME LIKE 'names_br'");
		}
		$dbh->execute();
		if($dbh->rowCount()==0):
			$sql = DB::prepare('CREATE TABLE IF NOT EXISTS names_br (id SERIAL PRIMARY KEY, name VARCHAR(24))');
			$sql->execute();
				
			$x = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/generateData/api/tabelaN.html');
			$html = str_get_html($x);
			$a = 0;
			foreach($html->find('tr') as $row) {
				$menina = $row->find('td',1)->plaintext;
				$menino = $row->find('td',2)->plaintext;
				if($a>1){
				    $stmt = DB::prepare("INSERT INTO names_br(name) VALUES(:name)");
				    $stmt->bindParam(":name",$menina);
				    $stmt->execute();
				    $stmt = DB::prepare("INSERT INTO names_br(name) VALUES(:name)");
				    $stmt->bindParam(":name",$menino);
				    $stmt->execute();
				}  
			    $a++;
			}

			$sucesso="API Names instalada com Sucesso";
		else:
			$erro="API Names já está instalada";
		endif;
	endif;


	if(isset($_POST['instalarApiContries'])):
		if(DB_TYPE=='pgsql'){
			$dbh = DB::prepare("SELECT table_name FROM information_schema.tables
								WHERE table_schema = 'public' 
								AND table_name LIKE 'country'");
		}
		if(DB_TYPE=='mysql'){
			$dbname = DB_NAME;
			$dbh = DB::prepare("SELECT TABLE_NAME
						        FROM information_schema.TABLES
						        WHERE TABLE_SCHEMA = '$dbname'
						        AND TABLE_NAME LIKE 'country'");
		}
		$dbh->execute();
		if($dbh->rowCount()==0):

			$sql = DB::prepare('CREATE TABLE IF NOT EXISTS country (id SERIAL PRIMARY KEY, name VARCHAR(34))');
			$sql->execute();
				
			$x = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/generateData/api/Countries.html');
			$html = str_get_html($x);

			foreach($html->find('li') as $row) {
				$name=$row->plaintext;
				$stmt = DB::prepare('INSERT INTO country(name) VALUES(:name)');
			    $stmt->bindParam(":name",$name);
			    $stmt->execute();
			}
			$sucesso="API Contries instalada com Sucesso";
		else:
			$erro="API Contries já está instalada";
		endif;
	endif;

	if(isset($_POST['instalarApiUFS'])):
		if(DB_TYPE=='pgsql'){
			$dbh = DB::prepare("SELECT table_name FROM information_schema.tables
								WHERE table_schema = 'public' 
								AND table_name LIKE 'uf_br'");
		}
		if(DB_TYPE=='mysql'){
			$dbname = DB_NAME;
			$dbh = DB::prepare("SELECT TABLE_NAME
						        FROM information_schema.TABLES
						        WHERE TABLE_SCHEMA = '$dbname'
						        AND TABLE_NAME LIKE 'uf_br'");
		}
		$dbh->execute();
		if($dbh->rowCount()==0):
			$sql = DB::prepare('CREATE TABLE IF NOT EXISTS uf_br (id SERIAL PRIMARY KEY, uf VARCHAR(24), uf_n VARCHAR(2))');
			$sql->execute();
				
			$x = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/generateData/api/tabelaUF.html');
			$html = str_get_html($x);

			foreach($html->find('tr') as $row) {
				$uf = $row->find('td',0)->plaintext;
				$uf_n = $row->find('td',1)->plaintext;
				
			    $stmt = DB::prepare("INSERT INTO uf_br(uf, uf_n) VALUES(:uf, :uf_n)");
			    $stmt->bindParam(":uf",$uf);
				$stmt->bindParam(":uf_n",$uf_n);
			    $stmt->execute();
			    
			}
			$sucesso="API UFs instalada com Sucesso";
		else:
			$erro="API UFs já está instalada";
		endif;
	endif;

	if(isset($_POST['instalarApiGenerate'])):
		if(DB_TYPE=='pgsql'){
			$dbh = DB::prepare("SELECT table_name FROM information_schema.tables
								WHERE table_schema = 'public' 
								AND table_name LIKE 'dictionary'");
		}
		if(DB_TYPE=='mysql'){
			$dbname = DB_NAME;
			$dbh = DB::prepare("SELECT TABLE_NAME
						        FROM information_schema.TABLES
						        WHERE TABLE_SCHEMA = '$dbname'
						        AND TABLE_NAME LIKE 'dictionary'");
		}
		$dbh->execute();
		if($dbh->rowCount()==0):
			$sql = DB::prepare('CREATE TABLE IF NOT EXISTS dictionary (id SERIAL PRIMARY KEY, nameTable VARCHAR(24), countGenerate INT)');
			$sql->execute();
			$sucesso="API Generate Data Automatic instalada com Sucesso";
		else:
			$erro="API Generate Data Automatic já está instalada";
		endif;
	endif;		

	if(isset($_POST['instalarApiDogsName'])):
		if(DB_TYPE=='pgsql'){
			$dbh = DB::prepare("SELECT table_name FROM information_schema.tables
								WHERE table_schema = 'public' 
								AND table_name LIKE 'c_name'");
		}
		if(DB_TYPE=='mysql'){
			$dbname = DB_NAME;
			$dbh = DB::prepare("SELECT TABLE_NAME
						        FROM information_schema.TABLES
						        WHERE TABLE_SCHEMA = '$dbname'
						        AND TABLE_NAME LIKE 'c_name'");
		}
		$dbh->execute();
		if($dbh->rowCount()==0):
			$sql = DB::prepare('CREATE TABLE IF NOT EXISTS c_name (id SERIAL PRIMARY KEY, name VARCHAR(24))');
			$sql->execute();
				
			$x = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/generateData/api/dogs.html');
			$html = str_get_html($x);

			foreach($html->find('td') as $row) {
				$name = $row->plaintext;
			    $stmt = DB::prepare("INSERT INTO c_name(name) VALUES(:name)");
			    $stmt->bindParam(":name",$name);
			    $stmt->execute();
			    
			}
			$sucesso="API Dogs Name instalada com Sucesso";
		else:
			$erro="API Dogs Name já está instalada";
		endif;
	endif;	

	if(isset($_POST['instalarApiDogsBreed'])):
		if(DB_TYPE=='pgsql'){
			$dbh = DB::prepare("SELECT table_name FROM information_schema.tables
								WHERE table_schema = 'public' 
								AND table_name LIKE 'c_raca'");
		}
		if(DB_TYPE=='mysql'){
			$dbname = DB_NAME;
			$dbh = DB::prepare("SELECT TABLE_NAME
						        FROM information_schema.TABLES
						        WHERE TABLE_SCHEMA = '$dbname'
						        AND TABLE_NAME LIKE 'c_raca'");
		}
		$dbh->execute();
		if($dbh->rowCount()==0):
			$sql = DB::prepare('CREATE TABLE IF NOT EXISTS c_raca (id SERIAL PRIMARY KEY, name VARCHAR(24))');
			$sql->execute();
				
			$x = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/generateData/api/dograca.html');
			$html = str_get_html($x);
			$a = 0;
			foreach($html->find('span.card-title') as $row) {
				$name = $row->plaintext;
			    $stmt = DB::prepare("INSERT INTO c_raca(name) VALUES(:name)");
			    $stmt->bindParam(":name",$name);
			    $stmt->execute();
			    
			}
			$sucesso="API Dogs Name instalada com Sucesso";
		else:
			$erro="API Dogs Name já está instalada";
		endif;
	endif;	

	$objFill = new tableFill();

	if(isset($_POST["createTable"])):


		$response2 = $objFill->searchInDictionary(strtolower($_POST['nameTable']));

		if($response2==0):
			if(isset($_POST['generateID'])){

				$response = $objFill->createTable(strtolower($_POST['nameTable']),
					array(
						"id SERIAL NOT NULL PRIMARY KEY"
					)
				);

				if(strpos($response, 'SQLSTATE') !== false){
					$erro = $response;
					return $erro;
				}else{
					$objFill->addTableToDictionary(strtolower($_POST['nameTable']),$_POST['countGenerate']);
					$sucesso = $response;
					return $sucesso;
				}

			}else{

				$response = $objFill->createTable($_POST['nameTable'],
					array(
						""
					)
				);

				if(strpos($response, 'SQLSTATE') !== false){
					$erro = $response;
					return $erro;
				}else{
					$objFill->addTableToDictionary(strtolower($_POST['nameTable']),$_POST['countGenerate']);
					$sucesso = $response;
					return $sucesso;
				}

			}
		else:
			return "This Table EXISTS";
		endif;
	endif;

	// if(isset($_POST['dropColumn'])):

	// 	$response = $objFill->alterTable($_POST['nameTableDrop'],
	// 									 "dropC",
	// 									 "",
	// 									 array($_POST['nameColumnDrop']));

	// 	if(strpos($response, 'dropped with success'))
	// 		$sucesso = $response;
	// 	else
	// 		$erro = $response;
	// endif;


	if(isset($_POST['removeTable'])):

		$response = $objFill->dropTable($_POST['nameTableRemove']);

		if(strpos($response, 'dropped with success'))
			$sucesso = $response;
		else
			$erro = $response;

	endif;

	if(isset($_POST['resetConfigDB'])):
		unlink($_SERVER["DOCUMENT_ROOT"].'/generateData/DB/config.php');
		$objFill->dropDatabase();
		$sucesso = "Configs Database Reseted";
		header('location: http://localhost/generateData');
	endif;
?>