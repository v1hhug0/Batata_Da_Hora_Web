<?php
require("../connection.php");
require("./atendente.banco.php");
$idAtendente = $_POST['idAtendente'];

if ($atendente = verificarIdAtendente($connection, $idAtendente)) {
    deletarAtendente($connection, $idAtendente);
    header("Location: listar.php");
} else {
    echo "Atendente não foi deletado";
}