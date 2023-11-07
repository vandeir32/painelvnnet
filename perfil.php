<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/config/funcoes.php");
isLogged($sid); ?>

<div class="container">
    <center>
        <a href="home.php"><img class="mt-5" src="<?= getConfig('logo') ?>" width="<?= getConfig('largura') ?>" height="<?= getConfig('altura') ?>"></a><br>
        Bem vindo(a) <b><?= getNickById($uid) ?></b>!<br><br></center>

    <div class="col-13">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Perfil</h6>
            <div class="table-responsive height d-flex justify-content-center align-items-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Funções</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Nome</th>
                            <td>Altera Seu nome no site</td>
                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#modal-nome" class="btn btn-outline-danger"><i class="bi bi-person-circle"></i> Alterar nome</a></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <th scope="row">Login</th>
                            <td>Altera seu login no site</td>
                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#modal-login" class="btn btn-outline-danger"><i class="bi bi-key-fill"></i> Alterar login</a></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <th scope="row">Senha</th>
                            <td>Altera sua senha no site</td>
                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#modal-senha" class="btn btn-outline-danger"><i class="bi bi-unlock"></i> Alterar senha</a></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <th scope="row">Pasta</th>
                            <td>Altera sua pasta de att no site</td>
                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#modal-pasta" class="btn btn-outline-danger"><i class="bi bi-briefcase-fill"></i> Pasta de atualização</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------>
<!-- MODAL NOME -->
<!------------------------------------------------------------------------------------>
    <div class="modal fade" id="modal-nome" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: black;">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Alterar nome</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="editar.php?acao=dados" method="post">
                                <label for="" style="color: white;">Nome</label>
                                <input type="text" name="nome" class="form-control" value="<?= getUser('nome', getIdBySid($sid)) ?>" style="background-color: white;">

                </div>
                <div class="modal-footer">
                    <button type="submit" style="color: white" class="btn btn-outline-danger">Salvar</button></form>
                    <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

<!------------------------------------------------------------------------------------>
<!-- MODAL LOGIN -->
<!------------------------------------------------------------------------------------>
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: black;">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Alterar login</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="editar.php?acao=dados" method="post">
                                <label for="" style="color: white;">Login</label>
                                <input type="text" name="login" class="form-control" value="<?= getUser('login', getIdBySid($sid)) ?>" style="background-color: white;">

                </div>
                <div class="modal-footer">
                    <button type="submit" style="color: white" class="btn btn-outline-danger">Salvar</button></form>
                    <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<!------------------------------------------------------------------------------------>
<!-- MODAL SENHA -->
<!------------------------------------------------------------------------------------>
<div class="modal fade" id="modal-senha" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: black;">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Alterar senha</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="editar.php?acao=dados" method="post">
                                <label for="" style="color: white;">Nova senha</label>
                                <input type="text" name="senha" class="form-control" style="background-color: white;">
                </div>
                <div class="modal-footer">
                    <button type="submit" style="color: white" class="btn btn-outline-danger">Salvar</button></form>
                    <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<!------------------------------------------------------------------------------------>
<!-- MODAL PASTA -->
<!------------------------------------------------------------------------------------>
<div class="modal fade" id="modal-pasta" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: black;">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Alterar pasta</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="editar.php?acao=dados" method="post">
                        <input type="hidden" name="pasta_velha" value="<?= getFolderById($uid) ?>">
                                <label for="" style="color: white;">Pasta de atualização</label>
                                <input type="text" name="pasta" class="form-control" value="<?= getFolderById($uid) ?>" style="background-color: white;">

                </div>
                <div class="modal-footer">
                    <button type="submit" style="color: white" class="btn btn-outline-danger">Salvar</button></form>
                    <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>