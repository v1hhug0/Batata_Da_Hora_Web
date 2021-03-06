<?php
require("../cabecalho.php");
require("../connection.php");
require("./cliente.banco.php");
$dados = [];
$dados['idCliente'] = "";
$dados['nome'] = "";
$dados['dataNascimento'] = "";
$dados['endereco'] = "";
$dados['rg'] = "";
$dados['cpf'] = "";
$dados['telefone'] = "";
$dados['email'] = "";
?>

<div class="container mt-3">
    <h3>Cadastrar Cliente</h3>

    <form action="/Batata_Da_Hora_Web/cliente/cadastrar.php" method="POST">
        <?php
        require("./form.php");
        ?>

        <div class="mt-3">
            <input type="submit" value="Cadastrar" class="btn btn-success px-5 mt-3">
        </div>

    </form>

</div>

<?php

function hasPost() {
    return $_SERVER['REQUEST_METHOD'] == "POST";
}

if (hasPost()) {
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $endereco = $_POST['endereco'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    if (cadastrarCliente($connection, $nome, $dataNascimento, $endereco, $rg, $cpf, $telefone, $email)) {
        header("Location: listar.php");
    } else {
        echo ("Cliente não cadastrado");
    }
}

require("../rodape.php");