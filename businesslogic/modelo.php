<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/interfaces/modeloInterfaces.php';

class Modelo
{

    private modeloUsuario $modeloInterfaces;

    public function __construct(modeloInterfaces $modeloInterfaces)
    {
        $this->modeloInterfaces = $modeloInterfaces;
    }

    public function obtenerUsuarios()
    {
        return $this->modeloInterfaces->obtenerUsuarios();
    }

    public function obtenerUsuarioPorNombre($username)
    {
        return $this->modeloInterfaces->obtenerUsuarioPorNombre($username);
    }
}
