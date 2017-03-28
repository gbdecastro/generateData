<?php

require($_SERVER['DOCUMENT_ROOT'].'/generateData/DB/db.php');
require('simple_html_dom.php');


$dbh = DB::prepare("SELECT table_name FROM information_schema.tables
					WHERE table_schema = 'public' 
					AND table_name LIKE 'uf_br'");
$dbh->execute();
if($dbh->rowCount()==0):
	$sql = DB::prepare('CREATE TABLE IF NOT EXISTS uf_br (id SERIAL PRIMARY KEY, uf VARCHAR(24), uf_n VARCHAR(2))');
	$sql->execute();
		echo "Table Ok.<br><br>";
		
	$html = file_get_html('tabelaUF.html');
	$a = 0;
	foreach($html->find('tr') as $row) {
		$uf = $row->find('td',0)->plaintext;
		$uf_n = $row->find('td',1)->plaintext;
		
		    $stmt = DB::prepare("INSERT INTO uf_br(uf, uf_n) VALUES(:uf, :uf_n)");
		    $stmt->bindParam(":uf",$uf);
			$stmt->bindParam(":uf_n",$uf_n);
		    $stmt->execute();
		echo "Inserting ".$uf.".<br>";
	    
	}
	echo "OK.<br>";
else:
	echo 'API UF já instalada';
endif;
echo '<a href="/generateData/"> Home</a>';

?>