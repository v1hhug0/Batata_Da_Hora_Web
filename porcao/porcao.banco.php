<?php
require("../connection.php");

function verificarId($connection, $idPorcao) {
    $statement = "SELECT * FROM porcao WHERE idPorcao = '{$idPorcao}'";
    $dados = $connection->query($statement);
    return $dados->fetch(PDO::FETCH_ASSOC);
}

function listarPorcoes($connection) {
    $statement = 'SELECT idPorcao, tamanho, CONCAT("R$", FORMAT(preco, 2)) AS preco FROM porcao'; 
    $dados = $connection->query($statement);
    return $dados->fetchAll(PDO::FETCH_OBJ);
}

function cadastrarPorcao($connection, $tamanho, $preco) {
    $statement = "INSERT INTO porcao (tamanho, preco) VALUES ('{$tamanho}', '{$preco}')";
    return $connection->query($statement);
}

function atualizarPorcao($connection, $idPorcao, $tamanho, $preco) {
    $statement = "UPDATE porcao SET tamanho = '{$tamanho}', preco = '{$preco}' WHERE idPorcao = '{$idPorcao}'";
    return $connection->query($statement);
}

function deletarPorcao($connection, $idPorcao) {
    $statement = "DELETE FROM porcao WHERE idPorcao = '{$idPorcao}'";
    return $connection->query($statement);
}