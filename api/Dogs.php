<?php
require('simpleHtmlDom/simple_html_dom.php');
require($_SERVER['DOCUMENT_ROOT'].'/generateData/DB/db.php');		
$randomString = '';
$rand = rand(1, 1000);
$sql = DB::prepare('SELECT name FROM dogs_name WHERE id = :rand');
$sql->bindParam(':rand', $rand);
$sql->execute();
$row = $sql->fetch(PDO::FETCH_ASSOC);
$randomString = $row['name'];

echo $randomString;
?>