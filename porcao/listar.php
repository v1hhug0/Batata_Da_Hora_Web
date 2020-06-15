<?php
require("../cabecalho.php");
require("../connection.php");
require("./porcao.banco.php");
$porcoes = listarPorcoes($connection);
?>

<div class="container">

    <div class="row justify-content-between mt-3">

        <div class="ml-3">
            <h3>Porções</h3>
        </div>

        <div class="mr-3">
            <a href="/Batata_Da_Hora_Web/porcao/cadastrar.php" class="btn btn-primary">Novo</a>
        </div>

    </div>

    <table class="table">

        <thead>

            <tr>
                <th>ID</th>
                <th>Tamanho</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach ($porcoes as $porcao) { ?>

                <tr>
                    <td><?php echo $porcao->idPorcao ?></td>
                    <td><?php echo $porcao->tamanho ?></td>
                    <td><?php echo $porcao->preco ?></td>
                    
                    <td>

                        <div class="row">

                            <div class="col">
                                <a href="/Batata_Da_Hora_Web/porcao/atualizar.php?idPorcao=<?= $porcao->idPorcao ?>" class="btn btn-warning">Editar</a>
                            </div>

                            <div class="col">

                                <form action="/Batata_Da_Hora_Web/porcao/deletar.php" method="POST">
                                    <input type="hidden" name="idPorcao" value="<?= $porcao->idPorcao ?>">
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