<?php
include('database.php');

session_start();
$emilio = $_SESSION['email'];
$nombre = $_SESSION['nombre'];
$id = $_SESSION['id'];

$query = "SELECT * FROM CURSO";
$result =$mysqli->query($query);
$rowCheck = $connection->query( "SELECT * FROM CURSO ");
$rowCount = $rowCheck->fetchColumn();

if($rowCount > 0){

$id_curso = array();
$nombre_curso = array();

$i = 0;
	foreach ($result as $fila) {
		 $id_curso[$i] = $fila['curso_id'];
		 $nombre_curso[$i] = $fila['curso_nombre'];
		 $i++;
	}

$curso_max = sizeof($id_curso);
$html = "";

	for ($i=0; $i <= $curso_max ; $i++) { 
		$html = "<h1> Existen los siguientes cursos: </h1>";
		$html .= "<p> Id del curso: {$id_curso[$i]} </p>";
		$html .= "<p> Nombre del curso: {$nombre_curso[$i]} </p>";
	}

}	else {
	$sin_datos = '<h1>No hay ningun curso cargado en la pagina</h1>';
}

