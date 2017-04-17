
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
	<script src="files/js/jquery-3.2.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="files/js/buttons/buttons.html5.js"></script>
	<script src="files/js/buttons/buttons.html5.min.js"></script>
	<script src="files/js/buttons/buttons.print.js"></script>
	<script type="text/javascript" src="files/js/buttons/buttons.print.min.js"></script>

	<link rel="stylesheet" type="text/css" href="files/css/AdminLTE.css">
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">	
	<link rel="stylesheet" type="text/css" href="files/css/tabla2.css">
	<link rel="stylesheet" type="text/css" href="files/css/form.css">
	<script type="text/javascript">
		$(document).ready(function() {
			$("#boton1").click(function(){
				$(".input-group2").append('<div class="col-lg-3"><label for="inputSuccess" class="form-control-label">Peso<div class="input-group input-group-lg has-success"><input class="form-control form-control-success" id="inputSuccess" type="text" name="peso2" placeholder="introduce un valor" required autofocus> <span class="input-group-addon" id="basic-addon3">kg</span></div></label><br></div><div class="col-lg-2"><label for="inputSuccess4" class="form-control-label">Largo<div class="input-group input-group-lg has-success"><input class="form-control form-control-success" id="inputSuccess4" type="text" name="largo2" placeholder="introduce un valor" required autofocus><span class="input-group-addon" id="basic-addon3">cm</span></div></label><br></div><div class="col-lg-2"><label for="inputSuccess3" class="form-control-label">Ancho<div class="input-group input-group-lg has-success"><input class="form-control form-control-success" id="inputSuccess3" type="text" name="ancho2" placeholder="introduce un valor" required autofocus><span class="input-group-addon" id="basic-addon3">cm</span></div></label><br></div><div class="col-lg-2"><label for="inputSuccess2" class="form-control-label">Alto<div class="input-group input-group-lg has-success has-feedback"><input class="form-control form-control-success" id="inputSuccess2" type="text" name="alto2" placeholder="introduce un valor" required autofocus><span class="input-group-addon" id="basic-addon3">cm</span></div></label><br></div><div class="col-lg-3" style="padding-right: 30px;"><label for="inputSuccess4" class="form-control-label">Reembolso<div class="input-group input-group-lg has-success"><input class="form-control form-control-success" id="inputSuccess5" type="text" name="reembolso2" placeholder="introduce un valor"><span class="input-group-addon" id="basic-addon3">€</span></div></label><br></div>');
			});
		});
	</script>
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

	<!-- Form -->
	<form id="bootstrapSelectForm" method="get" class="form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
		<fieldset>
			<div class="row " id="contenedorFormulario">
				<div class="icon">
					<img src="files/img/hogarium-logo.jpg" alt="hogarium-logo" class="img-thumbnail">
				</div>
				<div class="form-group from">	
					<label class="col-xs-3 control-label" ><span class="glyphicon glyphicon-map-marker"></span>Desde</label>			
					<div class="col-xs-5 selectContainer">
						<select name="from" id="dynamic_select" class="form-control form-control-success" >	
							<optgroup value="España - Peninsular"> 
								<?php
								session_start();
								if(isset($_GET['provincia']) && isset($_GET['idprovfrom'])){
									$_SESSION['provincia']=$_GET['provincia'];
									$_SESSION['idprovfrom']=$_GET['idprovfrom'];
									$provincia=$_GET['provincia'];
									$idprovfrom=$_GET['idprovfrom'];
									?>
									<option value="<?php echo $_GET['idprovfrom'];?>"><?php echo $_GET['idprovfrom'].' - '.$_GET['provincia'];?></option>
									<?php
								}else{


									$result = mysqli_query($connect, "Select * from provincias where cod_com_autonoma = 1");
									while ($extraido= mysqli_fetch_array($result)) {
										?>
										<option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php?idprovfrom='.$extraido['id_provincia'].'&provincia='.$extraido['provincia'];?>">
											<?php 
											echo ($extraido['id_provincia']. ' - '.$extraido['provincia']);
											?>
										</option>
										<?php
									}
								}
								?>
							</optgroup>
							<optgroup label="España - Islas Baleares">
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
										<option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php?idprovfrom='.$extraido['id_provincia'].'&provincia='.$extraido['provincia'];?>">
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
										<option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php?idprovfrom='.$extraido['id_provincia'].'&provincia='.$extraido['provincia'];?>">
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
										<option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php?idprovfrom='.$extraido['id_provincia'].'&provincia='.$extraido['provincia'];?>">
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
									<option  value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php?idprovfrom='.$_GET['idprovfrom'].'&provincia='.$_GET['provincia'].'&cpfrom='.$rowfrom[0].'&pobfrom='.$rowfrom[1];?>"><?php echo $rowfrom[0].'-'.$rowfrom[1];?></option>
									<?php
								}
							}
							?>

						</select>
					</div>
				</div>
				<div class="form-group to">
					<label class="col-lg-3 control-label"><span class="glyphicon glyphicon-map-marker"></span>A</label>

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
									<option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php
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
							<option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php
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
					<option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php
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
			<option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php
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
		<option value="<?php echo 'http://127.0.0.1/hogarium_apli/index.php
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

<!-- Buttons -->
<div class="input-group">
	<div class="col-lg-3">
		<label for="inputSuccess" class="form-control-label">Peso
			<div class="input-group input-group-lg has-success">
				<input class="form-control form-control-success" id="inputSuccess" type="number" name="peso" placeholder="introduce un valor" required autofocus max="100" min="0"> 
				<span class="input-group-addon" id="basic-addon3">kg</span>
			</div>
		</label><br>
	</div>
	<div class="col-lg-2">
		<label for="inputSuccess4" class="form-control-label">Largo
			<div class="input-group input-group-lg has-success">
				<input class="form-control form-control-success" id="inputSuccess4" type="number" name="largo" placeholder="introduce un valor" required autofocus max="100" min="0">
				<span class="input-group-addon" id="basic-addon3">cm</span>
			</div>
		</label><br>
	</div>
	<div class="col-lg-2">
		<label for="inputSuccess3" class="form-control-label">Ancho
			<div class="input-group input-group-lg has-success">
				<input class="form-control form-control-success" id="inputSuccess3" type="number" name="ancho" placeholder="introduce un valor" required autofocus max="100" min="0">
				<span class="input-group-addon" id="basic-addon3">cm</span>
			</div>
		</label><br>
	</div>
	<div class="col-lg-2">
		<label for="inputSuccess2" class="form-control-label">Alto
			<div class="input-group input-group-lg has-success has-feedback">
				<input class="form-control form-control-success" id="inputSuccess2" type="number" name="alto" placeholder="introduce un valor" required autofocus max="100" min="0">
				<span class="input-group-addon" id="basic-addon3">cm</span>
			</div>
		</label><br>
	</div>

	<div class="col-lg-3" style="padding-right: 30px;">
		<label for="inputSuccess4" class="form-control-label">Reembolso
			<div class="input-group input-group-lg has-success">
				<input class="form-control form-control-success" id="inputSuccess5" type="number" name="reembolso" placeholder="introduce un valor" max="100" min="0">
				<span class="input-group-addon" id="basic-addon3">€</span>
			</div>
		</label><br>
	</div>	
</div>
<div class="input-group2"></div><br>

<div class="btn-group btn-group-lg">
	<button type="submit" class="btn-sm btn-success disabled" ><span class="fa fa-calculator"></span> Calcular</button>
	<button type="reset" class="btn-sm btn-danger"  onclick="location.href='logout.php';"><span class="glyphicon glyphicon-trash"></span> Borrar datos</button>
	<button type="button" class="btn-sm btn-info btn-circle" id="boton1"><span class="glyphicon glyphicon-plus" ></span></button>
	<button type="button" class="btn-sm btn-default" onclick="location.href='lockscreen.html';">Bloquear Pantalla</button>
</div>		
</div>

</div>	
</fieldset>		
</form>

