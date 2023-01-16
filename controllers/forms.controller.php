<?php
class ControladorFormularios
{
    /*--------------------------------
    Registro
    ----------------------------------*/
    public static function ctrRegistro()
    {
        if (isset($_POST["registroNombre"])) {

            $tabla = "registros";

            $datos = array(
                "nombre" => $_POST["registroNombre"],
                "email" => $_POST["registroEmail"],
                "password" => $_POST["registroPassword"]
            );

            $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
            return $respuesta;
        }
    }

    /*--------------------------------
    Seleccionar Registros
    ----------------------------------*/
    public static function ctrSeleccionarRegistros($item, $valor)
    {
        $tabla = "registros";
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;
    }

    /*--------------------------------
    Ingreso
    ----------------------------------*/
    public function ctrIngreso()
    {
        if (isset($_POST["ingresoEmail"]) && $_POST["ingresoEmail"] != "") {

            $tabla = "registros";
            $item = "email";
            $valor = $_POST["ingresoEmail"];

            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

            if ($respuesta != [] && $respuesta["password"] == $_POST["ingresoPassword"]) {

                $_SESSION["validarIngreso"] = "ok";

                echo "<script>
                    if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                    }

                    window.location = 'index.php?pagina=inicio';
                </script>";

            } else {
                echo "<div class='alert alert-danger'>Error al ingresar al sistema, usuario y/o contraseña inválidos</div>";

                echo "<script>
                    if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                    }
                </script>";
            }
        }
    }

    /*--------------------------------
    Actualizar Registro
    ----------------------------------*/
    public static function ctrActualizarRegistro()
    {
        if (isset($_POST["actualizarNombre"])) {

            if ($_POST["actualizarNombre"] != "" && $_POST["actualizarEmail"] != "") {

                if ($_POST["actualizarPassword"] != "") {
                    $password = $_POST["actualizarPassword"];
                } else {
                    $password = $_POST["passwordActual"];
                }

                $tabla = "registros";

                $datos = array(
                    "id" => $_POST["idUsuario"],
                    "nombre" => $_POST["actualizarNombre"],
                    "email" => $_POST["actualizarEmail"],
                    "password" => $password
                );

                $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

                return $respuesta;
            } else {
                return "no";
            }

            #Faltaría validar que los datos ingresados en el editar, no sean iguales que los actuales.
            #Entre otras
        } 
    }

    /*--------------------------------
    Eliminar Registro
    ----------------------------------*/
    public function ctrEliminarRegistro(){
        if (isset($_POST["eliminarRegistro"])) {

            $tabla = "registros";
            $valor = $_POST["eliminarRegistro"];

            $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

            if($respuesta == "ok"){
                echo "<script>
                    if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                    }

                    window.location = 'index.php?pagina=inicio';
                </script>";
            }
        }

    }
}
