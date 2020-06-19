<?php
require("../connection.php");

function verificarIdAtendente($connection, $idAtendente) {
    $statement = "SELECT * FROM atendente WHERE idAtendente = '{$idAtendente}'";
    $dados = $connection->query($statement);
    return $dados->fetch(PDO::FETCH_ASSOC);
}

function listarAtendentes($connection) {
    $statement = 'SELECT * FROM atendente';
    $dados = $connection->query($statement);
    return $dados->fetchAll(PDO::FETCH_OBJ);
}

function cadastrarAtendente($connection, $nome, $dataNascimento, $endereco, $rg, $cpf, $telefone, $email) {
    $statement = "INSERT INTO atendente (nome, dataNascimento, endereco, rg, cpf, telefone, email) VALUES ('{$nome}', '{$dataNascimento}', '{$endereco}', '{$rg}', '{$cpf}', '{$telefone}', '{$email}')";
    return $connection->query($statement);
}

function atualizarAtendente($connection, $idAtendente, $nome, $dataNascimento, $endereco, $rg, $cpf, $telefone, $email) {
    $statement = "UPDATE atendente SET nome = '{$nome}', dataNascimento = '{$dataNascimento}', endereco = '{$endereco}', rg = '{$rg}', cpf = '{$cpf}', telefone = '{$telefone}', email = '{$email}' WHERE idAtendente = '{$idAtendente}'";
    return $connection->query($statement);
}

function deletarAtendente($connection, $idAtendente) {
    $statement = "DELETE FROM atendente WHERE idAtendente = '{$idAtendente}'";
    return $connection->query($statement);
}
?>