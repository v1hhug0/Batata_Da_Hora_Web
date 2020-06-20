<?php
require("../connection.php");

/* function verificarId($connection, $idCliente) {
    $statement = "SELECT * FROM cliente WHERE idCliente = '{$idCliente}'";
    $dados = $connection->query($statement);
    return $dados->fetch(PDO::FETCH_ASSOC);
} */

function listarItensPedido($connection, $fkPedido) {
    $statement = "SELECT fkPedido, quantidade, CASE WHEN fkPorcao = 1 THEN 'Pequena' WHEN fkPorcao = 2 THEN 'Média' WHEN fkPorcao = 3 THEN 'Grande' END AS fkPorcao FROM itenspedido WHERE fkPedido = '{$fkPedido}' ORDER BY itenspedido.fkPorcao ASC";
    $dados = $connection->query($statement);
    return $dados->fetchAll(PDO::FETCH_OBJ);
}

 function cadastrarItens($connection, $quantidade, $fkPedido, $fkPorcao) {
    $statement = "INSERT INTO itenspedido (quantidade, fkPedido, fkPorcao) 
    VALUES ('{$quantidade}',
     '{$fkPedido}', 
     '{$fkPorcao}')";
    return $connection->query($statement);
}

function atualizarItens($connection, $quantidade, $fkPedido, $fkPorcao, $quantidadeAntiga) {
    $statement = "UPDATE itenspedido SET quantidade = '{$quantidade}', fkPedido = '{$fkPedido}', fkPorcao = '{$fkPorcao}' WHERE fkPedido = '{$fkPedido}' AND quantidade = '{$quantidadeAntiga}'";
    return $connection->query($statement);
}

/* function deletarCliente($connection, $idCliente) {
    $statement = "DELETE FROM cliente WHERE idCliente = '{$idCliente}'";
    return $connection->query($statement);
}  */