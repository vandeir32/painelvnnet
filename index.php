<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/login.php");
if (getLogged($sid) == true) {
	header("location: home.php");
} else {
?>

<section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 d-flex justify-content-center">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-novo-usuario" class="text-primary" style="cursor: pointer;">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Conecta4G</h3>
                        </a>
                    </div>
                    <?php
                    if (isset($_SESSION['erro'])) : echo $_SESSION['erro'];
                        session_destroy();
                    endif; ?>
                    <form action="" method="POST" class="mt-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Usuário" name="login" autofocus required>
                            <label for="floatingInput">Usuário</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" placeholder="Senha" class="form-control" name="senha" required>
                            <label for="floatingPassword">Senha</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Lembre-me</label>
                            </div>
                        </div>
                        <button type="submit" name="btn_login" class="btn btn-primary py-3 w-100 mb-4">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
	</main>

<!-- MODAL CADASTRO DE USUÁRIO -->

<div class="modal fade" id="modal-novo-usuario" tabindex="-1" role="dialog" aria-labelledby="modal-novo-usuario-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-secondary rounded border border-danger">
            <div class="modal-header bg-dark text-white border-0">
                <h5 class="modal-title" id="modal-novo-usuario-label">CADASTRAR</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="adicionar.php?acao=usuario" method="post">
                    <div class="form-group">
                        <label for="nome" class="text-white">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" style="border-radius: 10px;">
                    </div>
                    <div class="form-group">
                        <label for="login" class="text-white">Login</label>
                        <input type="text" name="login" id="login" class="form-control" style="border-radius: 10px;">
                    </div>
                    <div class="form-group">
                        <label for="senha" class="text-white">Senha</label>
                        <input type="text" name="senha" id="senha" class="form-control" style="border-radius: 10px;">
                    </div>
                    <div class="form-group">
                        <label for="pasta_nova" class="text-white">Pasta atualização</label>
                        <input type="text" name="pasta_nova" id="pasta_nova" class="form-control" style="border-radius: 10px;">
                    </div>
                    <div id="liveAlertPlaceholder"></div>
                    <button type="submit" name="adicionar_usuario" class="w-100 btn btn-lg btn-primary btn-block d-flex align-items-center justify-content-center text-white text-center">REGISTRAR</button>
                </form>
                <br>
                <button type="button" class="w-100 btn btn-lg btn-danger btn-block d-flex align-items-center justify-content-center text-white text-center" data-bs-dismiss="modal">CANCELAR</button>
                <br>
                <font color="#ffffff">Caso seu usuário e senha não logue, crie outro com usuário diferente, pois talvez alguém já esteja usando esse ou seu caractere não suporte</font>
            </div>
        </div>
    </div>
</div>


<?php
}
require_once($_SERVER['DOCUMENT_ROOT'] . "/config/rodape.php"); ?>
