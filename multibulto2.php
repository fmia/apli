<!DOCTYPE html>
<html>
<head>
  <title>Hogarium_apli</title>
  <meta charset="utf-8">
  <meta http-equiv="content-language" content="es_ES" />
  <meta name="copyright" content="fsola" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"/></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"/></script>
  <style type="text/css">
    * {
      padding: 1em;

    }
    #contenedorFormulario {
      background-color: #0080FF;
      padding: 1em;
      margin: -50px;
      background-clip: content-box;
    }

    label{
      font-weight: bold;
      color: #ECF0F1;
    }
    optgroup {
      background-color: #F7D358;
    }
    optgroup > option{
      background-color: white;
    }
    div {
      position: relative;
    }
    input {
      position: relative;
      border: 1px solid black;
    }
    @media (min-width: @screen-small) {
      margin-left:  (@gutter / -2);
      margin-right: (@gutter / -2);
    }

  </style>

  <script type="text/javascript">
    $(function() {
      // bind change event to select
      $('#dynamic_select').on('change', function() {
        var url = $(this).val(); // REQUEST selected value
        if (url) { // require a URL
          window.location = url; // redirect
        }
        return false;
      });
    });
  </script>
  <script type="text/javascript">
    $(function() {
      // bind change event to select
      $('#dynamic_select2').on('change', function() {
        var url = $(this).val(); // REQUEST selected value
        if (url) { // require a URL
          window.location = url; // redirect
        }
        return false;
      });
    });
  </script>
  <script type="text/javascript">
    $(function() {
      // bind change event to select
      $('#dynamic_select3').on('change', function() {
        var url = $(this).val(); // REQUEST selected value
        if (url) { // require a URL
          window.location = url; // redirect
        }
        return false;
      });
    });
  </script>
