<input type="hidden" name="idPedido" value="<?= $dados['idPedido'] ?>">
<input type="hidden" name="status" value="P">

<div class="form-row mt-3 mb-3">

    <div class="col">
        <label>Cliente:</label>
        <select name="fkCliente" class="form-control">
            <option value="">Insira um Cliente</option>
            <?php foreach ($clientes as $cliente) { ?>
                <option value="<?= $cliente->idCliente ?>"><?= $cliente->nome ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col">
        <label>Atendente:</label>
        <select name="fkAtendente" class="form-control">
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
        <input type="date" name="dataPedido" class="form-control" placeholder="Digite a data do pedido" value="<?= $dados['dataPedido'] ?>">
    </div>

    <div class="col">
        <label>Endereço de Entrega:</label>
        <input type="text" name="enderecoEntrega" class="form-control" placeholder="Digite o endereço para entrega" value="<?= $dados['enderecoEntrega'] ?>">
    </div>

</div>

<div class="form-row mb3'">
    <div class="col">
        <label>Total:</label>
        <input type="number" step="0.01" name="total" class="form-control" placeholder="Digite o Total" value="<?= $dados['total'] ?>">
    </div>
    <div class="col">
        <label>Data de Entrega:</label>
        <input type="date" name="dataEntrega" class="form-control" placeholder="Digite a data da entrega" value="<?= $dados['dataEntrega'] ?>">
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
        <input type="number" name="quantidade1" style="margin-bottom: 30%;" class="form-control" value="0">
        <input type="number" name="quantidade2" style="margin-bottom: 30%;" class="form-control" value="0">
        <input type="number" name="quantidade3" class="form-control" value="0">
    </div>


    <div class="col-8">
    </div>

</div>