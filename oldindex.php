<!DOCTYPE html>
<html>
<head>
	<title>Hogarium_apli</title>
	<meta charset="utf-8">
	<meta http-equiv="content-language" content="es_ES" />
	<meta name="copyright" content="fsola" />
	<link rel="icon" type="image/png" sizes="16x16" href="http://www.mueblesdeecija.com/fabricantes-muebles/wp-content/uploads/2014/08/hogarium.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"/></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"/></script>
	<link rel="stylesheet" type="text/css" href="files/css/AdminLTE.css">
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">	
	<link href="files/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="files/css/tabla2.css">
	<style type="text/css">

		* {
			font-family: 'Varela Round', serif;
		}
		form {
			background-color: #0080FF;
			padding: 50px;
			padding-left: 10px;
		}
		.icon {
			padding-left: 15px;
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
		.input-group {
			position: relative;
			padding-top: 20px;
			padding-left: 15px;
		}
		.btn-group {
			padding-left: 30px;
			padding-top: 30px;
		}
		.btn-circle {
			text-align: center;
			border-radius: 100%;
		}
		@media (min-width: @screen-small) {
			margin-left:  (@gutter / -2);
			margin-right: (@gutter / -2);
		}

		.table > tbody > tr > td {
			text-align: center!important;
			vertical-align: middle!important;
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
<body class="skin-black">
	<?php
	$connect = mysqli_connect ("127.0.0.1", "root") or die (mysqli_error()); // Connects to the database. 
	mysqli_select_db ($connect, "hogarium_apli") or die (mysqli_error()); // Selects the database
	$tildes = $connect->query("SET NAMES 'utf8'");
	?>
	<form id="bootstrapSelectForm" method="get" class="form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
		<fieldset>
			<div class="row clearfix" id="contenedorFormulario">
				<div class="icon">
					<img src="http://www.hogarium.es/img/hogarium-logo-1484066909.jpg" alt="hogarium-logo" class="img-thumbnail">
				</div>
				<?php
			/*session_start();

			if(isset($_SESSION['email'])){
				?>
				<span class="bienvenida">Bienvenido <strong><?php echo $_SESSION['email']; ?></strong>, <a href='oldindex.php'>Cerrar sesión</a>
					<?php
				}else{
					header("Location: oldindex.php");
				}*/
				?>
				<label class="col-xs-3 control-label" ><span class="glyphicon glyphicon-map-marker"></span>Desde</label>
				<div class="form-group">				
					<div class="col-xs-5 selectContainer">
						<select name="from" id="dynamic_select" class="form-control form-control-success" >	
							<optgroup value="60" label="España - Peninsular">
								<?php
								session_start();
								if(isset($_GET['provincia']) && isset($_GET['idprovfrom'])){
									$provincia=$_GET['provincia'];
									$idprovfrom=$_GET['idprovfrom'];
									?>

									<option value="<?php echo $_GET['idprovfrom'];?>"><?php echo $_GET['idprovfrom'].' - '.$_GET['provincia'];?></option>
									<?php
								}else{


									$result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma NOT IN (4,5,18,19)");
									while ($extraido= mysqli_fetch_array($result)) {
										?>
										<option value="<?php echo 'http://127.0.0.1/hogarium_apli/oldindex.php?idprovfrom='.$extraido['id_provincia'].'&provincia='.$extraido['provincia'];?>">
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
								if(isset($_GET['provincia']) && isset($_GET['idprovfrom'])){
									$provincia=$_GET['provincia'];
									$idprovfrom=$_GET['idprovfrom'];
									?>

									<option value="<?php echo $_GET['idprovfrom'];?>"><?php echo $_REQUEST['idprovfrom'].' - '.$_REQUEST['provincia'];?></option>
									<?php
								}else{


									$result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma IN (4)");	
					//mysqli_data_seek ($result, 0);

									while ($extraido= mysqli_fetch_array($result)) {
										?>
										<option value="<?php echo 'http://127.0.0.1/hogarium_apli/oldindex.php?idprovfrom='.$extraido['id_provincia'].'&provincia='.$extraido['provincia'];?>">
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
								if(isset($_GET['provincia']) && isset($_GET['idprovfrom'])){
									$provincia=$_GET['provincia'];
									$idprovfrom=$_GET['idprovfrom'];
									?>

									<option value="<?php echo $_GET['idprovfrom'];?>"><?php echo $_GET['idprovfrom'].' - '.$_GET['provincia'];?></option>
									<?php
								}else{


									$result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma IN (5)");
					//mysqli_data_seek ($result, 0);

									while ($extraido= mysqli_fetch_array($result)) {
										?>
										<option value="<?php echo 'http://127.0.0.1/hogarium_apli/oldindex.php?idprovfrom='.$extraido['id_provincia'].'&provincia='.$extraido['provincia'];?>">
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
								if(isset($_GET['provincia']) && isset($_GET['idprovfrom'])){
									$provincia=$_GET['provincia'];
									$idprovfrom=$_GET['idprovfrom'];
									?>

									<option value="<?php echo $_GET['idprovfrom'];?>"><?php echo $_GET['idprovfrom'].' - '.$_GET['provincia'];?></option>
									<?php
								}else{


									$result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma IN (18,19)");
					//mysqli_data_seek ($result, 0);

									while ($extraido= mysqli_fetch_array($result)) {
										?>
										<option value="<?php echo 'http://127.0.0.1/hogarium_apli/oldindex.php?idprovfrom='.$extraido['id_provincia'].'&provincia='.$extraido['provincia'];?>">
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
							<?php //ISSET GORDO
							if(isset($_GET['provincia']) && isset($_GET['idprovfrom']) && isset($_GET['cpfrom']) && isset($_GET['pobfrom'])){
								session_start();	
								$_SESSION['idprovfrom']=$_GET['idprovfrom'];
								$_SESSION['provincia']=$_GET['provincia'];
								$cpfrom=$_GET['cpfrom'];
								$pobfrom=$_GET['pobfrom'];
								?>
								<option value="<?php echo $_GET['cpfrom'];?>"><?php echo $_GET['cpfrom'].' - '.$_GET['pobfrom'];?></option>
								<?php
							}else{
								$idprovf=$_GET['idprovfrom'];
								$result1 = mysqli_query($connect,  "Select * from localidades where id_provincia = $idprovf order by cod_postal");

								while($rowfrom=mysqli_fetch_array($result1)){
									?>
									<option  value="<?php echo 'http://127.0.0.1/hogarium_apli/oldindex.php?idprovfrom='.$_GET['idprovfrom'].'&provincia='.$_GET['provincia'].'&cpfrom='.$rowfrom[0].'&pobfrom='.$rowfrom[1];?>"><?php echo $rowfrom[0].'-'.$rowfrom[1];?></option>
									<?php
								}
							}
							?>

						</select>
					</div>
				</div>
				<label class="col-lg-3 control-label"><span class="glyphicon glyphicon-map-marker"></span>A</label>
				<div class="form-group">
					
					<div class="col-xs-5 selectContainer">
						<select name="to" id="dynamic_select2" class="form-control selectpicker">
							<optgroup value="67" label="España-peninsular">
								<?php 
								if(isset($_GET['idprovfrom']) 
									&& isset($_GET['provincia'])
									&& isset($_GET['cpfrom'])
									&& isset($_GET['pobfrom'])
									&& isset($_GET['idprovto'])
									&& isset($_GET['provinciato'])){
									$_SESSION['idprovfrom'] = $_GET['idprovfrom'];
								$_SESSION['provincia']=$_GET['provincia'];
								$_SESSION['cpfrom'] = $_GET['cpfrom'];
								$_SESSION['pobfrom'] = $_GET['pobfrom'];
								$provinciato=$_GET['provinciato'];
								$idprovto=$_GET['idprovto'];

								?>

								<option value="<?php echo $_GET['idprovto'];?>"><?php echo $_GET['idprovto'].' - '.$_GET['provinciato'];?></option>
								<?php
							}else{

								$result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma NOT IN (4,5,18,19)");

								while ($extraido= mysqli_fetch_array($result)) {
									?>
									<option value="<?php echo 'http://127.0.0.1/hogarium_apli/oldindex.php
									?idprovfrom='.$_GET['idprovfrom'].'
									&provincia='.$_GET['provincia'].'
									&cpfrom='.$_GET['cpfrom'].'
									&pobfrom='.$_GET['pobfrom'].'
									&idprovto='.$extraido['id_provincia'].'
									&provinciato='.$extraido['provincia'];?>">
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
						if(isset($_GET['idprovfrom']) 
							&& isset($_GET['provincia'])
							&& isset($_GET['cpfrom'])
							&& isset($_GET['pobfrom'])
							&& isset($_GET['idprovto'])
							&& isset($_GET['provinciato'])){
							$_SESSION['idprovfrom'] = $_GET['idprovfrom'];
						$_SESSION['provincia']=$_GET['provincia'];
						$_SESSION['cpfrom'] = $_GET['cpfrom'];
						$_SESSION['pobfrom'] = $_GET['pobfrom'];
						$provinciato=$_GET['provinciato'];
						$idprovto=$_GET['idprovto'];

						?>

						<option value="<?php echo $_GET['idprovto'];?>"><?php echo $_GET['idprovto'].' - '.$_GET['provinciato'];?></option>
						<?php
					}else{
						$result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma IN (4)");
					//mysqli_data_seek ($result, 0);

						while ($extraido= mysqli_fetch_array($result)) {
							?>
							<option value="<?php echo 'http://127.0.0.1/hogarium_apli/oldindex.php
							?idprovfrom='.$_GET['idprovfrom'].'
							&provincia='.$_GET['provincia'].'
							&cpfrom='.$_GET['cpfrom'].'
							&pobfrom='.$_GET['pobfrom'].'
							&idprovto='.$extraido['id_provincia'].'
							&provinciato='.$extraido['provincia'];?>">
							<?php 
							echo $extraido['id_provincia']. ' - '.$extraido['provincia'];
							?>
						</option>
						<?php
					}
				}
				?>

			</optgroup>

			<optgroup  label="España - Islas Canarias">
				<?php 
				if(isset($_GET['idprovfrom']) 
					&& isset($_GET['provincia'])
					&& isset($_GET['cpfrom'])
					&& isset($_GET['pobfrom'])
					&& isset($_GET['idprovto'])
					&& isset($_GET['provinciato'])){
					$_SESSION['idprovfrom'] = $_GET['idprovfrom'];
				$_SESSION['provincia']=$_GET['provincia'];
				$_SESSION['cpfrom'] = $_GET['cpfrom'];
				$_SESSION['pobfrom'] = $_GET['pobfrom'];
				$provinciato=$_GET['provinciato'];
				$idprovto=$_GET['idprovto'];
				?>

				<option value="<?php echo $_GET['idprovto'];?>"><?php echo $_GET['idprovto'].' - '.$_GET['provinciato'];?></option>
				<?php
			}else{
				$result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma IN (5)");
					//mysqli_data_seek ($result, 0);

				while ($extraido= mysqli_fetch_array($result)) {
					?>
					<option value="<?php echo 'http://127.0.0.1/hogarium_apli/oldindex.php
					?idprovfrom='.$_GET['idprovfrom'].'
					&provincia='.$_GET['provincia'].'
					&cpfrom='.$_GET['cpfrom'].'
					&pobfrom='.$_GET['pobfrom'].'
					&idprovto='.$extraido['id_provincia'].'
					&provinciato='.$extraido['provincia'];?>">
					<?php 
					echo $extraido['id_provincia']. ' - '.$extraido['provincia'];
					?>
				</option>
				<?php
			}
		}
		?>
	</optgroup>

	<optgroup  label="España - Ceuta y Melilla">
		<?php 
		if(isset($_GET['idprovfrom']) 
			&& isset($_GET['provincia'])
			&& isset($_GET['cpfrom'])
			&& isset($_GET['pobfrom'])
			&& isset($_GET['idprovto'])
			&& isset($_GET['provinciato'])){

			$_SESSION['idprovfrom'] = $_GET['idprovfrom'];
		$_SESSION['provincia']=$_GET['provincia'];
		$_SESSION['cpfrom'] = $_GET['cpfrom'];
		$_SESSION['pobfrom'] = $_GET['pobfrom'];
		$provinciato=$_GET['provinciato'];
		$idprovto=$_GET['idprovto'];

		?>

		<option value="<?php echo $_GET['idprovto'];?>"><?php echo $_GET['idprovto'].' - '.$_GET['provinciato'];?></option>
		<?php
	}else{

		$result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma IN (18,19)");
					//mysqli_data_seek ($result, 0);

		while ($extraido= mysqli_fetch_array($result)) {
			?>
			<option value="<?php echo 'http://127.0.0.1/hogarium_apli/oldindex.php
			?idprovfrom='.$_GET['idprovfrom'].'
			&provincia='.$_GET['provincia'].'
			&cpfrom='.$_GET['cpfrom'].'
			&pobfrom='.$_GET['pobfrom'].'
			&idprovto='.$extraido['id_provincia'].'
			&provinciato='.$extraido['provincia'];?>">
			<?php 
			echo $extraido['id_provincia']. ' - '.$extraido['provincia'];
			?>
		</option>
		<?php
	}
}
?>

</optgroup>
</select> 
<select id="dynamic_select3" name="envioTO" class="form-control selectpicker"> 
	<!--<option>INTRODUCIR CP O CIUDAD</option>-->
	<?php
	if(isset($_GET['idprovfrom']) 
		&& isset($_GET['provincia'])
		&& isset($_GET['cpfrom'])
		&& isset($_GET['pobfrom'])
		&& isset($_GET['idprovto'])
		&& isset($_GET['provinciato'])
		&& isset($_GET['cpto'])
		&& isset($_GET['pobto'])){

		$_SESSION['cpfrom']=$_GET['cpfrom'];
	$_SESSION['pobfrom']=$_GET['pobfrom'];
	$_SESSION['idprovfrom']=$_GET['idprovfrom'];
	$_SESSION['provincia']=$_GET['provincia'];
	$_SESSION['idprovto'] = $_GET['idprovto'];
	$_SESSION['provinciato'] = $_GET['provinciato'];
	$cpto=$_GET['cpto'];
	$pobto=$_GET['pobto'];
	?>
	<option value="<?php echo $_GET['cpto'];?>"><?php echo $_GET['cpto'].' - '.$_GET['pobto'];?></option>
	<?php
}else {
	$idprovt=$_GET['idprovto'];
	$result = mysqli_query($connect, "Select * from localidades where id_provincia = $idprovt order by cod_postal");
	while($rowto=mysqli_fetch_array($result)){
		?>
		<option value="<?php echo 'http://127.0.0.1/hogarium_apli/oldindex.php
		?idprovfrom='.$_GET['idprovfrom'].'
		&provincia='.$_GET['provincia'].'
		&cpfrom='.$_GET['cpfrom'].'
		&pobfrom='.$_GET['pobfrom'].'
		&idprovto='.$_GET['idprovto'].'
		&provinciato='.$_GET['provinciato'].'
		&cpto='.$rowto['cod_postal'].'
		&pobto='.$rowto['nombre'];?>">
		
		<?php 
		echo $rowto['cod_postal'].'-'.$rowto['nombre'];
		?>
		
	</option>
	<?php
}
}

?>
</select>
</div>
</div>
<input type="hidden" name="idprovfrom" value="<?php echo $idprovfrom;?>">
<input type="hidden" name="provinciafrom" value="<?php echo $provinciafrom;?>">
<input type="hidden" name="idprovto" value="<?php echo $idprovto;?>">
<input type="hidden" name="provinciato" value="<?php echo $provinciato;?>">
<div class="input-group">
	<div class="col-lg-3">
		<label for="inputSuccess" class="form-control-label">Peso
			<div class="input-group input-group-lg has-success">
				<input class="form-control form-control-success" id="inputSuccess" type="text" name="peso"> 
				<span class="input-group-addon" id="basic-addon3">kg</span>
			</div>
		</label><br>
	</div>
	<div class="col-lg-2">
		<label for="inputSuccess4" class="form-control-label">Largo
			<div class="input-group input-group-lg has-success">
				<input class="form-control form-control-success" id="inputSuccess4" type="text" name="largo">
				<span class="input-group-addon" id="basic-addon3">cm</span>
			</div>
		</label><br>
	</div>
	<div class="col-lg-2">
		<label for="inputSuccess3" class="form-control-label">Ancho
			<div class="input-group input-group-lg has-success">
				<input class="form-control form-control-success" id="inputSuccess3" type="text" name="ancho">
				<span class="input-group-addon" id="basic-addon3">cm</span>
			</div>
		</label><br>
	</div>
	<div class="col-lg-2">
		<label for="inputSuccess2" class="form-control-label">Alto
			<div class="input-group input-group-lg has-success has-feedback">
				<input class="form-control form-control-success" id="inputSuccess2" type="text" name="alto">
				<span class="input-group-addon" id="basic-addon3">cm</span>
			</div>
		</label><br>
	</div>

	<div class="col-lg-3" style="padding-right: 30px;">
		<label for="inputSuccess4" class="form-control-label">Reembolso
			<div class="input-group input-group-lg has-success">
				<input class="form-control form-control-success" id="inputSuccess5" type="text" name="reembolso">
				<span class="input-group-addon" id="basic-addon3">€</span>
			</div>
		</label><br>
	</div>	
</div>

<div class="btn-group btn-group-lg">
	<button type="submit" class="btn-sm btn-success disabled" ><span class="fa fa-calculator"></span>Calcular</button>
	<button type="reset" class="btn-sm btn-danger"  onclick="location.href='logout.php';"><span class="glyphicon glyphicon-trash"></span>Borrar datos</button>
	<button type="button" class="btn-sm btn-info btn-circle" onclick="location.href='multibulto.php';"><span class="glyphicon glyphicon-plus" ></span></button>
</div>		
</div>

</div>	
</fieldset>		
</form>
<body class="skin-black">
	<?php
          $connect = mysqli_connect ("127.0.0.1", "root") or die (mysqli_error()); // Connects to the database. 
          mysqli_select_db ($connect, "hogarium_apli") or die (mysqli_error()); // Selects the database
          $tildes = $connect->query("SET NAMES 'utf8'");

          $idprovto=@$_GET['idprovto'];
          $provinciato=@$_GET['provinciato'];

          $alto = @$_GET['alto'];
          $ancho = @$_GET['ancho'];
          $largo = @$_GET['largo'];
          $m3 = $alto*$ancho*$largo;
          $peso = $_GET['peso'];

          $idcodaut=mysqli_query($connect, "SELECT cod_com_autonoma FROM provincias WHERE id_provincia = '$idprovto'");
          $idcodautAr=mysqli_fetch_array($idcodaut);
          ?>
          <section class="content">
          	<div class="col-lg-15 col-md-15">
          		<div class="box box-solid box-warning">
          			<div class="box-header">

          				<h3 class="box-title"> <button type="button" class="btn-sm btn-info" onclick="location.href='hogarium_apli/oldindex.php';"><span class="glyphicon glyphicon-arrow-left" ></span></button> HOGARIUM</h3>
          			</div><!-- /.box-header -->
          			<div class="box-body">
          				<table cid="example2" class="table table-bordered table-hover">
          					<tr>
          						<th style="width: 10px">#</th>
          						<th>Empresa</th>
          						<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Precio</th>
          						<th style="width: 40px">Label</th>
          					</tr>
          					<tr>

          						<td>1.</span></td>
          						<td>
          							<div class="thumbnail">
          								<img class="img-rounded" width="304" height="236" src="http://es.asmred.com/wp-content/uploads/2015/03/logo.png"/>
          							</div>
          						</td>
          						<td>
          							<div class="alert alert-info">
          								<span class="info-box-number" style="font-weight: bold;">
          									<?php
          									$pvasm = $largo * $ancho * $alto * 167 / 1000000;

          									if($peso>$pvasm){
          										$pesosMayoresASM = ceil($peso - 20);
          										echo "EL PESO ES MAYOR QUE pesoVolumetrico";
          										echo "<br>";

          										if($idprovto==41){
          											echo "CALCULO PARA SEVILLA";
          											echo "<br>";
          											if($peso>0 && $peso<=1){
          												$pesotasa=$peso*3.14;
          												echo "Tasa + PESO ASM ".$pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso>1 && $peso<=3){
          												$pesotasa=$peso*3.20;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso>3 && $peso<=5){
          												$pesotasa=$peso*3.30;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											else if($peso>5 && $peso<=10){
          												$pesotasa=$peso*3.45;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso>10 && $peso<=15){
          												$pesotasa=$peso*3.70;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso>15 && $peso<=20){
          												$pesotasa=$peso*3.30;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso>20){
          												$pesotasa= 4.30 + ($pesosMayoresASM * 0.20);
          												echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
          												echo "<br>";            
          											}
          										}elseif ($idcodautAr[0]==1){
          											echo "CALCULO REGIONAL";
          											echo "<br>";
          											if($peso>0 && $peso<=1){
          												$pesotasa=$peso*3.35;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";
          											}
          											elseif($peso>1 && $peso<=3){
          												$pesotasa=$peso*3.54;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso>3 && $peso<=5){
          												$pesotasa=$peso*3.60;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}   
          											elseif($peso>5 && $peso<=10){
          												$pesotasa=$peso*3.90;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso>10 && $peso<=15){
          												$pesotasa=$peso*4.90;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}           
          											elseif($peso>15 && $peso<=20){
          												$pesotasa=$peso*5.50;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}   
          											elseif($peso>20){
          												$pesotasa= 5.50 + ($pesosMayoresASM * 0.25);
          												echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
          												echo "<br>";            
          											}   
          										}else{
          											echo "CALCULO PENINSULAR";
          											echo "<br>";
          											if($peso>0 && $peso<=1){
          												$pesotasa=$peso*3.50;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";
          											}
          											elseif($peso>1 && $peso<=3){
          												$pesotasa=$peso*3.70;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso>3 && $peso<=5){
          												$pesotasa=$peso*4.05;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}   
          											elseif($peso>5 && $peso<=10){
          												$pesotasa=$peso*4.30;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso>10 && $peso<=15){
          												$pesotasa=$peso*5.15;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}           
          											elseif($peso>15 && $peso<=20){
          												$pesotasa=$peso*7.00;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}   
          											elseif($peso>20){
          												$pesotasa= 7.00 + ($pesosMayoresASM * 0.28);
          												echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
          												echo "<br>";            
          											}                           
          										}
          									} elseif ($peso<$pvasm){
          										$pesosMayoresASM = ceil($pvasm - 20);

          										if($idprovto==41){
          											echo "CALCULO PARA SEVILLA";
          											echo "<br>";
          											if($pvasm>0 && $pvasm<=1){
          												$pesotasa=$pvasm*3.14;
          												echo "Tasa + PESO ASM ".$pesotasa." €";
          												echo "<br>";
          											}
          											elseif($pvasm>1 && $pvasm<=3){
          												$pesotasa=$pvasm*3.20;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($pvasm>3 && $pvasm<=5){
          												$pesotasa=$pvasm*3.30;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($pvasm>5 && $pvasm<=10){
          												$pesotasa=$pvasm*3.45;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($pvasm>10 && $pvasm<=15){
          												$pesotasa=$pvasm*3.70;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($pvasm>15 && $pvasm<=20){
          												$pesotasa=$pvasm*4.30;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($pvasm>20){
          												$pesotasa=4.30 + ( $pesosMayoresASM * 0.20);
          												echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
          												echo "<br>";            
          											}
          										}elseif ($idcodautAr[0]==1){
          											echo "CALCULO REGIONAL";
          											echo "<br>";
          											if($pvasm>0 && $pvasm<=1){
          												$pesotasa=$pvasm*3.35;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";
          											}
          											elseif($pvasm>1 && $pvasm<=3){
          												$pesotasa=$pvasm*3.54;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($pvasm>3 && $pvasm<=5){
          												$pesotasa=$pvasm*3.60;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}   
          											elseif($pvasm>5 && $pvasm<=10){
          												$pesotasa=$pvasm*3.90;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($pvasm>10 && $pvasm<=15){
          												$pesotasa=$pvasm*4.90;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}           
          											elseif($pvasm>15 && $pvasm<=20){
          												$pesotasa=$peso*5.50;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}   
          											elseif($pvasm>20){
          												$pesotasa= 5.50 + ($pesosMayoresASM * 0.25);
          												echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
          												echo "<br>";            
          											}       
          										}else{
          											echo "CALCULO PENINSULAR";
          											echo "<br>";
          											if($pvasm>0 && $pvasm<=1){
          												$pesotasa=$pvasm*3.50;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";
          											}
          											elseif($pvasm>1 && $pvasm<=3){
          												$pesotasa=$pvasm*3.70;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($pvasm>3 && $pvasm<=5){
          												$pesotasa=$peso*4.05;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}   
          											elseif($pvasm>5 && $pvasm<=10){
          												$pesotasa=$pvasm*4.30;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($pvasm>10 && $pvasm<=15){
          												$pesotasa=$pvasm*5.15;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}           
          											elseif($pvasm>15 && $pvasm<=20){
          												$pesotasa=$pvasm*7.00;
          												echo "Tasa + PESO ASM ".$pesotasa.' €';
          												echo "<br>";            
          											}   
          											elseif($pvasm>20){
          												$pesotasa= 7.00 + ($pesosMayoresASM * 0.28);
          												echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
          												echo "<br>";            
          											}                       
          										}
          									}
          									?>
          								</span>
          							</div>                                
          						</td>
          						<td><span class="badge bg-red">55%</span></td>
          					</tr>

          					<!-- ANdalucia transporta-->
          					<tr>
          						<td>2.</td>
          						<td>
          							<div class="thumbnail">
          								<img class="img-rounded" width="304" height="236" src="http://transcostasur.com/images/andaluciatransporta.jpg"/>
          							</div>
          						</td>
          						<td>
          							<div class="alert alert-info">
          								<span class="info-box-number">
          									<?php
          									$pvat = $largo * $ancho * $alto * 220 / 1000000;
          									if($peso>$pvat){
          										echo "EL PESO ES MAYOR QUE pesoVolumetrico";
          										echo "<br>";
          										if($idprovto==41){
          											echo "CALCULO PARA SEVILLA";
          											echo "<br>";
          											if($peso<=5){
          												$pesotasa=$peso*2.20;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";
          											}
          											elseif($peso<=10){
          												$pesotasa=$peso*2.36;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=20){
          												$pesotasa=$peso*2.95;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=30){
          												$pesotasa=$peso*3.54;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*4.18;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=50){
          												$pesotasa=$peso*4.77;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=60){
          												$pesotasa=$peso*5.35;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=70){
          												$pesotasa=$peso*5.94;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=80){
          												$pesotasa=$peso*6.53;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=90){
          												$pesotasa=$peso*7.17;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=100){
          												$pesotasa=$peso*7.76;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=125){
          												$pesotasa=$peso*8.82;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=150){
          												$pesotasa=$peso*10.34;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=175){
          												$pesotasa=$peso*12.85;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=200){
          												$pesotasa=$peso*14.46;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=250){
          												$pesotasa=$peso*16.45;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=300){
          												$pesotasa=$peso*18.47;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          										}elseif ($idcodautAr[0]==1){
          											echo "CALCULO REGIONAL";
          											echo "<br>";
          											if($peso<=5){
          												$pesotasa=$peso*2.28;
          												echo "Tasa + PESO AT ".$pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=10){
          												$pesotasa=$peso*2.50;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=20){
          												$pesotasa=$peso*3.35;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=30){
          												$pesotasa=$peso*4.07;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*4.82;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=50){
          												$pesotasa=$peso*5.52;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=60){
          												$pesotasa=$peso*6.32;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=70){
          												$pesotasa=$peso*7.02;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=80){
          												$pesotasa=$peso*7.76;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=90){
          												$pesotasa=$peso*8.03;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=100){
          												$pesotasa=$peso*8.67;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=125){
          												$pesotasa=$peso*9.85;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=150){
          												$pesotasa=$peso*11.52;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=175){
          												$pesotasa=$peso*14.46;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=200){
          												$pesotasa=$peso*16.23;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=250){
          												$pesotasa=$peso*18.47;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=300){
          												$pesotasa=$peso*20.78;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											}                     
          										}
          									} 
          									elseif ($peso < $pvat) {
          										if($idprovto==41){
          											echo "CALCULO PARA SEVILLA";
          											echo "<br>";
          											if($pvat<=5){
          												$pesotasa=$pvat*2.20;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";
          											}
          											elseif($pvat<=10){
          												$pesotasa=$pvat*2.36;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($pvat<=20){
          												$pesotasa=$pvat*2.95;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=30){
          												$pesotasa=$pvat*3.54;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=40){
          												$pesotasa=$pvat*4.18;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=50){
          												$pesotasa=$pvat*4.77;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=60){
          												$pesotasa=$pvat*5.35;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=70){
          												$pesotasa=$peso*5.94;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=80){
          												$pesotasa=$pvat*6.53;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=90){
          												$pesotasa=$pvat*7.17;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=100){
          												$pesotasa=$pvat*7.76;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=125){
          												$pesotasa=$pvat*8.82;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=150){
          												$pesotasa=$pvat*10.34;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=175){
          												$pesotasa=$pvat*12.85;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=200){
          												$pesotasa=$pvat*14.46;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=250){
          												$pesotasa=$pvat*16.45;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=300){
          												$pesotasa=$pvat*18.47;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          										}
          										elseif ($idcodautAr[0]==1){
          											echo "CALCULO REGIONAL";
          											echo "<br>";
          											if($pvat<=5){
          												$pesotasa=$pvat*2.28;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";
          											}
          											elseif($pvat<=10){
          												$pesotasa=$pvat*2.50;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($pvat<=20){
          												$pesotasa=$pvat*3.35;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=30){
          												$pesotasa=$pvat*4.07;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=40){
          												$pesotasa=$pvat*4.82;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=50){
          												$pesotasa=$pvat*5.52;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=60){
          												$pesotasa=$pvat*6.32;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=70){
          												$pesotasa=$pvat*7.02;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=80){
          												$pesotasa=$pvat*7.76;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=90){
          												$pesotasa=$pvat*8.03;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=100){
          												$pesotasa=$pvat*8.67;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=125){
          												$pesotasa=$pvat*9.85;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=150){
          												$pesotasa=$pvat*11.52;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=175){
          												$pesotasa=$pvat*14.46;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=200){
          												$pesotasa=$pvat*16.23;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=250){
          												$pesotasa=$peso*18.47;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvat<=300){
          												$pesotasa=$pvat*20.78;
          												echo "Tasa + PESO AT ".$pesotasa.' €';
          												echo "<br>";            
          											}                     
          										}
          									}

          									?>

          								</span>
          							</div>
          						</td>
          						<td><span class="badge bg-yellow">70%</span></td>
          					</tr>
          					<tr>
          						<td>3.</td>
          						<td>
          							<div class="thumbnail">
          								<img class="img-rounded" width="304" height="236" src="https://multicooker.com/fr/img/seur.png"/>
          							</div>
          						</td>
          						<td>
          							<div class="alert alert-info">
          								<span class="info-box-number">
          									<?php
          									$pvseur = $largo * $ancho * $alto * 167 / 1000000;

          									if ($peso > $pvseur){
          										$pesosMayoresSEUR = ceil($peso - 40);
          										echo "peso mayor que pv";
          										echo "<br>";
          										if ($idcodautAr[0]==1 || $idcodautAr[0]==11){
          											echo "corto España";
          											if($peso<=1){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=3){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=5){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=10){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=15){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=20){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=25){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=30){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso>40){
          												$pesotasa= 7.00 + ($pesosMayoresSEUR * 0.28);
          												echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
          												echo "<br>";            
          											} 
          										} elseif ($idcodautAr[0] == 3 || $idcodautAr[0]==12 
          											|| $idcodautAr[0] == 14 || $idcodautAr[0] == 13 
          											|| $idcodautAr[0] == 7 || $idcodautAr[0] ==8) {
          											echo "Medio España";
          											if($peso<=1){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=3){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=5){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=10){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=15){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=20){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=25){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=30){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso>40){
          												$pesotasa= 7.00 + ($pesosMayoresSEUR * 0.28);
          												echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
          												echo "<br>";            
          											} 
          										} else {
          											if($peso<=1){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=3){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=5){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=10){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=15){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=20){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=25){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=30){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso>40){
          												$pesotasa= 7.00 + ($pesosMayoresSEUR * 0.28);
          												echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
          												echo "<br>";            
          											} 
          										}   
          									} elseif ($peso < $pvseur){                        
          										$pesosMayoresSEUR = ceil($peso - 40);
          										echo "peso menor que pv";
          										echo "<br>";
          										if ($idcodautAr[0]==1 || $idcodautAr[0]==11){
          											echo "corto España";
          											if($pvseur<=1){
          												$pesotasa=$pvseur*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($pvseur<=3){
          												$pesotasa=$pvseur*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($pvseur<=5){
          												$pesotasa=$pvseur*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvseur<=10){
          												$pesotasa=$pvseur*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvseur<=15){
          												$pesotasa=$pvseur*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvseur<=20){
          												$pesotasa=$pvseur*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvseur<=25){
          												$pesotasa=$pvseur*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvseur<=30){
          												$pesotasa=$pvseur*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvseur<=40){
          												$pesotasa=$pvseur*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvseur>40){
          												$pesotasa= 7.00 + ($pesosMayoresSEUR * 0.28);
          												echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
          												echo "<br>";            
          											} 
          										} elseif ($idcodautAr[0] == 3 || $idcodautAr[0]==12 
          											|| $idcodautAr[0] == 14 || $idcodautAr[0] == 13 
          											|| $idcodautAr[0] == 7 || $idcodautAr[0] ==8) {
          											echo "Medio España";
          											if($pvseur<=1){
          												$pesotasa=$pvseur*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($pvseur<=3){
          												$pesotasa=$pvseur*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($pvseur<=5){
          												$pesotasa=$pvseur*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvseur<=10){
          												$pesotasa=$pvseur*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvseur<=15){
          												$pesotasa=$pvseur*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvseur<=20){
          												$pesotasa=$pvseur*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvseur<=25){
          												$pesotasa=$pvseur*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvseur<=30){
          												$pesotasa=$pvseur*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($pvseur>40){
          												$pesotasa= 7.00 + ($pesosMayoresSEUR * 0.28);
          												echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
          												echo "<br>";            
          											} 
          										}
          									} else {
          										if($pvseur<=1){
          											$pesotasa=$pvseur*2.28;
          											echo $pesotasa." €";
          											echo "<br>";
          										}
          										elseif($pvseur<=3){
          											$pesotasa=$pvseur*2.50;
          											echo $pesotasa.' €';
          											echo "<br>";            
          										}
          										elseif($pvseur<=5){
          											$pesotasa=$pvseur*3.35;
          											echo $pesotasa.' €';
          											echo "<br>";            
          										} 
          										elseif($pvseur<=10){
          											$pesotasa=$pvseur*4.07;
          											echo $pesotasa.' €';
          											echo "<br>";            
          										} 
          										elseif($pvseur<=15){
          											$pesotasa=$pvseur*4.82;
          											echo $pesotasa.' €';
          											echo "<br>";            
          										} 
          										elseif($pvseur<=20){
          											$pesotasa=$pvseur*5.52;
          											echo $pesotasa.' €';
          											echo "<br>";            
          										} 
          										elseif($pvseur<=25){
          											$pesotasa=$pvseur*6.32;
          											echo $pesotasa.' €';
          											echo "<br>";            
          										} 
          										elseif($pvseur<=30){
          											$pesotasa=$pvseur*7.02;
          											echo $pesotasa.' €';
          											echo "<br>";            
          										} 
          										elseif($pvseur<=40){
          											$pesotasa=$pvseur*7.76;
          											echo $pesotasa.' €';
          											echo "<br>";            
          										} 
          										elseif($pvseur>40){
          											$pesotasa= 7.00 + ($pesosMayoresSEUR * 0.28);
          											echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
          											echo "<br>";            
          										} 
          									}

          									?>
          								</span>
          							</div>
          						</td>
          						<td><span class="badge bg-light-blue">30%</span></td>
          					</tr>

          					<!--DHL-->
          					<tr>
          						<td>4.</td>
          						<td>
          							<div class="thumbnail">
          								<img  class="img-rounded" width="304" height="236" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/b4/Dhl_logo.svg/1024px-Dhl_logo.svg.png"/>
          							</div>
          						</td>
          						<td>
          							<div class="alert alert-info">
          								<span class="info-box-number">
          									<?php
          									$pvdhl = $largo * $ancho * $alto * 250 / 1000000;

          									if ($peso > $pvdhl){
          										if ($idprovto == 41){
          											if($peso<=5){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=10){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=20){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=30){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=50){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=60){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=70){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=80){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=90){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=100){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=125){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=150){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=175){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=200){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=250){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=300){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=350){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=400){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=450){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=500){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=550){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=600){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=650){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=700){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=750){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 



          										} elseif ($idprovto == 11 || $idprovto == 21 || $idprovto == 29 || $idprovto == 14) {
          											if($peso<=5){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=10){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=20){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=30){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=50){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=60){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=70){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=80){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=90){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=100){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=125){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=150){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=175){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=200){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=250){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=300){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=350){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=400){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=450){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=500){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=550){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=600){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=650){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=700){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=750){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          										} elseif ($idprovto == 18 || $idprovto == 23 || $idprovto == 6) {
          											if($peso<=5){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=10){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=20){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=30){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=50){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=60){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=70){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=80){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=90){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=100){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=125){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=150){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=175){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=200){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=250){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=300){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=350){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=400){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=450){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=500){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=550){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=600){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=650){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=700){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=750){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          										} elseif ($idprovto == 10 || $idprovto == 4 || $idprovto == 13) {
          											if($peso<=5){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=10){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=20){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=30){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=50){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=60){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=70){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=80){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=90){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=100){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=125){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=150){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=175){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=200){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=250){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=300){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=350){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=400){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=450){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=500){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=550){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=600){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=650){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=700){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=750){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          										} elseif ($idprovto == 3 || $idprovto == 30 || $idprovto == 2
          											|| $idprovto == 16 || $idprovto == 19  || $idprovto == 45 
          											|| $idprovto == 28 || $idprovto == 40 || $idprovto == 5 
          											|| $idprovto == 37 || $idprovto == 47 || $idprovto == 49) {

          											if($peso<=5){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=10){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=20){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=30){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=50){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=60){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=70){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=80){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=90){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=100){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=125){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=150){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=175){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=200){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=250){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=300){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=350){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=400){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=450){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=500){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=550){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=600){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=650){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=700){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=750){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          										}elseif ($idprovto == 46 || $idprovto == 12 || $idprovto == 44
          											|| $idprovto == 50 || $idprovto == 42 || $idprovto == 9 
          											|| $idprovto == 34 || $idprovto == 24 || $idprovto ==1) {
          											if($peso<=5){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=10){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=20){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=30){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=50){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=60){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=70){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=80){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=90){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=100){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=125){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=150){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=175){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=200){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=250){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=300){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=350){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=400){
          												$pesotasa=$peso*2.28;
          												echo $pesotasa." €";
          												echo "<br>";
          											}
          											elseif($peso<=450){
          												$pesotasa=$peso*2.50;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}
          											elseif($peso<=500){
          												$pesotasa=$peso*3.35;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=550){
          												$pesotasa=$peso*4.07;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=600){
          												$pesotasa=$peso*4.82;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=650){
          												$pesotasa=$peso*5.52;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=700){
          												$pesotasa=$peso*6.32;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=750){
          												$pesotasa=$peso*7.02;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											} 
          											elseif($peso<=40){
          												$pesotasa=$peso*7.76;
          												echo $pesotasa.' €';
          												echo "<br>";            
          											}

          										} elseif ($idprovto == 43 || $idprovto == 8 || $idprovto == 17
                            || $idprovto == 25  || $idprovto == 31 /*|| $idprovto ==  
                            //|| $idprovto ==  || $idprovto ==  || $idprovto == */) {
                            if($peso<=5){
                            	$pesotasa=$peso*2.28;
                            	echo $pesotasa." €";
                            	echo "<br>";
                            }
                            elseif($peso<=10){
                            	$pesotasa=$peso*2.50;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            }
                            elseif($peso<=20){
                            	$pesotasa=$peso*3.35;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=30){
                            	$pesotasa=$peso*4.07;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=40){
                            	$pesotasa=$peso*4.82;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=50){
                            	$pesotasa=$peso*5.52;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=60){
                            	$pesotasa=$peso*6.32;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=70){
                            	$pesotasa=$peso*7.02;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=80){
                            	$pesotasa=$peso*7.76;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=90){
                            	$pesotasa=$peso*2.28;
                            	echo $pesotasa." €";
                            	echo "<br>";
                            }
                            elseif($peso<=100){
                            	$pesotasa=$peso*2.50;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            }
                            elseif($peso<=125){
                            	$pesotasa=$peso*3.35;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=150){
                            	$pesotasa=$peso*4.07;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=175){
                            	$pesotasa=$peso*4.82;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=200){
                            	$pesotasa=$peso*5.52;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=250){
                            	$pesotasa=$peso*6.32;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=300){
                            	$pesotasa=$peso*7.02;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=350){
                            	$pesotasa=$peso*7.76;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=400){
                            	$pesotasa=$peso*2.28;
                            	echo $pesotasa." €";
                            	echo "<br>";
                            }
                            elseif($peso<=450){
                            	$pesotasa=$peso*2.50;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            }
                            elseif($peso<=500){
                            	$pesotasa=$peso*3.35;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=550){
                            	$pesotasa=$peso*4.07;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=600){
                            	$pesotasa=$peso*4.82;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=650){
                            	$pesotasa=$peso*5.52;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=700){
                            	$pesotasa=$peso*6.32;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=750){
                            	$pesotasa=$peso*7.02;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            } 
                            elseif($peso<=40){
                            	$pesotasa=$peso*7.76;
                            	echo $pesotasa.' €';
                            	echo "<br>";            
                            }
                        } else {
                        	if($peso<=5){
                        		$pesotasa=$peso*2.28;
                        		echo $pesotasa." €";
                        		echo "<br>";
                        	}
                        	elseif($peso<=10){
                        		$pesotasa=$peso*2.50;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	}
                        	elseif($peso<=20){
                        		$pesotasa=$peso*3.35;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=30){
                        		$pesotasa=$peso*4.07;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=40){
                        		$pesotasa=$peso*4.82;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=50){
                        		$pesotasa=$peso*5.52;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=60){
                        		$pesotasa=$peso*6.32;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=70){
                        		$pesotasa=$peso*7.02;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=80){
                        		$pesotasa=$peso*7.76;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=90){
                        		$pesotasa=$peso*2.28;
                        		echo $pesotasa." €";
                        		echo "<br>";
                        	}
                        	elseif($peso<=100){
                        		$pesotasa=$peso*2.50;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	}
                        	elseif($peso<=125){
                        		$pesotasa=$peso*3.35;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=150){
                        		$pesotasa=$peso*4.07;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=175){
                        		$pesotasa=$peso*4.82;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=200){
                        		$pesotasa=$peso*5.52;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=250){
                        		$pesotasa=$peso*6.32;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=300){
                        		$pesotasa=$peso*7.02;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=350){
                        		$pesotasa=$peso*7.76;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=400){
                        		$pesotasa=$peso*2.28;
                        		echo $pesotasa." €";
                        		echo "<br>";
                        	}
                        	elseif($peso<=450){
                        		$pesotasa=$peso*2.50;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	}
                        	elseif($peso<=500){
                        		$pesotasa=$peso*3.35;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=550){
                        		$pesotasa=$peso*4.07;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=600){
                        		$pesotasa=$peso*4.82;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=650){
                        		$pesotasa=$peso*5.52;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=700){
                        		$pesotasa=$peso*6.32;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=750){
                        		$pesotasa=$peso*7.02;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	} 
                        	elseif($peso<=40){
                        		$pesotasa=$peso*7.76;
                        		echo $pesotasa.' €';
                        		echo "<br>";            
                        	}
                        }
                    } elseif ($peso < $pvdhl) {
                    	if ($idprovto == 41){
                    		if($pvdhl<=5){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=10){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=20){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=30){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=50){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=60){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=70){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=80){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=90){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=100){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=125){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=150){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=175){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=200){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=250){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=300){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=350){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=400){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=450){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=500){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=550){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=600){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=650){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=700){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=750){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 



                    	} elseif ($idprovto == 11 || $idprovto == 21 || $idprovto == 29 || $idprovto == 14) {
                    		if($pvdhl<=5){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=10){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=20){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=30){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=50){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=60){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=70){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=80){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=90){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=100){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=125){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=150){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=175){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=200){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=250){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa . ' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=300){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa;
                    			echo ' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=350){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=400){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=450){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=500){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=550){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=600){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=650){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=700){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=750){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 

                    	} elseif ($idprovto == 18 || $idprovto == 23 || $idprovto == 6) {
                    		if($pvdhl<=5){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=10){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=20){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=30){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=50){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=60){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=70){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=80){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=90){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=100){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=125){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=150){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=175){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=200){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=250){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=300){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=350){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=400){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=450){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=500){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=550){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=600){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=650){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=700){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=750){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 

                    	} elseif ($idprovto == 10 || $idprovto == 4 || $idprovto == 13) {
                    		if($pvdhl<=5){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=10){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=20){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=30){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=50){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=60){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=70){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=80){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=90){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=100){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=125){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=150){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=175){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=200){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=250){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=300){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=350){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=400){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=450){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=500){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=550){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=600){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=650){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=700){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=750){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 

                    	} elseif ($idprovto == 3 || $idprovto == 30 || $idprovto == 2
                    		|| $idprovto == 16 || $idprovto == 19  || $idprovto == 45 
                    		|| $idprovto == 28 || $idprovto == 40 || $idprovto == 5 
                    		|| $idprovto == 37 || $idprovto == 47 || $idprovto == 49) {
                    		if($pvdhl<=5){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa.' €';
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=10){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=20){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa . ' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=30){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa . ' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=50){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=60){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=70){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=80){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=90){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=100){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=125){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=150){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=175){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=200){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=250){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=300){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=350){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=400){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa.' €';
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=450){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=500){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=550){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=600){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=650){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=700){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=750){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 

                    	}elseif ($idprovto == 46 || $idprovto == 12 || $idprovto == 44
                    		|| $idprovto == 50 || $idprovto == 42 || $idprovto == 9 
                    		|| $idprovto == 34 || $idprovto == 24 || $idprovto ==1) {
                    		if($pvdhl<=5){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa.' €';
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=10){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=20){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=30){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=50){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=60){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=70){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=80){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=90){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=100){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=125){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=150){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=175){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=200){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=250){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=300){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=350){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=400){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=450){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=500){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=550){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=600){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=650){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=700){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=750){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 

                    	} elseif ($idprovto == 43 || $idprovto == 8 || $idprovto == 17
                            || $idprovto == 25  || $idprovto == 31 /*|| $idprovto ==  
                            || $idprovto ==  || $idprovto ==  || $idprovto == */) {
                    		if($pvdhl<=5){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=10){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=20){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=30){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=50){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=60){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=70){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=80){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=90){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=100){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=125){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=150){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=175){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=200){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=250){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=300){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=350){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=400){
                    			$pesotasa=$pvdhl*2.28;
                    			echo $pesotasa." €";
                    			echo "<br>";
                    		}
                    		elseif($pvdhl<=450){
                    			$pesotasa=$pvdhl*2.50;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		}
                    		elseif($pvdhl<=500){
                    			$pesotasa=$pvdhl*3.35;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=550){
                    			$pesotasa=$pvdhl*4.07;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=600){
                    			$pesotasa=$pvdhl*4.82;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=650){
                    			$pesotasa=$pvdhl*5.52;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=700){
                    			$pesotasa=$pvdhl*6.32;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=750){
                    			$pesotasa=$pvdhl*7.02;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 
                    		elseif($pvdhl<=40){
                    			$pesotasa=$pvdhl*7.76;
                    			echo $pesotasa.' €';
                    			echo "<br>";            
                    		} 

                    	} else {

                    	}
                    }
                    ?>
                </span>
            </div>
        </td>
        <td><span class="badge bg-green">90%</span></td>

    </tr>

    <!-- REDUR -->
    <tr>
    	<td>5.</td>
    	<td>
    		<div class="thumbnail">
    			<img  class="img-rounded" width="304" height="236" src="http://www.mylar.es/img/cms/Redur.png" />
    		</div>
    	</td>
    	<td>
    		<div class="alert alert-info">
    			<span class="info-box-number">
    				<?php
    				$pvredur = $largo * $ancho * $alto * 270 / 1000000;

    				if ($peso > $pvredur) {
    					$pesosMayoresREDUR = ceil($peso - 1000);
    					if ($idprovto == 41){
    						echo "zona A";
    						if ($peso <= 5) {
    							$pesotasa=$peso*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso <= 10) {
    							$pesotasa=$peso*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 20) {
    							$pesotasa=$peso*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 30) {
    							$pesotasa=$peso*3.74;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 40) {
    							$pesotasa=$peso*4.37;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 50) {
    							$pesotasa=$peso*4.98;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 60) {
    							$pesotasa=$peso*5.56;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 70) {
    							$pesotasa=$peso*6.20;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 80) {
    							$pesotasa=$peso*6.82;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 90) {
    							$pesotasa=$peso*7.46;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 100) {
    							$pesotasa=$peso*8.10;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 125) {
    							$pesotasa=$peso*9.12;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 150) {
    							$pesotasa=$peso*10.70;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 175) {
    							$pesotasa=$peso*11.65;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 200) {
    							$pesotasa=$peso*13.06;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 250) {
    							$pesotasa=$peso*14.84;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 300) {
    							$pesotasa=$peso*16.67;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 350) {
    							$pesotasa=$peso*18.56;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 400) {
    							$pesotasa=$peso*20.45;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 450) {
    							$pesotasa=$peso*22.14;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 500) {
    							$pesotasa=$peso*23.93;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 600) {
    							$pesotasa=$peso*27.39;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 700) {
    							$pesotasa=$peso*30.78;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 800) {
    							$pesotasa=$peso*33.94;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 900) {
    							$pesotasa=$peso*37.41;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 1000) {
    							$pesotasa=$peso*41.26;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso > 1000) {
    							$pesotasa= 41.26 + ($pesosMayoresREDUR * 0.0375);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}

    					} elseif ($idprovto == 11 || $idprovto == 29 || $idprovto == 14 || $idprovto == 21) {
    						echo "Zona B";
    						if ($peso <= 5) {
    							$pesotasa=$peso*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso <= 10) {
    							$pesotasa=$peso*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 20) {
    							$pesotasa=$peso*3.47;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 30) {
    							$pesotasa=$peso*4.27;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 40) {
    							$pesotasa=$peso*5.05;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 50) {
    							$pesotasa=$peso*5.78;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 60) {
    							$pesotasa=$peso*6.61;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 70) {
    							$pesotasa=$peso*7.35;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 80) {
    							$pesotasa=$peso*8.10;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 90) {
    							$pesotasa=$peso*8.34;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 100) {
    							$pesotasa=$peso*9.07;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 125) {
    							$pesotasa=$peso*10.25;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 150) {
    							$pesotasa=$peso*11.96;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 175) {
    							$pesotasa=$peso*13.06;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 200) {
    							$pesotasa=$peso*14.61;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 250) {
    							$pesotasa=$peso*16.63;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 300) {
    							$pesotasa=$peso*18.71;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 350) {
    							$pesotasa=$peso*20.90;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 400) {
    							$pesotasa=$peso*22.92;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 450) {
    							$pesotasa=$peso*25.09;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 500) {
    							$pesotasa=$peso*27.24;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 600) {
    							$pesotasa=$peso*30.78;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 700) {
    							$pesotasa=$peso*34.73;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 800) {
    							$pesotasa=$peso*38.53;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 900) {
    							$pesotasa=$peso*42.58;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 1000) {
    							$pesotasa=$peso*47.11;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso > 1000) {
    							$pesotasa= 47.11 + ($pesosMayoresREDUR * 0.0429);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idprovto ==18 || $idprovto== 23  || $idcodautAr[0] == 11)  {
    						echo "Zona C";
    						if ($peso <= 5) {
    							$pesotasa=$peso*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso <= 10) {
    							$pesotasa=$peso*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 20) {
    							$pesotasa=$peso*3.75;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 30) {
    							$pesotasa=$peso*4.87;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 40) {
    							$pesotasa=$peso*5.86;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 50) {
    							$pesotasa=$peso*6.71;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 60) {
    							$pesotasa=$peso*7.56;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 70) {
    							$pesotasa=$peso*8.42;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 80) {
    							$pesotasa=$peso*9.27;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 90) {
    							$pesotasa=$peso*10.09;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 100) {
    							$pesotasa=$peso*10.99;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 125) {
    							$pesotasa=$peso*12.50;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 150) {
    							$pesotasa=$peso*14.54;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 175) {
    							$pesotasa=$peso*15.85;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 200) {
    							$pesotasa=$peso*17.74;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 250) {
    							$pesotasa=$peso*20.19;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 300) {
    							$pesotasa=$peso*22.81;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 350) {
    							$pesotasa=$peso*25.59;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 400) {
    							$pesotasa=$peso*28.28;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 450) {
    							$pesotasa=$peso*30.99;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 500) {
    							$pesotasa=$peso*33.83;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 600) {
    							$pesotasa=$peso*40.95;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 700) {
    							$pesotasa=$peso*46.60;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 800) {
    							$pesotasa=$peso*52.29;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 900) {
    							$pesotasa=$peso*58.09;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 1000) {
    							$pesotasa=$peso*64.68;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso > 1000) {
    							$pesotasa= 64.68 + ($pesosMayoresREDUR * 0.0590);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idprovto == 4 || $idprovto == 13) {
    						echo "Zona D";
    						if ($peso <= 5) {
    							$pesotasa=$peso*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso <= 10) {
    							$pesotasa=$peso*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 20) {
    							$pesotasa=$peso*4.50;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 30) {
    							$pesotasa=$peso*5.84;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 40) {
    							$pesotasa=$peso*7.03;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 50) {
    							$pesotasa=$peso*8.05;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 60) {
    							$pesotasa=$peso*9.08;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 70) {
    							$pesotasa=$peso*10.10;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 80) {
    							$pesotasa=$peso*11.12;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 90) {
    							$pesotasa=$peso*12.12;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 100) {
    							$pesotasa=$peso*13.18;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 125) {
    							$pesotasa=$peso*14.99;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 150) {
    							$pesotasa=$peso*17.45;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 175) {
    							$pesotasa=$peso*19.02;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 200) {
    							$pesotasa=$peso*21.28;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 250) {
    							$pesotasa=$peso*24.22;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 300) {
    							$pesotasa=$peso*27.37;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 350) {
    							$pesotasa=$peso*30.71;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 400) {
    							$pesotasa=$peso*33.93;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 450) {
    							$pesotasa=$peso*37.19;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 500) {
    							$pesotasa=$peso*40.59;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 600) {
    							$pesotasa=$peso*49.13;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 700) {
    							$pesotasa=$peso*55.90;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 800) {
    							$pesotasa=$peso*62.74;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 900) {
    							$pesotasa=$peso*69.69;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 1000) {
    							$pesotasa=$peso*77.63;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso > 1000) {
    							$pesotasa= 77.63 + ($pesosMayoresREDUR * 0.707);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idprovto == 2 || $idprovto == 3 
    						|| $idprovto == 5 || $idprovto == 16
    						|| $idprovto == 19 || $idprovto == 28 
    						|| $idprovto == 30 || $idprovto == 37
    						|| $idprovto == 40 || $idprovto == 45 
    						|| $idprovto == 47 || $idprovto == 49) {
    						echo "Zona E";
    						if ($peso <= 5) {
    							$pesotasa=$peso*3.34;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso <= 10) {
    							$pesotasa=$peso*3.57;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 20) {
    							$pesotasa=$peso*5.13;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 30) {
    							$pesotasa=$peso*6.65;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 40) {
    							$pesotasa=$peso*8.01;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 50) {
    							$pesotasa=$peso*9.16;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 60) {
    							$pesotasa=$peso*10.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 70) {
    							$pesotasa=$peso*11.50;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 80) {
    							$pesotasa=$peso*12.67;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 90) {
    							$pesotasa=$peso*13.78;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 100) {
    							$pesotasa=$peso*15.01;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 125) {
    							$pesotasa=$peso*17.07;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 150) {
    							$pesotasa=$peso*19.88;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 175) {
    							$pesotasa=$peso*21.66;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 200) {
    							$pesotasa=$peso*24.22;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 250) {
    							$pesotasa=$peso*27.59;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 300) {
    							$pesotasa=$peso*31.18;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 350) {
    							$pesotasa=$peso*34.97;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 400) {
    							$pesotasa=$peso*38.64;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 450) {
    							$pesotasa=$peso*42.36;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 500) {
    							$pesotasa=$peso*46.25;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 600) {
    							$pesotasa=$peso*55.95;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 700) {
    							$pesotasa=$peso*63.67;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 800) {
    							$pesotasa=$peso*71.47;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 900) {
    							$pesotasa=$peso*79.39;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 1000) {
    							$pesotasa=$peso*88.42;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso > 1000) {
    							$pesotasa= 88.42 + ($pesosMayoresREDUR * 0.0805);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idprovto == 1 || $idprovto == 9 
    						|| $idprovto == 12 || $idprovto == 24
    						|| $idprovto == 34 || $idprovto == 42 
    						|| $idprovto == 44 || $idprovto == 46
    						|| $idprovto == 50) {
    						echo "Zona F";
    						if ($peso <= 5) {
    							$pesotasa=$peso*3.66;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso <= 10) {
    							$pesotasa=$peso*3.92;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 20) {
    							$pesotasa=$peso*5.63;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 30) {
    							$pesotasa=$peso*7.29;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 40) {
    							$pesotasa=$peso*8.79;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 50) {
    							$pesotasa=$peso*10.07;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 60) {
    							$pesotasa=$peso*11.34;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 70) {
    							$pesotasa=$peso*12.63;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 80) {
    							$pesotasa=$peso*13.92;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 90) {
    							$pesotasa=$peso*15.13;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 100) {
    							$pesotasa=$peso*16.46;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 125) {
    							$pesotasa=$peso*18.73;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 150) {
    							$pesotasa=$peso*21.80;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 175) {
    							$pesotasa=$peso*23.76;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 200) {
    							$pesotasa=$peso*26.60;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 250) {
    							$pesotasa=$peso*30.30;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 300) {
    							$pesotasa=$peso*34.22;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 350) {
    							$pesotasa=$peso*38.38;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 400) {
    							$pesotasa=$peso*42.41;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 450) {
    							$pesotasa=$peso*46.49;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 500) {
    							$pesotasa=$peso*50.76;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 600) {
    							$pesotasa=$peso*61.42;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 700) {
    							$pesotasa=$peso*69.89;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 800) {
    							$pesotasa=$peso*78.45;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 900) {
    							$pesotasa=$peso*87.14;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 1000) {
    							$pesotasa=$peso*97.04;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso > 1000) {
    							$pesotasa= 97.04 + ($pesosMayoresREDUR * 0.0882);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idprovto == 8 || $idprovto == 26 
    						|| $idprovto == 31 || $idprovto == 20
    						|| $idprovto == 43) {
    						echo "Zona G";
    						if ($peso <= 5) {
    							$pesotasa=$peso*3.92;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso <= 10) {
    							$pesotasa=$peso*4.17;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 20) {
    							$pesotasa=$peso*6.01;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 30) {
    							$pesotasa=$peso*7.79;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 40) {
    							$pesotasa=$peso*9.39;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 50) {
    							$pesotasa=$peso*10.73;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 60) {
    							$pesotasa=$peso*12.09;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 70) {
    							$pesotasa=$peso*13.47;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 80) {
    							$pesotasa=$peso*14.84;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 90) {
    							$pesotasa=$peso*16.16;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 100) {
    							$pesotasa=$peso*17.58;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 125) {
    							$pesotasa=$peso*19.98;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 150) {
    							$pesotasa=$peso*23.27;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 175) {
    							$pesotasa=$peso*25.36;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 200) {
    							$pesotasa=$peso*28.37;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 250) {
    							$pesotasa=$peso*32.31;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 300) {
    							$pesotasa=$peso*36.50;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 350) {
    							$pesotasa=$peso*40.95;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 400) {
    							$pesotasa=$peso*45.26;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 450) {
    							$pesotasa=$peso*49.60;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 500) {
    							$pesotasa=$peso*54.15;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 600) {
    							$pesotasa=$peso*65.53;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 700) {
    							$pesotasa=$peso*74.56;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 800) {
    							$pesotasa=$peso*83.69;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 900) {
    							$pesotasa=$peso*92.97;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 1000) {
    							$pesotasa=$peso*103.54;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso > 1000) {
    							$pesotasa= 103.54 + ($pesosMayoresREDUR * 0.0942);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idprovto == 33 || $idprovto == 48 
    						|| $idprovto == 39 || $idprovto == 17
    						|| $idprovto == 22 || $idprovto == 15 
    						|| $idprovto == 25 || $idprovto == 27
    						|| $idprovto == 32 || $idprovto == 36) {
    						echo "Zona H";
    						if ($peso <= 5) {
    							$pesotasa=$peso*4.16;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso <= 10) {
    							$pesotasa=$peso*4.43;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 20) {
    							$pesotasa=$peso*6.39;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 30) {
    							$pesotasa=$peso*8.27;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 40) {
    							$pesotasa=$peso*9.97;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 50) {
    							$pesotasa=$peso*11.40;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 60) {
    							$pesotasa=$peso*12.85;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 70) {
    							$pesotasa=$peso*14.30;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 80) {
    							$pesotasa=$peso*15.76;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 90) {
    							$pesotasa=$peso*17.15;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 100) {
    							$pesotasa=$peso*18.67;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 125) {
    							$pesotasa=$peso*21.23;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 150) {
    							$pesotasa=$peso*24.72;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 175) {
    							$pesotasa=$peso*26.94;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 200) {
    							$pesotasa=$peso*30.14;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 250) {
    							$pesotasa=$peso*34.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 300) {
    							$pesotasa=$peso*38.78;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 350) {
    							$pesotasa=$peso*43.51;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 400) {
    							$pesotasa=$peso*48.07;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 450) {
    							$pesotasa=$peso*52.70;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 500) {
    							$pesotasa=$peso*57.53;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 600) {
    							$pesotasa=$peso*69.62;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 700) {
    							$pesotasa=$peso*79.19;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 800) {
    							$pesotasa=$peso*88.92;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 900) {
    							$pesotasa=$peso*98.75;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 1000) {
    							$pesotasa=$peso*109.99;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso > 1000) {
    							$pesotasa= 109.99 + ($pesosMayoresREDUR * 0.1001);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idcodautAr[0] == 4) {
    						echo "zona I";
    						if ($peso <= 5) {
    							$pesotasa=$peso*6.72;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso <= 10) {
    							$pesotasa=$peso*7.17;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 20) {
    							$pesotasa=$peso*10.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 30) {
    							$pesotasa=$peso*13.38;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 40) {
    							$pesotasa=$peso*16.11;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 50) {
    							$pesotasa=$peso*18.45;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 60) {
    							$pesotasa=$peso*20.79;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 70) {
    							$pesotasa=$peso*23.14;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 80) {
    							$pesotasa=$peso*25.50;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 90) {
    							$pesotasa=$peso*27.72;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 100) {
    							$pesotasa=$peso*30.19;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 125) {
    							$pesotasa=$peso*34.34;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 150) {
    							$pesotasa=$peso*39.98;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 175) {
    							$pesotasa=$peso*43.57;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 200) {
    							$pesotasa=$peso*48.74;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 250) {
    							$pesotasa=$peso*55.50;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 300) {
    							$pesotasa=$peso*62.71;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 350) {
    							$pesotasa=$peso*70.35;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 400) {
    							$pesotasa=$peso*77.74;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 450) {
    							$pesotasa=$peso*85.22;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 500) {
    							$pesotasa=$peso*93.02;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 600) {
    							$pesotasa=$peso*112.57;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 700) {
    							$pesotasa=$peso*128.08;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 800) {
    							$pesotasa=$peso*143.78;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 900) {
    							$pesotasa=$peso*159.70;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($peso <= 1000) {
    							$pesotasa=$peso*177.85;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($peso > 1000) {
    							$pesotasa= 177.85 + ($pesosMayoresREDUR * 0.1618);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					}

    				} elseif ($peso < $pvredur) {
    					$pesosMayoresREDUR = ceil($pvredur - 1000);
    					if ($idprovto == 41){
    						echo "zona A";
    						if ($pvredur <= 5) {
    							$pesotasa=$pvredur*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur <= 10) {
    							$pesotasa=$pvredur*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 20) {
    							$pesotasa=$pvredur*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 30) {
    							$pesotasa=$pvredur*3.74;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 40) {
    							$pesotasa=$pvredur*4.37;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 50) {
    							$pesotasa=$pvredur*4.98;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 60) {
    							$pesotasa=$pvredur*5.56;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 70) {
    							$pesotasa=$pvredur*6.20;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 80) {
    							$pesotasa=$pvredur*6.82;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 90) {
    							$pesotasa=$pvredur*7.46;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 100) {
    							$pesotasa=$pvredur*8.10;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 125) {
    							$pesotasa=$pvredur*9.12;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 150) {
    							$pesotasa=$pvredur*10.70;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 175) {
    							$pesotasa=$pvredur*11.65;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 200) {
    							$pesotasa=$pvredur*13.06;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 250) {
    							$pesotasa=$pvredur*14.84;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 300) {
    							$pesotasa=$pvredur*16.67;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 350) {
    							$pesotasa=$pvredur*18.56;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 400) {
    							$pesotasa=$pvredur*20.45;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 450) {
    							$pesotasa=$pvredur*22.14;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 500) {
    							$pesotasa=$pvredur*23.93;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 600) {
    							$pesotasa=$pvredur*27.39;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 700) {
    							$pesotasa=$pvredur*30.78;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 800) {
    							$pesotasa=$pvredur*33.94;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 900) {
    							$pesotasa=$pvredur*37.41;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 1000) {
    							$pesotasa=$pvredur*41.26;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur > 1000) {
    							$pesotasa= 41.26 + ($pesosMayoresREDUR * 0.0375);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}

    					} elseif ($idprovto == 11 || $idprovto == 29 || $idprovto == 14 || $idprovto == 21) {
    						echo "Zona B";
    						if ($pvredur <= 5) {
    							$pesotasa=$pvredur*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur <= 10) {
    							$pesotasa=$pvredur*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 20) {
    							$pesotasa=$pvredur*3.47;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 30) {
    							$pesotasa=$pvredur*4.27;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 40) {
    							$pesotasa=$pvredur*5.05;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 50) {
    							$pesotasa=$pvredur*5.78;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 60) {
    							$pesotasa=$pvredur*6.61;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 70) {
    							$pesotasa=$pvredur*7.35;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 80) {
    							$pesotasa=$pvredur*8.10;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 90) {
    							$pesotasa=$pvredur*8.34;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 100) {
    							$pesotasa=$pvredur*9.07;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 125) {
    							$pesotasa=$pvredur*10.25;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 150) {
    							$pesotasa=$pvredur*11.96;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 175) {
    							$pesotasa=$pvredur*13.06;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 200) {
    							$pesotasa=$pvredur*14.61;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 250) {
    							$pesotasa=$pvredur*16.63;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 300) {
    							$pesotasa=$pvredur*18.71;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 350) {
    							$pesotasa=$pvredur*20.90;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 400) {
    							$pesotasa=$pvredur*22.92;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 450) {
    							$pesotasa=$pvredur*25.09;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 500) {
    							$pesotasa=$pvredur*27.24;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 600) {
    							$pesotasa=$pvredur*30.78;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 700) {
    							$pesotasa=$pvredur*34.73;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 800) {
    							$pesotasa=$pvredur*38.53;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 900) {
    							$pesotasa=$pvredur*42.58;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 1000) {
    							$pesotasa=$pvredur*47.11;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur > 1000) {
    							$pesotasa= 47.11 + ($pesosMayoresREDUR * 0.0429);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idprovto ==18 || $idprovto== 23  || $idcodautAr[0] == 11)  {
    						echo "Zona C";
    						if ($pvredur <= 5) {
    							$pesotasa=$pvredur*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur <= 10) {
    							$pesotasa=$pvredur*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 20) {
    							$pesotasa=$pvredur*3.75;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 30) {
    							$pesotasa=$pvredur*4.87;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 40) {
    							$pesotasa=$pvredur*5.86;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 50) {
    							$pesotasa=$pvredur*6.71;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 60) {
    							$pesotasa=$pvredur*7.56;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 70) {
    							$pesotasa=$pvredur*8.42;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 80) {
    							$pesotasa=$pvredur*9.27;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 90) {
    							$pesotasa=$pvredur*10.09;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 100) {
    							$pesotasa=$pvredur*10.99;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 125) {
    							$pesotasa=$pvredur*12.50;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 150) {
    							$pesotasa=$pvredur*14.54;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 175) {
    							$pesotasa=$pvredur*15.85;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 200) {
    							$pesotasa=$pvredur*17.74;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 250) {
    							$pesotasa=$pvredur*20.19;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 300) {
    							$pesotasa=$pvredur*22.81;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 350) {
    							$pesotasa=$pvredur*25.59;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 400) {
    							$pesotasa=$pvredur*28.28;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 450) {
    							$pesotasa=$pvredur*30.99;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 500) {
    							$pesotasa=$pvredur*33.83;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 600) {
    							$pesotasa=$pvredur*40.95;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 700) {
    							$pesotasa=$pvredur*46.60;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 800) {
    							$pesotasa=$pvredur*52.29;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 900) {
    							$pesotasa=$pvredur*58.09;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 1000) {
    							$pesotasa=$pvredur*64.68;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur > 1000) {
    							$pesotasa= 64.68 + ($pesosMayoresREDUR * 0.0590);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idprovto == 4 || $idprovto == 13) {
    						echo "Zona D";
    						if ($pvredur <= 5) {
    							$pesotasa=$pvredur*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur <= 10) {
    							$pesotasa=$pvredur*3.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 20) {
    							$pesotasa=$pvredur*4.50;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 30) {
    							$pesotasa=$pvredur*5.84;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 40) {
    							$pesotasa=$pvredur*7.03;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 50) {
    							$pesotasa=$pvredur*8.05;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 60) {
    							$pesotasa=$pvredur*9.08;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 70) {
    							$pesotasa=$pvredur*10.10;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 80) {
    							$pesotasa=$pvredur*11.12;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 90) {
    							$pesotasa=$pvredur*12.12;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 100) {
    							$pesotasa=$pvredur*13.18;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 125) {
    							$pesotasa=$pvredur*14.99;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 150) {
    							$pesotasa=$pvredur*17.45;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 175) {
    							$pesotasa=$pvredur*19.02;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 200) {
    							$pesotasa=$pvredur*21.28;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 250) {
    							$pesotasa=$pvredur*24.22;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 300) {
    							$pesotasa=$pvredur*27.37;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 350) {
    							$pesotasa=$pvredur*30.71;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 400) {
    							$pesotasa=$pvredur*33.93;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 450) {
    							$pesotasa=$pvredur*37.19;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 500) {
    							$pesotasa=$pvredur*40.59;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 600) {
    							$pesotasa=$pvredur*49.13;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 700) {
    							$pesotasa=$pvredur*55.90;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 800) {
    							$pesotasa=$pvredur*62.74;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 900) {
    							$pesotasa=$pvredur*69.69;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 1000) {
    							$pesotasa=$pvredur*77.63;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur > 1000) {
    							$pesotasa= 77.63 + ($pesosMayoresREDUR * 0.707);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idprovto == 2 || $idprovto == 3 
    						|| $idprovto == 5 || $idprovto == 16
    						|| $idprovto == 19 || $idprovto == 28 
    						|| $idprovto == 30 || $idprovto == 37
    						|| $idprovto == 40 || $idprovto == 45 
    						|| $idprovto == 47 || $idprovto == 49) {
    						echo "Zona E";
    						if ($pvredur <= 5) {
    							$pesotasa=$pvredur*3.34;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur <= 10) {
    							$pesotasa=$pvredur*3.57;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 20) {
    							$pesotasa=$pvredur*5.13;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 30) {
    							$pesotasa=$pvredur*6.65;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 40) {
    							$pesotasa=$pvredur*8.01;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 50) {
    							$pesotasa=$pvredur*9.16;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 60) {
    							$pesotasa=$pvredur*10.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 70) {
    							$pesotasa=$pvredur*11.50;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 80) {
    							$pesotasa=$pvredur*12.67;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 90) {
    							$pesotasa=$pvredur*13.78;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 100) {
    							$pesotasa=$pvredur*15.01;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 125) {
    							$pesotasa=$pvredur*17.07;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 150) {
    							$pesotasa=$pvredur*19.88;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 175) {
    							$pesotasa=$pvredur*21.66;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 200) {
    							$pesotasa=$pvredur*24.22;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 250) {
    							$pesotasa=$pvredur*27.59;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 300) {
    							$pesotasa=$pvredur*31.18;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 350) {
    							$pesotasa=$pvredur*34.97;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 400) {
    							$pesotasa=$pvredur*38.64;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 450) {
    							$pesotasa=$pvredur*42.36;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 500) {
    							$pesotasa=$pvredur*46.25;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 600) {
    							$pesotasa=$pvredur*55.95;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 700) {
    							$pesotasa=$pvredur*63.67;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 800) {
    							$pesotasa=$pvredur*71.47;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 900) {
    							$pesotasa=$pvredur*79.39;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 1000) {
    							$pesotasa=$pvredur*88.42;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur > 1000) {
    							$pesotasa= 88.42 + ($pesosMayoresREDUR * 0.0805);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idprovto == 1 || $idprovto == 9 
    						|| $idprovto == 12 || $idprovto == 24
    						|| $idprovto == 34 || $idprovto == 42 
    						|| $idprovto == 44 || $idprovto == 46
    						|| $idprovto == 50) {
    						echo "Zona F";
    						if ($pvredur <= 5) {
    							$pesotasa=$pvredur*3.66;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur <= 10) {
    							$pesotasa=$pvredur*3.92;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 20) {
    							$pesotasa=$pvredur*5.63;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 30) {
    							$pesotasa=$pvredur*7.29;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 40) {
    							$pesotasa=$pvredur*8.79;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 50) {
    							$pesotasa=$pvredur*10.07;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 60) {
    							$pesotasa=$pvredur*11.34;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 70) {
    							$pesotasa=$pvredur*12.63;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 80) {
    							$pesotasa=$pvredur*13.92;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 90) {
    							$pesotasa=$pvredur*15.13;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 100) {
    							$pesotasa=$pvredur*16.46;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 125) {
    							$pesotasa=$pvredur*18.73;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 150) {
    							$pesotasa=$pvredur*21.80;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 175) {
    							$pesotasa=$pvredur*23.76;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 200) {
    							$pesotasa=$pvredur*26.60;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 250) {
    							$pesotasa=$pvredur*30.30;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 300) {
    							$pesotasa=$pvredur*34.22;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 350) {
    							$pesotasa=$pvredur*38.38;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 400) {
    							$pesotasa=$pvredur*42.41;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 450) {
    							$pesotasa=$pvredur*46.49;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 500) {
    							$pesotasa=$pvredur*50.76;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 600) {
    							$pesotasa=$pvredur*61.42;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 700) {
    							$pesotasa=$pvredur*69.89;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 800) {
    							$pesotasa=$pvredur*78.45;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 900) {
    							$pesotasa=$pvredur*87.14;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 1000) {
    							$pesotasa=$pvredur*97.04;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur > 1000) {
    							$pesotasa= 97.04 + ($pesosMayoresREDUR * 0.0882);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idprovto == 8 || $idprovto == 26 
    						|| $idprovto == 31 || $idprovto == 20
    						|| $idprovto == 43) {
    						echo "Zona G";
    						if ($pvredur <= 5) {
    							$pesotasa=$pvredur*3.92;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur <= 10) {
    							$pesotasa=$pvredur*4.17;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 20) {
    							$pesotasa=$pvredur*6.01;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 30) {
    							$pesotasa=$pvredur*7.79;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 40) {
    							$pesotasa=$pvredur*9.39;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 50) {
    							$pesotasa=$pvredur*10.73;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 60) {
    							$pesotasa=$pvredur*12.09;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 70) {
    							$pesotasa=$pvredur*13.47;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 80) {
    							$pesotasa=$pvredur*14.84;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 90) {
    							$pesotasa=$pvredur*16.16;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 100) {
    							$pesotasa=$pvredur*17.58;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 125) {
    							$pesotasa=$pvredur*19.98;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 150) {
    							$pesotasa=$pvredur*23.27;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 175) {
    							$pesotasa=$pvredur*25.36;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 200) {
    							$pesotasa=$pvredur*28.37;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 250) {
    							$pesotasa=$pvredur*32.31;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 300) {
    							$pesotasa=$pvredur*36.50;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 350) {
    							$pesotasa=$pvredur*40.95;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 400) {
    							$pesotasa=$pvredur*45.26;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 450) {
    							$pesotasa=$pvredur*49.60;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 500) {
    							$pesotasa=$pvredur*54.15;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 600) {
    							$pesotasa=$pvredur*65.53;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 700) {
    							$pesotasa=$pvredur*74.56;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 800) {
    							$pesotasa=$pvredur*83.69;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 900) {
    							$pesotasa=$pvredur*92.97;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 1000) {
    							$pesotasa=$pvredur*103.54;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur > 1000) {
    							$pesotasa= 103.54 + ($pesosMayoresREDUR * 0.0942);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idprovto == 33 || $idprovto == 48 
    						|| $idprovto == 39 || $idprovto == 17
    						|| $idprovto == 22 || $idprovto == 15 
    						|| $idprovto == 25 || $idprovto == 27
    						|| $idprovto == 32 || $idprovto == 36) {
    						echo "Zona H";
    						if ($pvredur <= 5) {
    							$pesotasa=$pvredur*4.16;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur <= 10) {
    							$pesotasa=$pvredur*4.43;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 20) {
    							$pesotasa=$pvredur*6.39;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 30) {
    							$pesotasa=$pvredur*8.27;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 40) {
    							$pesotasa=$pvredur*9.97;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 50) {
    							$pesotasa=$pvredur*11.40;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 60) {
    							$pesotasa=$pvredur*12.85;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 70) {
    							$pesotasa=$pvredur*14.30;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 80) {
    							$pesotasa=$pvredur*15.76;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 90) {
    							$pesotasa=$pvredur*17.15;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 100) {
    							$pesotasa=$pvredur*18.67;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 125) {
    							$pesotasa=$pvredur*21.23;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 150) {
    							$pesotasa=$pvredur*24.72;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 175) {
    							$pesotasa=$pvredur*26.94;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 200) {
    							$pesotasa=$pvredur*30.14;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 250) {
    							$pesotasa=$pvredur*34.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 300) {
    							$pesotasa=$pvredur*38.78;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 350) {
    							$pesotasa=$pvredur*43.51;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 400) {
    							$pesotasa=$pvredur*48.07;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 450) {
    							$pesotasa=$pvredur*52.70;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 500) {
    							$pesotasa=$pvredur*57.53;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 600) {
    							$pesotasa=$pvredur*69.62;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 700) {
    							$pesotasa=$pvredur*79.19;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 800) {
    							$pesotasa=$pvredur*88.92;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 900) {
    							$pesotasa=$pvredur*98.75;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 1000) {
    							$pesotasa=$pvredur*109.99;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur > 1000) {
    							$pesotasa= 109.99 + ($pesosMayoresREDUR * 0.1001);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					} elseif ($idcodautAr[0] == 4) {
    						echo "zona I";
    						if ($pvredur <= 5) {
    							$pesotasa=$pvredur*6.72;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur <= 10) {
    							$pesotasa=$pvredur*7.17;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 20) {
    							$pesotasa=$pvredur*10.33;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 30) {
    							$pesotasa=$pvredur*13.38;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 40) {
    							$pesotasa=$pvredur*16.11;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 50) {
    							$pesotasa=$pvredur*18.45;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 60) {
    							$pesotasa=$pvredur*20.79;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 70) {
    							$pesotasa=$pvredur*23.14;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 80) {
    							$pesotasa=$pvredur*25.50;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 90) {
    							$pesotasa=$pvredur*27.72;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 100) {
    							$pesotasa=$pvredur*30.19;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 125) {
    							$pesotasa=$pvredur*34.34;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 150) {
    							$pesotasa=$pvredur*39.98;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 175) {
    							$pesotasa=$pvredur*43.57;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 200) {
    							$pesotasa=$pvredur*48.74;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 250) {
    							$pesotasa=$pvredur*55.50;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 300) {
    							$pesotasa=$pvredur*62.71;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 350) {
    							$pesotasa=$pvredur*70.35;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 400) {
    							$pesotasa=$pvredur*77.74;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 450) {
    							$pesotasa=$pvredur*85.22;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 500) {
    							$pesotasa=$pvredur*93.02;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 600) {
    							$pesotasa=$pvredur*112.57;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 700) {
    							$pesotasa=$pvredur*128.08;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 800) {
    							$pesotasa=$pvredur*143.78;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 900) {
    							$pesotasa=$pvredur*159.70;
    							echo $pesotasa.' €';
    							echo "<br>";
    						}elseif ($pvredur <= 1000) {
    							$pesotasa=$pvredur*177.85;
    							echo $pesotasa.' €';
    							echo "<br>";
    						} elseif ($pvredur > 1000) {
    							$pesotasa= 177.85 + ($pesosMayoresREDUR * 0.1618);
    							echo "Tasa + PESO ASM ".number_format($pesotasa, 2).' €';
    							echo "<br>";
    						}
    					}

    				}
    				?>
    			</span>
    		</div>
    	</td>
    	<td><span class="badge bg-purple">90%</span></td>

    </tr>
</table>

</div><!-- /.box-body -->
</div><!-- /.box-body -->
</div><!-- /.box -->
</section>
<div class="dt-buttons btn-group">
	<a class="btn btn-default buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons" href="#"><span>Copy</span>
	</a><a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons" href="csv.php"><span>CSV</span>
</a><a class="btn btn-default buttons-print btn-sm" tabindex="0" aria-controls="datatable-buttons" href="#"><span>Print</span></a>
</div>
</body>
</html>