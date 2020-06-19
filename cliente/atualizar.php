<?php
require("../cabecalho.php");
require("../connection.php");
require("./cliente.banco.php");

if (isset($_GET['idCliente'])) {
    $idCliente = $_GET['idCliente'];
    $dados = verificarIdCliente($connection, $idCliente);
} else {
    echo ("Cliente não encontrado");
}

function clienteBool($connection, $idCliente) {
    return verificarIdCliente($connection, $idCliente);
}

if (isset($_POST['idCliente']) && clienteBool($connection, $_POST['idCliente'])) {
    $idCliente = $_POST['idCliente'];
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $endereco = $_POST['endereco'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    if (atualizarCliente($connection, $idCliente, $nome, $dataNascimento, $endereco, $rg, $cpf, $telefone, $email)) {
        echo ("Cliente atualizado com sucesso!");
    } else {
        echo ("Cliente não foi atualizado");
    }

    header("Location: listar.php");
    die();
}

?>

<div class="container">
    <h3>Atualizar Cliente</h3>

    <form action="/Batata_Da_Hora_Web/cliente/atualizar.php?idCliente=<?= $idCliente ?>" method="POST">
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