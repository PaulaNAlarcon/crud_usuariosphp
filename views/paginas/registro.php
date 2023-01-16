<h1>REGISTRO</h1>

<form method="post">
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="registroNombre">
    </div>

    <div class="form-group">
        <label for="email">Dirección email:</label>
        <input type="email" class="form-control" id="email" name="registroEmail">
    </div>

    <div class="form-group">
        <label for="pwd">Contraseña:</label>
        <input type="password" class="form-control" id="pwd" name="registroPassword">
    </div>

    <?php
    $registro = ControladorFormularios::ctrRegistro();
    if ($registro == "ok") {
        echo "<script>
            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
        </script>";
        // script para el correcto funcionamiento del cartel de registro exitoso

        echo "<div class='alert alert-success'>El usuario ha sido registrado</div>";
    }
    ?>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>