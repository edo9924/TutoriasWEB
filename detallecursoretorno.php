<?php
include('database.php');
$idCurso = $_GET['curso_identity'];
$html_d = "";

$query = "SELECT * FROM CURSO WHERE CURSO_ID ='{$idCurso}'";
$result = $mysqli->query($query);

$query2 = "SELECT * FROM CLASE WHERE CLASE_CURSO_ID = '{$idCurso}'";
$result2 = $mysqli->query($query2);

$rowCheck = $connection->query("SELECT * FROM CURSO WHERE CURSO_ID ='{$idCurso}'");
$rowCount = $rowCheck->fetchColumn();

$clasesCheck = $connection2->query("SELECT count(clase_curso_id) as num from clase where CLASE_CURSO_ID = '{$idCurso}'");
$rows = mysqli_fetch_assoc($clasesCheck);
$numClases = $rows['num'];

  foreach ($result as $fila) {
     //$fila['curso_id'];
     $id_curso = $fila['curso_id'];
     $nombre_curso = $fila['curso_nombre'];
     $descripcion_curso = $fila['curso_descripcion'];
     $thumb_curso = $fila['curso_thumb'];
     $precio_curso = $fila['curso_precio'];
     $aprobacion_curso = $fila['curso_es_aprobado'];
     $id_tutor_curso = $fila['curso_id_tutor'];
     $i++;
  } 

  $clase_id = array();
  $clase_nombre = array();
  $clase_descripcion = array();
  $clase_video = array();
  $clase_curso_id = array();

$i = 0;
  foreach ($result2 as $fila2) {
    $clase_id[$i] = $fila2['clase_id'];
    $clase_nombre[$i] = $fila2['clase_nombre'];
    $clase_descripcion[$i] = $fila2['clase_descripcion'];
    $clase_video[$i] = $fila2['clase_video'];
    $clase_curso_id[$i] = $fila2['clase_curso_id'];
    $i++;
  }

  if($aprobacion_curso == 1 && $rowCount > 0){
  $html_d = "<div class='jumbotron'>";
  $html_d .= "<h1 class='display-4 centeredtext'>{$nombre_curso}</h1>";
  $html_d .= "<div class='centereddiv'>";
  $html_d .= "<img src='data:image/jpeg;base64,".base64_encode( $thumb_curso )."' height ='200px' width='300px'/>";
  $html_d .= "</div>";
  $html_d .= "<p class='lead centeredtext'>{$descripcion_curso}</p>";
  $html_d .= "<hr class='my-4'>";
  $html_d .= "<p class='lead'>El curso se dicta en las siguientes clases:</p>";

  if($numClases == 1){
  $html_d .= "<a href='#' class='lead'>Clase 1.- ". $clase_nombre[0] ."</a>";
  $html_d .= "<p>". $clase_descripcion[0] ."</p>";
  $html_d .= "<br>"; 
  $html_d .= "<a class='btn btn-primary btn-lg' href='registroalumno.php' role='button'>Compra este curso.</a>";
  $html_d .= "</p>";
  $html_d .= "</div>";
  }

  if($numClases == 2){
  $$html_d .= "<a href='#' class='lead'>Clase 1.- ". $clase_nombre[0] ."</a>";
  $html_d .= "<p>". $clase_descripcion[0] ."</p>";
  $html_d .= "<br>"; 
  $html_d .= "<a href='#' class='lead'>Clase 2.- ". $clase_nombre[1] ."</a>";
  $html_d .= "<p>" . $clase_descripcion[1] ."</p>";
  $html_d .= "<br>";
  $html_d .= "<a class='btn btn-primary btn-lg' href='registroalumno.php' role='button'>Compra este curso.</a>";
  $html_d .= "</p>";
  $html_d .= "</div>";
  }

  if($numClases == 3){
  $html_d .= "<a href='#' class='lead'>Clase 1.- ". $clase_nombre[0] ."</a>";
  $html_d .= "<p>". $clase_descripcion[0] ."</p>";
  $html_d .= "<br>"; 
  $html_d .= "<a href='#' class='lead'>Clase 2.- ". $clase_nombre[1] ."</a>";
  $html_d .= "<p>" . $clase_descripcion[1] ."</p>";
  $html_d .= "<br>";
  $html_d .= "<a href='#' class='lead'>Clase 3.- ". $clase_nombre[2] ."</a>";
  $html_d .= "<p>". $clase_descripcion[2] ."</p>";
  $html_d .= "<br>";
  $html_d .= "<a class='btn btn-primary btn-lg' href='registroalumno.php' role='button'>Compra este curso.</a>";
  $html_d .= "</p>";
  $html_d .= "</div>";
  }
  }

  else {
  echo 'No se ha encontrado el curso';
  }
  echo 'la cantidad de clases es ' . $numClases;

?>
