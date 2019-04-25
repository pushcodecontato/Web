
<form class="modal_topicos" onsubmit="pagina_topico_insert(this)" method='post' enctype="multipart/form-data" action="router.php?controller=seja_parceiro_topico&modo=inserir">
    <table>
        <tr>
            <td><label>Titulo</label></td>
            <td><input placeholder="Titulo do topico" name="titulo" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <h4> Descrição: </h4>
                <textarea placeholder="Descrição basica" name="descricao" required></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="imagem_foto"></div>
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="imagem" onchange="mostraImagemTopico(this)" required>
            </td>
        </tr>
    </table>
    <button id="btnSalvarTopico">Salvar</button>
</form>