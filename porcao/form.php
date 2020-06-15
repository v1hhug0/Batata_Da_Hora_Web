<input type="hidden" name="idPorcao" value="<?= $dados['idPorcao'] ?>">

<div class="form-row mt-3 mb-3">

    <div class="col">
        <label>Tamanho:</label>
        <input type="text" name="tamanho" class="form-control" placeholder="Digite o tamanho da porção" value="<?= $dados['tamanho'] ?>">
    </div>

    <div class="col">
        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" class="form-control" placeholder="Digite o preço da porção" value="<?= $dados['preco'] ?>">
    </div>

</div>