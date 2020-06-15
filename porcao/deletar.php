<?php
require("../connection.php");
require("./porcao.banco.php");
$idPorcao = $_POST['idPorcao'];

if ($porcao = verificarId($connection, $idPorcao)) {
    deletarPorcao($connection, $idPorcao);
    header("Location: listar.php");
} else {
    echo "Porção não foi deletada";
}