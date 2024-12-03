<?php

interface modeloInterfaces
{
    public function obtenerUsuarios();
    public function obtenerUsuarioPorNombre($username);
    public function agregarUsuario($username, $password, $perfil);
    public function eliminarUsuario($username);
    public function actualizarUsuario($id, $username, $password, $perfil);
}
