<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>Prueba trabajo</title>
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

    <div class="col-md-12">
            <fieldset>
                <legend>Listado de Clientes</legend>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>titulo</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th class="text-center">Foto</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../vendor/autoload.php';
                        $producto = new Prueba\Clientes;
                        $info_producto = $producto->mostar();
                        $cantidad = count($info_producto);
                        if ($cantidad > 0) {
                            $c = 0;
                            for ($x = 0; $x < $cantidad; $x++) {
                                $c++;
                                $item = $info_producto[$x];

                        ?>

                                <tr>
                                    <td><?php print $c ?></td>
                                    <td><?php print $item["nombre"] ?></td>
                                    <td><?php print $item["categoria"] ?></td>
                                    <td><?php print $item["telefono"] ?></td>
                                    <td class="text-center">
                                        <?php
                                        $foto = "../upload/" . $item["imagen"];
                                        if (file_exists($foto)) {
                                        ?>
                                            <img src="<?php print $foto; ?>" width="50">
                                        <?php } else { ?>
                                            SIN FOTO
                                        <?php
                                        }
                                        ?>

                                    </td>
                                    <td class="text-center">
                                        <a href="../acciones.php?id=<?php print $item["id"] ?>" class="btn btn-danger btn-sm"><span class="glyphicon "></span>Borrar</a>
                                        <a href="form_actualizar.php?id= <?php print $item["id"] ?>" class="btn btn-success btn-sm"><span class="glyphicon"></span>Actualizar</a>
                                    </td>
                                </tr>

                            <?php
                            }
                        } else {
                            ?>

                            <tr>
                                <td colspan="6">NO HAY REGISTRO </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </fieldset>
        </div>


</body>
</html>