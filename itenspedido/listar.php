<?php
require("../cabecalho.php");
require("../connection.php");
require("./itensPedido.banco.php");
$fkPedido = $_GET['idPedido'];
$itensPedido = listarItensPedido($connection, $fkPedido);
?>

<div class="container">

    <div class="row justify-content-between mt-3">

        <div class="ml-3">
            <h3>Itens Pedido Nº <?= $fkPedido ?></h3>
        </div>

    </div>

    <table class="table">

        <thead>

            <tr>
                <th>Tamanho da Porção</th>
                <th>Quantidade</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach ($itensPedido as $itens) { ?>

                <tr>
                    <td><?php echo $itens->fkPorcao ?></td>
                    <td><?php echo $itens->quantidade ?></td>
                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>

<?php
require("../rodape.php");