</head>
<body>
  <?php
  $connect = mysqli_connect ("127.0.0.1", "root") or die (mysqli_error()); // Connects to the database. 
  mysqli_select_db ($connect, "hogarium_apli") or die (mysqli_error()); // Selects the database
  $tildes = $connect->query("SET NAMES 'utf8'");
  ?>
  <form id="bootstrapSelectForm" method="post" class="form-horizontal" action="recoge.php">
    <div class="row" id="contenedorFormulario">
      <div class="icon">
        <img src="http://www.hogarium.es/img/hogarium-logo-1484066909.jpg" alt="hogarium-logo" class="img-thumbnail">
      </div>
      <label class="col-xs-3 control-label" >Desde</label>
      <div class="form-group">

        <div class="col-xs-5 selectContainer">
          <select name="from" id="dynamic_select" class="form-control form-control-success selectpicker" >
            <optgroup value="60" label="España - Peninsular">
              <?php
              session_start();
              if(isset($_REQUEST['provinciafrom']) && isset($_REQUEST['idprovfrom'])){
                $provinciafrom=$_REQUEST['provinciafrom'];
                $idprovfrom=$_REQUEST['idprovfrom'];
                ?>

                <option value="<?php $_REQUEST['idprovfrom'];?>"><?php echo $_REQUEST['idprovfrom'].' - '.$_REQUEST['provinciafrom'];?></option>
                <?php
              }else{


                $result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma NOT IN (4,5,18,19)");
                while ($extraido= mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php?idprovfrom='.$extraido['id_provincia'].'&provinciafrom='.$extraido['provincia'];?>">
                    <?php 
                    echo ($extraido['id_provincia']. ' - '.$extraido['provincia']);
                    ?>
                  </option>
                  <?php
                }
              }
              ?>
            </optgroup>
            <optgroup value="40" data-parsley-id="5737" label="España - Islas Baleares">
              <?php
              session_start();
              if(isset($_REQUEST['provinciafrom']) && isset($_REQUEST['idprovfrom'])){
                $provinciafrom=$_REQUEST['provinciafrom'];
                $idprovfrom=$_REQUEST['idprovfrom'];
                ?>

                <option value="<?php $_REQUEST['idprovfrom'];?>"><?php echo $_REQUEST['idprovfrom'].' - '.$_REQUEST['provinciafrom'];?></option>
                <?php
              }else{


                $result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma IN (4)");
          //mysqli_data_seek ($result, 0);

                while ($extraido= mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php 'http://127.0.0.1/hogarium_apli/index.php?idprovfrom='.$extraido['id_provincia'].'&provinciafrom='.$extraido['provincia'];?>">
                    <?php 
                    echo ($extraido['id_provincia']. ' - '.$extraido['provincia']);
                    ?>
                  </option>
                  <?php
                }
              }
              ?>
            </optgroup>
            <optgroup value="49" data-parsley-id="0844" label="España - Islas Canarias">
              <?php
              session_start();
              if(isset($_REQUEST['provinciafrom']) && isset($_REQUEST['idprovfrom'])){
                $provinciafrom=$_REQUEST['provinciafrom'];
                $idprovfrom=$_REQUEST['idprovfrom'];
                ?>

                <option value="<?php $_REQUEST['idprovfrom'];?>"><?php echo $_REQUEST['idprovfrom'].' - '.$_REQUEST['provinciafrom'];?></option>
                <?php
              }else{


                $result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma IN (5)");
          //mysqli_data_seek ($result, 0);

                while ($extraido= mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php 'http://127.0.0.1/hogarium_apli/index.php?idprovfrom='.$extraido['id_provincia'].'&provinciafrom='.$extraido['provincia'];?>">
                    <?php 
                    echo ($extraido['id_provincia']. ' - '.$extraido['provincia']);
                    ?>
                  </option>
                  <?php
                }
              }
              ?>
            </optgroup>

            <optgroup value="47" rel="notImport" data-parsley-id="3769" label="España - Ceuta y Melilla">
              <?php
              session_start();
              if(isset($_REQUEST['provinciafrom']) && isset($_REQUEST['idprovfrom'])){
                $provinciafrom=$_REQUEST['provinciafrom'];
                $idprovfrom=$_REQUEST['idprovfrom'];
                ?>

                <option value="<?php $_REQUEST['idprovfrom'];?>"><?php echo $_REQUEST['idprovfrom'].' - '.$_REQUEST['provinciafrom'];?></option>
                <?php
              }else{


                $result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma IN (18,19)");
          //mysqli_data_seek ($result, 0);

                while ($extraido= mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php 'http://127.0.0.1/hogarium_apli/index.php?idprovfrom='.$extraido['id_provincia'].'&provinciafrom='.$extraido['provincia'];?>">
                    <?php 
                    echo ($extraido['id_provincia']. ' - '.$extraido['provincia']);
                    ?>
                  </option>
                  <?php
                }
              }
              ?>
            </optgroup>
          </select>      
          <select id="dynamic_select3" name="enviofrom" class="form-control selectpicker dropup" >                                 
            <option>INTRODUCIR CP O CIUDAD</option>
            <?php
            $idprovf=$_REQUEST['idprovfrom'];
            $result1 = mysqli_query($connect,  "Select * from localidades where id_provincia = $idprovf");

            while($rowfrom=mysqli_fetch_array($result1)){
              ?>
              <option value="<?php $rowfrom[2];?>"><?php echo $rowfrom[0].'-'.$rowfrom[1];?></option>
              <?php
            }
            ?>

          </select>
        </div>
      </div>
      <label class="col-lg-3 control-label">A</label>
      <div class="form-group">

        <div class="col-xs-5 selectContainer">
          <select name="to" id="dynamic_select2" class="form-control selectpicker">
            <optgroup value="67" label="España-peninsular">
              <?php 
              if(isset($_REQUEST['provinciato']) && isset($_REQUEST['idprovto'])){
                $provinciato=$_REQUEST['provinciato'];
                $idprovto=$_REQUEST['idprovto'];

                ?>

                <option value="<?php $_REQUEST['idprovto'];?>"><?php echo $_REQUEST['idprovto'].' - '.$_REQUEST['provinciato'];?></option>
                <?php
              }else{
                $_SESSION['idprovfrom'] = $_REQUEST['idprovfrom'];
                $_SESSION['provinciafrom'] = $_REQUEST['provinciafrom'];

                $result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma NOT IN (4,5,18,19)");

                while ($extraido= mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php?idprovfrom='.$_SESSION['idprovfrom'].'&provincia='.$_SESSION['provinciafrom'].'&idprovto='.$extraido['id_provincia'].'&provinciato='.$extraido['provincia'];?>">
                    <?php 
                    echo ($extraido['id_provincia']. ' - '.$extraido['provincia']);
                    ?>
                  </option>
                  <?php
                }
              }
              ?>
            </optgroup>

            <optgroup value="68" data-parsley-id="5737" label="España - Islas Baleares">

              <?php 
              if(isset($_REQUEST['provinciato']) && isset($_REQUEST['idprovto'])){
                $provinciato=$_REQUEST['provinciato'];
                $idprovto=$_REQUEST['idprovto'];

                ?>

                <option value="<?php $_REQUEST['idprovto'];?>"><?php echo $_REQUEST['idprovto'].' - '.$_REQUEST['provinciato'];?></option>
                <?php
              }else{
                $_SESSION['idprovfrom'] = $_REQUEST['idprovfrom'];
                $_SESSION['provinciafrom'] = $_REQUEST['provinciafrom'];

                $result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma IN (4)");
          //mysqli_data_seek ($result, 0);

                while ($extraido= mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php?idprovfrom='.$_SESSION['idprovfrom'].'&provincia='.$_SESSION['provinciafrom'].'&idprovto='.$extraido['id_provincia'].'&provinciato='.$extraido['provincia'];?>">
                    <?php 
                    echo ($extraido['id_provincia']. ' - '.$extraido['provincia']);
                    ?>
                  </option>
                  <?php
                }
              }
              ?>

            </optgroup>

            <optgroup value="69" data-parsley-id="0844" label="España - Islas Canarias">
              <?php 
              if(isset($_REQUEST['provinciato']) && isset($_REQUEST['idprovto'])){
                $provinciato=$_REQUEST['provinciato'];
                $idprovto=$_REQUEST['idprovto'];

                ?>

                <option value="<?php echo $_REQUEST['idprovto'];?>"><?php echo $_REQUEST['idprovto'].' - '.$_REQUEST['provinciato'];?></option>
                <?php
              }else{
                $_SESSION['idprovfrom'] = $_REQUEST['idprovfrom'];
                $_SESSION['provinciafrom'] = $_REQUEST['provinciafrom'];

                $result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma IN (5)");
          //mysqli_data_seek ($result, 0);

                while ($extraido= mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php?idprovfrom='.$_SESSION['idprovfrom'].'&provincia='.$_SESSION['provinciafrom'].'&idprovto='.$extraido['id_provincia'].'&provinciato='.$extraido['provincia'];?>">
                    <?php 
                    echo ($extraido['id_provincia']. ' - '.$extraido['provincia']);
                    ?>
                  </option>
                  <?php
                }
              }
              ?>
            </optgroup>

            <optgroup value="66" rel="notImport" data-parsley-id="3769" label="España - Ceuta y Melilla">
              <?php 
              if(isset($_REQUEST['provinciato']) && isset($_REQUEST['idprovto'])){
                $provinciato=$_REQUEST['provinciato'];
                $idprovto=$_REQUEST['idprovto'];

                ?>

                <option value="<?php echo $_REQUEST['idprovto'];?>"><?php echo $_REQUEST['idprovto'].' - '.$_REQUEST['provinciato'];?></option>
                <?php
              }else{
                $_SESSION['idprovfrom'] = $_REQUEST['idprovfrom'];
                $_SESSION['provinciafrom'] = $_REQUEST['provinciafrom'];

                $result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma IN (18,19)");
          //mysqli_data_seek ($result, 0);

                while ($extraido= mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php?idprovfrom='.$_SESSION['idprovfrom'].'&provincia='.$_SESSION['provinciafrom'].'&idprovto='.$extraido['id_provincia'].'&provinciato='.$extraido['provincia'];?>">
                    <?php 
                    echo ($extraido['id_provincia']. ' - '.$extraido['provincia']);
                    ?>
                  </option>
                  <?php
                }
              }
              ?>

            </optgroup>
          </select> 
          <select id="dynamic_select3" name="envioTO" class="form-control selectpicker"> 
            <option>INTRODUCIR CP O CIUDAD</option>
            <?php
            $idprovt=$_REQUEST['idprovto'];
            $result = mysqli_query($connect, "Select * from localidades where id_provincia = $idprovt");
            while($row=mysqli_fetch_array($result)){
              ?>
              <option value="<?php $row[2];?>"><?php echo $row[0].'-'.$row[1];?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class="col-sm-3">
        <label for="inputSuccess" class="form-control-label">Peso
          <div class="input-group input-group-lg has-success">
            <input class="form-control form-control-success" id="inputSuccess" type="text" name="peso">
            <span class="input-group-addon" id="basic-addon3">kg</span>
          </div>
        </label><br>
      </div>
      <div class="col-sm-3">
        <label for="inputSuccess2" class="form-control-label">Alto
          <div class="input-group input-group-lg has-success has-feedback">
            <input class="form-control form-control-success" id="inputSuccess2" type="text" name="alto">
            <span class="input-group-addon" id="basic-addon3">cm</span>
          </div>
        </label><br>
      </div>
      <div class="col-sm-3">
        <label for="inputSuccess3" class="form-control-label">Ancho
          <div class="input-group input-group-lg has-success">
            <input class="form-control form-control-success" id="inputSuccess3" type="text" name="Ancho">
            <span class="input-group-addon" id="basic-addon3">cm</span>
          </div>
        </label><br>
      </div>
      <div class="col-sm-3">
        <label for="inputSuccess4" class="form-control-label">Largo
          <div class="input-group input-group-lg has-success">
            <input class="form-control form-control-success" id="inputSuccess4" type="text" name="largo">
            <span class="input-group-addon" id="basic-addon3">cm</span>
          </div>
        </label><br>
      </div>
      <div class="col-sm-3">
        <label for="inputSuccess" class="form-control-label">Peso
          <div class="input-group input-group-lg has-success">
            <input class="form-control form-control-success" id="inputSuccess" type="text" name="peso">
            <span class="input-group-addon" id="basic-addon3">kg</span>
          </div>
        </label><br>
      </div>
      <div class="col-sm-3">
        <label for="inputSuccess2" class="form-control-label">Alto
          <div class="input-group input-group-lg has-success has-feedback">
            <input class="form-control form-control-success" id="inputSuccess2" type="text" name="alto">
            <span class="input-group-addon" id="basic-addon3">cm</span>
          </div>
        </label><br>
      </div>
      <div class="col-sm-3">
        <label for="inputSuccess3" class="form-control-label">Ancho
          <div class="input-group input-group-lg has-success">
            <input class="form-control form-control-success" id="inputSuccess3" type="text" name="Ancho">
            <span class="input-group-addon" id="basic-addon3">cm</span>
          </div>
        </label><br>
      </div>
      <div class="col-sm-3">
        <label for="inputSuccess4" class="form-control-label">Largo
          <div class="input-group input-group-lg has-success">
            <input class="form-control form-control-success" id="inputSuccess4" type="text" name="largo">
            <span class="input-group-addon" id="basic-addon3">cm</span>
          </div>
        </label><br>
      </div>
      <div class="col-sm-3">
        <label for="inputSuccess" class="form-control-label">Peso
          <div class="input-group input-group-lg has-success">
            <input class="form-control form-control-success" id="inputSuccess" type="text" name="peso">
            <span class="input-group-addon" id="basic-addon3">kg</span>
          </div>
        </label><br>
      </div>
      <div class="col-sm-3">
        <label for="inputSuccess2" class="form-control-label">Alto
          <div class="input-group input-group-lg has-success has-feedback">
            <input class="form-control form-control-success" id="inputSuccess2" type="text" name="alto">
            <span class="input-group-addon" id="basic-addon3">cm</span>
          </div>
        </label><br>
      </div>
      <div class="col-sm-3">
        <label for="inputSuccess3" class="form-control-label">Ancho
          <div class="input-group input-group-lg has-success">
            <input class="form-control form-control-success" id="inputSuccess3" type="text" name="Ancho">
            <span class="input-group-addon" id="basic-addon3">cm</span>
          </div>
        </label><br>
      </div>
      <div class="col-sm-3">
        <label for="inputSuccess4" class="form-control-label">Largo
          <div class="input-group input-group-lg has-success">
            <input class="form-control form-control-success" id="inputSuccess4" type="text" name="largo">
            <span class="input-group-addon" id="basic-addon3">cm</span>
          </div>
        </label><br>
      </div>
      <div class="btn-group btn-group-lg">
        <button type="button" class="btn btn-success disabled"  onclick="location.href='recoge.php';">Calcular</button>
        <button type="button" class="btn btn-danger"  onclick="location.href='logout.php';">Borrar datos</button>
        <button type="button" class="btn-sm btn-info" onclick="location.href='multibulto.php';"><span class="glyphicon glyphicon-minus"></span></button>
      </div>
      
    </div>
    
  </div>  
</nav>      
</form>
</body>
</html>