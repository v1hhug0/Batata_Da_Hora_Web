<?php
require("../cabecalho.php");
require("../connection.php");
require("./porcao.banco.php");

if (isset($_GET['idPorcao'])) {
    $idPorcao = $_GET['idPorcao'];
    $dados = verificarIdPorcao($connection, $idPorcao);
} else {
    echo ("Porção não encontrada");
}

function porcaoBool($connection, $idPorcao) {
    return verificarIdPorcao($connection, $idPorcao);
}

if (isset($_POST['idPorcao']) && porcaoBool($connection, $_POST['idPorcao'])) {
    $idPorcao = $_POST['idPorcao'];
    $tamanho = $_POST['tamanho'];
    $preco = $_POST['preco'];
    
    if (atualizarPorcao($connection, $idPorcao, $tamanho, $preco)) {
        echo ("Porção atualizada com sucesso!");
    } else {
        echo ("Porção não foi atualizada");
    }

    header("Location: listar.php");
    die();
}

?>

<div class="container">
    <h3>Atualizar Porção</h3>

    <form action="/Batata_Da_Hora_Web/porcao/atualizar.php?idPorcao=<?= $idPorcao ?>" method="POST">
        <?php
        require("./form.php");
        ?>

        <div>
            <input type="submit" value="Atualizar" class="btn btn-info px-5 mt-3">
        </div>

    </form>

</div>

<?php
require("../rodape.php");