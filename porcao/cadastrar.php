<?php
require("../cabecalho.php");
require("../connection.php");
require("./porcao.banco.php");
$dados = [];
$dados['idPorcao'] = "";
$dados['tamanho'] = "";
$dados['preco'] = "";
?>

<div class="container mt-3">
    <h3>Cadastrar Porção</h3>

    <form action="/Batata_Da_Hora_Web/porcao/cadastrar.php" method="POST">
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
    $tamanho = $_POST['tamanho'];
    $preco = $_POST['preco'];
    
    if (cadastrarPorcao($connection, $tamanho, $preco)) {
        header("Location: listar.php");
    } else {
        echo ("Porção não cadastrada");
    }
}

require("../rodape.php");