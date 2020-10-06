<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>form_registrar</title>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../dashboard.php">Clientes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="../pedidos/index.php" class="btn">Nuevo</a>
            </li> 
            <li class="">
              <a href="index.php" class="btn">Peliculas</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

<br><br><br>
<div class="col-md-12">
                <legend>Datos del Empleado</legend>
                <form method="POST" action="acciones.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label>Descripciòn</label>
                        <textarea type="text" class="form-control" name="descripcion" placeholder="Descripciòn" cols="3" required></textarea>
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
                                <option value="<?php print $item['id'] ?>"> <?php print $item['categoria'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="tel    " class="form-control" name="telefono" placeholder="5512354678" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Imagen</label>
                        <input type="file" class="form-control" name="imagen" required>
                    </div>
                    <input type="submit" name="accion" class="btn btn-primary" value="Registrar">
                    <a href="index.php" class="btn btn-defaut">Cancelar</a>
                </form>
            </div>


</body>
</html>