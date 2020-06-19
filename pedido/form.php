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

<div class="form-row mb-3">

    <div class="col">
        <label>Total:</label>
        <input type="number" step="0.01" name="total" class="form-control" placeholder="Digite o total" value="<?= $dados['total'] ?>">
    </div>
    
    <div class="col">
        <label>Data da Entrega:</label>
        <input type="date" name="dataEntrega" class="form-control" placeholder="Digite a data da entrega" value="<?= $dados['dataEntrega'] ?>">
    </div>
</div>