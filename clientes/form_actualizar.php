<?php
require "../vendor/autoload.php";
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];
    $empleado = new Prueba\Clientes;
    $resultado = $empleado->mostrarPorId($id);

    if (!$resultado) {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>form_actualizar</title>
</head>

<body>

    <div class="col-md-12">
        <legend>Datos del Empleado</legend>
        <form method="POST" action="acciones.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php print $resultado["id"] ?>">
            <div class="form-group">
                <label>Nombre</label>
                <input value="<?php print $resultado["nombre"] ?>" type="text" class="form-control" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea type="text" class="form-control" name="descripcion" placeholder="Descripción" cols="3" required><?php print $resultado["descripcion"] ?></textarea>
            </div>
            <div class="form-group">
                <label>Categorias</label>
                <select class="form-control" name="categoria_id" required>
                    <option value="">--SELECCIONE--</option>
                    <?php
                    require "../vendor/autoload.php";
                    $categoria = new Prueba\Categoria;
                    $info_categoria = $categoria->mostar();
                    $cantidad = count($info_categoria);
                    for ($x = 0; $x < $cantidad; $x++) {
                        $item = $info_categoria[$x];
                    ?>
                        <option value="<?php print $item['id'] ?>" <?php print $resultado['categoria_id'] == $item['id'] ? 'selected' : '' ?>> <?php print $item['categoria'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input type="tel" class="form-control" name="telefono" value="<?php print $resultado["telefono"] ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Imagen</label>
                <input type="file" class="form-control" name="imagen">
                <input type="hidden" name="foto_temp" value="<?php print $resultado["imagen"] ?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Actualizar" name="accion">
            <a href="index.php" class="btn btn-default">Cancelar</a>
        </form>
    </div>


</body>

</html>