<div class="clearfix"></div>
<!-- Tablas -->
<div class="col-sm-12">
	<?php
	@$idprovto=$_GET['idprovto'];
	@$provinciato=$_GET['provinciato'];

	@$alto = $_GET['alto'];
	@$ancho = $_GET['ancho'];
	@$largo = $_GET['largo'];
	$m3 = $alto*$ancho*$largo;
	@$peso = $_GET['peso'];
	@$reembolso = $_GET['reembolso'];

	$idcodaut=mysqli_query($connect, "SELECT cod_com_autonoma FROM provincias WHERE id_provincia = '$idprovto'");
	$idcodautAr=mysqli_fetch_array($idcodaut);
	?>
	<div class="container-fluid">
		<div class="row-fluid">
			<h1>Precio Por empresas</h1>
		</div>
		<div class="row-fluid">
			<!--ASM -->
			<div class="span2 tiny ">
				<div class="pricing-table-header-tiny">
					<div id="tasa/peso" hidden="">
						<h4>
							<?php
							$pvasm = $largo * $ancho * $alto * 167 / 1000000;
							$pesotasaASM = 0;

							if($peso>$pvasm){
								$pesosMayoresASM = ceil($peso - 20);

								if($idprovto==41){
									echo "CALCULO PARA SEVILLA";
									echo "<br>";
									if($peso>0 && $peso<=1){
										$pesotasaASM=3.14;
										echo "Tasa + PESO ASM ".$pesotasaASM." €";
										echo "<br>";
									}
									elseif($peso>1 && $peso<=3){
										$pesotasaASM=3.20;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($peso>3 && $peso<=5){
										$pesotasaASM=3.30;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									else if($peso>5 && $peso<=10){
										$pesotasaASM=3.45;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($peso>10 && $peso<=15){
										$pesotasaASM=3.70;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($peso>15 && $peso<=20){
										$pesotasaASM=3.30;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($peso>20){
										$pesotasaASM= 4.30 + ($pesosMayoresASM * 0.20);
										echo "Tasa + PESO ASM ".number_format($pesotasaASM, 2).' €';
										echo "<br>";            
									}
								}elseif ($idcodautAr[0]==1){
									echo "CALCULO REGIONAL";
									echo "<br>";
									if($peso>0 && $peso<=1){
										$pesotasaASM=3.35;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";
									}
									elseif($peso>1 && $peso<=3){
										$pesotasaASM=3.54;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($peso>3 && $peso<=5){
										$pesotasaASM=3.60;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}   
									elseif($peso>5 && $peso<=10){
										$pesotasaASM=3.90;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($peso>10 && $peso<=15){
										$pesotasaASM=4.90;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}           
									elseif($peso>15 && $peso<=20){
										$pesotasaASM=5.50;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}   
									elseif($peso>20){
										$pesotasaASM= 5.50 + ($pesosMayoresASM * 0.25);
										echo "Tasa + PESO ASM ".number_format($pesotasaASM, 2).' €';
										echo "<br>";            
									}   
								}else{
									echo "CALCULO PENINSULAR";
									echo "<br>";
									if($peso>0 && $peso<=1){
										$pesotasaASM=3.50;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";
									}
									elseif($peso>1 && $peso<=3){
										$pesotasaASM=3.70;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($peso>3 && $peso<=5){
										$pesotasaASM=4.05;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}   
									elseif($peso>5 && $peso<=10){
										$pesotasaASM=4.30;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($peso>10 && $peso<=15){
										$pesotasaASM=5.15;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}           
									elseif($peso>15 && $peso<=20){
										$pesotasaASM=7.00;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}   
									elseif($peso>20){
										$pesotasaASM= 7.00 + ($pesosMayoresASM * 0.28);
										echo "Tasa + PESO ASM ".number_format($pesotasaASM, 2).' €';
										echo "<br>";            
									}                           
								}
							} elseif ($peso<$pvasm){
								$pesosMayoresASM = ceil($pvasm - 20);

								if($idprovto==41){
									echo "CALCULO PARA SEVILLA";
									echo "<br>";
									if($pvasm>0 && $pvasm<=1){
										$pesotasaASM=3.14;
										echo "Tasa + PESO ASM ".$pesotasaASM." €";
										echo "<br>";
									}
									elseif($pvasm>1 && $pvasm<=3){
										$pesotasaASM=3.20;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($pvasm>3 && $pvasm<=5){
										$pesotasaASM=3.30;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($pvasm>5 && $pvasm<=10){
										$pesotasaASM=3.45;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($pvasm>10 && $pvasm<=15){
										$pesotasaASM=3.70;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($pvasm>15 && $pvasm<=20){
										$pesotasaASM=4.30;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($pvasm>20){
										$pesotasaASM=4.30 + ( $pesosMayoresASM * 0.20);
										echo "Tasa + PESO ASM ".number_format($pesotasaASM, 2).' €';
										echo "<br>";            
									}
								}elseif ($idcodautAr[0]==1){
									echo "CALCULO REGIONAL";
									echo "<br>";
									if($pvasm>0 && $pvasm<=1){
										$pesotasaASM=3.35;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";
									}
									elseif($pvasm>1 && $pvasm<=3){
										$pesotasaASM=3.54;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($pvasm>3 && $pvasm<=5){
										$pesotasaASM=3.60;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}   
									elseif($pvasm>5 && $pvasm<=10){
										$pesotasaASM=3.90;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($pvasm>10 && $pvasm<=15){
										$pesotasaASM=4.90;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}           
									elseif($pvasm>15 && $pvasm<=20){
										$pesotasaASM=5.50;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}   
									elseif($pvasm>20){
										$pesotasaASM= 5.50 + ($pesosMayoresASM * 0.25);
										echo "Tasa + PESO ASM ".number_format($pesotasaASM, 2).' €';
										echo "<br>";            
									}       
								}else{
									echo "CALCULO PENINSULAR";
									echo "<br>";
									if($pvasm>0 && $pvasm<=1){
										$pesotasaASM =3.50;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";
									}
									elseif($pvasm>1 && $pvasm<=3){
										$pesotasaASM =3.70;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($pvasm>3 && $pvasm<=5){
										$pesotasaASM =4.05;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}   
									elseif($pvasm>5 && $pvasm<=10){
										$pesotasaASM =4.30;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}
									elseif($pvasm>10 && $pvasm<=15){
										$pesotasaASM =5.15;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}           
									elseif($pvasm>15 && $pvasm<=20){
										$pesotasaASM =7.00;
										echo "Tasa + PESO ASM ".$pesotasaASM.' €';
										echo "<br>";            
									}   
									elseif($pvasm>20){
										$pesotasaASM = 7.00 + ($pesosMayoresASM * 0.28);
										echo "Tasa + PESO ASM ".number_format($pesotasaASM, 2).' €';
										echo "<br>";            
									}                       
								}
							}
							?>
						</h2>
					</div>
					<div id="fuel" hidden="">
						<h4>
							<?php
							if (!empty($pesotasaASM)){
								$fuelASM = ($pesotasaASM * 0)/100;
								echo $fuelASM.' €';
							} else {
								echo "No has introducido datos";
							}

							?>
						</h2>
					</div>
					<div id="Reembolso" hidden="">
						<h4>
							<?php
							$reembolsoASM = ($reembolso * 1)/100;
							if (!empty($reembolso) && !empty($pesotasaASM)) {
								if ($reembolsoASM < 1){
									$reembolsoASM = 1;
								}
								echo $reembolsoASM.' €';
							} elseif (empty($pesotasaASM) && !empty($reembolso)) {
								echo "No has introducido datos";
							}
							else {
								echo "No has escrito ninguna cifra";
							}
							?>
						</h2>
					</div>
					<div id="precio final">
						<h4>
							<?php
							if (!empty($pesotasaASM)) {
								$finalASM = $reembolsoASM + $pesotasaASM + $fuelASM;
								echo $finalASM.' €';
							} else {
								echo "No has introducido datos";
							}

							?>
						</h2>
					</div> 
				</div>
				<div class="pricing-table-features">
					<img class="img-responsive" src="files/img/carriers/asm.png" height="200px" width="200px"/>
				</div>
				<div class="pricing-table-signup-tiny">
					<p><a href="#">Sign Up</a></p>
				</div>
			</div>

			<!-- AT -->
			<div class="span2 small">
				<div class="pricing-table-header-small">
					<div id="precio/peso" hidden="">
						<h4>
							<?php
							$pvat = $largo * $ancho * $alto * 220 / 1000000;
							$pesotasaAT = 0;
							if($peso>$pvat){
								$pesosMayoresAT= ceil($peso - 300);
								if($idprovto==41){
									echo "CALCULO PARA SEVILLA";
									echo "<br>";
									if($peso<=5){
										$pesotasaAT=2.20;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";
									}
									elseif($peso<=10){
										$pesotasaAT=2.36;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									}
									elseif($peso<=20){
										$pesotasaAT=2.95;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=30){
										$pesotasaAT=3.54;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=40){
										$pesotasaAT=4.18;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=50){
										$pesotasaAT=4.77;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=60){
										$pesotasaAT=5.35;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=70){
										$pesotasaAT=5.94;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=80){
										$pesotasaAT=6.53;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=90){
										$pesotasaAT=7.17;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=100){
										$pesotasaAT=7.76;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=125){
										$pesotasaAT=8.82;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=150){
										$pesotasaAT=10.34;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=175){
										$pesotasaAT=12.85;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=200){
										$pesotasaAT=14.46;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=250){
										$pesotasaAT=16.45;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=300){
										$pesotasaAT=18.47;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} elseif ($peso > 300) {
										$pesotasaAT= 18.47 + ($pesosMayoresAT * 0.10);
										echo "Tasa + PESO ASM ".number_format($pesotasaAT, 2).' €';
										echo "<br>";

									}
								}elseif ($idcodautAr[0]==1){
									echo "CALCULO REGIONAL";
									echo "<br>";
									if($peso<=5){
										$pesotasaAT=2.28;
										echo "Tasa + PESO AT ".$pesotasaAT." €";
										echo "<br>";
									}
									elseif($peso<=10){
										$pesotasaAT=2.50;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									}
									elseif($peso<=20){
										$pesotasaAT=3.35;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=30){
										$pesotasaAT=4.07;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=40){
										$pesotasaAT=4.82;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=50){
										$pesotasaAT=5.52;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=60){
										$pesotasaAT=6.32;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=70){
										$pesotasaAT=7.02;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=80){
										$pesotasaAT=7.76;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=90){
										$pesotasaAT=8.03;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=100){
										$pesotasaAT=8.67;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=125){
										$pesotasaAT=9.85;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=150){
										$pesotasaAT=11.52;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=175){
										$pesotasaAT=14.46;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=200){
										$pesotasaAT=16.23;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=250){
										$pesotasaAT=18.47;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($peso<=300){
										$pesotasaAT=20.78;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} elseif ($peso > 300) {
										$pesotasaAT= 20.78 + ($pesosMayoresAT * 0.12);
										echo "Tasa + PESO ASM ".number_format($pesotasaAT, 2).' €';
										echo "<br>";

									}            
								} 
								else {
									echo "No hay servicios para esta zona";
								}
							} 
							elseif ($peso < $pvat) {
								$pesosMayoresAT= ceil($pvat - 300);
								if($idprovto==41){
									echo "CALCULO PARA SEVILLA";
									echo "<br>";
									if($pvat<=5){
										$pesotasaAT=2.20;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";
									}
									elseif($pvat<=10){
										$pesotasaAT=2.36;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									}
									elseif($pvat<=20){
										$pesotasaAT=2.95;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=30){
										$pesotasaAT=3.54;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=40){
										$pesotasaAT=4.18;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=50){
										$pesotasaAT=4.77;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=60){
										$pesotasaAT=5.35;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=70){
										$pesotasaAT=5.94;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=80){
										$pesotasaAT=6.53;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=90){
										$pesotasaAT=7.17;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=100){
										$pesotasaAT=7.76;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=125){
										$pesotasaAT=8.82;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=150){
										$pesotasaAT=10.34;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=175){
										$pesotasaAT=12.85;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=200){
										$pesotasaAT=14.46;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=250){
										$pesotasaAT=16.45;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=300){
										$pesotasaAT=18.47;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} elseif ($pvat > 300) {
										$pesotasaAT= 18.47 + ($pesosMayoresAT * 0.10);
										echo "Tasa + PESO ASM ".number_format($pesotasaAT, 2).' €';
										echo "<br>";

									}
								}
								elseif ($idcodautAr[0]==1){
									echo "CALCULO REGIONAL";
									echo "<br>";
									if($pvat<=5){
										$pesotasaAT=2.28;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";
									}
									elseif($pvat<=10){
										$pesotasaAT=2.50;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									}
									elseif($pvat<=20){
										$pesotasaAT=3.35;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=30){
										$pesotasaAT=4.07;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=40){
										$pesotasaAT=4.82;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=50){
										$pesotasaAT=5.52;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=60){
										$pesotasaAT=6.32;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=70){
										$pesotasaAT=7.02;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=80){
										$pesotasaAT=7.76;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=90){
										$pesotasaAT=8.03;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=100){
										$pesotasaAT=8.67;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=125){
										$pesotasaAT=9.85;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=150){
										$pesotasaAT=11.52;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=175){
										$pesotasaAT=14.46;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=200){
										$pesotasaAT=16.23;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=250){
										$pesotasaAT=18.47;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} 
									elseif($pvat<=300){
										$pesotasaAT=20.78;
										echo "Tasa + PESO AT ".$pesotasaAT.' €';
										echo "<br>";            
									} elseif ($pvat > 300) {
										$pesotasaAT= 20.78 + ($pesosMayoresAT * 0.12);
										echo "Tasa + PESO ASM ".number_format($pesotasaAT, 2).' €';
										echo "<br>";

									}                    
								} else {
									echo "No hay servicios para esta zona";
								}
							}

							?>
						</h2>
					</div>
					<div id="fuel" hidden="">
						<h4>
							<?php
							if (!empty($pesotasaAT)) {
								if ($idcodautAr[0] != 1) {
									echo "No hay datos para esta zona";
								}  else{
									$fuelAT = ($pesotasaAT * 0)/100;
									echo $fuelAT.' €'; 
								}
							} else {
								echo "No has introducido datos";
							}
							?>
						</h2>
					</div>
					<div id="Reembolso" hidden="">
						<h4>
							<?php
							$reembolsoAT = ($reembolso * 1.5)/100;
							if (!empty($reembolso) && !empty($pesotasaAT)) {
								if ($idcodautAr[0] != 1) {
									echo "No hay datos para esta zona";
								} else {
									if ($reembolsoAT < 2){
										$reembolsoAT = 2;
										echo $reembolsoAT . ' €';
									}
								}
							}elseif (empty($pesotasaAT) && !empty($reembolso)) {
								echo "No has introducido datos";
							}
							else {
								echo "No has escrito ninguna cifra";
							}

							?>
						</h2>
					</div>
					<div id="precio final">
						<h4>
							<?php
							if ($idcodautAr[0] != 1) {
								echo "No hay datos para esta zona";
							} elseif ($idcodautAr[0] == 1) {
								if (!empty($pesotasaAT)) {
									$finalAT = $reembolsoAT + $pesotasaAT + $fuelAT;
									echo $finalAT.' €';
								}else {
									echo "no has introducido datos";
								}
							}
							?>
						</h2>
					</div>
				</div>
				<div class="pricing-table-features">
					<img class="img-responsive" src="files/img/carriers/ANDALUCIA-TRANPORTA.jpg" height="200px" width="200px"/>
				</div>
				<div class="pricing-table-signup-small">
					<p><a href="#">Sign Up</a></p>
				</div>
			</div>

			<!--SEUR -->
			<div class="span2 medium">
				<div class="pricing-table-header-medium">
					<div class="precio/peso" hidden="">
						<h4>
							<?php
							$pvseur = $largo * $ancho * $alto * 167 / 1000000;
							$pesotasaSEUR = 0;
							if ($peso > $pvseur){
								$pesosMayoresSEUR = ceil($peso - 40);

								if ($idcodautAr[0]==1 || $idprovto == 6){
									echo "corto España";
									echo "<br>";
									if($peso<=1){
										$pesotasaSEUR=3.64;
										echo $pesotasaSEUR." €";
										echo "<br>";
									}
									elseif($peso<=3){
										$pesotasaSEUR=3.89;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									}
									elseif($peso<=5){
										$pesotasaSEUR=4.15;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=10){
										$pesotasaSEUR=4.98;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=15){
										$pesotasaSEUR=5.33;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=20){
										$pesotasaSEUR=6.05;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=25){
										$pesotasaSEUR=6.44;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=30){
										$pesotasaSEUR=6.74;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=40){
										$pesotasaSEUR=8.08;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso>40){
										$pesotasaSEUR= 8.08 + ($pesosMayoresSEUR * 0.33);
										echo "Tasa + PESO SEUR ".number_format($pesotasaSEUR, 2).' €';
										echo "<br>";            
									} 
								} elseif ($idprovto == 1 || $idprovto== 2
									|| $idprovto == 3 || $idprovto == 5 
									|| $idprovto == 9 || $idprovto == 10
									|| $idprovto == 12 || $idprovto== 13
									|| $idprovto == 16 || $idprovto == 19 
									|| $idprovto == 24 || $idprovto == 27
									|| $idprovto == 28 || $idprovto== 30
									|| $idprovto == 32 || $idprovto == 33 
									|| $idprovto == 34 || $idprovto == 37
									|| $idprovto == 39 || $idprovto== 40
									|| $idprovto == 42 || $idprovto == 44 
									|| $idprovto == 45 || $idprovto == 46
									|| $idprovto == 47 || $idprovto== 49
									|| $idprovto == 10 || $idprovto == 24) {

									echo "Medio España";
									echo "<br>";
									if($peso<=1){
										$pesotasaSEUR=3.64;
										echo $pesotasaSEUR." €";
										echo "<br>";
									}
									elseif($peso<=3){
										$pesotasaSEUR=3.89;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									}
									elseif($peso<=5){
										$pesotasaSEUR=4.15;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=10){
										$pesotasaSEUR=5.79;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=15){
										$pesotasaSEUR=6.46;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=20){
										$pesotasaSEUR=7.64;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=25){
										$pesotasaSEUR=8.19;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=30){
										$pesotasaSEUR=8.62;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=40){
										$pesotasaSEUR=10.98;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso>40){
										$pesotasaSEUR= 10.98 + ($pesosMayoresSEUR * 0.41);
										echo "Tasa + PESO SEUR ".number_format($pesotasaSEUR, 2).' €';
										echo "<br>";            
									} 
								} else {
									if($peso<=1){
										$pesotasaSEUR=3.64;
										echo $pesotasaSEUR." €";
										echo "<br>";
									}
									elseif($peso<=3){
										$pesotasaSEUR=3.89;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									}
									elseif($peso<=5){
										$pesotasaSEUR=4.15;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=10){
										$pesotasaSEUR=6.87;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=15){
										$pesotasaSEUR=8.04;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=20){
										$pesotasaSEUR=9.66;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=25){
										$pesotasaSEUR=10.39;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=30){
										$pesotasaSEUR=11.24;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso<=40){
										$pesotasaSEUR=14.69;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($peso>40){
										$pesotasaSEUR= 14.69 + ($pesosMayoresSEUR * 0.49);
										echo "Tasa + PESO ASM ".number_format($pesotasaSEUR, 2).' €';
										echo "<br>";            
									} 
								}   
							} elseif ($peso < $pvseur){                        
								$pesosMayoresSEUR = ceil($pvseur - 40);

								if ($idcodautAr[0]==1 || $idprovto == 6){
									echo "corto España";
									echo "<br>";
									if($pvseur<=1){
										$pesotasaSEUR=3.64;
										echo $pesotasaSEUR." €";
										echo "<br>";
									}
									elseif($pvseur<=3){
										$pesotasaSEUR=3.89;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									}
									elseif($pvseur<=5){
										$pesotasaSEUR=4.15;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=10){
										$pesotasaSEUR=4.98;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=15){
										$pesotasaSEUR=5.33;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=20){
										$pesotasaSEUR=6.05;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=25){
										$pesotasaSEUR=6.44;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=30){
										$pesotasaSEUR=6.74;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=40){
										$pesotasaSEUR=8.08;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur>40){
										$pesotasaSEUR= 8.08 + ($pesosMayoresSEUR * 0.33);
										echo "Tasa + PESO SEUR ".number_format($pesotasaSEUR, 2).' €';
										echo "<br>";            
									} 
								} elseif ($idprovto == 1 || $idprovto== 2
									|| $idprovto == 3 || $idprovto == 5 
									|| $idprovto == 9 || $idprovto == 10
									|| $idprovto == 12 || $idprovto== 13
									|| $idprovto == 16 || $idprovto == 19 
									|| $idprovto == 24 || $idprovto == 27
									|| $idprovto == 28 || $idprovto== 30
									|| $idprovto == 32 || $idprovto == 33 
									|| $idprovto == 34 || $idprovto == 37
									|| $idprovto == 39 || $idprovto== 40
									|| $idprovto == 42 || $idprovto == 44 
									|| $idprovto == 45 || $idprovto == 46
									|| $idprovto == 47 || $idprovto== 49
									|| $idprovto == 10 || $idprovto == 24) {

									echo "Medio España";
									echo "<br>";
									if($pvseur<=1){
										$pesotasaSEUR=3.64;
										echo $pesotasaSEUR." €";
										echo "<br>";
									}
									elseif($pvseur<=3){
										$pesotasaSEUR=3.89;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									}
									elseif($pvseur<=5){
										$pesotasaSEUR=4.15;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=10){
										$pesotasaSEUR=5.79;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=15){
										$pesotasaSEUR=6.46;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=20){
										$pesotasaSEUR=7.64;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=25){
										$pesotasaSEUR=8.19;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=30){
										$pesotasaASM=8.62;
										echo $pesotasaASM.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=40){
										$pesotasaSEUR=10.98;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur>40){
										$pesotasaSEUR= 10.98 + ($pesosMayoresSEUR * 0.41);
										echo "Tasa + PESO SEUR ".number_format($pesotasaSEUR, 2).' €';
										echo "<br>";            
									} 
								} else {
									if($pvseur<=1){
										$pesotasaSEUR=3.64;
										echo $pesotasaSEUR." €";
										echo "<br>";
									}
									elseif($pvseur<=3){
										$pesotasaSEUR=3.89;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									}
									elseif($pvseur<=5){
										$pesotasaSEUR=4.15;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=10){
										$pesotasaSEUR=6.87;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=15){
										$pesotasaSEUR=8.04;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=20){
										$pesotasaSEUR=9.66;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=25){
										$pesotasaSEUR=10.39;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=30){
										$pesotasaSEUR=11.24;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur<=40){
										$pesotasaSEUR=14.69;
										echo $pesotasaSEUR.' €';
										echo "<br>";            
									} 
									elseif($pvseur>40){
										$pesotasaSEUR= 14.69 + ($pesosMayoresSEUR * 0.49);
										echo "Tasa + PESO ASM ".number_format($pesotasaSEUR, 2).' €';
										echo "<br>";            
									} 
								}   
							}

							?>
						</h2>
					</div>
					<div id="fuel" hidden="">
						<h4>
							<?php
							if (!empty($pesotasaSEUR)) {
								$fuelSEUR = number_format(($pesotasaSEUR * 4.5)/100 , 2);
								echo $fuelSEUR.' €';
							} else {
								echo "No has introducido datos";
							}

							?> 
						</h2>
					</div>
					<div id="Reembolso" hidden="">
						<h4>
							<?php
							$reembolsoSEUR = ($reembolso * 1)/100;
							if (!empty($reembolso) && !empty($pesotasaSEUR)) {
								if ($reembolsoSEUR < 1.03){
									$reembolsoSEUR = 1.03;
								}
								echo $reembolsoSEUR . ' €';
							}elseif (empty($pesotasaSEUR) && !empty($reembolso)) {
								echo "No has introducido datos";
							}
							else {
								echo "No has escrito ninguna cifra";
							}

							?>
						</h2>
					</div>
					<div id="precio final">
						<h4>
							<?php
							if (!empty($pesotasaSEUR)) {
								$finalSEUR = $reembolsoSEUR + $pesotasaSEUR + $fuelSEUR;
								echo $finalSEUR.' €';
							} else {
								echo "no has introducido datos";
							}

							?>
						</h2>
					</div>                
				</div>
				<div class="pricing-table-features">
					<img class="img-responsive"  src="files/img/carriers/ce.seur.1.png"/>
				</div>
				<div class="pricing-table-signup-medium">
					<p><a href="#">Sign Up</a></p>
				</div>
			</div>

			<!-- DHL -->
			<div class="span2 pro">
				<div class="pricing-table-header-pro">
					<div id="precio/peso" hidden="">
						<h4>
							<?php
							$pvdhl = $largo * $ancho * $alto * 250 / 1000000;
							$pesotasaDHL = 0;

							if ($peso > $pvdhl){
								$pesosMayoresDHL= ceil($peso - 1000);
								if ($idprovto == 41){
									echo "Zona 1";
									echo "<br>";
									if($peso<=5){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=10){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=20){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=30){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=40){
										$pesotasaDHL=4.05;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=50){
										$pesotasaDHL=4.62;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=60){
										$pesotasaDHL=5.17;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=70){
										$pesotasaDHL=5.75;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=80){
										$pesotasaDHL=6.33;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=90){
										$pesotasaDHL=6.93;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=100){
										$pesotasaDHL=7.52;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=125){
										$pesotasaDHL=8.47;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=150){
										$pesotasaDHL=9.92;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=175){
										$pesotasaDHL=12.43;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=200){
										$pesotasaDHL=13.94;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=250){
										$pesotasaDHL=15.84;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=300){
										$pesotasaDHL=17.79;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=350){
										$pesotasaDHL=20.30;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=400){
										$pesotasaDHL=22.38;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=450){
										$pesotasaDHL=24.22;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=500){
										$pesotasaDHL=26.19;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=600){
										$pesotasaDHL=29.97;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=700){
										$pesotasaDHL=33.68;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=800){
										$pesotasaDHL=37.14;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=900){
										$pesotasaDHL=40.94;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=1000){
										$pesotasaDHL=45.14;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso>1000){
										$pesotasaDHL= 45.14 + ($pesosMayoresDHL * 0.41);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";            
									} 

								} elseif ($idprovto == 11 || $idprovto == 21 || $idprovto == 29 || $idprovto == 14) {
									echo "Zona 2";
									echo "<br>";
									if($peso<=5){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=10){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=20){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=30){
										$pesotasaDHL=3.97;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=40){
										$pesotasaDHL=4.69;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=50){
										$pesotasaDHL=5.36;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=60){
										$pesotasaDHL=6.13;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=70){
										$pesotasaDHL=6.82;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=80){
										$pesotasaDHL=7.52;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=90){
										$pesotasaDHL=7.74;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=100){
										$pesotasaDHL=8.42;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=125){
										$pesotasaDHL=9.51;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=150){
										$pesotasaDHL=11.11;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=175){
										$pesotasaDHL=13.94;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=200){
										$pesotasaDHL=15.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=250){
										$pesotasaDHL=17.75;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=300){
										$pesotasaDHL=19.98;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=350){
										$pesotasaDHL=22.86;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=400){
										$pesotasaDHL=25.09;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=450){
										$pesotasaDHL=27.45;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=500){
										$pesotasaDHL=29.80;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=600){
										$pesotasaDHL=33.68;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=700){
										$pesotasaDHL=38.01;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=800){
										$pesotasaDHL=42.16;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=900){
										$pesotasaDHL=46.58;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=1000){
										$pesotasaDHL=51.54;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso>1000){
										$pesotasaDHL= 51.54 + ($pesosMayoresDHL * 0.47);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";              
									} 
								} elseif ($idprovto == 18 || $idprovto == 23 || $idprovto == 6) {
									echo "zona 3";
									echo "<br>";
									if($peso<=5){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=10){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=20){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=30){
										$pesotasaDHL=4.51;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=40){
										$pesotasaDHL=5.44;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=50){
										$pesotasaDHL=6.22;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=60){
										$pesotasaDHL=7.01;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=70){
										$pesotasaDHL=7.82;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=80){
										$pesotasaDHL=8.61;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=90){
										$pesotasaDHL=9.37;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=100){
										$pesotasaDHL=10.20;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=125){
										$pesotasaDHL=11.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=150){
										$pesotasaDHL=13.50;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=175){
										$pesotasaDHL=16.92;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=200){
										$pesotasaDHL=18.93;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=250){
										$pesotasaDHL=21.55;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=300){
										$pesotasaDHL=24.36;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=350){
										$pesotasaDHL=28.00;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=400){
										$pesotasaDHL=30.94;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=450){
										$pesotasaDHL=33.92;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=500){
										$pesotasaDHL=37.02;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=600){
										$pesotasaDHL=44.80;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=700){
										$pesotasaDHL=50.99;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=800){
										$pesotasaDHL=57.21;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=900){
										$pesotasaDHL=63.55;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=1000){
										$pesotasaDHL=70.77;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso>1000){
										$pesotasaDHL= 70.77 + ($pesosMayoresDHL * 0.645);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";              
									} 
								} elseif ($idprovto == 10 || $idprovto == 4 || $idprovto == 13) {
									echo "Zona 4";
									echo "<br>";
									if($peso<=5){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=10){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=20){
										$pesotasaDHL=4.18;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=30){
										$pesotasaDHL=5.42;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=40){
										$pesotasaDHL=6.53;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=50){
										$pesotasaDHL=7.47;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=60){
										$pesotasaDHL=8.43;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=70){
										$pesotasaASM=9.38;
										echo $pesotasaASM.' €';
										echo "<br>";            
									} 
									elseif($peso<=80){
										$pesotasaDHL=10.33;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=90){
										$pesotasaDHL=11.24;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=100){
										$pesotasaDHL=12.23;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=125){
										$pesotasaDHL=13.91;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=150){
										$pesotasaDHL=16.20;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=175){
										$pesotasaDHL=20.30;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=200){
										$pesotasaDHL=22.72;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=250){
										$pesotasaDHL=25.86;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=300){
										$pesotasaDHL=29.22;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=350){
										$pesotasaDHL=33.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=400){
										$pesotasaDHL=37.13;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=450){
										$pesotasaDHL=40.69;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=500){
										$pesotasaDHL=44.42;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=600){
										$pesotasaDHL=53.75;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=700){
										$pesotasaDHL=61.16;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=800){
										$pesotasaDHL=68.65;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=900){
										$pesotasaDHL=76.26;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=1000){
										$pesotasaDHL=84.94;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso>1000){
										$pesotasaDHL= 84.94 + ($pesosMayoresDHL * 0.774);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";              
									} 
								} elseif ($idprovto == 3 || $idprovto == 30 || $idprovto == 2
									|| $idprovto == 16 || $idprovto == 19  || $idprovto == 45 
									|| $idprovto == 28 || $idprovto == 40 || $idprovto == 5 
									|| $idprovto == 37 || $idprovto == 47 || $idprovto == 49) {

									echo "Zona 5";
									echo "<br>";
									if($peso<=5){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=10){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=20){
										$pesotasaDHL=4.77;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=30){
										$pesotasaDHL=6.17;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=40){
										$pesotasaDHL=7.44;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=50){
										$pesotasaDHL=8.50;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=60){
										$pesotasaDHL=9.59;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=70){
										$pesotasaDHL=10.67;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=80){
										$pesotasaDHL=11.76;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=90){
										$pesotasaDHL=12.79;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=100){
										$pesotasaDHL=13.93;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=125){
										$pesotasaDHL=15.84;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=150){
										$pesotasaDHL=18.45;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=175){
										$pesotasaDHL=23.12;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=200){
										$pesotasaDHL=25.86;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=250){
										$pesotasaDHL=29.45;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=300){
										$pesotasaDHL=33.28;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=350){
										$pesotasaDHL=38.27;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=400){
										$pesotasaDHL=42.28;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=450){
										$pesotasaDHL=46.35;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=500){
										$pesotasaDHL=50.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=600){
										$pesotasaDHL=61.22;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=700){
										$pesotasaDHL=69.67;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=800){
										$pesotasaDHL=78.20;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=900){
										$pesotasaDHL=86.87;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=1000){
										$pesotasaDHL=96.74;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso>1000){
										$pesotasaDHL= 96.74 + ($pesosMayoresDHL * 0.88);
										echo "Tasa + PESO DHL ".number_format($pesotasaASM, 2).' €';
										echo "<br>";              
									} 

								}elseif ($idprovto == 46 || $idprovto == 12 || $idprovto == 44
									|| $idprovto == 50 || $idprovto == 42 || $idprovto == 9 
									|| $idprovto == 34 || $idprovto == 24 || $idprovto ==1) {

									echo "Zona 6";
									echo "<br>";
									if($peso<=5){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=10){
										$pesotasaDHL=3.64;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=20){
										$pesotasaDHL=5.23;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=30){
										$pesotasaDHL=6.77;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=40){
										$pesotasaDHL=8.16;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=50){
										$pesotasaDHL=9.34;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=60){
										$pesotasaDHL=10.53;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=70){
										$pesotasaDHL=11.72;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=80){
										$pesotasaDHL=12.92;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=90){
										$pesotasaDHL=14.05;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=100){
										$pesotasaDHL=15.28;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=125){
										$pesotasaDHL=17.39;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=150){
										$pesotasaDHL=20.24;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=175){
										$pesotasaDHL=25.36;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=200){
										$pesotasaDHL=28.39;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=250){
										$pesotasaDHL=32.34;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=300){
										$pesotasaDHL=36.53;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=350){
										$pesotasaDHL=41.99;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=400){
										$pesotasaDHL=46.41;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=450){
										$pesotasaDHL=50.87;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=500){
										$pesotasaDHL=55.54;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=600){
										$pesotasaDHL=67.21;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=700){
										$pesotasaDHL=76.48;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=800){
										$pesotasaDHL=85.84;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=900){
										$pesotasaDHL=95.35;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=1000){
										$pesotasaDHL=106.17;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso>1000){
										$pesotasaDHL= 106.17 + ($pesosMayoresDHL * 0.966);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";              
									} 

								} elseif ($idprovto == 43 || $idprovto == 8 
									|| $idprovto == 20 || $idprovto == 31 || $idprovto == 26 ) {

									echo "Zona 7";
									echo "<br>";
									if($peso<=5){
										$pesotasaDHL=3.64;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=10){
										$pesotasaDHL=3.87;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=20){
										$pesotasaDHL=5.58;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=30){
										$pesotasaDHL=7.24;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=40){
										$pesotasaDHL=8.71;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=50){
										$pesotasaDHL=9.96;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=60){
										$pesotasaDHL=11.22;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=70){
										$pesotasaDHL=12.50;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=80){
										$pesotasaDHL=13.77;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=90){
										$pesotasaDHL=15.00;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=100){
										$pesotasaDHL=16.32;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=125){
										$pesotasaDHL=18.54;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=150){
										$pesotasaDHL=21.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=175){
										$pesotasaDHL=27.07;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=200){
										$pesotasaDHL=30.29;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=250){
										$pesotasaDHL=34.50;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=300){
										$pesotasaDHL=38.97;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=350){
										$pesotasaDHL=44.80;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=400){
										$pesotasaDHL=49.52;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=450){
										$pesotasaDHL=54.27;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=500){
										$pesotasaDHL=59.25;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=600){
										$pesotasaDHL=71.70;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=700){
										$pesotasaDHL=81.58;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=800){
										$pesotasaDHL=91.58;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=900){
										$pesotasaDHL=101.73;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=1000){
										$pesotasaDHL=113.28;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso>1000){
										$pesotasaDHL= 113.28 + ($pesosMayoresDHL * 0.1031);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";             
									} 
								} elseif ($idprovto == 36 || $idprovto == 15
									||$idprovto == 27 || $idprovto == 32
									|| $idprovto == 33 || $idprovto == 39
									|| $idprovto == 48 || $idprovto == 22
									|| $idprovto == 25 || $idprovto == 17 ){

									echo "Zona 8";
									echo "<br>";
									if($peso<=5){
										$pesotasaDHL=3.86;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=10){
										$pesotasaDHL=4.11;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=20){
										$pesotasaDHL=5.93;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=30){
										$pesotasaDHL=7.68;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=40){
										$pesotasaDHL=9.25;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=50){
										$pesotasaDHL=10.58;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=60){
										$pesotasaDHL=11.93;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=70){
										$pesotasaDHL=13.28;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=80){
										$pesotasaDHL=14.63;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=90){
										$pesotasaDHL=15.92;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=100){
										$pesotasaDHL=17.33;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=125){
										$pesotasaDHL=19.70;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=150){
										$pesotasaDHL=22.95;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=175){
										$pesotasaDHL=28.76;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=200){
										$pesotasaDHL=32.18;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=250){
										$pesotasaDHL=36.64;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=300){
										$pesotasaDHL=41.40;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=350){
										$pesotasaDHL=47.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=400){
										$pesotasaDHL=52.59;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($peso<=450){
										$pesotasaDHL=57.67;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($peso<=500){
										$pesotasaDHL=62.94;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=600){
										$pesotasaDHL=76.18;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=700){
										$pesotasaDHL=86.65;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=800){
										$pesotasaDHL=97.28;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=900){
										$pesotasaDHL=108.06;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso<=1000){
										$pesotasaDHL=120.35;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($peso>1000){
										$pesotasaDHL= 120.35 + ($pesosMayoresDHL * 0.1095);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";             
									}
								} 
							} elseif ($peso < $pvdhl) {
								$pesosMayoresDHL= ceil($pvdhl - 1000);
								if ($idprovto == 41){
									echo "Zona 1";
									echo "<br>";
									if($pvdhl<=5){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=10){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=20){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=30){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=40){
										$pesotasaDHL=4.05;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=50){
										$pesotasaDHL=4.62;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=60){
										$pesotasaDHL=5.17;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=70){
										$pesotasaDHL=5.75;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=80){
										$pesotasaDHL=6.33;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=90){
										$pesotasaDHL=6.93;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=100){
										$pesotasaDHL=7.52;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=125){
										$pesotasaDHL=8.47;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=150){
										$pesotasaDHL=9.92;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=175){
										$pesotasaDHL=12.43;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=200){
										$pesotasaDHL=13.94;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=250){
										$pesotasaDHL=15.84;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=300){
										$pesotasaDHL=17.79;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=350){
										$pesotasaDHL=20.30;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=400){
										$pesotasaDHL=22.38;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=450){
										$pesotasaDHL=24.22;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=500){
										$pesotasaDHL=26.19;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=600){
										$pesotasaDHL=29.97;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=700){
										$pesotasaDHL=33.68;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=800){
										$pesotasaDHL=37.14;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=900){
										$pesotasaDHL=40.94;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=1000){
										$pesotasaDHL=45.14;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl>1000){
										$pesotasaDHL= 45.14 + ($pesosMayoresDHL * 0.41);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";              
									} 



								} elseif ($idprovto == 11 || $idprovto == 21 || $idprovto == 29 || $idprovto == 14) {
									echo "Zona 2";
									echo "<br>";
									if($pvdhl<=5){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=10){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=20){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=30){
										$pesotasaDHL=3.97;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=40){
										$pesotasaDHL=4.69;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=50){
										$pesotasaDHL=5.36;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=60){
										$pesotasaDHL=6.13;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=70){
										$pesotasaDHL=6.82;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=80){
										$pesotasaDHL=7.52;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=90){
										$pesotasaDHL=7.74;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=100){
										$pesotasaDHL=8.42;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=125){
										$pesotasaDHL=9.51;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=150){
										$pesotasaDHL=11.11;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=175){
										$pesotasaDHL=13.94;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=200){
										$pesotasaDHL=15.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=250){
										$pesotasaDHL=17.75;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=300){
										$pesotasaDHL=19.98;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=350){
										$pesotasaDHL=22.86;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=400){
										$pesotasaDHL=25.09;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=450){
										$pesotasaDHL=27.45;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=500){
										$pesotasaDHL=29.80;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=600){
										$pesotasaDHL=33.68;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=700){
										$pesotasaDHL=38.01;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=800){
										$pesotasaDHL=42.16;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=900){
										$pesotasaDHL=46.58;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=1000){
										$pesotasaDHL=51.54;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl>1000){
										$pesotasaDHL= 51.54 + ($pesosMayoresDHL * 0.47);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";              
									} 
								} elseif ($idprovto == 18 || $idprovto == 23 || $idprovto == 6) {
									echo "zona 3";
									echo "<br>";
									if($pvdhl<=5){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=10){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=20){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=30){
										$pesotasaDHL=4.51;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=40){
										$pesotasaDHL=5.44;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=50){
										$pesotasaDHL=6.22;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=60){
										$pesotasaDHL=7.01;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=70){
										$pesotasaDHL=7.82;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=80){
										$pesotasaDHL=8.61;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=90){
										$pesotasaDHL=9.37;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=100){
										$pesotasaDHL=10.20;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=125){
										$pesotasaDHL=11.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=150){
										$pesotasaDHL=13.50;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=175){
										$pesotasaDHL=16.92;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=200){
										$pesotasaDHL=18.93;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=250){
										$pesotasaDHL=21.55;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=300){
										$pesotasaDHL=24.36;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=350){
										$pesotasaDHL=28.00;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=400){
										$pesotasaDHL=30.94;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=450){
										$pesotasaDHL=33.92;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=500){
										$pesotasaDHL=37.02;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=600){
										$pesotasaDHL=44.80;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=700){
										$pesotasaDHL=50.99;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=800){
										$pesotasaDHL=57.21;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=900){
										$pesotasaDHL=63.55;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=1000){
										$pesotasaDHL=70.77;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl>1000){
										$pesotasaDHL= 70.77 + ($pesosMayoresDHL * 0.645);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";              
									} 
								} elseif ($idprovto == 10 || $idprovto == 4 || $idprovto == 13) {
									echo "Zona 4";
									echo "<br>";
									if($pvdhl<=5){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=10){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=20){
										$pesotasaDHL=4.18;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=30){
										$pesotasaDHL=5.42;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=40){
										$pesotasaDHL=6.53;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=50){
										$pesotasaDHL=7.47;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=60){
										$pesotasaDHL=8.43;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=70){
										$pesotasaDHL=9.38;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=80){
										$pesotasaDHL=10.33;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=90){
										$pesotasaDHL=11.24;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=100){
										$pesotasaDHL=12.23;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=125){
										$pesotasaDHL=13.91;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=150){
										$pesotasaDHL=16.20;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=175){
										$pesotasaDHL=20.30;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=200){
										$pesotasaDHL=22.72;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=250){
										$pesotasaDHL=25.86;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=300){
										$pesotasaDHL=29.22;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=350){
										$pesotasaDHL=33.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=400){
										$pesotasaDHL=37.13;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=450){
										$pesotasaDHL=40.69;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=500){
										$pesotasaDHL=44.42;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=600){
										$pesotasaDHL=53.75;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=700){
										$pesotasaDHL=61.16;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=800){
										$pesotasaDHL=68.65;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=900){
										$pesotasaDHL=76.26;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=1000){
										$pesotasaDHL=84.94;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl>1000){
										$pesotasaDHL= 84.94 + ($pesosMayoresDHL * 0.774);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";              
									} 
								} elseif ($idprovto == 3 || $idprovto == 30 || $idprovto == 2
									|| $idprovto == 16 || $idprovto == 19  || $idprovto == 45 
									|| $idprovto == 28 || $idprovto == 40 || $idprovto == 5 
									|| $idprovto == 37 || $idprovto == 47 || $idprovto == 49) {

									echo "Zona 5";
									echo "<br>";
									if($pvdhl<=5){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=10){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=20){
										$pesotasaDHL=4.77;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=30){
										$pesotasaDHL=6.17;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=40){
										$pesotasaDHL=7.44;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=50){
										$pesotasaDHL=8.50;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=60){
										$pesotasaDHL=9.59;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=70){
										$pesotasaDHL=10.67;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=80){
										$pesotasaDHL=11.76;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=90){
										$pesotasaDHL=12.79;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=100){
										$pesotasaDHL=13.93;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=125){
										$pesotasaDHL=15.84;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=150){
										$pesotasaDHL=18.45;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=175){
										$pesotasaDHL=23.12;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=200){
										$pesotasaDHL=25.86;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=250){
										$pesotasaDHL=29.45;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=300){
										$pesotasaDHL=33.28;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=350){
										$pesotasaDHL=38.27;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=400){
										$pesotasaDHL=42.28;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=450){
										$pesotasaDHL=46.35;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=500){
										$pesotasaDHL=50.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=600){
										$pesotasaDHL=61.22;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=700){
										$pesotasaDHL=69.67;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=800){
										$pesotasaDHL=78.20;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=900){
										$pesotasaDHL=86.87;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=1000){
										$pesotasaDHL=96.74;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl>1000){
										$pesotasaDHL= 96.74 + ($pesosMayoresDHL * 0.88);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";              
									} 

								}elseif ($idprovto == 46 || $idprovto == 12 || $idprovto == 44
									|| $idprovto == 50 || $idprovto == 42 || $idprovto == 9 
									|| $idprovto == 34 || $idprovto == 24 || $idprovto ==1) {

									echo "Zona 6";
									echo "<br>";
									if($pvdhl<=5){
										$pesotasaDHL=3.60;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=10){
										$pesotasaDHL=3.64;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=20){
										$pesotasaDHL=5.23;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=30){
										$pesotasaDHL=6.77;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=40){
										$pesotasaDHL=8.16;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=50){
										$pesotasaDHL=9.34;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=60){
										$pesotasaDHL=10.53;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=70){
										$pesotasaDHL=11.72;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=80){
										$pesotasaDHL=12.92;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=90){
										$pesotasaDHL=14.05;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=100){
										$pesotasaDHL=15.28;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=125){
										$pesotasaDHL=17.39;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=150){
										$pesotasaDHL=20.24;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=175){
										$pesotasaDHL=25.36;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=200){
										$pesotasaDHL=28.39;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=250){
										$pesotasaDHL=32.34;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=300){
										$pesotasaDHL=36.53;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=350){
										$pesotasaDHL=41.99;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=400){
										$pesotasaDHL=46.41;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=450){
										$pesotasaDHL=50.87;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=500){
										$pesotasaDHL=55.54;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=600){
										$pesotasaDHL=67.21;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=700){
										$pesotasaDHL=76.48;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=800){
										$pesotasaDHL=85.84;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=900){
										$pesotasaDHL=95.35;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=1000){
										$pesotasaDHL=106.17;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl>1000){
										$pesotasaDHL= 106.17 + ($pesosMayoresDHL * 0.966);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";              
									} 

								} elseif ($idprovto == 43 || $idprovto == 8 
									|| $idprovto == 20 || $idprovto == 31 || $idprovto == 26) {

									echo "Zona 7";
									echo "<br>";
									if($pvdhl<=5){
										$pesotasaDHL=3.64;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=10){
										$pesotasaDHL=3.87;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=20){
										$pesotasaDHL=5.58;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=30){
										$pesotasaDHL=7.24;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=40){
										$pesotasaDHL=8.71;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=50){
										$pesotasaDHL=9.96;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=60){
										$pesotasaDHL=11.22;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=70){
										$pesotasaDHL=12.50;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=80){
										$pesotasaDHL=13.77;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=90){
										$pesotasaDHL=15.00;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=100){
										$pesotasaDHL=16.32;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=125){
										$pesotasaDHL=18.54;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=150){
										$pesotasaDHL=21.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=175){
										$pesotasaDHL=27.07;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=200){
										$pesotasaDHL=30.29;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=250){
										$pesotasaDHL=34.50;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=300){
										$pesotasaDHL=38.97;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=350){
										$pesotasaDHL=44.80;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=400){
										$pesotasaDHL=49.52;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=450){
										$pesotasaDHL=54.27;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=500){
										$pesotasaDHL=59.25;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=600){
										$pesotasaDHL=71.70;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=700){
										$pesotasaDHL=81.58;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=800){
										$pesotasaDHL=91.58;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=900){
										$pesotasaDHL=101.73;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=1000){
										$pesotasaDHL=113.28;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl>1000){
										$pesotasaDHL= 113.28 + ($pesosMayoresDHL * 0.1031);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";              
									} 
								} elseif ($idprovto == 36 || $idprovto == 15
									||$idprovto == 27 || $idprovto == 32
									|| $idprovto == 33 || $idprovto == 39
									|| $idprovto == 48 || $idprovto == 22
									|| $idprovto == 25 || $idprovto == 17 ){
									echo "Zona 8";
									echo "<br>";
									if($pvdhl<=5){
										$pesotasaDHL=3.86;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=10){
										$pesotasaDHL=4.11;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=20){
										$pesotasaDHL=5.93;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=30){
										$pesotasaDHL=7.68;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=40){
										$pesotasaDHL=9.25;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=50){
										$pesotasaDHL=10.58;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=60){
										$pesotasaDHL=11.93;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=70){
										$pesotasaDHL=13.28;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=80){
										$pesotasaDHL=14.63;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=90){
										$pesotasaDHL=15.92;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=100){
										$pesotasaDHL=17.33;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=125){
										$pesotasaDHL=19.70;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=150){
										$pesotasaDHL=22.95;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=175){
										$pesotasaDHL=28.76;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=200){
										$pesotasaDHL=32.18;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=250){
										$pesotasaDHL=36.64;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=300){
										$pesotasaDHL=41.40;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=350){
										$pesotasaDHL=47.60;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=400){
										$pesotasaDHL=52.59;
										echo $pesotasaDHL." €";
										echo "<br>";
									}
									elseif($pvdhl<=450){
										$pesotasaDHL=57.67;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									}
									elseif($pvdhl<=500){
										$pesotasaDHL=62.94;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=600){
										$pesotasaDHL=76.18;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=700){
										$pesotasaDHL=86.65;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=800){
										$pesotasaDHL=97.28;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=900){
										$pesotasaDHL=108.06;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl<=1000){
										$pesotasaDHL=120.35;
										echo $pesotasaDHL.' €';
										echo "<br>";            
									} 
									elseif($pvdhl> 1000){
										$pesotasaDHL= 120.35 + ($pesosMayoresDHL * 0.1095);
										echo "Tasa + PESO DHL ".number_format($pesotasaDHL, 2).' €';
										echo "<br>";              
									}
								} 
							}
							?>
						</h2>
					</div>
					<div id="fuel" hidden="">
						<h4>
							<?php
							if (!empty($pesotasaDHL)) {
								$fuelDHL = number_format(($pesotasaDHL * 2.5)/100 , 2);
								echo $fuelDHL.' €';
							} else {
								echo "No has introducido datos";
							}

							?>
						</h2>
					</div>
					<div class="reembolso" hidden="">
						<h4>
							<?php
							$reembolsoDHL = ($reembolso * 2)/100;
							if (!empty($reembolso) && !empty($pesotasaDHL)) {
								if ($reembolsoDHL < 2){
									$reembolsoDHL = 2;
								}
								echo $reembolsoDHL . ' €';
							} elseif (empty($pesotasaDHL) && !empty($reembolso)) {
								echo "No has introducido datos";
							}
							else {
								echo "No has escrito ninguna cifra";
							}

							?>
						</h2>
					</div>
					<div id="precio final">
						<h4>
							<?php
							if (!empty($pesotasaDHL)) {
								$finalDHL = $reembolsoDHL + $pesotasaDHL +$fuelDHL;
								echo $finalDHL.' €';
							} else{
								echo "no has introducido datos";
							}

							?>
						</h2>
					</div>
				</div>
				<div class="pricing-table-features">
					<img  class="img-responsive" width="200" height="200" src="files/img/carriers/logo-dhl.png"/>
				</div>
				<div class="pricing-table-signup-pro">
					<p><a href="#">Sign Up</a></p>
				</div>
			</div>

			<!--REDUR -->
			<div class="span2 ultimate">
				<div class="pricing-table-header-ultimate">
					<div id="precio/peso" hidden="">
						<h4>
							<?php
							$pvredur = $largo * $ancho * $alto * 270 / 1000000;
							$pesotasaREDUR = 0;

							if ($peso > $pvredur) {
								$pesosMayoresREDUR = ceil($peso - 1000);
								if ($idprovto == 41){
									echo "zona A";
									echo "<br>";
									if ($peso <= 5) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso <= 10) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 20) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 30) {
										$pesotasaREDUR=3.74;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 40) {
										$pesotasaREDUR=4.37;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 50) {
										$pesotasaREDUR=4.98;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 60) {
										$pesotasaREDUR=5.56;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 70) {
										$pesotasaREDUR=6.20;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 80) {
										$pesotasaREDUR=6.82;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 90) {
										$pesotasaREDUR=7.46;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 100) {
										$pesotasaREDUR=8.10;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 125) {
										$pesotasaREDUR=9.12;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 150) {
										$pesotasaREDUR=10.70;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 175) {
										$pesotasaREDUR=11.65;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 200) {
										$pesotasaREDUR=13.06;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 250) {
										$pesotasaREDUR=14.84;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 300) {
										$pesotasaREDUR=16.67;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 350) {
										$pesotasaREDUR=18.56;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 400) {
										$pesotasaREDUR=20.45;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 450) {
										$pesotasaREDUR=22.14;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 500) {
										$pesotasaREDUR=23.93;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 600) {
										$pesotasaREDUR=27.39;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 700) {
										$pesotasaREDUR=30.78;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 800) {
										$pesotasaREDUR=33.94;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 900) {
										$pesotasaREDUR=37.41;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 1000) {
										$pesotasaREDUR=41.26;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso > 1000) {
										$pesotasaREDUR= 41.26 + ($pesosMayoresREDUR * 0.0375);
										echo "Tasa + PESO REDUR ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}

								} elseif ($idprovto == 11 || $idprovto == 29 || $idprovto == 14 || $idprovto == 21) {
									echo "Zona B";
									echo "<br>";
									if ($peso <= 5) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso <= 10) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 20) {
										$pesotasaREDUR=3.47;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 30) {
										$pesotasaREDUR=4.27;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 40) {
										$pesotasaREDUR=5.05;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 50) {
										$pesotasaREDUR=5.78;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 60) {
										$pesotasaREDUR=6.61;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 70) {
										$pesotasaREDUR=7.35;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 80) {
										$pesotasaREDUR=8.10;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 90) {
										$pesotasaREDUR=8.34;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 100) {
										$pesotasaREDUR=9.07;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 125) {
										$pesotasaREDUR=10.25;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 150) {
										$pesotasaREDUR=11.96;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 175) {
										$pesotasaREDUR=13.06;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 200) {
										$pesotasaREDUR=14.61;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 250) {
										$pesotasaREDUR=16.63;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 300) {
										$pesotasaREDUR=18.71;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 350) {
										$pesotasaREDUR=20.90;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 400) {
										$pesotasaREDUR=22.92;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 450) {
										$pesotasaREDUR=25.09;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 500) {
										$pesotasaREDUR=27.24;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 600) {
										$pesotasaREDUR=30.78;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 700) {
										$pesotasaREDUR=34.73;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 800) {
										$pesotasaREDUR=38.53;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 900) {
										$pesotasaREDUR=42.58;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 1000) {
										$pesotasaREDUR=47.11;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso > 1000) {
										$pesotasaREDUR= 47.11 + ($pesosMayoresREDUR * 0.0429);
										echo "Tasa + PESO Redur ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idprovto ==18 || $idprovto== 23  || $idcodautAr[0] == 11)  {
									echo "Zona C";
									echo "<br>";
									if ($peso <= 5) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso <= 10) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 20) {
										$pesotasaREDUR=3.75;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 30) {
										$pesotasaREDUR=4.87;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 40) {
										$pesotasaREDUR=5.86;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 50) {
										$pesotasaREDUR=6.71;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 60) {
										$pesotasaREDUR=7.56;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 70) {
										$pesotasaREDUR=8.42;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 80) {
										$pesotasaREDUR=9.27;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 90) {
										$pesotasaREDUR=10.09;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 100) {
										$pesotasaREDUR=10.99;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 125) {
										$pesotasaREDUR=12.50;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 150) {
										$pesotasaREDUR=14.54;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 175) {
										$pesotasaREDUR=15.85;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 200) {
										$pesotasaREDUR=17.74;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 250) {
										$pesotasaREDUR=20.19;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 300) {
										$pesotasaREDUR=22.81;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 350) {
										$pesotasaREDUR=25.59;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 400) {
										$pesotasaREDUR=28.28;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 450) {
										$pesotasaREDUR=30.99;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 500) {
										$pesotasaREDUR=33.83;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 600) {
										$pesotasaREDUR=40.95;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 700) {
										$pesotasaREDUR=46.60;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 800) {
										$pesotasaREDUR=52.29;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 900) {
										$pesotasaREDUR=58.09;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 1000) {
										$pesotasaREDUR=64.68;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso > 1000) {
										$pesotasaREDUR= 64.68 + ($pesosMayoresREDUR * 0.0590);
										echo "Tasa + PESO Redur ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idprovto == 4 || $idprovto == 13) {
									echo "Zona D";
									echo "<br>";
									if ($peso <= 5) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso <= 10) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 20) {
										$pesotasaREDUR=4.50;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 30) {
										$pesotasaREDUR=5.84;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 40) {
										$pesotasaREDUR=7.03;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 50) {
										$pesotasaREDUR=8.05;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 60) {
										$pesotasaREDUR=9.08;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 70) {
										$pesotasaREDUR=10.10;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 80) {
										$pesotasaREDUR=11.12;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 90) {
										$pesotasaREDUR=12.12;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 100) {
										$pesotasaREDUR=13.18;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 125) {
										$pesotasaREDUR=14.99;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 150) {
										$pesotasaREDUR=17.45;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 175) {
										$pesotasaREDUR=19.02;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 200) {
										$pesotasaREDUR=21.28;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 250) {
										$pesotasaREDUR=24.22;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 300) {
										$pesotasaREDUR=27.37;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 350) {
										$pesotasaREDUR=30.71;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 400) {
										$pesotasaREDUR=33.93;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 450) {
										$pesotasaREDUR=37.19;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 500) {
										$pesotasaREDUR=40.59;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 600) {
										$pesotasaREDUR=49.13;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 700) {
										$pesotasaREDUR=55.90;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 800) {
										$pesotasaREDUR=62.74;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 900) {
										$pesotasaREDUR=69.69;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 1000) {
										$pesotasaREDUR=77.63;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso > 1000) {
										$pesotasaREDUR= 77.63 + ($pesosMayoresREDUR * 0.707);
										echo "Tasa + PESO Redur ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idprovto == 2 || $idprovto == 3 
									|| $idprovto == 5 || $idprovto == 16
									|| $idprovto == 19 || $idprovto == 28 
									|| $idprovto == 30 || $idprovto == 37
									|| $idprovto == 40 || $idprovto == 45 
									|| $idprovto == 47 || $idprovto == 49) {
									echo "Zona E";
									echo "<br>";

									if ($peso <= 5) {
										$pesotasaREDUR=3.34;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso <= 10) {
										$pesotasaREDUR=3.57;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 20) {
										$pesotasaREDUR=5.13;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 30) {
										$pesotasaREDUR=6.65;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 40) {
										$pesotasaREDUR=8.01;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 50) {
										$pesotasaREDUR=9.16;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 60) {
										$pesotasaREDUR=10.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 70) {
										$pesotasaREDUR=11.50;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 80) {
										$pesotasaREDUR=12.67;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 90) {
										$pesotasaREDUR=13.78;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 100) {
										$pesotasaREDUR=15.01;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 125) {
										$pesotasaREDUR=17.07;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 150) {
										$pesotasaREDUR=19.88;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 175) {
										$pesotasaREDUR=21.66;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 200) {
										$pesotasaREDUR=24.22;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 250) {
										$pesotasaREDUR=27.59;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 300) {
										$pesotasaREDUR=31.18;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 350) {
										$pesotasaREDUR=34.97;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 400) {
										$pesotasaREDUR=38.64;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 450) {
										$pesotasaREDUR=42.36;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 500) {
										$pesotasaREDUR=46.25;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 600) {
										$pesotasaREDUR=55.95;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 700) {
										$pesotasaREDUR=63.67;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 800) {
										$pesotasaREDUR=71.47;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 900) {
										$pesotasaREDUR=79.39;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 1000) {
										$pesotasaREDUR=88.42;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso > 1000) {
										$pesotasaREDUR= 88.42 + ($pesosMayoresREDUR * 0.0805);
										echo "Tasa + PESO ASM ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idprovto == 1 || $idprovto == 9 
									|| $idprovto == 12 || $idprovto == 24
									|| $idprovto == 34 || $idprovto == 42 
									|| $idprovto == 44 || $idprovto == 46
									|| $idprovto == 50) {
									echo "Zona F";
									echo "<br>";

									if ($peso <= 5) {
										$pesotasaREDUR=3.66;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso <= 10) {
										$pesotasaREDUR=3.92;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 20) {
										$pesotasaREDUR=5.63;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 30) {
										$pesotasaREDUR=7.29;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 40) {
										$pesotasaREDUR=8.79;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 50) {
										$pesotasaREDUR=10.07;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 60) {
										$pesotasaREDUR=11.34;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 70) {
										$pesotasaREDUR=12.63;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 80) {
										$pesotasaREDUR=13.92;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 90) {
										$pesotasaREDUR=15.13;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 100) {
										$pesotasaREDUR=16.46;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 125) {
										$pesotasaREDUR=18.73;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 150) {
										$pesotasaREDUR=21.80;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 175) {
										$pesotasaREDUR=23.76;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 200) {
										$pesotasaREDUR=26.60;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 250) {
										$pesotasaREDUR=30.30;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 300) {
										$pesotasaREDUR=34.22;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 350) {
										$pesotasaREDUR=38.38;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 400) {
										$pesotasaREDUR=42.41;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 450) {
										$pesotasaREDUR=46.49;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 500) {
										$pesotasaREDUR=50.76;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 600) {
										$pesotasaREDUR=61.42;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 700) {
										$pesotasaREDUR=69.89;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 800) {
										$pesotasaREDUR=78.45;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 900) {
										$pesotasaREDUR=87.14;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 1000) {
										$pesotasaREDUR=97.04;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso > 1000) {
										$pesotasaREDUR= 97.04 + ($pesosMayoresREDUR * 0.0882);
										echo "Tasa + PESO ASM ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idprovto == 8 || $idprovto == 26 
									|| $idprovto == 31 || $idprovto == 20
									|| $idprovto == 43) {
									echo "Zona G";
									echo "<br>";

									if ($peso <= 5) {
										$pesotasaREDUR=3.92;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso <= 10) {
										$pesotasaREDUR=4.17;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 20) {
										$pesotasaREDUR=6.01;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 30) {
										$pesotasaREDUR=7.79;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 40) {
										$pesotasaREDUR=9.39;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 50) {
										$pesotasaREDUR=10.73;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 60) {
										$pesotasaREDUR=12.09;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 70) {
										$pesotasaREDUR=13.47;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 80) {
										$pesotasaREDUR=14.84;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 90) {
										$pesotasaREDUR=16.16;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 100) {
										$pesotasaREDUR=17.58;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 125) {
										$pesotasaREDUR=19.98;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 150) {
										$pesotasaREDUR=23.27;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 175) {
										$pesotasaREDUR=25.36;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 200) {
										$pesotasaREDUR=28.37;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 250) {
										$pesotasaREDUR=32.31;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 300) {
										$pesotasaREDUR=36.50;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 350) {
										$pesotasaREDUR=40.95;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 400) {
										$pesotasaREDUR=45.26;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 450) {
										$pesotasaREDUR=49.60;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 500) {
										$pesotasaREDUR=54.15;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 600) {
										$pesotasaREDUR=65.53;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 700) {
										$pesotasaREDUR=74.56;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 800) {
										$pesotasaREDUR=83.69;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 900) {
										$pesotasaREDUR=92.97;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 1000) {
										$pesotasaREDUR=103.54;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso > 1000) {
										$pesotasaREDUR= 103.54 + ($pesosMayoresREDUR * 0.0942);
										echo "Tasa + PESO ASM ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idprovto == 33 || $idprovto == 48 
									|| $idprovto == 39 || $idprovto == 17
									|| $idprovto == 22 || $idprovto == 15 
									|| $idprovto == 25 || $idprovto == 27
									|| $idprovto == 32 || $idprovto == 36) {
									echo "Zona H";
									echo "<br>";

									if ($peso <= 5) {
										$pesotasaREDUR=4.16;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso <= 10) {
										$pesotasaREDUR=4.43;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 20) {
										$pesotasaREDUR=6.39;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 30) {
										$pesotasaREDUR=8.27;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 40) {
										$pesotasaREDUR=9.97;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 50) {
										$pesotasaREDUR=11.40;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 60) {
										$pesotasaREDUR=12.85;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 70) {
										$pesotasaREDUR=14.30;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 80) {
										$pesotasaREDUR=15.76;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 90) {
										$pesotasaREDUR=17.15;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 100) {
										$pesotasaREDUR=18.67;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 125) {
										$pesotasaREDUR=21.23;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 150) {
										$pesotasaREDUR=24.72;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 175) {
										$pesotasaREDUR=26.94;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 200) {
										$pesotasaREDUR=30.14;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 250) {
										$pesotasaREDUR=34.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 300) {
										$pesotasaREDUR=38.78;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 350) {
										$pesotasaREDUR=43.51;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 400) {
										$pesotasaREDUR=48.07;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 450) {
										$pesotasaREDUR=52.70;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 500) {
										$pesotasaREDUR=57.53;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 600) {
										$pesotasaREDUR=69.62;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 700) {
										$pesotasaREDUR=79.19;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 800) {
										$pesotasaREDUR=88.92;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 900) {
										$pesotasaREDUR=98.75;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 1000) {
										$pesotasaREDUR=109.99;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso > 1000) {
										$pesotasaREDUR= 109.99 + ($pesosMayoresREDUR * 0.1001);
										echo "Tasa + PESO Redur ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idcodautAr[0] == 4) {
									echo "zona I";
									echo "<br>";
									if ($peso <= 5) {
										$pesotasaREDUR=6.72;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso <= 10) {
										$pesotasaREDUR=7.17;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 20) {
										$pesotasaREDUR=10.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 30) {
										$pesotasaREDUR=13.38;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 40) {
										$pesotasaREDUR=16.11;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 50) {
										$pesotasaREDUR=18.45;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 60) {
										$pesotasaREDUR=20.79;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 70) {
										$pesotasaREDUR=23.14;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 80) {
										$pesotasaREDUR=25.50;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 90) {
										$pesotasaREDUR=27.72;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 100) {
										$pesotasaREDUR=30.19;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 125) {
										$pesotasaREDUR=34.34;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 150) {
										$pesotasaREDUR=39.98;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 175) {
										$pesotasaREDUR=43.57;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 200) {
										$pesotasaREDUR=48.74;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 250) {
										$pesotasaREDUR=55.50;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 300) {
										$pesotasaREDUR=62.71;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 350) {
										$pesotasaREDUR=70.35;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 400) {
										$pesotasaREDUR=77.74;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 450) {
										$pesotasaREDUR=85.22;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 500) {
										$pesotasaREDUR=93.02;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 600) {
										$pesotasaREDUR=112.57;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 700) {
										$pesotasaREDUR=128.08;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 800) {
										$pesotasaREDUR=143.78;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 900) {
										$pesotasaREDUR=159.70;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($peso <= 1000) {
										$pesotasaREDUR=177.85;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($peso > 1000) {
										$pesotasaREDUR= 177.85 + ($pesosMayoresREDUR * 0.1618);
										echo "Tasa + PESO Redur ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								}

							} elseif ($peso < $pvredur) {
								$pesosMayoresREDUR = ceil($pvredur - 1000);
								if ($idprovto == 41){
									echo "zona A";
									echo "<br>";
									if ($pvredur <= 5) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur <= 10) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 20) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 30) {
										$pesotasaREDUR=3.74;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 40) {
										$pesotasaREDUR=4.37;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 50) {
										$pesotasaREDUR=4.98;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 60) {
										$pesotasaREDUR=5.56;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 70) {
										$pesotasaREDUR=6.20;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 80) {
										$pesotasaREDUR=6.82;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 90) {
										$pesotasaREDUR=7.46;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 100) {
										$pesotasaREDUR=8.10;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 125) {
										$pesotasaREDUR=9.12;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 150) {
										$pesotasaREDUR=10.70;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 175) {
										$pesotasaREDUR=11.65;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 200) {
										$pesotasaREDUR=13.06;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 250) {
										$pesotasaREDUR=14.84;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 300) {
										$pesotasaREDUR=16.67;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 350) {
										$pesotasaREDUR=18.56;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 400) {
										$pesotasaREDUR=20.45;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 450) {
										$pesotasaREDUR=22.14;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 500) {
										$pesotasaREDUR=23.93;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 600) {
										$pesotasaREDUR=27.39;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 700) {
										$pesotasaREDUR=30.78;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 800) {
										$pesotasaREDUR=33.94;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 900) {
										$pesotasaREDUR=37.41;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 1000) {
										$pesotasaREDUR=41.26;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur > 1000) {
										$pesotasaREDUR= 41.26 + ($pesosMayoresREDUR * 0.0375);
										echo "Tasa + PESO Redur ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}

								} elseif ($idprovto == 11 || $idprovto == 29 || $idprovto == 14 || $idprovto == 21) {
									echo "Zona B";
									echo "<br>";
									if ($pvredur <= 5) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur <= 10) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 20) {
										$pesotasaREDUR=3.47;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 30) {
										$pesotasaREDUR=4.27;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 40) {
										$pesotasaREDUR=5.05;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 50) {
										$pesotasaREDUR=5.78;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 60) {
										$pesotasaREDUR=6.61;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 70) {
										$pesotasaREDUR=7.35;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 80) {
										$pesotasaREDUR=8.10;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 90) {
										$pesotasaREDUR=8.34;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 100) {
										$pesotasaREDUR=9.07;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 125) {
										$pesotasaREDUR=10.25;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 150) {
										$pesotasaREDUR=11.96;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 175) {
										$pesotasaREDUR=13.06;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 200) {
										$pesotasaREDUR=14.61;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 250) {
										$pesotasaREDUR=16.63;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 300) {
										$pesotasaREDUR=18.71;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 350) {
										$pesotasaREDUR=20.90;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 400) {
										$pesotasaREDUR=22.92;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 450) {
										$pesotasaREDUR=25.09;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 500) {
										$pesotasaREDUR=27.24;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 600) {
										$pesotasaREDUR=30.78;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 700) {
										$pesotasaREDUR=34.73;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 800) {
										$pesotasaREDUR=38.53;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 900) {
										$pesotasaREDUR=42.58;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 1000) {
										$pesotasaREDUR=47.11;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur > 1000) {
										$pesotasaREDUR= 47.11 + ($pesosMayoresREDUR * 0.0429);
										echo "Tasa + PESO Redur ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idprovto ==18 || $idprovto== 23  || $idcodautAr[0] == 11)  {
									echo "Zona C";
									echo "<br>";
									if ($pvredur <= 5) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur <= 10) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 20) {
										$pesotasaREDUR=3.75;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 30) {
										$pesotasaREDUR=4.87;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 40) {
										$pesotasaREDUR=5.86;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 50) {
										$pesotasaREDUR=6.71;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 60) {
										$pesotasaREDUR=7.56;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 70) {
										$pesotasaREDUR=8.42;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 80) {
										$pesotasaREDUR=9.27;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 90) {
										$pesotasaREDUR=10.09;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 100) {
										$pesotasaREDUR=10.99;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 125) {
										$pesotasaREDUR=12.50;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 150) {
										$pesotasaREDUR=14.54;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 175) {
										$pesotasaREDUR=15.85;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 200) {
										$pesotasaREDUR=17.74;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 250) {
										$pesotasaREDUR=20.19;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 300) {
										$pesotasaREDUR=22.81;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 350) {
										$pesotasaREDUR=25.59;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 400) {
										$pesotasaREDUR=28.28;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 450) {
										$pesotasaREDUR=30.99;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 500) {
										$pesotasaREDUR=33.83;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 600) {
										$pesotasaREDUR=40.95;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 700) {
										$pesotasaREDUR=46.60;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 800) {
										$pesotasaREDUR=52.29;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 900) {
										$pesotasaREDUR=58.09;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 1000) {
										$pesotasaREDUR=64.68;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur > 1000) {
										$pesotasaREDUR= 64.68 + ($pesosMayoresREDUR * 0.0590);
										echo "Tasa + PESO Redur ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idprovto == 4 || $idprovto == 13) {
									echo "Zona D";
									echo "<br>";

									if ($pvredur <= 5) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur <= 10) {
										$pesotasaREDUR=3.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 20) {
										$pesotasaREDUR=4.50;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 30) {
										$pesotasaREDUR=5.84;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 40) {
										$pesotasaREDUR=7.03;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 50) {
										$pesotasaREDUR=8.05;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 60) {
										$pesotasaREDUR=9.08;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 70) {
										$pesotasaREDUR=10.10;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 80) {
										$pesotasaREDUR=11.12;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 90) {
										$pesotasaREDUR=12.12;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 100) {
										$pesotasaREDUR=13.18;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 125) {
										$pesotasaREDUR=14.99;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 150) {
										$pesotasaREDUR=17.45;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 175) {
										$pesotasaREDUR=19.02;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 200) {
										$pesotasaREDUR=21.28;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 250) {
										$pesotasaREDUR=24.22;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 300) {
										$pesotasaREDUR=27.37;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 350) {
										$pesotasaREDUR=30.71;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 400) {
										$pesotasaREDUR=33.93;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 450) {
										$pesotasaREDUR=37.19;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 500) {
										$pesotasaREDUR=40.59;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 600) {
										$pesotasaREDUR=49.13;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 700) {
										$pesotasaREDUR=55.90;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 800) {
										$pesotasaREDUR=62.74;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 900) {
										$pesotasaREDUR=69.69;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 1000) {
										$pesotasaREDUR=77.63;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur > 1000) {
										$pesotasaREDUR= 77.63 + ($pesosMayoresREDUR * 0.707);
										echo "Tasa + PESO Redur ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idprovto == 2 || $idprovto == 3 
									|| $idprovto == 5 || $idprovto == 16
									|| $idprovto == 19 || $idprovto == 28 
									|| $idprovto == 30 || $idprovto == 37
									|| $idprovto == 40 || $idprovto == 45 
									|| $idprovto == 47 || $idprovto == 49) {
									echo "Zona E";
									echo "<br>";

									if ($pvredur <= 5) {
										$pesotasaREDUR=3.34;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur <= 10) {
										$pesotasaREDUR=3.57;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 20) {
										$pesotasaREDUR=5.13;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 30) {
										$pesotasaREDUR=6.65;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 40) {
										$pesotasaREDUR=8.01;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 50) {
										$pesotasaREDUR=9.16;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 60) {
										$pesotasaREDUR=10.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 70) {
										$pesotasaREDUR=11.50;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 80) {
										$pesotasaREDUR=12.67;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 90) {
										$pesotasaREDUR=13.78;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 100) {
										$pesotasaREDUR=15.01;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 125) {
										$pesotasaREDUR=17.07;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 150) {
										$pesotasaREDUR=19.88;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 175) {
										$pesotasaREDUR=21.66;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 200) {
										$pesotasaREDUR=24.22;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 250) {
										$pesotasaREDUR=27.59;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 300) {
										$pesotasaREDUR=31.18;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 350) {
										$pesotasaREDUR=34.97;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 400) {
										$pesotasaREDUR=38.64;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 450) {
										$pesotasaREDUR=42.36;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 500) {
										$pesotasaREDUR=46.25;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 600) {
										$pesotasaREDUR=55.95;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 700) {
										$pesotasaREDUR=63.67;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 800) {
										$pesotasaREDUR=71.47;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 900) {
										$pesotasaREDUR=79.39;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 1000) {
										$pesotasaREDUR=88.42;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur > 1000) {
										$pesotasaREDUR= 88.42 + ($pesosMayoresREDUR * 0.0805);
										echo "Tasa + PESO Redur ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idprovto == 1 || $idprovto == 9 
									|| $idprovto == 12 || $idprovto == 24
									|| $idprovto == 34 || $idprovto == 42 
									|| $idprovto == 44 || $idprovto == 46
									|| $idprovto == 50) {
									echo "Zona F";
									echo "<br>";

									if ($pvredur <= 5) {
										$pesotasaREDUR=3.66;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur <= 10) {
										$pesotasaREDUR=3.92;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 20) {
										$pesotasaREDUR=5.63;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 30) {
										$pesotasaREDUR=7.29;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 40) {
										$pesotasaREDUR=8.79;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 50) {
										$pesotasaREDUR=10.07;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 60) {
										$pesotasaREDUR=11.34;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 70) {
										$pesotasaREDUR=12.63;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 80) {
										$pesotasaREDUR=13.92;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 90) {
										$pesotasaREDUR=15.13;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 100) {
										$pesotasaREDUR=16.46;
										echo $v.' €';
										echo "<br>";
									}elseif ($pvredur <= 125) {
										$pesotasaREDUR=18.73;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 150) {
										$pesotasaREDUR=21.80;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 175) {
										$pesotasaREDUR=23.76;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 200) {
										$pesotasaREDUR=26.60;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 250) {
										$pesotasaREDUR=30.30;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 300) {
										$pesotasaREDUR=34.22;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 350) {
										$pesotasaREDUR=38.38;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 400) {
										$pesotasaREDUR=42.41;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 450) {
										$pesotasaREDUR=46.49;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 500) {
										$pesotasaREDUR=50.76;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 600) {
										$pesotasaREDUR=61.42;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 700) {
										$pesotasaREDUR=69.89;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 800) {
										$pesotasaREDUR=78.45;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 900) {
										$pesotasaREDUR=87.14;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 1000) {
										$pesotasaREDUR=97.04;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur > 1000) {
										$pesotasaREDUR= 97.04 + ($pesosMayoresREDUR * 0.0882);
										echo "Tasa + PESO Redur ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idprovto == 8 || $idprovto == 26 
									|| $idprovto == 31 || $idprovto == 20
									|| $idprovto == 43) {
									echo "Zona G";
									echo "<br>";

									if ($pvredur <= 5) {
										$pesotasaREDUR=3.92;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur <= 10) {
										$pesotasaREDUR=4.17;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 20) {
										$pesotasaREDUR=6.01;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 30) {
										$pesotasaREDUR=7.79;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 40) {
										$pesotasaREDUR=9.39;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 50) {
										$pesotasaREDUR=10.73;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 60) {
										$pesotasaREDUR=12.09;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 70) {
										$pesotasaREDUR=13.47;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 80) {
										$pesotasaREDUR=14.84;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 90) {
										$pesotasaREDUR=16.16;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 100) {
										$pesotasaREDUR=17.58;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 125) {
										$pesotasaREDUR=19.98;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 150) {
										$pesotasaREDUR=23.27;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 175) {
										$pesotasaREDUR=25.36;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 200) {
										$pesotasaREDUR=28.37;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 250) {
										$pesotasaREDUR=32.31;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 300) {
										$pesotasaREDUR=36.50;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 350) {
										$pesotasaREDUR=40.95;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 400) {
										$pesotasaREDUR=45.26;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 450) {
										$pesotasaREDUR=49.60;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 500) {
										$pesotasaREDUR=54.15;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 600) {
										$pesotasaREDUR=65.53;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 700) {
										$pesotasaREDUR=74.56;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 800) {
										$pesotasaREDUR=83.69;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 900) {
										$pesotasaREDUR=92.97;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 1000) {
										$pesotasaREDUR=103.54;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur > 1000) {
										$pesotasaREDUR= 103.54 + ($pesosMayoresREDUR * 0.0942);
										echo "Tasa + PESO Redur ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idprovto == 33 || $idprovto == 48 
									|| $idprovto == 39 || $idprovto == 17
									|| $idprovto == 22 || $idprovto == 15 
									|| $idprovto == 25 || $idprovto == 27
									|| $idprovto == 32 || $idprovto == 36) {
									echo "Zona H";
									echo "<br>";

									if ($pvredur <= 5) {
										$pesotasaREDUR=4.16;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur <= 10) {
										$pesotasaREDUR=4.43;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 20) {
										$pesotasaREDUR=6.39;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 30) {
										$pesotasaREDUR=8.27;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 40) {
										$pesotasaREDUR=9.97;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 50) {
										$pesotasaREDUR=11.40;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 60) {
										$pesotasaREDUR=12.85;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 70) {
										$pesotasaREDUR=14.30;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 80) {
										$pesotasaREDUR=15.76;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 90) {
										$pesotasaREDUR=17.15;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 100) {
										$pesotasaREDUR=18.67;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 125) {
										$pesotasaREDUR=21.23;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 150) {
										$pesotasaREDUR=24.72;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 175) {
										$pesotasaREDUR=26.94;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 200) {
										$pesotasaREDUR=30.14;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 250) {
										$pesotasaREDUR=34.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 300) {
										$pesotasaREDUR=38.78;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 350) {
										$pesotasaREDUR=43.51;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 400) {
										$pesotasaREDUR=48.07;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 450) {
										$pesotasaREDUR=52.70;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 500) {
										$pesotasaREDUR=57.53;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 600) {
										$pesotasaREDUR=69.62;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 700) {
										$pesotasaREDUR=79.19;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 800) {
										$pesotasaREDUR=88.92;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 900) {
										$pesotasaREDUR=98.75;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 1000) {
										$pesotasaREDUR=109.99;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur > 1000) {
										$pesotasaREDUR= 109.99 + ($pesosMayoresREDUR * 0.1001);
										echo "Tasa + PESO Redur ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								} elseif ($idcodautAr[0] == 4) {
									echo "zona I";
									echo "<br>";

									if ($pvredur <= 5) {
										$pesotasaREDUR=6.72;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur <= 10) {
										$pesotasaREDUR=7.17;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 20) {
										$pesotasaREDUR=10.33;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 30) {
										$pesotasaREDUR=13.38;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 40) {
										$pesotasaREDUR=16.11;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 50) {
										$pesotasaREDUR=18.45;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 60) {
										$pesotasaREDUR=20.79;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 70) {
										$pesotasaREDUR=23.14;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 80) {
										$pesotasaREDUR=25.50;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 90) {
										$pesotasaREDUR=27.72;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 100) {
										$pesotasaREDUR=30.19;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 125) {
										$pesotasaREDUR=34.34;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 150) {
										$pesotasaREDUR=39.98;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 175) {
										$pesotasaREDUR=43.57;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 200) {
										$pesotasaREDUR=48.74;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 250) {
										$pesotasaREDUR=55.50;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 300) {
										$pesotasaREDUR=62.71;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 350) {
										$pesotasaREDUR=70.35;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 400) {
										$pesotasaREDUR=77.74;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 450) {
										$pesotasaREDUR=85.22;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 500) {
										$pesotasaREDUR=93.02;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 600) {
										$pesotasaREDUR=112.57;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 700) {
										$pesotasaREDUR=128.08;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 800) {
										$pesotasaREDUR=143.78;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 900) {
										$pesotasaREDUR=159.70;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									}elseif ($pvredur <= 1000) {
										$pesotasaREDUR=177.85;
										echo $pesotasaREDUR.' €';
										echo "<br>";
									} elseif ($pvredur > 1000) {
										$pesotasaREDUR= 177.85 + ($pesosMayoresREDUR * 0.1618);
										echo "Tasa + PESO ASM ".number_format($pesotasaREDUR, 2).' €';
										echo "<br>";
									}
								}

							}
							?>
						</h2>
					</div>
					<div id="fuel" hidden="">
						<h4>
							<?php
							if (!empty($pesotasaREDUR)) {
								$fuelREDUR = ($pesotasaREDUR * 0)/100;
								echo $fuelREDUR.' €';
							} else {
								echo "No has introducido datos";
							}

							?>
						</h2>
					</div>
					<div id="reembolso" hidden="">
						<h4>
							<?php
							$reembolsoREDUR = ($reembolso * 2.5)/100;
							if (!empty($reembolso) && !empty($pesotasaREDUR)) {

								if ($reembolsoREDUR < 3){
									$reembolsoREDUR = 3;
								}
								echo $reembolsoREDUR . ' €';
							} elseif (empty($pesotasaREDUR) && !empty($reembolso)) {
								echo "No has introducido datos";
							}
							else {
								echo "No has escrito ninguna cifra";
							}
							?>
						</h2>
					</div>
					<div id="precio final">
						<h4>
							<?php
							if (!empty($pesotasaREDUR)) {
								$finalREDUR = $reembolsoREDUR + $pesotasaREDUR + $fuelREDUR;
								echo $finalREDUR.' €';
							} else {
								echo "no has introducido datos";
							}

							?>
						</h2>
					</div>
				</div>
				<div class="pricing-table-features">
					<img  class="img-responsive" src="files/img/carriers/logo_redur.jpg" />
				</div>
				<div class="pricing-table-signup-ultimate">
					<p><a href="#">Sign Up</a></p>
				</div>
			</div>
		</div>
		<div class="dt-buttons btn-group"><a class="btn btn-default buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons" href="#"><span>Copy</span></a><a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons" href="#"><span>CSV</span></a><a class="btn btn-default buttons-excel buttons-flash btn-sm" tabindex="0" aria-controls="datatable-buttons" href="#"><span>Excel</span><div style="position: absolute; left: 0px; top: 0px; width: 52px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_1" src="//cdn.datatables.net/buttons/1.2.0/swf/flashExport.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="52" height="30" name="ZeroClipboard_TableToolsMovie_1" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=1&amp;width=52&amp;height=30" wmode="transparent"></div></a><a class="btn btn-default buttons-print btn-sm" tabindex="0" aria-controls="datatable-buttons" href="#"><span>Print</span></a></div>
	</div>
</div>
<div class="footer"></div>
</body>
</html>