<?php

require($_SERVER['DOCUMENT_ROOT'].'/generateData/DB/db.php');

$echo = "";
      try {
        $echo  .= '<table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>';        
        $stmt = DB::prepare($_POST['sqlquery']);
        $stmt->execute();
        foreach(range(0, $stmt->columnCount() - 1) as $column_index)
        {
          $meta[] = $stmt->getColumnMeta($column_index);
        }
        $qtd = $stmt->columnCount()-1;
        for($i=0;$i<=$stmt->columnCount()-1;$i++){
          $echo .= "<th>".$meta[$i]['name']."</th>";
        }
        $echo .= "</tr><thead><tbody>";
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $key) {
          $echo .= '<tr>';
          for($j=0; $j<=$qtd; $j++){
            $echo .= '<td> '.$key[$meta[$j]["name"]].' </td>';
          }
            $echo .= "</tr>";
        }
        $echo .= "</tbody>";
        $echo .= "</table>";

        echo $echo;

      } catch (PDOException $e) {
        echo $e->getMessage();
      }
?>