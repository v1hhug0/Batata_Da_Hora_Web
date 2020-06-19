<?php
require("../cabecalho.php");
require("../connection.php");
require("./atendente.banco.php");

if (isset($_GET['idAtendente'])) {
    $idAtendente = $_GET['idAtendente'];
    $dados = verificarIdAtendente($connection, $idAtendente);
} else {
    echo ("Atendente não encontrado");
}

function atendenteBool($connection, $idAtendente) {
    return verificarIdAtendente($connection, $idAtendente);
}

if (isset($_POST['idAtendente']) && atendenteBool($connection, $_POST['idAtendente'])) {
    $idAtendente = $_POST['idAtendente'];
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $endereco = $_POST['endereco'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    if (atualizarAtendente($connection, $idAtendente, $nome, $dataNascimento, $endereco, $rg, $cpf, $telefone, $email)) {
        echo ("Atendente atualizado com sucesso!");
    } else {
        echo ("Atendente não foi atualizado");
    }

    header("Location: listar.php");
    die();
}

?>

<div class="container">
    <h3>Atualizar Atendente</h3>

    <form action="/Batata_Da_Hora_Web/atendente/atualizar.php?idAtendente=<?= $idAtendente ?>" method="POST">
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