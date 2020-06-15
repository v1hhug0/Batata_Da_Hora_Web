<?php
require("../connection.php");
require("./cliente.banco.php");
$idCliente = $_POST['idCliente'];

if ($cliente = verificarId($connection, $idCliente)) {
    deletarCliente($connection, $idCliente);
    header("Location: listar.php");
} else {
    echo "Cliente não foi deletado";
}