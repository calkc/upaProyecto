<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>m_platillos</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="bustras/css/bootstrap.css">
	<link rel="stylesheet" href="bustras/css/bootstrap-theme.css">
	<link rel="stylesheet" href="bustras/css/estilos.css">
</head>
<body>
	<div class="container contenedor_principal">
		<br>
		<header>     
            <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
			<!-- navbar-fixed-top o bottom ocupa el 100$ independientemente de si lo encierras en un container -->
			<!-- Si se utiliza el fixed top entonces tienes que agregar padding al body para que se muestre el texto debajo del nav -->
				<div class="container-fluid">
					<div class="navbar-header">
						<a href="#" class="navbar-brand">Esto no es Dolibarr</a>
					</div>
					<div class="collapse navbar-collapse" id="navbar1">
					<!-- id tiene que ser igual que el que pusiste en el data-target, solo que en este se le añade # -->
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="inicio_pacientes.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pacientes<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="p_pacientes.php">Pacientes</a></li>
									<li><a href="p_visitas.php">Visitas</a></li>
									<li role="separator" class="divider"></li>
								</ul>
							</li>
							
							<li class="dropdown">
								<a href="inicio_menus.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menú<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="m_dietas.php">Dietas</a></li>
									<li><a href="m_menus.php">Menús</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="m_platillos.php">Platillos</a></li>
								</ul>
							</li>
							
							<li class="dropdown">
								<a href="inicio_ventas.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ventas<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="v_inventario.php">Inventario</a></li>
									<li><a href="v_comercial.php">Comercial</a></li>
									<li role="separator" class="divider"></li>
								</ul>
							</li>
						</ul>
						<!-- terminan bottones -->
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="">Inventario</a></li>
									<li><a href="">Comercial</a></li>
									<li class="divider"></li>
									<li><a href="">Cosa Modulo #4</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<div class="container">
        
        <center><h1>Platillos</h1></center>
        <pr>
        <pr>
        <p>Aquí puedes ver la lista de platillos disponibles, además de que te permite eliminar o modificar alguno si es necesario cambiando        el nombre, calorías que contiene en total y la breve descrpción.</p>
        
        <td><a href="Formulario_Platillos.html" style='float:right;' class="btn btn-warning">Agregar Platillo</a>&#9;</td>
        <br>
        <br>
        <br>
		<table class="table table-condensed table-hover table-bordered"> <!--Striped es alternar colores de tabla y table-condensed para tablas apretaditasxd -->
			<tr class="active">
				<th>Nombre Platillo</th>
				<th>Calorías en total</th>
                <th>Descripción</th>
				<th>Opciones</th>
			</tr>
			<!-- clases succeed info warning y danger son colorsitos -->
			<tr>
				<td>Nombre 1</td>
				<td>Calorías</td>
				<td>Descripción 1</td>
				<td><a href="" class="btn btn-danger">Eliminar</a>&#9;<a href="" class="btn btn-warning">Editar</a></td>
			</tr>
			<tr>
				<td>Nombre 2</td>
				<td>Calorías</td>
				<td>Descripción 2</td>
				<td><a href="" class="btn btn-danger">Eiminar</a>&#9;<a href="" class="btn btn-warning">Editar</a></td>
			</tr>
			
		</table>
	</div>
	</div>

	<script src="../bustras/js/jquery.min.js"></script>
	<script src="../bustras/js/bootstrap.js"></script>
</body>
</html>
