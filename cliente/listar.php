<?php
require("../cabecalho.php");
require("../connection.php");
require("./cliente.banco.php");
$clientes = listarClientes($connection);
?>

<div class="container">

    <div class="row justify-content-between mt-3">

        <div class="ml-3">
            <h3>Clientes</h3>
        </div>

        <div class="mr-3">
            <a href="/Batata_Da_Hora_Web/cliente/cadastrar.php" class="btn btn-primary">Novo</a>
        </div>

    </div>

    <table class="table">

        <thead>

            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Endereço</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach ($clientes as $cliente) { ?>

                <tr>
                    <td><?php echo $cliente->idCliente ?></td>
                    <td><?php echo $cliente->nome ?></td>
                    <td><?php echo $cliente->dataNascimento ?></td>
                    <td><?php echo $cliente->endereco ?></td>
                    <td><?php echo $cliente->rg ?></td>
                    <td><?php echo $cliente->cpf ?></td>
                    <td><?php echo $cliente->telefone ?></td>
                    <td><?php echo $cliente->email ?></td>

                    <td>

                        <div class="row">

                            <div class="col">
                                <a href="/Batata_Da_Hora_Web/cliente/atualizar.php?idCliente=<?= $cliente->idCliente ?>" class="btn btn-warning">Editar</a>
                            </div>

                            <div class="col">

                                <form action="/Batata_Da_Hora_Web/cliente/deletar.php" method="POST">
                                    <input type="hidden" name="idCliente" value="<?= $cliente->idCliente ?>">
                                    <button class="btn btn-danger form-control" type="submit" onclick="return confirm('Deseja mesmo deletar?')">Excluir</button>
                                </form>

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