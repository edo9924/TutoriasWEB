<?php
include('database.php');

session_start();
$emilio = $_SESSION['email'];
$nombre = $_SESSION['nombre'];
$id = $_SESSION['id'];

$query = "SELECT * FROM CURSO WHERE CURSO_ID_TUTOR ='{$id}'";
$result =$mysqli->query($query);

$rowCheck = $connection->query("SELECT * FROM CURSO WHERE CURSO_ID_TUTOR = '{$id}' ");
$rowCount = $rowCheck->fetchColumn();

$row = $result->fetch_array(MYSQLI_NUM);
$html = "";

if($rowCount > 0){

$id_curso = array();
$nombre_curso = array();
$descripcion_curso = array();
$thumb_curso = array();
$precio_curso = array();
$aprobacion_curso = array();
$id_tutor_curso = array();

$i = 0;
	foreach ($result as $fila) {
		 //$fila['curso_id'];
		 $id_curso[$i] = $fila['curso_id'];
		 $nombre_curso[$i] = $fila['curso_nombre'];
		 $descripcion_curso[$i] = $fila['curso_descripcion'];
		 $thumb_curso[$i] = $fila['curso_thumb'];
		 $precio_curso[$i] = $fila['curso_precio'];
		 $aprobacion_curso[$i] = $fila['curso_es_aprobado'];
		 $id_tutor_curso[$i] = $fila['curso_id_tutor'];
		 $i++;
	}	

$cursos_max = sizeof($id_curso);

	for ($i=0; $i < $cursos_max ; $i++) { 
		//echo $id_curso[$i];
		$html .= '<div class="container" style="width: 28rem;">';
		$html .= '<div class="card-header text-center">';
		$html .= "<h5 class='card-title'>{$nombre_curso[$i]}</h5>";
		$html .= '</div>';
		$html .= '<div class="card-body text-center">';
		//$html .= "<img src={$thumb_curso[$i]} width='300px'>";
		$html .= '<img src="data:image/jpeg;base64,'.base64_encode( $thumb_curso[$i] ).'" height ="400px" width="300px"/>';
		$html .= "<p class='card-text'>{$descripcion_curso[$i]}</p>";
		$html .= '<a href="subirclasetutor.php" class="btn btn-primary">Agregar Clases</a>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<br>';

	}

} else {
	echo "No hay ninguna row";
}


?>