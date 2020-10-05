<?php
require "../vendor/autoload.php";

$cliente = new Prueba\Clientes;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["accion"] === "Registrar") {
        if (empty($_POST["nombre"]))
            exit("completar Nombre");

        if (empty($_POST["descripcion"]))
            exit("completar descripcion");

        if (empty($_POST["categoria_id"]))
            exit("completar Categoria");

        if (!is_numeric($_POST["categoria_id"]))
            exit("Seleccionar una Categoria valida");

        if (empty($_POST["telefono"]))
            exit("completar Telefono");


        $_params = array(
            "nombre" => $_POST["nombre"],
            "descripcion" => $_POST["descripcion"],
            "imagen" => subirFoto(),
            "categoria_id" => $_POST["categoria_id"],
            "telefono" => $_POST["telefono"],
        );

        $rpt = $cliente->registrar($_params);
        var_dump($rpt);

        if ($rpt)
            header("Location: index.php");
        else
            print "Error al registrar el cliente";
    }

    if ($_POST["accion"] === "Actualizar") {


        if (empty($_POST["nombre"]))
            exit("completar Nombre");

        if (empty($_POST["descripcion"]))
            exit("completar descripcion");

        if (empty($_POST["categoria_id"]))
            exit("completar Categoria");

        if (!is_numeric($_POST["categoria_id"]))
            exit("Seleccionar una Categoria valida");

        if (empty($_POST["telefono"]))
            exit("completar Telefono");


        $_params = array(
            "nombre" => $_POST["nombre"],
            "descripcion" => $_POST["descripcion"],
            "categoria_id" => $_POST["categoria_id"],
            "telefono" => $_POST["telefono"],
            "id" => $_POST["id"]
        );

        

        if (!empty($_POST["foto_temp"]))
            $_params["imagen"] = $_POST["foto_temp"];

        if (!empty($_FILES["imagen"]["name"]))
            $_params["imagen"] = subirFoto();


        $rpt = $cliente->actualizar($_params);



        if ($rpt)
            header("Location:index.php");
        else
            print "Error al actualizar el cliente";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $id = $_GET["id"];

    $rpt = $cliente->eliminar($id);
    var_dump($rpt);

    if ($rpt)
        header("Location:index.php");
    else
        print "Error al eliminar el cliente";
}



function subirFoto()
{
    $carpeta = __DIR__ . "/../upload/";
    $archivo = $carpeta . $_FILES["imagen"]["name"];
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo);
    return $_FILES["imagen"]["name"];
}
