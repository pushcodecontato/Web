<form id="frmModelos" action="router.php?controller=MODELOS&modo=inserir" onsubmit="modelo_insert(this)"> 
    <div class="modal_modelos_crud">
        <h3> Cadastrar Modelos </h3>
        <div class="campo">
            <label>Marca:</label>
            <select name="id_marca_veiculo" required>
                <option value="1">Honda</option>
                <option value="2">Hiundai</option>
                <option value="3">Mitssubichi</option>
            </select>
        </div>
        <div class="campo">
            <label> Nome do modelo </label>
            <input type="text" name="nome" required>
        </div>
        <div class="campo">
            <button type="submit"> Salvar </button>
        </div>
    </div>
</form>