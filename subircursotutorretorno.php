<?php
   
    // Database connection
    include('database.php');
    
    // Error & success messages
    global $success_msg, $email_exist, $emptyError1, $emptyError2, $emptyError3, $emptyError4, $emptyError5, $emptyError6, $unmatchedPassword;
    session_start();
    $idtutor = $_SESSION['id'];

    if(isset($_POST["submit"])) {
        $name          = $_POST["name"];
        $descripcion   = $_POST["descripcion"];
        $thumbnail     = $_POST["thumbnail"];
        $precio        = $_POST["seleccionPrecio"];
        $clasesporcurso= $_POST["clasesporcurso"];
        $clase_titulo[]  = $_POST["title[]"];
        $clase_descripcion[]  = $_POST["description[]"];
        $clase_archivo[] = $_POST["file[]"];

        // verify if email elsexists
        $nameCheck = $connection->query( "SELECT * FROM CURSO WHERE curso_nombre = '{$name}' ");
        $rowCount = $nameCheck->fetchColumn();

        // PHP validation
        if(!empty($name) && !empty($descripcion) && !empty($thumbnail) && !empty($precio) && clasesporcurso != "contador" ){
            
            // check if user email already exist
            if($rowCount > 0) {
                $name_exist = '
                    <div class="alert alert-danger" role="alert">
                        El nombre ya está en uso!
                    </div>
                ';
            } else {

                $_name = mysqli_real_escape_string($connection2, $name);
                $_descripcion = mysqli_real_escape_string($connection2, $email);
                $_thumbnail = mysqli_real_escape_string($connection2, $password);
                $_precio = mysqli_real_escape_string($connection2, $password2);
                
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

            $sql = $connection->query("INSERT INTO curso (curso_nombre, curso_descripcion, curso_thumb, curso_precio, curso_es_aprobado, curso_id_tutor) 
            VALUES ('{$name}', '{$descripcion}', '{$thumbnail}', '{$precio}', 0, '{$idtutor}')");

            //$sql2 = $connection->query("INSERT INTO clase (clase_id, clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$name}', '{$descripcion}', '{$thumbnail}', '{$precio}', 0, '{$idtutor}')");
            
                if(!$sql){
                    die("Falló la consulta MySQL!" . mysqli_error($connection));
                } else {
                    $success_msg = '<div class="alert alert-success">
                        ¡Tu curso ha sido enviado a un Administrador para su revisión, pronto tendrás noticias de él!
                </div>';
                }
            }
        }
        } else {
            if(empty($name)){
                $emptyError1 = '<div class="alert alert-danger">
                    Es necesario que ingreses tu nombre.
                </div>';
            }
            if(empty($descripcion)){
                $emptyError2 = '<div class="alert alert-danger">
                    Es necesario que ingreses una descripcion.
                </div>';
            }
            if(empty($thumbnail)){
                $emptyError3 = '<div class="alert alert-danger">
                    Es necesario que ingreses una imágen.
                </div>';
            }
            if(empty($precio)){
                $emptyError4 = '<div class="alert alert-danger">
                    Es necesario que ingreses un precio.
                </div>';
            }
            if($clasesporcurso == "contador"){
                $emptyError5 = '<div class="alert alert-danger">
                    Debes agregar almenos una clase.
                </div>';
            }
        }
    }

    echo $clasesporcurso; 

?>