<input type="hidden" name="idCliente" value="<?= $dados['idCliente'] ?>">

<div class="form-row mt-3 mb-3">

    <div class="col">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" value="<?= $dados['nome'] ?>">
    </div>

    <div class="col">
        <label>Endereço:</label>
        <input type="text" name="endereco" class="form-control" placeholder="Digite seu endereço" value="<?= $dados['endereco'] ?>">
    </div>

</div>

<div class="form-row mb-3">

    <div class="col">
        <label>RG:</label>
        <input type="text" name="rg" class="form-control" placeholder="Digite seu RG" value="<?= $dados['rg'] ?>">
    </div>

    <div class="col">
        <label>CPF:</label>
        <input type="text" name="cpf" class="form-control" placeholder="Digite seu CPF" value="<?= $dados['cpf'] ?>">
    </div>

</div>

<div class="form-row mb-3">

    <div class="col">
        <label>Telefone:</label>
        <input type="text" name="telefone" class="form-control" placeholder="Digite seu telefone" value="<?= $dados['telefone'] ?>">
    </div>

    <div class="col">
        <label>Email:</label>
        <input type="text" name="email" class="form-control" placeholder="Digite seu email" value="<?= $dados['email'] ?>">
    </div>

</div>

<label>Data de Nascimento:</label>
<input type="date" name="dataNascimento" class=" form-control w-25" placeholder="Digite sua data de nascimento" value="<?= $dados['dataNascimento'] ?>">