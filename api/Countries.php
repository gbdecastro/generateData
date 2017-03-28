<?php

require($_SERVER['DOCUMENT_ROOT'].'/generateData/DB/db.php');
require('simple_html_dom.php');


$dbh = DB::prepare("SELECT table_name FROM information_schema.tables
					WHERE table_schema = 'public' 
					AND table_name LIKE 'country'");
$dbh->execute();
if($dbh->rowCount()==0):

	$sql = DB::prepare('CREATE TABLE IF NOT EXISTS country (id SERIAL PRIMARY KEY, name VARCHAR(34))');
	$sql->execute();
	echo "Table Ok.<br><br>";
		
	$html = file_get_html('Countries.html');

	foreach($html->find('li') as $row) {
		$name=$row->plaintext;
		echo "$name";
			$stmt = DB::prepare('INSERT INTO country(name) VALUES(:name)');
		    $stmt->bindParam(":name",$name);
		    $stmt->execute();
		echo " insert Ok.<br>";
	    
	}
	echo "OK.<br>";
else:
	echo "API Country já instalada <br>";
endif;
echo '<a href="/generateData/"> Home</a>';
?>