<?php

require($_SERVER['DOCUMENT_ROOT'].'/generateData/DB/db.php');


class tableFill{

	public function createTable($nameTable, $fields){
		try{
			$sql = "CREATE TABLE IF NOT EXISTS $nameTable( ";
			for($i=0;$i<count($fields);$i++):
				$sql = $sql . $fields[$i]. " ";
			endfor;
			$sql = $sql . ");";
			$stmt = DB::prepare($sql);
			$stmt->execute();
			return "Table ".strtoupper($nameTable)." created with Success!";
		}catch(PDOException $e){
			return $e->getMessage();
		}

	}

	public function alterTable($nameTable,$function, $fields, $fieldsNew){
		if($function=="renameC"):
			for($i=0;$i<count($fields);$i++):
				$sql = "ALTER TABLE $nameTable RENAME COLUMN ";
				$sql = $sql . $fields[$i]. " to ".$fieldsNew[$i].";";
				$stmt = DB::prepare($sql);
				$stmt->execute();
			endfor;
		endif;

		if($function=="addC"):
			for($i=0;$i<count($fieldsNew);$i++):
				try{
					$sql = "ALTER TABLE $nameTable ADD COLUMN ";
					$sql = $sql . $fieldsNew[$i] . ";";
					$stmt = DB::prepare($sql);
					$stmt->execute();
					return "Column ".$fieldsNew[$i]." added with success";
				}catch(PDOException $e){
					return $e->getMessage();
				}
			endfor;
		endif;
		if($function=="dropC"):
			for($i=0;$i<count($fieldsNew);$i++):
				try{
					$sql = "ALTER TABLE $nameTable DROP COLUMN ";
					$sql = $sql . $fieldsNew[$i] . ";";
					$stmt = DB::prepare($sql);
					$stmt->execute();
					return "Column ".$fieldsNew[$i] ." dropped with success";
				}catch(PDOException $e){
					return $e->getMessage();
				}
			endfor;
		endif;
	}

