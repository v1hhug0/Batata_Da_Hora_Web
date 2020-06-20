<?php
$p1 = "";
$p2 = "";
$p3 = "";
if (isset($_GET['idPedido'])) {
    $idPedido = $_GET['idPedido'];
    $dados = verificarIdPedido($connection, $idPedido);
    $cli = verificarIdCliente($connection, $dados['fkCliente']);
    $atend = verificarIdAtendente($connection, $dados['fkAtendente']);
    $pedd = listarItensPedido($connection, $idPedido);

    for ($i=0; $i < 3 ; $i++) { 
        if (isset($pedd[$i]->fkPorcao) && $pedd[$i]->fkPorcao == "Pequena") {
            $p1 = $pedd[$i]->quantidade;
            $quantidadeAntiga1 = $pedd[$i]->quantidade;
        }        
    }
    for ($i=0; $i < 3 ; $i++) { 
        if (isset($pedd[$i]->fkPorcao) && $pedd[$i]->fkPorcao == "Média") {
            $p2 = $pedd[$i]->quantidade;
            $quantidadeAntiga2 = $pedd[$i]->quantidade;
        }        
    }
    for ($i=0; $i < 3 ; $i++) { 
        if (isset($pedd[$i]->fkPorcao) && $pedd[$i]->fkPorcao == "Grande") {
            $p3 = $pedd[$i]->quantidade;
            $quantidadeAntiga3 = $pedd[$i]->quantidade;
        }        
    }

    
}
?>

<input type="hidden" name="idPedido" value="<?= $dados['idPedido'] ?>">
<input type="hidden" name="status" value="P">

<div class="form-row mt-3 mb-3">

    <div class="col">
        <label>Cliente:</label>
        <select name="fkCliente" class="form-control">
            <?php ob_start();
            if (isset($_GET['idPedido'])) {
                $idPedido = $_GET['idPedido'];
                $dados = verificarIdPedido($connection, $idPedido); ?>
                <option value="<?= $dados['fkCliente'] ?>"><?= $cli['nome'] ?></option>
            <?php  } ?>
            <option value="">Insira um Cliente</option>
            <?php foreach ($clientes as $cliente) { ?>
                <option value="<?= $cliente->idCliente ?>"><?= $cliente->nome ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col">
        <label>Atendente:</label>
        <select name="fkAtendente" class="form-control">
            <?php if (isset($_GET['idPedido'])) {
                $idPedido = $_GET['idPedido'];
                $dados = verificarIdPedido($connection, $idPedido); ?>
                <option value="<?= $dados['fkCliente'] ?>"><?= $atend['nome'] ?></option>
            <?php  } ?>
            <option value="">Insira um Cliente</option>
            <?php foreach ($atendentes as $atendente) { ?>
                <option value="<?= $atendente->idAtendente ?>"><?= $atendente->nome ?></option>
            <?php } ?>
        </select>
    </div>

</div>

<div class="form-row mb-3">

    <div class="col">
        <label>Data do Pedido:</label>
        <input type="date" name="dataPedido" class="form-control" value="<?= $dados['dataPedido'] ?>">
    </div>

    <div class="col">
        <label>Endereço de Entrega:</label>
        <input type="text" name="enderecoEntrega" class="form-control" placeholder="Digite o endereço para entrega" value="<?= $dados['enderecoEntrega'] ?>">
    </div>

</div>



<div class="form-row mb-3">

    <div class="col-1">
        <label>Porção:</label>
    </div>

    <div class="col-1">
        <div style="margin-bottom: 50%;">
            <h5>P</h5>
        </div>
        <div style="margin-bottom: 50%;">
            <h5>M</h5>
        </div>
        <div>
            <h5>G</h5>
        </div>
    </div>

    <div class="col-1">
        <label>Quantidade:</label>
    </div>

    <div class="col-1">
        <input type="number" name="quantidade1" id="quantidade1" oninput="calcaularTotal()" style="margin-bottom: 30%;" class="form-control" value="<?= $p1 ?>">
        <input type="number" name="quantidade2" id="quantidade2" oninput="calcaularTotal()" style="margin-bottom: 30%;" class="form-control" value="<?= $p2 ?>">
        <input type="number" name="quantidade3" id="quantidade3" oninput="calcaularTotal()" class="form-control" value="<?= $p3 ?>">
    </div>


    <div class="col-8">

    </div>

</div>

<script>
    function calcaularTotal(qtd1, qtd2, qtd3) {
        var a = document.getElementById("quantidade1").value * 5;
        var b = document.getElementById("quantidade2").value * 8;
        var c = document.getElementById("quantidade3").value * 12;
        var total = a + b + c;
        document.getElementById("total").value = total;
    }
</script>

<div class="form-row mb3'">
    <div class="col">
        <label>Total:</label>
        <input type="number" step="0.01" name="total" id="total" class="form-control" readonly value="<?= $dados['total'] ?>">
    </div>
    <div class="col">
        <label>Data de Entrega:</label>
        <input type="date" name="dataEntrega" id="dataEntrega" class="form-control" value="<?= $dados['dataEntrega'] ?>">
    </div>
</div>