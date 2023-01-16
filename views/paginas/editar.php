<?php
if (isset($_GET["id"])) {
    $item = "id";
    $valor = $_GET["id"];

    $usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
}
?>

<form method="post">
    <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $usuario["nombre"] ?>" placeholder="Escriba su nombre" id="nombre" name="actualizarNombre">
    </div>

    <div class="form-group">
        <input type="email" class="form-control" value="<?php echo $usuario["email"] ?>" placeholder="Escriba su email" id="email" name="actualizarEmail">
    </div>

    <div class="form-group">
        <input type="password" class="form-control" placeholder="Escriba su contraseña" id="pwd" name="actualizarPassword">

        <input type="hidden" name="passwordActual" value="<?php echo $usuario["password"] ?>">

        <input type="hidden" name="idUsuario" value="<?php echo $usuario["id"] ?>">
    </div>

    <?php
    #(mét estático)
    $actualizar = ControladorFormularios::ctrActualizarRegistro();

    if ($actualizar == "ok") {
        echo "<script>
        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
        </script>";

        echo "<div class='alert alert-success'>El usuario ha sido actualizado</div>";

        echo "<script>
            setTimeout(function(){
                window.location = 'index.php?pagina=inicio';
            }, 3000);
        </script>";
        #Vuelve a la página de inicio luego de 3 segundos
    } 
    
    if($actualizar == "no"){
        echo "<script>
        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
        </script>";

        echo "<div class='alert alert-danger'>Usuario no actualizado</div>";
    }
    ?>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>