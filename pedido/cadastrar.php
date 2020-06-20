<?php
require("../cabecalho.php");
require("../connection.php");
require("./pedido.banco.php");
require("../cliente/cliente.banco.php");
require("../atendente/atendente.banco.php");
require("../porcao/porcao.banco.php");
require("../itenspedido/itensPedido.banco.php");
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
$porcoes = listarPorcoes($connection);

?>

<div class="container mt-3">
    <h3>Cadastrar Pedido</h3>
    <form action="/Batata_Da_Hora_Web/pedido/cadastrar.php" method="POST">
        <?php require("./form.php"); ?> <div class="mt-3"><input type="submit" value="Cadastrar" class="btn btn-success px-5 mt-3">
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
    $dataEntrega = "";
    $fkCliente = $_POST['fkCliente'];
    $fkAtendente = $_POST['fkAtendente'];


    if (cadastrarPedido($connection, $dataPedido, $enderecoEntrega, $total, $status, $fkCliente, $fkAtendente)) {

        $id = buscarPedido($connection, $dataPedido, $total, $fkCliente);
        $quantidade1 = $_POST['quantidade1'];
        $fkPedido1 = $id['idPedido'];
        $fkPorcao1 = 1;

        $quantidade2 = $_POST['quantidade2'];
        $fkPedido2 = $id['idPedido'];
        $fkPorcao2 = 2;

        $quantidade3 = $_POST['quantidade3'];
        $fkPedido3 = $id['idPedido'];
        $fkPorcao3 = 3;

        if ($quantidade1 != 0) {
            cadastrarItens($connection, $quantidade1, $fkPedido1, $fkPorcao1);
        }
        if ($quantidade2 != 0) {
            cadastrarItens($connection, $quantidade2, $fkPedido2, $fkPorcao2);
        }
        if ($quantidade3 != 0) {
            cadastrarItens($connection, $quantidade3, $fkPedido3, $fkPorcao3);
        }

        header("Location: listar.php");
    } else {
        echo ("Pedido não Cadastrado");
    }
}
require("../rodape.php");
?>