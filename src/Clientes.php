<?php

namespace Prueba;


class Clientes
{

    private $config;
    private $cn = null;

    public function __construct()
    {
        $this->config = parse_ini_file(__DIR__ . '/../config.ini');

        $this->cn = new \PDO($this->config["dns"], $this->config["usuario"], $this->config["clave"], array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
    }

    public function registrar($_params)
    {

        $sql =  'INSERT INTO `empresa`( `nombre`, `descripcion`, `imagen`, `categoria_id`, `telefono`) VALUES (:nombre,:descripcion,:imagen,:categoria_id,:telefono)';

        $resultado = $this->cn->prepare($sql);


        $_array = array(
            ':nombre' => $_params['nombre'],
            ':descripcion' => $_params['descripcion'],
            ':imagen' => $_params['imagen'],
            ':categoria_id' =>  $_params['categoria_id'],
            ':telefono' => $_params['telefono'],

        );

        if ($resultado->execute($_array))
            return (true);

        return (false);
    }

    public function actualizar($_params)
    {


        $sql = "UPDATE `empresa` SET `nombre`=:nombre,`descripcion`=:descripcion,`imagen`=:imagen,`categoria_id`=:categoria_id,`telefono`=:telefono WHERE `id`= :id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" =>$_params["nombre"],
            ":descripcion" =>$_params["descripcion"],
            ":imagen" =>$_params["imagen"],
            ":categoria_id" =>$_params["categoria_id"],
            ":telefono" =>$_params["telefono"],
            ":id" =>$_params["id"]
        );

        


        if ($resultado->execute($_array))
            return true;

        return false;
    }

    public function eliminar($id)
    {
        $sql = 'DELETE FROM `empresa` WHERE `id`=:id';

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            'id' => $id
        );

        if ($resultado->execute($_array))
            return true;

        return false;
    }

    public function mostar()
    {
        $sql = "SELECT empresa.id, nombre, descripcion, imagen ,categoria, telefono  FROM `empresa`
        
        INNER JOIN categorias
        ON empresa.categoria_id = categorias.id ORDER BY empresa.id DESC
        ";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id)
    {

        $sql = "SELECT * FROM `empresa` WHERE `id`=:id ";

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" =>  $id
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }
}
