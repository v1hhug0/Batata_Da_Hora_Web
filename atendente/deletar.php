<?php
require("../connection.php");
require("./atendente.banco.php");
$idAtendente = $_POST['idAtendente'];

if ($atendente = verificarId($connection, $idAtendente)) {
    deletarAtendente($connection, $idAtendente);
    header("Location: listar.php");
} else {
    echo "Atendente não foi deletado";
}