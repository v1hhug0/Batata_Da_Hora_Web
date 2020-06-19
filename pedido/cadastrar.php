<?php
require("../cabecalho.php");
require("../connection.php");
require("./pedido.banco.php");
require("../cliente/cliente.banco.php");
require("../atendente/atendente.banco.php");
$dados = [];
$dados['idPedido'] = "";
$dados['dataPedido'] = "";
$dados['enderecoEntrega'] = "";
$dados['total'] = "";
$dados['status'] = "";
$dados['dataEntrega'] = "";
$dados['fkCliente'] = "";
$dados['fkAtendente'] = "";
$clientes = listarClientes($connection);
$atendentes = listarAtendentes($connection);
?>

<div class="container mt-3">
    <h3>Cadastrar Pedido</h3>
    <form action="/Batata_Da_Hora_Web/pedido/cadastrar.php" method="POST">
    <?php require("./form.php"); ?>

    
        <div class="mt-3">
            <input type="submit" value="Cadastrar" class="btn btn-success px-5 mt-3">
        </div>
    </form>
</div>

<?php
function hasPost()
{
    return $_SERVER['REQUEST_METHOD'] == "POST";
}

if (hasPost()) {
    $dataPedido = $_POST['dataPedido'];
    $enderecoEntrega = $_POST['enderecoEntrega'];
    $total = $_POST['total'];
    $status = $_POST['status'];
    $dataEntrega = $_POST['dataEntrega'];
    $fkCliente = $_POST['fkCliente'];
    $fkAtendente = $_POST['fkAtendente'];

    if (cadastrarPedido($connection, $dataPedido, $enderecoEntrega, $total, $status, $dataEntrega, $fkCliente, $fkAtendente)) {
        header("Location: listar.php");
    } else {
        echo ("Pedido não Cadastrado");
    }
}
require("../rodape.php");
?>