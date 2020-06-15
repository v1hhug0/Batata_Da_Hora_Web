<?php
require("../connection.php");

/* function verificarId($connection, $idCliente) {
    $statement = "SELECT * FROM cliente WHERE idCliente = '{$idCliente}'";
    $dados = $connection->query($statement);
    return $dados->fetch(PDO::FETCH_ASSOC);
} */

function listarPedidos($connection) {
    $statement = 'SELECT idPedido, DATE_FORMAT(dataPedido, "%d/%m/%Y") AS dataPedido, enderecoEntrega, CONCAT("R$", FORMAT(total, 2)) AS total, IF(status = "E", "Entregue", "Pendente") AS status, DATE_FORMAT(dataEntrega, "%d/%m/%Y") AS dataEntrega, cliente.nome AS fkCliente, atendente.nome AS fkAtendente FROM pedido INNER JOIN cliente ON pedido.fkCliente = cliente.idCliente INNER JOIN atendente ON pedido.fkAtendente = atendente.idAtendente ORDER BY pedido.idPedido ASC';
    $dados = $connection->query($statement);
    return $dados->fetchAll(PDO::FETCH_OBJ);
}

/* function cadastrarCliente($connection, $nome, $dataNascimento, $endereco, $rg, $cpf, $telefone, $email) {
    $statement = "INSERT INTO cliente (nome, dataNascimento, endereco, rg, cpf, telefone, email) VALUES ('{$nome}', '{$dataNascimento}', '{$endereco}', '{$rg}', '{$cpf}', '{$telefone}', '{$email}')";
    return $connection->query($statement);
}

function atualizarCliente($connection, $idCliente, $nome, $dataNascimento, $endereco, $rg, $cpf, $telefone, $email) {
    $statement = "UPDATE cliente SET nome = '{$nome}', dataNascimento = '{$dataNascimento}', endereco = '{$endereco}', rg = '{$rg}', cpf = '{$cpf}', telefone = '{$telefone}', email = '{$email}' WHERE idCliente = '{$idCliente}'";
    return $connection->query($statement);
}

function deletarCliente($connection, $idCliente) {
    $statement = "DELETE FROM cliente WHERE idCliente = '{$idCliente}'";
    return $connection->query($statement);
} */