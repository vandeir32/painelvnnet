<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/config/funcoes.php");
isLogged($sid);
?>

<div class="container">
    <center>
        <a href="home.php">
            <img class="mt-2" src="<?= getConfig('logo') ?>" width="<?= getConfig('largura') ?>" height="<?= getConfig('altura') ?>">
        </a><br>
        Bem vindo(a) <b><?= getNickById($uid) ?></b>!<br><br><br>
    </center>
    <div class="col-13">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Tabela de Funções</h6>
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
                            <th scope="row">Visualizar config.json</th>
                            <td>Visualiza o arquivo de configuração JSON</td>
                            <td>
                                <a href="update/<?= getData('pasta_att', $uid) ?>/config" target="_blank" class="btn btn-outline-danger">
                                    <i class="bi bi-file-earmark-text-fill"></i> Visualizar JSON
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Baixar Json</th>
                            <td>Baixa Json Pro seu App</td>
                            <td>
                                <a href="update/<?= getData('pasta_att', $uid) ?>/config" download="config.json" class="btn btn-outline-danger">
                                    <i class="bi bi-cloud-download"></i> Baixar JSON
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Conf Do App</th>
                            <td>Muda as Configurações do seu app</td>
                            <td>
                                <a href="app.php" class="btn btn-outline-danger">
                                    <i class="bi bi-gear-fill"></i> Configurações do app
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <?php if (getAdm($uid) == true) : ?>
                                <th scope="row" class="d-flex align-items-center justify-content-between border-bottom py-3">Conf Do Site</th>
                                <td>Muda as Configurações do seu site</td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-config-site">
                                        <i class="bi bi-gear-fill"></i> Configurar Site
                                    </button>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <th scope="row">Conf Do Perfil</th>
                            <td>Muda as Configurações do seu Perfil</td>
                            <td>
                                <a href="perfil.php" class="btn btn-outline-danger">
                                    <i class="bi bi-people-fill"></i> Configurações de perfil
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <?php if (getAdm($uid) == true) : ?>
                                <th scope="row">Conf Do Perfil</th>
                                <td>Gerenciador de Usuários</td>
                                <td>
                                    <a href="usuarios.php" class="btn btn-outline-danger">
                                        <i class="bi bi-people-fill"></i> Gerenciar usuários
                                    </a>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <th scope="row">Sair do Site</th>
                            <td>Faz logout do Site</td>
                            <td>
                                <a href="?acao=sair" class="btn btn-outline-danger">
                                    <i class="bi bi-arrow-left-circle-fill"></i> Sair do site
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php

if ($acao == "sair") :

    $conn->query("DELETE FROM sessao WHERE id='$sid'");
    session_destroy();
    header("location: /");

endif;
?>

<?php

if (getAdm($uid) == true) : ?>
    <!------------------------------------------------------------------------------------>
    <!-- MODAL CONFIGURAÇÕES SITE -->
    <!------------------------------------------------------------------------------------>
    <div class="modal fade" id="modal-config-site" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: black;">
                <div class="modal-header" style="background-color: black;">
                    <h2 class="h6 modal-title">Configuracoes do site</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="editar.php?acao=site" method="post">
                        <div class="row">
                            <div class="col">
                                <label for="">Logotipo</label>
                                <input type="text" name="logo" class="form-control" value="<?= getConfig('logo') ?>" style="background-color: white;">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <label for="">Largura</label>
                                <input type="text" name="largura" class="form-control" value="<?= getConfig('largura') ?>" style="background-color: white;">
                            </div>
                            <div class="col">
                                <label for="">Altura</label>
                                <input type="text" name="altura" class="form-control" value="<?= getConfig('altura') ?>" style="background-color: white;">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <label for="">Link do site</label>
                                <input type="text" name="link" class="form-control" value="<?= getConfig('link') ?>" style="background-color: white;">
                            </div>
                            <div class="col">
                                <label for="">Titulo do site</label>
                                <input type="text" name="titulo" class="form-control" value="<?= getConfig('titulo') ?>" style="background-color: white;">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="atualiza_site" style="color: white" class="btn btn-outline-danger">Editar</button></form>
                    <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<?php 
endif; 
require_once($_SERVER['DOCUMENT_ROOT'] . "/config/rodape.php"); ?>