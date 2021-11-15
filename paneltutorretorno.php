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

if($rowCount > 0){

	foreach ($result as $fila) {
		echo $fila['curso_id'];
	}	

} else {
	echo "No hay ninguna row";
}
?>