	public function dropTable($tabela){

		try {
			$stmt = DB::prepare("DROP TABLE IF EXISTS $tabela; DELETE FROM dictionary WHERE nameTable = '$tabela'");
			$stmt->execute();
			return "Table ".$tabela." dropped with success";
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function insertTable($tabela, $coluna, $tipo, $fk){
		
		$dado = "";

		$stmt = DB::prepare("SELECT * FROM $tabela");
		$stmt->execute();
		$rowTable = $stmt->rowCount();

		try{
			$stmtDictionary = DB::prepare("SELECT * FROM dictionary WHERE nametable = '$tabela'");
			$stmtDictionary->execute();
			$row = $stmtDictionary->fetch(PDO::FETCH_ASSOC);
			$countGenerate = $row['countGenerate'];
		}catch(PDOException $e){
			return "Install Api Generate Data Automatic";
		}

		for($i=0;$i<$countGenerate;$i++):
			switch ($tipo) {
				case 'name':
					$dado = $this->generateNameBR();
					break;
				case 'contry':
					$dado = $this->generateCountry();
					break;
				case 'rg':
					$dado = $this->generateRG();
					break;
				case 'cpf':
					$dado = $this->generateCPF();
					break;
				case 'numerico':
					$dado = $this->generateNumeric();
					break;
				case 'alfanumerico':
					$dado = $this->generateAlphaNumeric();
					break;
				case 'letras':
					$dado = $this->generateWord();
					break;
				case 'idade':
					$dado = $this->generateIdade();
					break;					
				case 'carplate':
					$dado = $this->generateCarPlate();
					break;																											
				case 'date':
					$dado = $this->generateDate();
					break;
				case 'dogs_name':
					$dado = $this->generateDogsName();
					break;							
				case 'dogs_breed':
					$dado = $this->generateDogsBreed();
					break;	
				case 'weight':
					$dado = $this->generateWeight();
					break;
				case 'uf':
					$dado = $this->generateUFBR();
					break;
				case 'fk':
					$dado = $this->generateFK($fk);
					break;
			}
			if($rowTable!=0):
				$id = $i+1;
				try {
					$sql = "UPDATE $tabela SET $coluna='$dado' WHERE id='$id'";
					$stmt2 = DB::prepare($sql);
					$stmt2->execute();
					$success = 1;				
				} catch (PDOException $e) {
					return $e->getMessage();
				}
			else:
				try {
					$sql = "INSERT INTO $tabela ($coluna) VALUES('$dado')";
					$stmt2 = DB::prepare($sql);
					$stmt2->execute();
					$success = 1;
				} catch (PDOException $e) {
					return $e->getMessage();
				}				
			endif;
		endfor;
		if($success == 1){
			return "Column ".$coluna." added and generated data with success";
		}
	}

	public function updateTable(){

	}

	public function deleteTable(){


	}

	public function searchInDictionary($tabela){
		try {
			$sql = DB::prepare("SELECT * FROM dictionary WHERE nameTable = :tabela");
			$sql->bindParam(":tabela",$tabela);
			$sql->execute();
			return $sql->rowCount();			
		} catch (PDOException $e) {
			return "Please! Install API Generate Data Automatic";
		}
	}

	public function addTableToDictionary($tabela, $countGenerate){
		try {
			$stmt = DB::prepare("INSERT INTO dictionary (nametable, countgenerate) VALUES (:tabela, :countgenerate)");
			$stmt->bindParam(':tabela',$tabela);
			$stmt->bindParam(':countgenerate',$countGenerate);
			$stmt->execute();
			return 'Update Table Dictionary with success';
		} catch (PDOException $e) {
			return "Please! Install API Generate Data Automatic";
		}
	}

	public function generateCountry(){
		$randomString = '';
		$rand = rand(1, 196);
		$sql = DB::prepare('SELECT name FROM country WHERE id = :rand');
		$sql->bindParam(':rand', $rand);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$randomString = $row['name'];
		
		return $randomString;
	}

	public function generateIdade(){
		return rand(15,60);
	}

	public function generateNameBR(){
		$randomString = '';
		$rand = rand(1, 98);
		$sql = DB::prepare('SELECT name FROM names_br WHERE id = :rand');
		$sql->bindParam(':rand', $rand);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$randomString = $row['name'];
		
		return $randomString;
	}

	public function generateAlphaNumeric(){
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;	
	}

	public function generateRG(){
		$randomString = '';
		for($i=0;$i<5;$i++){
			$randomString .= rand(1,9);
		}
		$randomString.="-";
		$randomString.= rand(1,9);
	    return $randomString;	
	}
	public function generateWord(){
	    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < 15; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;	
	}	


	public function generateNumeric(){
		return rand(1,10);
	}	

	public function generateCarPlate(){
	    $letter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($letter);
	    $randomString = '';
	    for ($i = 0; $i < 3; $i++) {
	        $randomString .= $letter[rand(0, $charactersLength - 1)];
	    }
	    $randomString .= '-';
	    for ($i = 0; $i < 4; $i++) {
	        $randomString .=  rand(0, 9);
	    }
	    return $randomString;	
	}

	public function generateCEP(){
	    $randomString = '';
	    for ($i = 0; $i < 5; $i++) {
	        $randomString .= rand(0, 9);
	    }
	    $randomString .= '-';
	    for ($i = 0; $i < 3; $i++) {
	        $randomString .= rand(0, 9);
	    }
	    return $randomString;	
	}
	
	public function generateCPF(){
	    $randomString = '';
	    for ($i = 0; $i < 3; $i++) {
	        $randomString .= rand(0, 9);
	    }
	    $randomString .= '.';
	    for ($i = 0; $i < 3; $i++) {
	        $randomString .= rand(0, 9);
	    }
	    $randomString .= '.';
	    for ($i = 0; $i < 3; $i++) {
	        $randomString .= rand(0, 9);
	    }
	    $randomString .= '-';
	    for ($i = 0; $i < 2; $i++) {
	        $randomString .= rand(0, 9);
	    }

	    return $randomString;	
	}

	public function generateDate(){
		$randomString = '';
	    $y = rand(1890, 2017);
	    $m = rand(1, 12);
	    if($m == 1)
	    	$d = rand(1,31);
	    if($m == 2)
	    	$d = rand(1,29);
	    if($m == 3)
	    	$d = rand(1,31);
	    if($m == 5)
	    	$d = rand(1,31);
	    if($m == 7)
	    	$d = rand(1,31);
	    if($m == 8)
	    	$d = rand(1,31);
	    if($m == 10)
	    	$d = rand(1,31);
	    if($m == 12)
	    	$d = rand(1,31);
	    $d = rand(1,31);

	    $randomString .= $y;
	    $randomString .= '-';
	    $randomString .= $m;
	    $randomString .= '-';
	    $randomString .= $d;
	    
	    return $randomString;	
	}

	public function generateUFBR(){
		$randomString = '';
		$rand = rand(1, 27);
		$sql = DB::prepare('SELECT uf_n FROM uf_br WHERE id = :rand');
		$sql->bindParam(':rand', $rand);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$randomString = $row['uf_n'];
		
		return $randomString;
	}

	public function generateDogsName(){
		$randomString = '';
		$rand = rand(1, 1000);
		$sql = DB::prepare('SELECT name FROM c_name WHERE id = :rand');
		$sql->bindParam(':rand', $rand);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$randomString = $row['name'];
		
		return $randomString;
	}

	public function generateDogsBreed(){
		$randomString = '';
		$rand = rand(1, 90);
		$sql = DB::prepare('SELECT name FROM c_raca WHERE id = :rand');
		$sql->bindParam(':rand', $rand);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$randomString = $row['name'];
		
		return $randomString;
	}

	public function generateFK($fk){
		$sql = DB::prepare('SELECT id FROM :fk ORDER BY rand()');
		$sql->bindParam(':fk', $fk);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$randomString = $row['id'];
		
		return $randomString;
	}	

	public function generateWeight(){
		return $rand = rand(15, 80);
	}
	public function dropDatabase(){
		$stmt = DB::prepare("DROP DATABASE ".DB_NAME);
		$stmt->execute();
	}
}


//$obj = new tableFill();

/*$obj->createTable("owner",
	array(
		"id SERIAL NOT NULL PRIMARY KEY,",
		"name VARCHAR(25),",
		"contry VARCHAR(255)"
	)
);*/

//$obj->alterTable("dogs","addC", "" , array("owner_id INT NOT NULL REFERENCES owner(id)"));

?>