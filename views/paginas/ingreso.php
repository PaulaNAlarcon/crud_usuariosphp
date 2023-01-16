<h1>INGRESO</h1>
<form method="post">

    <div class="form-group">
        <label for="email">Dirección email:</label>
        <input type="email" class="form-control" id="email" name="ingresoEmail">
    </div>

    <div class="form-group">
        <label for="pwd">Contraseña:</label>
        <input type="password" class="form-control" id="pwd" name="ingresoPassword">
    </div>

    <?php
    $ingreso = new ControladorFormularios;
    $ingreso->ctrIngreso();
    ?>

    <button type="submit" class="btn btn-primary">Ingresar</button>
</form>