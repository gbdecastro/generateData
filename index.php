<?php
	if(file_exists("DB/config.php")){
		$erro = "";
		require_once "DB/config.php";
		try {
			$instance = new PDO(DB_TYPE.':host=' . DB_HOST . ';port='.DB_PORT.';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
			$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			unset($instance);
			header('location: http://localhost/generateData/view/');			
		} catch (PDOException $e) {
			$erro .= "Check file config.php in DB/ <br>";
			$erro .= $e->getMessage();
			$erro .= '<br><br><form method="post"><button type="submit" name="DeleteConfig" class="btn btn-success btn-block btn-flat">Delete Config.php</button></form>';
		}
	}
	if(isset($_POST['DeleteConfig'])):
		unlink("DB/config.php");
		unset($erro);
	endif;
	if(isset($_POST['configDB'])):
		$erro = "";
		$host = $_POST['host'];
		$databasename  = $_POST['databasename'];
		$user = $_POST['user'];
		$password = $_POST['password'];
		$port = $_POST['port'];
		$typedb = $_POST['typedb'];

		$buffer = "
			<?php
				require_once 'db.php';
				define('DB_HOST', '".$host."');
				define('DB_NAME', '".$databasename."');
				define('DB_USER', '".$user."');
				define('DB_PASS', '".$password."');
				define('DB_PORT', '".$port."');
				define('DB_TYPE', '".$typedb."');				
			?>
		";
		file_put_contents('DB/config.php', $buffer);
		try {
			$instance = new PDO($typedb.':host=' . $host . ';port='.$port.';', $user, $password);
			$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$sql = $instance->prepare("CREATE DATABASE $databasename");
			$sql->execute();
			unset($instance);
			unset($sql);
			header('location: http://localhost/generateData/view/');
		} catch (PDOException $e) {
			$erro = $e->getMessage();
		}		
	endif;	

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BD J.G</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/generateData/public/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/generateData/public/dist/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/generateData/public/dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/generateData/public/plugins/datatables/dataTables.bootstrap.css">    
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/generateData/public/dist/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
	  <div class="login-logo">
	    <a href="/generateData/"><b>DB</b>JG</a>
	  </div>
	  <!-- /.login-logo -->
	  <div class="login-box-body">
	    <p class="login-box-msg">Configure Data of your Database</p>
		<?php
			if(isset($erro)):
                echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> Error</h4>';
                echo $erro;
                echo '</div>';
			endif;
			if(!file_exists("DB/config.php")):
		?>
	    <form method="post">
	      <div class="form-group has-feedback">
	        <input type="text" name="host" class="form-control" placeholder="Host">
	        <span class="fa fa-home form-control-feedback"></span>
	      </div>
	      <div class="form-group has-feedback">
	        <input type="text" name="port" class="form-control" placeholder="Port">
	        <span class="fa fa-circle-o form-control-feedback"></span>
	      </div>	      
	      <div class="form-group has-feedback">
	        <input type="text" name="databasename" class="form-control" placeholder="Database Name">
	        <span class="fa fa-database form-control-feedback"></span>
	      </div>
	      <div class="form-group has-feedback">
	        <input type="text" name="user" class="form-control" placeholder="User">
	        <span class="fa fa-user form-control-feedback"></span>
	      </div>
	      <div class="form-group has-feedback">
	        <input type="password" name="password" class="form-control" placeholder="Password">
	        <span class="fa fa-lock form-control-feedback"></span>
	      </div>

	      <div class="form-group">
	      	<label for="nameTable">Database Type:</label>
	        <select name="typedb" class="form-control">
	        	<option value="pgsql"> PostgresSQL </option>
	        	<option value="mysql"> MariaDB(MYSQL) </option>
	        </select>
	      </div>

	      <div class="form-group">
	      	<button type="submit" name="configDB" class="btn btn-primary btn-block btn-flat">Configure</button>
	      </div>
	      <!-- /.col -->
	   </div>
	   </form>
	   <?php 
	   		endif;
	   ?>
	  </div>
	  <!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->
 	<!-- jQuery 2.2.3 -->
  	<script src="/generateData/public/dist/js/jquery-2.2.3.min.js"></script>
  	<!-- Bootstrap 3.3.6 -->
  	<script src="/generateData/public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>