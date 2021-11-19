<?php
include('database.php');
$idCurso = $_GET['curso_identity'];
$id = $_SESSION['id'];
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

$query3 = "SELECT * FROM HISTORIAL_COMPRA WHERE CURSO_ID = '{$idCurso}' and alumno_id = '{$id}'";
$historialCheck = $connection->query("SELECT * FROM HISTORIAL_COMPRA WHERE CURSO_ID = '{$idCurso}' and alumno_id = '{$id}'");
$rowsHistorial = $historialCheck->fetchColumn();

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

  $alumno_has_curso_id = array();
  $alumno_id = array();
  $curso_id = array();
  $fecha_de_compra = array(); 

  foreach($result3 as $result3) {
    $alumno_has_curso_id = $fila3['alumno_has_curso_id'];
    $alumno_id = $fila3['alumno_id'];
    $curso_id = $fila3['curso_id'];
    $fecha_de_compra = $fila3['fecha_de_compra'];
  }

  //COMMON INFORMATION
  if($aprobacion_curso == 1 && $rowCount > 0){
  $html_d = "<div class='jumbotron'>";
  $html_d .= "<h1 class='display-4 centeredtext'>{$nombre_curso}</h1>";
  $html_d .= "<div class='centereddiv'>";
  $html_d .= "<img src='data:image/jpeg;base64,".base64_encode( $thumb_curso )."' height ='200px' width='300px'/>";
  $html_d .= "</div>";
  $html_d .= "<p class='lead centeredtext'>{$descripcion_curso}</p>";
  $html_d .= "<hr class='my-4'>";
  $html_d .= "<p class='lead'>El curso se dicta en las siguientes clases:</p>";

  //IF THERE IS ONE CLASS
  if($numClases == 1){
  $html_d .= "<a href='#' class='lead'>Clase 1.- ". $clase_nombre[0] ."</a>";
  $html_d .= "<p>". $clase_descripcion[0] ."</p>";

  //IF THAT CLASS IS BOUGHT BY THE STUDENT
  if($rowsHistorial > 0){
  //echo "<video src='videos/".$clase_video[0]."' controls width='100%' height='200px' >";
  $html_d .= '<video width = "518" height = "384" controls></video>';
  $html_d .= "<source='data:video/mp4;base64,".base64_encode( $clase_video[0] )."' height ='1024px' width='768px'/>";
  $html_d .= '<source src=".'.$clase_video[0].'" type="video/mp4">';

  //IF THE COURSE IS NOT BOUGHT
  } else {
  $html_d .= "<br>"; 
  $html_d .= "<a class='btn btn-primary btn-lg' href='registroalumno.php' role='button'>Compra este curso.</a>";
  }

  //COMMON INFORMATION
  $html_d .= "</p>";
  $html_d .= "</div>";
  }


  //IF THERE IS TWO CLASSES, FIRST CLASS DESCRIPTION
  if($numClases == 2){
  $$html_d .= "<a href='#' class='lead'>Clase 1.- ". $clase_nombre[0] ."</a>";
  $html_d .= "<p>". $clase_descripcion[0] ."</p>";

  //IF THE CLASS IS BOUGHT
  if($rowsHistorial > 0){
  $html_d .= '<video width = "518" height = "384" controls></video>';
  $html_d .= "<source='data:video/mp4;base64,".base64_encode( $clase_video[0] )."' height ='1024px' width='768px'/>";
  $html_d .= '<source src=".'.$clase_video[0].'" type="video/mp4">';
  }

  //SECOND CLASS DESCRIPTION
  $html_d .= "<br>"; 
  $html_d .= "<a href='#' class='lead'>Clase 2.- ". $clase_nombre[1] ."</a>";
  $html_d .= "<p>" . $clase_descripcion[1] ."</p>";

  //IF THE SECOND CLASS IS BOUGHT
  if($rowsHistorial > 0){
  $html_d .= '<video width = "518" height = "384" controls></video>';
  $html_d .= "<source='data:video/mp4;base64,".base64_encode( $clase_video[0] )."' height ='1024px' width='768px'/>";
  $html_d .= '<source src=".'.$clase_video[1].'" type="video/mp4">';
  } else {

  //IF THE COURSE IS NOT BOUGHT
  $html_d .= "<br>";
  $html_d .= "<a class='btn btn-primary btn-lg' href='registroalumno.php' role='button'>Compra este curso.</a>";
  }

  //COMMON INFORMATION
  $html_d .= "</p>";
  $html_d .= "</div>";
  }

  //IF THERE IS THREE CLASSES, FIRST CLASS DESCRRIPTION
  if($numClases == 3){
  $html_d .= "<a href='#' class='lead'>Clase 1.- ". $clase_nombre[0] ."</a>";
  $html_d .= "<p>". $clase_descripcion[0] ."</p>";

  //IF THE CLASS IS BOUGHT
if($rowsHistorial > 0){
  $html_d .= '<video width = "518" height = "384" controls></video>';
  $html_d .= "<source='data:video/mp4;base64,".base64_encode( $clase_video[0] )."' height ='1024px' width='768px'/>";
  $html_d .= '<source src=".'.$clase_video[0].'" type="video/mp4">';
  }

  //SECOND CLASS DESCRIPTION
  $html_d .= "<br>"; 
  $html_d .= "<a href='#' class='lead'>Clase 2.- ". $clase_nombre[1] ."</a>";
  $html_d .= "<p>" . $clase_descripcion[1] ."</p>";

  //IF THE CLASS IS BOUGHT
  if($rowsHistorial > 0){
  $html_d .= '<video width = "518" height = "384" controls></video>';
  $html_d .= "<source='data:video/mp4;base64,".base64_encode( $clase_video[0] )."' height ='1024px' width='768px'/>";
  $html_d .= '<source src=".'.$clase_video[1].'" type="video/mp4">';
  }

  //THIRD CLASS DESCRIPTION
  $html_d .= "<br>";
  $html_d .= "<a href='#' class='lead'>Clase 3.- ". $clase_nombre[2] ."</a>";
  $html_d .= "<p>". $clase_descripcion[2] ."</p>";

  //IF THE CLASS IS BOUGHT
  if($rowsHistorial > 0){
  $html_d .= '<video width = "518" height = "384" controls></video>';
  $html_d .= "<source='data:video/mp4;base64,".base64_encode( $clase_video[0] )."' height ='1024px' width='768px'/>";
  $html_d .= '<source src=".'.$clase_video[2].'" type="video/mp4">';

  //IF THE COURSE IS NOT BOUGHT
  } else {

    $html_d .= "<br>";
    $html_d .= "<a class='btn btn-primary btn-lg' href='registroalumno.php' role='button'>Compra este curso.</a>";
  }

  //COMMON INFORMATION
  $html_d .= "</p>";
  $html_d .= "</div>";
  }



  }
  else {
  $html_d .= "<h1 style='text-align: center;'>Oops!</h1>";
  $html_d .= "<h2 style='text-align: center;'>El curso no existe o la cantidad de clases es igual a cero</h1>";
  }
  echo 'la cantidad de rows de historia es ' . $rowsHistorial;

?>
