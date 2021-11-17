<?php
include('paneltutorretorno.php');
    //error_reporting(!E_WARNING | !E_NOTICE);
    // Database connection
    include('database.php');
    
    // Error & success messages
    if(isset($_POST["submit"])) {
        $clase_titulo  = $_POST["title"];
        $clase_descripcion  = $_POST["description"];
        $clase_video = $_POST["file"];
        $id_boton = $_POST['selected'];
        $cantidad_clases = $POST['clasesporcurso'];
    }

        // PHP validation
        if(!empty($clase_titulo[0]) && !empty($clase_descripcion[0]) && !empty($clase_video[0]) &&  !empty($clase_titulo[1]) && !empty($clase_descripcion[1]) && !empty($clase_video[1]) && !empty($clase_titulo[2]) && !empty($clase_descripcion[2]) && !empty($clase_video[2])){
            
                $_name = mysqli_real_escape_string($connection2, $clase_titulo[0]);
                $_descripcion = mysqli_real_escape_string($connection2, $clase_descripcion[0]);
                $_thumbnail = mysqli_real_escape_string($connection2, $clase_video[0]);
                $_name = mysqli_real_escape_string($connection2, $clase_titulo[1]);
                $_descripcion = mysqli_real_escape_string($connection2, $clase_descripcion[1]);
                $_thumbnail = mysqli_real_escape_string($connection2, $clase_video[1]);
                $_name = mysqli_real_escape_string($connection2, $clase_titulo[2]);
                $_descripcion = mysqli_real_escape_string($connection2, $clase_descripcion[2]);
                $_thumbnail = mysqli_real_escape_string($connection2, $clase_video[2]);

                }
                
             if(!preg_match("/^[a-zA-Z ]*$/", $_name)) {
                    $_NameErr = '<div class="alert alert-danger">
                            Sólo se permiten letras y espacios.
                        </div>';
                }

             if(!preg_match("/^[a-zA-Z ]*$/", $_descripcion)) {
                    $_DescriptionErr = '<div class="alert alert-danger">
                            Sólo se permiten letras y espacios.
                        </div>';
                }

            else {

            if($cantidad_clases == 0){
            $emptyError3 = "Es necesario que agregues una clase";
            } else if($cantidad_clases == 1){
                    $sql = $connection->query("INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[0]}', '{$clase_descripcion[0]}', '{$clase_video[0]}', '{$id_boton[0]}')");
                    if(!$sql){
                        die("Falló la consulta MySQL!" . mysqli_error($connection));
                    }           
                            else {
                            $success_msg = '<div class="alert alert-success">
                            ¡Tu curso ha sido enviado a un Administrador para su revisión, pronto tendrás noticias de él!
                            </div>';
                            }
                }

                else if($cantidad_clases == 2){
                    $sql = $connection->query("INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[0]}', '{$clase_descripcion[0]}', '{$clase_video[0]}', '{$id_boton[0]}')");
                    $sql2 = $connection->query("INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[1]}', '{$clase_descripcion[1]}', '{$clase_video[1]}', '{$id_boton[1]}')");
                    if(!$sql || !$sql2){
                        die("Falló la consulta MySQL!" . mysqli_error($connection));
                    }           
                            else {
                            $success_msg = '<div class="alert alert-success">
                            ¡Tu curso ha sido enviado a un Administrador para su revisión, pronto tendrás noticias de él!
                            </div>';
                            }
                }

                else if($cantidad_clases == 3){
                     $sql = $connection->query("INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[0]}', '{$clase_descripcion[0]}', '{$clase_video[0]}', '{$id_boton[0]}')");
                    $sql2 = $connection->query("INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[1]}', '{$clase_descripcion[1]}', '{$clase_video[1]}', '{$id_boton[1]}')");
                    $sql3 = $connection->query("INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[2]}', '{$clase_descripcion[2]}', '{$clase_video[2]}', '{$id_boton[2]}')");
                    if(!$sql || !$sql2 || !$sql3){
                        die("Falló la consulta MySQL!" . mysqli_error($connection));
                    }           
                            else {
                            $success_msg = '<div class="alert alert-success">
                            ¡Tu curso ha sido enviado a un Administrador para su revisión, pronto tendrás noticias de él!
                            </div>';
                            }
                }
        } else {

            
                
            if(empty($clase_titulo[0]) || ($clase_titulo[1]) || $clase_titulo[2]){
                $emptyError1 = '<div class="alert alert-danger">
                    Es necesario que ingreses un título.
                </div>';
            } 
            if(empty($clase_descripcion[0]) || ($clase_descripcion[1]) || ($clase_descripcion[2])){
                $emptyError2 = '<div class="alert alert-danger">
                    Es necesario que ingreses una descripción.
                </div>';
            }
            if(empty($clase_video[0]) || ($clase_video[1]) || ($clase_video[2])){
                $emptyError4 = '<div class="alert alert-danger">
                    Es necesario que ingreses un video.
                </div>';
            }
        }

?>