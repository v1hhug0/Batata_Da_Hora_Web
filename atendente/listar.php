<?php
require("../cabecalho.php");
require("../connection.php");
require("./atendente.banco.php");
$atendentes = listarAtendentes($connection);
?>

<div class="container">

    <div class="row justify-content-between mt-3">

        <div class="ml-3">
            <h3>Atendentes</h3>
        </div>

        <div class="mr-3">
            <a href="/Batata_Da_Hora_Web/atendente/cadastrar.php" class="btn btn-primary">Novo</a>
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

            <?php foreach ($atendentes as $atendente) { ?>

                <tr>
                    <td><?php echo $atendente->idAtendente ?></td>
                    <td><?php echo $atendente->nome ?></td>
                    <td><?php echo $atendente->dataNascimento ?></td>
                    <td><?php echo $atendente->endereco ?></td>
                    <td><?php echo $atendente->rg ?></td>
                    <td><?php echo $atendente->cpf ?></td>
                    <td><?php echo $atendente->telefone ?></td>
                    <td><?php echo $atendente->email ?></td>

                    <td>

                        <div class="row">

                            <div class="col">
                                <a href="/Batata_Da_Hora_Web/atendente/atualizar.php?idAtendente=<?= $atendente->idAtendente ?>" class="btn btn-warning">Editar</a>
                            </div>

                            <div class="col">

                                <form action="/Batata_Da_Hora_Web/atendente/deletar.php" method="POST">
                                    <input type="hidden" name="idAtendente" value="<?= $atendente->idAtendente ?>">
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