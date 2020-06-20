<?php
require("../connection.php");

function verificarIdPedido($connection, $idPedido) {
    $statement = "SELECT * FROM pedido WHERE idPedido = '{$idPedido}'";
    $dados = $connection->query($statement);
    return $dados->fetch(PDO::FETCH_ASSOC);
}

function listarPedidos($connection) {
    $statement = 'SELECT idPedido, DATE_FORMAT(dataPedido, "%d/%m/%Y") AS dataPedido, enderecoEntrega, CONCAT("R$", FORMAT(total, 2)) AS total, IF(status = "E", "Entregue", "Pendente") AS status, DATE_FORMAT(dataEntrega, "%d/%m/%Y") AS dataEntrega, cliente.nome AS fkCliente, atendente.nome AS fkAtendente FROM pedido INNER JOIN cliente ON pedido.fkCliente = cliente.idCliente INNER JOIN atendente ON pedido.fkAtendente = atendente.idAtendente ORDER BY pedido.idPedido ASC';
    $dados = $connection->query($statement);
    return $dados->fetchAll(PDO::FETCH_OBJ);
}

 function cadastrarPedido($connection, $dataPedido, $enderecoEntrega, $total, $status, $fkCliente, $fkAtendente) {
    $statement = "INSERT INTO pedido (dataPedido, enderecoEntrega, total, status, fkCliente, fkAtendente) VALUES ('{$dataPedido}', '{$enderecoEntrega}', '{$total}', '{$status}', '{$fkCliente}', '{$fkAtendente}')";
    return $connection->query($statement);
}

function buscarPedido($connection, $dataPedido, $total, $fkCliente ) {
    $statement = "SELECT idPedido FROM pedido WHERE dataPedido = '{$dataPedido}' AND total = '{$total}' AND fkcliente = '{$fkCliente}'";
    $dados = $connection->query($statement);
    return $dados->fetch(PDO::FETCH_ASSOC);
}

function atualizarPedido($connection, $idPedido, $dataPedido, $enderecoEntrega, $total, $status, $dataEntrega, $fkCliente, $fkAtendente) {
    $statement = "UPDATE pedido SET dataPedido = '{$dataPedido}', enderecoEntrega = '{$enderecoEntrega}', total = '{$total}', status = '{$status}', dataEntrega = '{$dataEntrega}', fkCliente = '{$fkCliente}', fkAtendente = '{$fkAtendente}' WHERE idPedido = '{$idPedido}'";
    return $connection->query($statement);
}


?>