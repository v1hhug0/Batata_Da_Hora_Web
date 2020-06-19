<?php
require("../cabecalho.php");
require("../connection.php");
require("./pedido.banco.php");
$pedidos = listarPedidos($connection);


//print_r($pedidos[0]["idPedido"]);



?>

<div class="container">

    <div class="row justify-content-between mt-3">

        <div class="ml-3">
            <h3>Pedidos</h3>
        </div>

        <div class="mr-3">
            <a href="/Batata_Da_Hora_Web/pedido/cadastrar.php" class="btn btn-primary">Novo</a>
        </div>

    </div>

    <table class="table">

        <thead>

            <tr>
                <th>ID</th>
                <th>Data de Pedido</th>
                <th>Endereço de Entrega</th>
                <th>Total</th>
                <th>Status</th>
                <th>Data de Entrega</th>
                <th>Cliente</th>
                <th>Atendente</th>
                <th>Ação</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach ($pedidos as $pedido) { ?>

                <tr>
                    <td><?php echo $pedido->idPedido ?></td>
                    <td><?php echo $pedido->dataPedido ?></td>
                    <td><?php echo $pedido->enderecoEntrega ?></td>
                    <td><?php echo $pedido->total ?></td>
                    <td><?php echo $pedido->status ?></td>
                    <td><?php echo $pedido->dataEntrega ?></td>
                    <td><?php echo $pedido->fkCliente ?></td>
                    <td><?php echo $pedido->fkAtendente ?></td>

                    <td>

                        <div class="row">

                            <div class="col">
                                <a href="/Batata_Da_Hora_Web/itenspedido/listar.php?idPedido=<?= $pedido->idPedido ?>" class="btn btn-info">Detalhar</a>
                            </div>

                        </div>

                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>

<?php
require("../rodape.php");