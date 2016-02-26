<?php
function buscarBaseDeDatos($conn,$seleccionado,$lista,$nombreidentificador,$identificador){
    $stmt = $conn ->prepare("SELECT `:seleccionado` FROM `:lista` WHERE `:nombreidentificador` = :identificador");


		$stmt->bindValue(':seleccionado', $seleccionado);
		$stmt->bindValue(':lista', $lista);
		$stmt->bindValue(':nombreidentificador', $nombreidentificador);
		$stmt->bindValue(':identificador', $identificador);

    foreach ($conn->query($stmt) as $row) {
        print $row["$seleccionado"] ;
    }
}
/*
function buscarBaseDeDatos($seleccionado,$lista,$nombreidentificador,$identificador){
	$link = mysql_connect('localhost', 'estudiaresfacil', 'UPChack2016');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db('estudiaresfacil',$link) or die ("could not open db".mysql_error());
mysql_query("SET NAMES 'utf8'", $link);
   $sqls= "SELECT `$seleccionado` FROM `$lista` WHERE `$nombreidentificador`= '$identificador'";
   $result = mysql_query($sqls);
   if (!$result) {
   $message = 'Invalid query: ' . mysql_error() . "\n";
   $message .= 'Whole query: ' . $query;
   die($message);
   }
   $row = mysql_fetch_assoc($result);
   $output = $row["$seleccionado"];
   return $output;
	}
*/
function buscarBaseDeDatosDosCondiciones($seleccionado,$lista,$nombreidentificador,$identificador,$nombresegundoidentificador,$segundoidentificador){
	$link = mysql_connect('localhost', 'wordpress', 'UPCwordpress2015');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('wordpress',$link) or die ("could not open db".mysql_error());
mysql_query("SET NAMES 'utf8'", $link);
   $sqls= "SELECT `$seleccionado` FROM `$lista` WHERE `$nombreidentificador`= '$identificador' AND `$nombresegundoidentificador`= '$segundoidentificador'" ;
   $result = mysql_query($sqls);
   if (!$result) {
   $message = 'Invalid query: ' . mysql_error() . "\n";
   $message .= 'Whole query: ' . $query;
   die($message);
   }
   $row = mysql_fetch_assoc($result);
   $output = $row["$seleccionado"];
   return $output;
	}



function buscarBaseDeDatosTresCondiciones($seleccionado,$lista,$nombreidentificador,$identificador,$nombresegundoidentificador,$segundoidentificador,$nombreterceridentificador,$terceridentificador){

$link = mysql_connect('localhost', 'wordpress', 'UPCwordpress2015');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('wordpress',$link) or die ("could not open db".mysql_error());
mysql_query("SET NAMES 'utf8'", $link);
   $sqls= "SELECT `$seleccionado` FROM `$lista` WHERE `$nombreidentificador`= '$identificador' AND `$nombresegundoidentificador`= '$segundoidentificador' AND `$nombreterceridentificador` = '$terceridentificador'" ;
   $result = mysql_query($sqls);
   if (!$result) {
   $message = 'Invalid query: ' . mysql_error() . "\n";
   $message .= 'Whole query: ' . $query;
   die($message);
   }
   $row = mysql_fetch_assoc($result);
   $output = $row["$seleccionado"];
   return $output;
	}




function buscarBaseDeDatosCuatroCondiciones($seleccionado,$lista,$nombreidentificador,$identificador,$nombresegundoidentificador,$segundoidentificador,$nombreterceridentificador,$terceridentificador,$nombrecuartoidentificador,$cuartoidentificador){

$link = mysql_connect('localhost', 'wordpress', 'UPCwordpress2015');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('wordpress',$link) or die ("could not open db".mysql_error());
mysql_query("SET NAMES 'utf8'", $link);
   $sqls= "SELECT `$seleccionado` FROM `$lista` WHERE `$nombreidentificador`= '$identificador' AND `$nombresegundoidentificador`= '$segundoidentificador' AND `$nombreterceridentificador`= '$terceridentificador' AND `$nombrecuartoidentificador` = '$cuartoidentificador' " ;
   $result = mysql_query($sqls);
   if (!$result) {
   $message = 'Invalid query: ' . mysql_error() . "\n";
   $message .= 'Whole query: ' . $query;
   die($message);
   }
   $row = mysql_fetch_assoc($result);
   $output = $row["$seleccionado"];
   return $output;
	}
/*
	function borrar (){
	$conn = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = "DELETE FROM `interopcion` WHERE intermediario = $intermediario";
	$conn->exec($stmt);
	}
	function insertar(){
	$conn = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("INSERT INTO interopcion(id, nombre , nombreurl , intermediario, modalidadcliente , logo , imagen , recuadro , usuario , mail , mailfijo , telefono , size , imagensi , ubicacion , color) VALUES (NULL , :nombre , :nombreurl , :intermediario , :modalidadcliente , :logo , :imagen , :recuadro , :usuario , :mail , :mailfijo , :telefono , :size , :imagensi , :ubicacion , :color )");

			$stmt->bindValue(':nombre', $nombre);
			$stmt->bindValue(':nombreurl', $nombreurl);
			$stmt->bindValue(':intermediario', $intermediario);
			$stmt->bindValue(':modalidadcliente', $modalidadcliente);
			if($file_name == '' OR $file_name == ' ' OR $file_name == false){
				$stmt->bindValue(':logo', $logoname);
			}
			else{
				$stmt->bindValue(':logo', $file_name);
			}
			if($file_name_imagen == '' OR $file_name_imagen == ' ' OR $file_name_imagen == false){
				$stmt->bindValue(':imagen', $imagenname);
			}
			else{

				$stmt->bindValue(':imagen', $file_name_imagen);
			}
			$stmt->bindValue(':recuadro', $recuadro);
			$stmt->bindValue(':usuario', $user_id);
			$stmt->bindValue(':mail', $mail);
			$stmt->bindValue(':mailfijo', $mailfijo);
			$stmt->bindValue(':telefono', $telefono);
			$stmt->bindValue(':size', $size);
			$stmt->bindValue(':imagensi', $imagensi);
			$stmt->bindValue(':ubicacion', $ubicacion);
			$stmt->bindValue(':color', $color);

	$stmt->execute();

	}
*/
?>
