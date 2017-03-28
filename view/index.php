<?php
    require($_SERVER['DOCUMENT_ROOT'].'/generateData/controller/general.php');
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
  <link rel="stylesheet" href="/generateData/public/dist/css/AdminLTE.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/generateData/public/dist/css/code.css">  
  <!-- DataTables -->
  <link rel="stylesheet" href="/generateData/public/plugins/datatables/dataTables.bootstrap.css">  
  
  <link rel="stylesheet"  href="/generateData/public/plugins/select2/style.css"/>

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/generateData/public/dist/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="/generateData/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>DB</b> J.G</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>DataBase</b> JG</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
      </nav>      
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <ul class="sidebar-menu">
          <li class="header">Sidebar</li>
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-cog"></i> <span>API'S</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>              
            </a>
            <ul class="treeview-menu">
              <li data-toggle="modal" data-target="#mdlNames">
                <a href="#">
                  <i class="fa fa-user"></i>
                  Names
                </a>
              </li>
              <li data-toggle="modal" data-target="#mdlCountries">
                <a href="#">
                  <i class="fa fa-flag"></i>
                  Countries
                </a>
              </li>
              <li data-toggle="modal" data-target="#mdlUFS">
                <a href="#">
                  <i class="fa fa-map"></i>
                  UFs
                </a>
              </li>
              <li data-toggle="modal" data-target="#mdlGenerate">
                <a href="#">
                  <i class="fa fa-database"></i>
                  Generate Data Automatic
                </a>
              </li>
              <li data-toggle="modal" data-target="#mdlDogsName">
                <a href="#">
                  <i class="fa fa-cog"></i>
                    Dogs Names
                </a>
              </li>
              <li data-toggle="modal" data-target="#mdlDogsBreed">
                <a href="#">
                  <i class="fa fa-spinner"></i>
                    Breed Dogs
                </a>
              </li>                                                                    
            </ul>
          </li>
        </ul>
      </section>
     <!-- /.sidebar -->
    </aside>    
    <!-- MODALS -->
    <!-- Names -->
    <div class="modal fade" id="mdlNames" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">API Nomes Brasileiros</h4>
          </div>
          <div class="modal-body">
            Api com 100 nomes brasileiros sendo 50 feminino e 50 masculino
          </div>
          <div class="modal-footer">
            <form method="POST">
              <button type="submit" name="instalarApiNames" class="btn btn-success">Instalar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- MODALS -->
    <!-- Countries -->
    <div class="modal fade" id="mdlCountries" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">API Countries World</h4>
          </div>
          <div class="modal-body">
            Api with all contries of world
          </div>
          <div class="modal-footer">
            <form method="POST">
              <button type="submit" name="instalarApiContries" class="btn btn-success">Install</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- MODALS -->
    <!-- UFs -->
    <div class="modal fade" id="mdlUFS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">API UFs Brasil</h4>
          </div>
          <div class="modal-body">
            Estados Brasileiros e suas siglas
          </div>
          <div class="modal-footer">
            <form method="POST">
              <button type="submit" name="instalarApiUFS" class="btn btn-success">Install</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- MODALS -->
    <!-- Countries -->
    <div class="modal fade" id="mdlGenerate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">API Generate Data Automatic</h4>
          </div>
          <div class="modal-body">
            Api for popular Table
          </div>
          <div class="modal-footer">
            <form method="POST">
              <button type="submit" name="instalarApiGenerate" class="btn btn-success">Install</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- MODALS -->
    <!-- Generate -->
     <div class="modal fade" id="mdlDogsName" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">API Dogs Names</h4>
          </div>
          <div class="modal-body">
            Api with 1.000 Names for Dogs
          </div>
          <div class="modal-footer">
            <form method="POST">
              <button type="submit" name="instalarApiDogsName" class="btn btn-success">Install</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- MODALS -->
    <!-- Dogs Name -->
    <div class="modal fade" id="mdlDogsBreed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">API Dogs Breed</h4>
          </div>
          <div class="modal-body">
            Api with 90 Breed for Dogs
          </div>
          <div class="modal-footer">
            <form method="POST">
              <button type="submit" name="instalarApiDogsBreed" class="btn btn-success">Install</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- MODALS -->
    <!-- Dogs Breed -->      
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Home
          <small>Table</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/generateData/"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Table</li>
        </ol>
      </section>  
      <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div id="alerts">

              </div>
                <?php
                  if(isset($erro)):
                    echo '<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-ban"></i> Error</h4>';
                    echo $erro;
                    echo '</div>';
                  endif;
                ?>
                <?php
                  if(isset($sucesso)):
                    echo '<div class="alert alert-success alert-dismissible">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                           <h4><i class="icon fa fa-check"></i> Sucess</h4>';
                    echo $sucesso;
                    echo '</div>';
                  endif;
                ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3"> 
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Create Table</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>                  
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form id="formCreateTable" role="form" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nameTable">Table Name</label>
                      <input type="text" class="form-control" name="nameTable" id="nameTable" placeholder="Name Table" required>
                    </div>
                    <div class="form-group">                   
                      <label for="nameTable">Count Generate Data</label> 
                      <input type="text" class="form-control" name="countGenerate" id="countGenerate" placeholder="10" required>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" id="generateID" name="generateID" checked> SERIAL PK GENERATE (ID)
                    </div>                                                        
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="createTable" class="btn btn-success">Create</button>
                  </div>
                </form>
              </div>              
            </div>
            <div class="col-md-4"> 
              <div class="box box-primary">              
                <div class="box-header with-border">
                  <h3 class="box-title">ADD Column</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>                   
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form id="formAddColumn" role="form" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nameTableC">Choose Table</label>
                      <select id="nameTableC" name="nameTableC" class="form-control" required>
                        <?php 
                          if(DB_TYPE=='pgsql'){
                            $sql = "SELECT TABLE_NAME 
                                    FROM information_schema.tables
                                    WHERE table_schema='public'
                                    AND table_type='BASE TABLE'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'uf_br'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'names_br'
                                    AND TABLE_NAME != 'country'
                                    AND TABLE_NAME != 'C_NAME'
                                    AND TABLE_NAME != 'C_RACA'
                                    ORDER BY TABLE_NAME ASC";
                          }
                          if(DB_TYPE=='mysql'){
                            $dbname = DB_NAME;
                            $sql = "SELECT TABLE_NAME
                                    FROM information_schema.TABLES
                                    WHERE TABLE_SCHEMA = '$dbname'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'uf_br'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'names_br'
                                    AND TABLE_NAME != 'country'
                                    AND TABLE_NAME != 'C_NAME'
                                    AND TABLE_NAME != 'C_RACA'
                                    ORDER BY TABLE_NAME ASC";
                          }                        
                          $stmt = DB::prepare($sql);
                          $stmt->execute();
                          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                          foreach ($rows as $key) {
                            echo '<option value="'.$key['TABLE_NAME'].'">'.strtoupper($key['TABLE_NAME']).'</option>';
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nameTable">Column Name</label>
                      <input type="text" class="form-control" name="nameColumn" id="nameColumn" placeholder="Column Name" required>
                      <br>
                      <label for="nameTable">Data Type</label>
                      <select id="typeColumn" name="typeColumn" class="form-control select2" required>
                        <option value="VARCHAR(255)|name">Name</option>
                        <option value="CHAR(2)|uf">UF BRAZIL</option>
                        <option value="VARCHAR(255)|contry">Country</option>
                        <option value="VARCHAR(15)|rg">RG</option>
                        <option value="VARCHAR(15)|cpf">CPF</option>
                        <option value="INT|idade">Age</option>
                        <option value="VARCHAR(8)|carplate">Car Plate</option>
                        <option value="VARCHAR(10)|date">Date</option>
                        <option value="INT|numerico">Number</option>
                        <option value="VARCHAR(255)|alfanumerico">Alphanumeric</option>
                        <option value="VARCHAR(255)|letras">Word</option>
                        <option value="VARCHAR(255)|dogs_name">Dogs Name</option>
                        <option value="VARCHAR(255)|dogs_breed">Dogs Breed</option>
                        <option value="VARCHAR(255)|weight">Weight</option>
                        <option value="INT|fk">ForeginKey</option>
                      </select>                                            
                    </div>
                    <div class="form-group">
                      <label id="txt_fk" for="nameTable">Choose Refference Table Foregin Key</label>
                      <select id="ForeginKey" name="ForeginKey" class="form-control select2" style="width: 250px;" required>
                        <?php 
                          if(DB_TYPE=='pgsql'){
                            $sql = "SELECT TABLE_NAME 
                                    FROM information_schema.tables
                                    WHERE table_schema='public'
                                    AND table_type='BASE TABLE'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'uf_br'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'names_br'
                                    AND TABLE_NAME != 'country'
                                    AND TABLE_NAME != 'C_NAME'
                                    AND TABLE_NAME != 'C_RACA'
                                    ORDER BY TABLE_NAME ASC";
                          }
                          if(DB_TYPE=='mysql'){
                            $dbname = DB_NAME;
                            $sql = "SELECT TABLE_NAME
                                    FROM information_schema.TABLES
                                    WHERE TABLE_SCHEMA = '$dbname'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'uf_br'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'names_br'
                                    AND TABLE_NAME != 'country'
                                    AND TABLE_NAME != 'C_NAME'
                                    AND TABLE_NAME != 'C_RACA'
                                    ORDER BY TABLE_NAME ASC";
                          }                        
                          $stmt = DB::prepare($sql);
                          $stmt->execute();
                          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                          foreach ($rows as $key) {
                            echo '<option value="'.$key['TABLE_NAME'].'">'.strtoupper($key['TABLE_NAME']).'</option>';
                          }
                        ?>
                      </select>                    
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" id="addColumn" name="addColumn" class="btn btn-primary">Add</button>
                  </div>
                </form>
              </div>              
            </div>
            <div class="col-md-3">
              <div class="box box-danger">              
                <div class="box-header with-border">
                  <h3 class="box-title">Remove Column</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>                   
                </div>
                <!-- /.box-header -->
                <form id="formColumnDrop" role="form" method="POST">
                <div class="box-body">
                  <div class="form-group">
                    <select id="slt_teste" name="nameTableDrop" class="form-control" required>
                      <option value=""> Choose Table</option>
                      <?php 
                          if(DB_TYPE=='pgsql'){
                            $sql = "SELECT TABLE_NAME 
                                    FROM information_schema.tables
                                    WHERE table_schema='public'
                                    AND table_type='BASE TABLE'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'uf_br'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'names_br'
                                    AND TABLE_NAME != 'country'
                                    AND TABLE_NAME != 'C_NAME'
                                    AND TABLE_NAME != 'C_RACA'
                                    ORDER BY TABLE_NAME ASC";
                          }
                          if(DB_TYPE=='mysql'){
                            $dbname = DB_NAME;
                            $sql = "SELECT TABLE_NAME
                                    FROM information_schema.TABLES
                                    WHERE TABLE_SCHEMA = '$dbname'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'uf_br'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'names_br'
                                    AND TABLE_NAME != 'country'
                                    AND TABLE_NAME != 'C_NAME'
                                    AND TABLE_NAME != 'C_RACA'
                                    ORDER BY TABLE_NAME ASC";
                          }  
                        $stmt = DB::prepare($sql);
                        $stmt->execute();
                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $key) {
                          echo '<option value="'.$key['TABLE_NAME'].'">'.strtoupper($key['TABLE_NAME']).'</option>';
                        }
                      ?>                    
                    </select>
                  </div>
                  <div class="form-group">                
                    <select class="form-control" name="nameColumnDrop" id="nameColumnDrop" required>
                    </select>             
                  </div>
                </div>
                <!--  /.box body-->
                <div class="box-footer">
                      <button type="submit" name="dropColumn" class="btn btn-danger">Remove</button>
                </div>
                <!--  /.box footer-->
              </form>
              </div>
            <!--  /.box-->
          </div>                        
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="box box-danger collapsed-box">              
                <div class="box-header with-border">
                  <h3 class="box-title">Remove Table</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>                   
                </div>
                <!-- /.box-header -->
                <form role="form" method="POST">
                <div class="box-body">
                  <div class="form-group">
                    <label for="nameTableC">Choose Table</label>
                    <select id="nameTableRemove" name="nameTableRemove" class="form-control" required>
                      <?php 
                          if(DB_TYPE=='pgsql'){
                            $sql = "SELECT TABLE_NAME 
                                    FROM information_schema.tables
                                    WHERE table_schema='public'
                                    AND table_type='BASE TABLE'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'uf_br'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'names_br'
                                    AND TABLE_NAME != 'country'
                                    AND TABLE_NAME != 'C_NAME'
                                    AND TABLE_NAME != 'C_RACA'
                                    ORDER BY TABLE_NAME ASC";
                          }
                          if(DB_TYPE=='mysql'){
                            $dbname = DB_NAME;
                            $sql = "SELECT TABLE_NAME
                                    FROM information_schema.TABLES
                                    WHERE TABLE_SCHEMA = '$dbname'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'uf_br'
                                    AND TABLE_NAME != 'dictionary'
                                    AND TABLE_NAME != 'names_br'
                                    AND TABLE_NAME != 'country'
                                    AND TABLE_NAME != 'C_NAME'
                                    AND TABLE_NAME != 'C_RACA'
                                    ORDER BY TABLE_NAME ASC";
                          }  
                        $stmt = DB::prepare($sql);
                        $stmt->execute();
                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $key) {
                          echo '<option value="'.strtolower($key['TABLE_NAME']).'">'.strtoupper($key['TABLE_NAME']).'</option>';
                        }
                      ?>
                    </select>
                  </div>                
                </div>
                <!--  /.box body-->
                <div class="box-footer">
                      <button type="submit" name="removeTable" class="btn btn-danger">Remove</button>
                </div>
                <!--  /.box footer-->
              </form>
              </div>
            <!--  /.box-->
          </div>
          <div class="col-md-3">
              <div class="box box-danger collapsed-box">              
                <div class="box-header with-border">
                  <h3 class="box-title">Reset Config Database</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>                   
                </div>
                <!-- /.box-header -->
                <form role="form" method="POST">
                <div class="box-body">
                  <center>
                    <button type="submit" name="resetConfigDB" class="btn btn-danger">Reset</button>                            
                  </center>
                </div>
                <!--  /.box body-->
              </form>
              </div>
            <!--  /.box-->
          </div>          
        </div>        
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title"> Sql Query</h3>
              </div>
              <div class="box-body">
                <div class="form-group">
                    <textarea class="form-control" id="sqlquery" name="sqlquery" maxlength="1024" placeholder="SELECT * FROM TABLE" required></textarea>
                </div> 
                <button type="submit" id="executesql" class="btn btn-primary">Execute</button>
                <button type="submit" id="resetsql" class="btn btn-default">Reset</button>
                <br/>
                <br/>
                <br/>
                <div id="resultquery">
                  
                </div>
              </div>
              <!-- /.box-body -->
              <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>                
              </div>
              <!-- end loading -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->      
        </div>        
        <!-- /.row --> 
      </section>
    </div>
  </div>
  <!-- jQuery 2.2.3 -->
  <script src="/generateData/public/dist/js/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="/generateData/public/bootstrap/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/generateData/public/dist/js/app.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="/generateData/public/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/generateData/public/dist/js/demo.js"></script>  
  <!-- THEME CODE-->
  <script src="/generateData/public/dist/js/code.js"></script>       
  <!-- DataTables -->
  <script src="/generateData/public/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/generateData/public/plugins/datatables/dataTables.bootstrap.min.js"></script>  

  <script src="/generateData/public/plugins/select2/select2.js"></script>

  <script>
  $(function () {

    $('.overlay').hide();

    $('#nameColumnDrop').hide();

    $('#ForeginKey').hide();

    $('#txt_fk').hide();

    $('#nameTableC').select2();

    $('#typeColumn').select2();

    $('#slt_teste').select2();

    $('#nameTableRemove').select2();

    $('#typeColumn').on('select2:select', function(e){
      var data = e.params.data;
      if(data.text == "ForeginKey"){
        $('#ForeginKey').select2();
        $('#ForeginKey').parent().show();
        $('#txt_fk').show();
      }else{
        $('#ForeginKey').parent().hide();
        $('#txt_fk').hide();        
      }
    });


    $('#slt_teste').change(function(){
      var t = $("#slt_teste option:selected").val();
      if(t==""){
          $('#nameColumnDrop').select2('destroy');
          $('#nameColumnDrop').hide();
          $('#nameColumnDrop').empty();
        return false;
      }
      var dados = {
        table: t
      }
      $.post('/generateData/controller/loadColumnTable.php',dados,function(data){
        if(data != "0"){
            $('#nameColumnDrop').show();
            $('#nameColumnDrop').empty();
            $('#nameColumnDrop').html(data);
            $('#nameColumnDrop').select2();
        }else{
          $('#nameColumnDrop').hide();
          $('#nameColumnDrop').empty();            
        }
      });
    });

    $('#formColumnDrop').submit(function(){
      var dados = $(this).serialize();
      $.post('/generateData/controller/columnDrop.php',dados,function(data){
        if(data.indexOf("dropped")>0){
          $('#alerts').html(
            '<div class="alert alert-success alert-dismissible">'+
              '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
              '<h4>'+
                '<i class="icon fa fa-check"></i> Success'+
              '</h4>'+
              data+
            '</div'
            );
          var t = $("#slt_teste option:selected").val();
          if(t==""){
              $('#nameColumnDrop').hide();
              $('#nameColumnDrop').empty();      
            return false;
          }
          var dados = {
            table: t
          }
          $.post('/generateData/controller/loadColumnTable.php',dados,function(data){
              $('#nameColumnDrop').show();
              $('#nameColumnDrop').empty();
              $('#nameColumnDrop').html(data);
              $('#nameColumnDrop').select2();
          });          
        }else{
          $('#alerts').html(
            '<div class="alert alert-danger alert-dismissible">'+
              '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
              '<h4>'+
                '<i class="icon fa fa-close"></i> Error'+
              '</h4>'+
              data+
            '</div'
            );          
        }
      });
      return false;
    });


    $('#formAddColumn').submit(function(){
      var dados = $(this).serialize();
      $.post('/generateData/controller/addColumn.php',dados,function(data){
        if(data.indexOf("success")>0){
          $('#alerts').html(
            '<div class="alert alert-success alert-dismissible">'+
              '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
              '<h4>'+
                '<i class="icon fa fa-check"></i> Success'+
              '</h4>'+
              data+
            '</div'
            );          
        }else{
          $('#alerts').html(
            '<div class="alert alert-danger alert-dismissible">'+
              '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
              '<h4>'+
                '<i class="icon fa fa-close"></i> Error'+
              '</h4>'+
              data+
            '</div'
            );      
        }
      });
      return false;
    });

     $('#executesql').click(function(){
            $('.overlay').show();
            sqlquery = $('#sqlquery').val();
            var dados = {
              sqlquery: sqlquery
            }
            $.post('/generateData/classes/query.php',dados,function(data){
              $('.overlay').hide();
              $('#resultquery').empty();
              $('#resultquery').html(data);
              $("#example1").DataTable();
            });         
            return false;
    });
    $('#resetsql').click(function() {
      $('#resultquery').empty();
      $('#sqlquery').val("");
    });  
  });
</script>
</body>
</html>