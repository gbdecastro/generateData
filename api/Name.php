<?php

require($_SERVER['DOCUMENT_ROOT'].'/generateData/DB/db.php');
require('simple_html_dom.php');
$dbh = DB::prepare("SELECT table_name FROM information_schema.tables
					WHERE table_schema = 'public' 
					AND table_name LIKE 'uf_br'");
$dbh->execute();
	if($dbh->rowCount()==0):
		$sql = DB::prepare('CREATE TABLE IF NOT EXISTS names_br (id SERIAL PRIMARY KEY, name VARCHAR(24))');
		$sql->execute();
			echo "Table Ok.<br><br>";
			
		$html = file_get_html('tabelaN.html');
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
			    echo $menina ." OK! <br>";
			    echo $menino ." OK! <br>";
			}  
		    $a++;
		}
	else:
		echo 'API Name já instalada';
	endif;
	echo '<a href="/generateData/"> Home</a>';

?>