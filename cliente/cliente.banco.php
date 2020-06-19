<?php
require("../connection.php");

function verificarIdCliente($connection, $idCliente) {
    $statement = "SELECT * FROM cliente WHERE idCliente = '{$idCliente}'";
    $dados = $connection->query($statement);
    return $dados->fetch(PDO::FETCH_ASSOC);
}

function listarClientes($connection) {
    $statement = 'SELECT * FROM cliente';
    $dados = $connection->query($statement);
    return $dados->fetchAll(PDO::FETCH_OBJ);
}

function cadastrarCliente($connection, $nome, $dataNascimento, $endereco, $rg, $cpf, $telefone, $email) {
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
}