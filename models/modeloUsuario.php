<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';


class modeloUsuario
{
    private $conexion = null;
    public function __construct()
    {
        $this->conexion = Conexion::connection();
    }
    public  function obtenerUsuarios()
    {
        $query = $this->conexion->query("SELECT * FROM usuarios");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public  function agregarUsuario($username, $password, $perfil)
    {
        $query = $this->conexion->prepare("INSERT INTO usuarios (username, password, perfil) VALUES (?, ?, ?)");
        $query->execute([$username, $password, $perfil]);
    }

    public  function  eliminarUsuario($id)
    {
        $query = $this->conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $query->execute([$id]);
    }

    public  function actualizarUsuario($id, $username, $password, $perfil)
    {
        $query = $this->conexion->prepare("UPDATE usuarios SET username = ?, password = ?, perfil = ? WHERE id = ?");
        $query->execute([$username, $password, $perfil, $id]);
    }
}


// echo '<pre>';
// $modelo = new modeloUsuario();

// // print_r($modelo->getUsers());
// // $estepene = $modelo->eliminarUsuario(37);
// // if ($estepene) {
// // echo 'ELIMINADO';
// // } else {
// // echo 'NO ELIMINADO';
// // }
// echo '</pre>';
// $modelo = new modeloUsuario();
// echo '<pre>';
// print_r($modelo);