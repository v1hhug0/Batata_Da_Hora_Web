<?php
require("../cabecalho.php");
require("../connection.php");
require("./pedido.banco.php");
require("../cliente/cliente.banco.php");
require("../atendente/atendente.banco.php");
require("../porcao/porcao.banco.php");
require("../itenspedido/itensPedido.banco.php");
$clientes = listarClientes($connection);
$atendentes = listarAtendentes($connection);


if (isset($_GET['idPedido'])) {
    $idPedido = $_GET['idPedido'];
    $dados = verificarIdPedido($connection, $idPedido);
} else {
    echo ("Pedido não encontrado");
}

function pedidoBool($connection, $idPedido) {
    return verificarIdPedido($connection, $idPedido);
}



?>

<div class="container">
    <h3>Atualizar Pedido Nº <?= $idPedido ?></h3>

    <form action="/Batata_Da_Hora_Web/pedido/atualizar.php?idPedido=<?= $idPedido ?>" method="POST">
        <?php
        require("./form.php");
        ?>

        <div>
            <input type="submit" value="Atualizar" class="btn btn-info px-5 mt-3">
        </div>

    </form>

</div>

<?php
if (isset($_POST['idPedido']) && pedidoBool($connection, $_POST['idPedido'])) {
    $idPedido = $_POST['idPedido'];
    $dataPedido = $_POST['dataPedido'];
    $enderecoEntrega = $_POST['enderecoEntrega'];
    $total = $_POST['total'];
    $status = $_POST['status'];
        if ($_POST['dataEntrega'] != "") {
            $status = "E";
        }
    $dataEntrega = $_POST['dataEntrega'];
    $fkCliente = $_POST['fkCliente'];
    $fkAtendente = $_POST['fkAtendente'];

    if (atualizarPedido($connection, $idPedido, $dataPedido, $enderecoEntrega, $total, $status, $dataEntrega, $fkCliente, $fkAtendente)) {

        $quantidade1 = $_POST['quantidade1'];
        $fkPedido1 = $idPedido;
        $fkPorcao1 = 1;
        

        $quantidade2 = $_POST['quantidade2'];
        $fkPedido2 = $idPedido;
        $fkPorcao2 = 2;

        $quantidade3 = $_POST['quantidade3'];
        $fkPedido3 = $idPedido;
        $fkPorcao3 = 3;

        if ($p1 != "") {
            atualizarItens($connection, $quantidade1, $fkPedido1, $fkPorcao1, $quantidadeAntiga1);
        } elseif ($quantidade1 > 0) {
            cadastrarItens($connection, $quantidade1, $fkPedido1, $fkPorcao1);
        }

        if ($p2 != "") {
            atualizarItens($connection, $quantidade2, $fkPedido2, $fkPorcao2, $quantidadeAntiga2);
        } elseif ($quantidade2 > 0) {
            cadastrarItens($connection, $quantidade2, $fkPedido2, $fkPorcao2);
        }

        if ($p3 != "") {
            atualizarItens($connection, $quantidade3, $fkPedido3, $fkPorcao3, $quantidadeAntiga3);
        } elseif ($quantidade3 > 0) {
            cadastrarItens($connection, $quantidade3, $fkPedido3, $fkPorcao3);
        }

    } else {
        echo ("Pedido não foi atualizado");
    }

    header("Location: listar.php");
    die();
}
require("../rodape.php");