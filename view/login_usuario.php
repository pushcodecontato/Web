<div class="caixa_login">
    <img src="view/imagem/login.png" alt="login" title="login" class="login">
    <div class="formulario_login">
        <h2>Efetuar login</h2>
        <form id="frmLogar"  onsubmit="return logar(this)" action="router.php?controller=clientes&modo=logar">
            <input maxlength="100" type="email" pattern="^([a-z._\-0-9áéíóúàèìòùâêîôûãẽĩõũç]*@+([a-z0-9]+.+[a-z0-9])*)+$" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" require ><br>
            <input type="submit" value="Login">
        </form>
    </div>
</div>