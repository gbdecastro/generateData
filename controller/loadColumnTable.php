<?php 
	require($_SERVER['DOCUMENT_ROOT'].'/generateData/DB/db.php');
	try {
		$sql = DB::prepare('SELECT DISTINCT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME != "id" and TABLE_NAME = "'.$_POST["table"].'";');
		$sql->execute();
		$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
		if($sql->rowCount()>0){
			foreach ($rows as $row) {
				if($row['COLUMN_NAME'] != 'id')
					$a .= "<option value='".$row['COLUMN_NAME']."'>".$row['COLUMN_NAME']."</option>";
			}		
			echo $a;
		}else{
			echo "0";
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
 ?>