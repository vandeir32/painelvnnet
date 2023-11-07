<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/config/funcoes.php");
isLogged($sid);
$uid = getIdBySid($sid); ?>

<!------------------------------------------------------------------------------------>
<!-- MODAL ADD SERVIDOR -->
<!------------------------------------------------------------------------------------>
<div class="modal fade" id="modal-add-servidor" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: black;">
            <div class="modal-header">
                <h2 class="h6 modal-title">Adicionar servidor</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="adicionar.php?acao=servidor" method="post">
                    <input type="hidden" name="id_owner" value="<?= getIdBySid($sid) ?>">

                    <div class="row">
                        <div class="col">
                            <label for=""><span style="color: white;">Nome</span></label>
                            <input type="text" name="nome" id="nome" class="form-control" style="background-color: white;">
                        </div>
                        <div class="col">
                            <label for=""><span style="color: white;">Server IP</span></label>
                            <input type="text" name="serverip" class="form-control" style="background-color: white;">
                        </div>
                    </div>

                    <div class="mt-2 row">
                        <div class="col">
                            <label for=""><span style="color: white;">Flag</span></label>
                            <select name="flag" class="form-select" style="background-color: white;"> 
                                <option value="br.png">BRASIL</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for=""><span style="color: white;">Tipo</span></label>
                            <select name="tipo" class="form-select" style="background-color: white;">
                                <option value="premium" >PREMIUM</option>
                                <option value="free">FREE</option>
                            </select>

                        </div>
                    </div>

                    <div class="mt-2 row">
                        <div class="col">
                            <label for=""><span style="color: white;">Server Port</span></label>
                            <input type="text" value="22" name="serverport" value="22" class="form-control" style="background-color: white;">
                        </div>
                        <div class="col">
                            <label for=""><span style="color: white;">SSL Port</span></label>
                            <input type="text" value="443" name="sslport" class="form-control" style="background-color: white;">
                        </div>
                    </div>

                    <div class="mt-2 row">
                        <div class="col">
                            <label for=""><span style="color: white;">CheckUser</span></label>
                            <input type="text" value="http://" name="checkuser" class="form-control" style="background-color: white;">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="adicionar_servidor" style="color: white" class="btn btn-outline-danger">Adicionar</button></form>
                <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------>
<!-- MODAL ADD PAYLOAD -->
<!------------------------------------------------------------------------------------>
<div class="modal fade" id="modal-add-payload" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: black;">
            <div class="modal-header">
                <h2 class="h6 modal-title">Adicionar payload</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="adicionar.php?acao=payload" method="post">
                    <input type="hidden" name="id_owner" value="<?= getIdBySid($sid) ?>" >

                    <div class="row">
                        <div class="col">
                            <label for=""><span style="color: white;">Nome</span></label>
                            <input type="text" name="nome" id="nome" class="form-control" style="background-color: white;">
                        </div>
                        <div class="col">
                            <label for=""><span style="color: white;">SNI</span></label>
                            <input type="text" name="sni" class="form-control" style="background-color: white;">
                        </div>
                    </div>

                    <div class="mt-2 row">
                        <div class="col">
                            <label for=""><span style="color: white;">ProxyIP</span></label>
                            <input type="text" name="proxyip" class="form-control" style="background-color: white;">
                        </div>
                        <div class="col">
                            <label for=""><span style="color: white;">Proxy Port</span></label>
                            <input type="text" name="proxyport" class="form-control" style="background-color: white;">
                        </div>
                    </div>

                    <div class="mt-2 row">
                        <div class="col">
                            <label for=""><span style="color: white;">TlsIP</span></label>
                            <input type="text" name="tlsip" class="form-control" style="background-color: white;">
                        </div>
                        <div class="col">
                            <label for=""><span style="color: white;">Operadora</span></label>
                            <select name="flag" class="form-select" style="background-color: white;">
                                <option value="vivo">VIVO</option>
                                <option value="claro">CLARO</option>
                                <option value="tim">TIM</option>
                                <option value="oi">OI</option>
                            </select>
                        </div>
                    </div>

                    <label class="mt-2"><span style="color: white;">Info</span></label>
                    <select name="info" class="form-select" style="background-color: white;">
                        <option value="Tlsws">WS/SSL</option>
                        <option value="Direct">SSH/Direct</option>
                        <option value="Proxy">SSH/Proxy</option>
                        <option value="Ssl">SSH/SSL</option>
                    </select>

                    <label class="mt-2"><span style="color: white;">Payload</span></label>
                    <textarea class="form-control" name="pay" rows="4" style="background-color: white;"></textarea>

            </div>
            <div class="modal-footer">
                <button type="submit" name="adicionar_payload" style="color: white" class="btn btn-outline-danger">Adicionar</button></form>
                <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------>
<!-- MODAL ADD PORTA -->
<!------------------------------------------------------------------------------------>
<div class="modal fade" id="modal-add-porta" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: black;">
            <div class="modal-header">
                <h2 class="h6 modal-title">Adicionar porta</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="adicionar.php?acao=porta" method="post">
                    <input type="hidden" name="id_owner" value="<?= getIdBySid($sid) ?>">

                    <label for=""><span style="color: white;">Porta</span></label>
                    <input type="text" name="porta" class="form-control" style="background-color: white;">

            </div>
            <div class="modal-footer">
                <button type="submit" name="adicionar_porta" style="color: white" class="btn btn-outline-danger">Adicionar</button></form>
                <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------------------------>
<!-- MODAL MULTI PAYLOADS -->
<!------------------------------------------------------------------------------------>
<div class="modal fade" id="modal-add-multi" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: black;">
            <div class="modal-header">
                <h2 class="h6 modal-title">Adicionar várias payloads</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="adicionar.php?acao=multi" method="post">
                    <input type="hidden" name="id_owner" value="<?= getIdBySid($sid) ?>">

                    <label for=""><span style="color: white;">Payloads</span></label>
                    <textarea name="texto" cols="30" rows="10" class="form-control" style="background-color: white;"></textarea>

            </div>
            <div class="modal-footer">
                <button type="submit" name="adicionar_multi" style="color: white" class="btn btn-outline-danger">Adicionar</button></form>
                <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['editar_servidor'])) : ?>
    <!------------------------------------------------------------------------------------>
    <!-- MODAL EDITAR SERVIDOR -->
    <!------------------------------------------------------------------------------------>
    <div class="modal fade" id="modal-editar-servidor" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: black;">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Editar servidor</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $id_servidor = $_POST['editar_servidor'];
                    $sql = $conn->query("SELECT * FROM servidores WHERE id='$id_servidor'");
                    $dados = $sql->fetch(PDO::FETCH_ASSOC);  ?>

                    <form action="editar.php?acao=servidor" method="post">
                        <input type="hidden" name="id" value="<?= $dados['id'] ?>">
                        <input type="hidden" name="id_owner" value="<?= getIdBySid($sid) ?>">


                        <div class="row">
                            <div class="col">
                                <label for=""><span style="color: white;">Nome</span></label>
                                <input type="text" name="nome" value="<?= $dados['Name'] ?>" class="form-control" style="background-color: white;">
                            </div>
                            <div class="col">
                                <label for=""><span style="color: white;">Server IP</span></label>
                                <input type="text" name="serverip" value="<?= $dados['ServerIP'] ?>" class="form-control" style="background-color: white;">
                            </div>
                        </div>

                        <div class="mt-2 row">
                            <div class="col">
                                <label for=""><span style="color: white;">Flag</span></label>
                                <select name="flag" class="form-select" style="background-color: white;">
                                    <option value="br.png">BRASIL</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for=""><span style="color: white;">Tipo</span></label>
                                <select name="tipo" class="form-select" style="background-color: white;">
                                    <?php
                                    if ($dados['TYPE'] == 'premium') { ?>
                                        <option value="premium">PREMIUM</option>
                                        <option value="free">FREE</option>
                                    <?php } else { ?>
                                        <option value="free">FREE</option>
                                        <option value="premium">PREMIUM</option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="mt-2 row">
                            <div class="col">
                                <label for=""><span style="color: white;">Server Port</span></label>
                                <input type="text" value="22" name="serverport" value="<?= $dados['ServerPort'] ?>" class="form-control" style="background-color: white;">
                            </div>
                            <div class="col">
                                <label for=""><span style="color: white;">SSL Port</span></label>
                                <input type="text" value="<?= $dados['SSLPort'] ?>" name="sslport" class="form-control" style="background-color: white;">
                            </div>
                        </div>

                        <div class="mt-2 row">
                            <div class="col">
                                <label for=""><span style="color: white;">CheckUser</span></label>
                                <input type="text" value="<?= $dados['CheckUser'] ?>" name="checkuser" class="form-control" style="background-color: white;">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="atualiza_servidor" style="color: white" class="btn btn-outline-danger">Editar</button></form>
                    <form action="excluir.php?acao=servidor" method="post">
                        <input type="hidden" name="id" value="<?= $dados['id'] ?>">
                        <input type="hidden" name="id_owner" value="<?= getIdBySid($sid) ?>">
                        <button type="submit" name="excluir_servidor" style="color: white" class="btn btn-outline-danger ms-auto" data-bs-dismiss="modal">Excluir</button>
                    </form>
                    <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#modal-editar-servidor').modal('show');
        });
    </script>
<?php
endif;
if (isset($_POST['editar_payload'])) : ?>
    <!------------------------------------------------------------------------------------>
    <!-- MODAL EDITAR PAYLOAD -->
    <!------------------------------------------------------------------------------------>
    <div class="modal fade" id="modal-editar-payload" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: black;">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Editar payload</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <?php
                    $id_payload = $_POST['editar_payload'];
                    $sql = $conn->query("SELECT * FROM payloads WHERE id='$id_payload'");
                    $dados = $sql->fetch(PDO::FETCH_ASSOC);  ?>
                    <form action="editar.php?acao=payload" method="post">
                        <input type="hidden" name="id" value="<?= $dados['id'] ?>">
                        <input type="hidden" name="id_owner" value="<?= getIdBySid($sid) ?>">

                        <div class="row">
                            <div class="col">
                                <label for=""><span style="color: white;">Nome</span></label>
                                <input type="text" name="nome" id="nome" value="<?= $dados['Name'] ?>" class="form-control" style="background-color: white;">
                            </div>
                            <div class="col">
                                <label for=""><span style="color: white;">SNI</span></label>
                                <input type="text" name="sni" value="<?= $dados['SNI'] ?>" class="form-control" style="background-color: white;">
                            </div>
                        </div>

                        <div class="mt-2 row">
                            <div class="col">
                                <label for=""><span style="color: white;">ProxyIP</span></label>
                                <input type="text" name="proxyip" value="<?= $dados['ProxyIP'] ?>" class="form-control" style="background-color: white;">
                            </div>
                            <div class="col">
                                <label for=""><span style="color: white;">Proxy Port</span></label>
                                <input type="text" name="proxyport" value="<?= $dados['ProxyPort'] ?>" class="form-control" style="background-color: white;">
                            </div>
                        </div>

                        <div class="mt-2 row">
                            <div class="col">
                                <label for=""><span style="color: white;">TlsIP</span></label>
                                <input type="text" name="tlsip" value="<?= $dados['TlsIP'] ?>" class="form-control" style="background-color: white;">
                            </div>
                            <div class="col">
                                <label for=""><span style="color: white;">Operadora</span></label>
                                <select name="flag" class="form-select" style="background-color: white;">
                                    <?php
                                    if ($dados['FLAG'] == 'vivo') { ?>
                                        <option value="vivo">VIVO</option>
                                        <option value="claro">CLARO</option>
                                        <option value="tim">TIM</option>
                                        <option value="oi">OI</option>
                                    <?php } else if ($dados['FLAG'] == 'claro') { ?>
                                        <option value="claro">CLARO</option>
                                        <option value="vivo">VIVO</option>
                                        <option value="tim">TIM</option>
                                        <option value="oi">OI</option>
                                    <?php } else if ($dados['FLAG'] == 'tim') { ?>
                                        <option value="tim">TIM</option>
                                        <option value="claro">CLARO</option>
                                        <option value="vivo">VIVO</option>
                                        <option value="oi">OI</option>
                                    <?php } else { ?>
                                        <option value="oi">OI</option>
                                        <option value="tim">TIM</option>
                                        <option value="claro">CLARO</option>
                                        <option value="vivo">VIVO</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <label class="mt-2"><span style="color: white;">Info</span></label>
                        <select name="info" class="form-select" style="background-color: white;">
                            <option value="Tlsws">WS/SSL</option>
                            <option value="Direct">SSH/Direct</option>
                            <option value="Proxy">SSH/Proxy</option>
                            <option value="Ssl">SSH/SSL</option>
                        </select>

                        <label class="mt-2"><span style="color: white;">Payload</span></label>
                        <textarea class="form-control" name="pay" rows="4"><?= $dados['Payload'] ?></textarea>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="atualiza_payload" style="color: white" class="btn btn-outline-danger">Editar</button></form>
                    <form action="excluir.php?acao=payload" method="post">
                        <input type="hidden" name="id" value="<?= $dados['id'] ?>">
                        <input type="hidden" name="id_owner" value="<?= getIdBySid($sid) ?>">
                        <button type="submit" name="excluir_payload" style="color: white" class="btn btn-outline-danger ms-auto" data-bs-dismiss="modal">Excluir</button>
                    </form>
                    <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#modal-editar-payload').modal('show');
        });
    </script>
<?php
endif;
if (isset($_POST['editar_porta'])) : ?>
    <!------------------------------------------------------------------------------------>
    <!-- MODAL EDITAR PORTA -->
    <!------------------------------------------------------------------------------------>
    <div class="modal fade" id="modal-editar-porta" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: black;">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Editar porta</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $id_porta = $_POST['editar_porta'];
                    $sql = $conn->query("SELECT * FROM portas WHERE id='$id_porta'");
                    $dados = $sql->fetch(PDO::FETCH_ASSOC);  ?>

                    <form action="editar.php?acao=porta" method="post">
                        <input type="hidden" name="id" value="<?= $dados['id'] ?>">
                        <input type="hidden" name="id_owner" value="<?= getIdBySid($sid) ?>">


                        <label for=""><span style="color: white;">Porta</span></label>
                        <input type="text" name="porta" value="<?= $dados['Porta'] ?>" class="form-control" style="background-color: white;">

                </div>
                <div class="modal-footer">
                    <button type="submit" name="atualiza_porta" style="color: white" class="btn btn-outline-danger">Editar</button></form>
                    <form action="excluir.php?acao=porta" method="post">
                        <input type="hidden" name="id" value="<?= $dados['id'] ?>">
                        <input type="hidden" name="id_owner" value="<?= getIdBySid($sid) ?>">
                        <button type="submit" name="excluir_porta" style="color: white" class="btn btn-outline-danger ms-auto" data-bs-dismiss="modal">Excluir</button>
                    </form>
                    <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#modal-editar-porta').modal('show');
        });
    </script>
<?php endif; ?>

<!------------------------------------------------------------------------------------>
<!-- MODAL CONFIGURAÇÕES -->
<!------------------------------------------------------------------------------------>
<div class="modal fade" id="modal-configuracoes" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: black;">
            <div class="modal-header">
                <h2 class="h6 modal-title">Configuracoes</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="editar.php?acao=config" method="post">
                    <input type="hidden" name="id_owner" value="<?= getIdBySid($sid) ?>">
                    <div class="row">
                        <div class="col">
                            <label for="">Update</label>
                            <input type="text" name="update" class="form-control" value="<?= getConfig('link') ?>/update/<?= getData('pasta_att', $uid) ?>/config" disabled style="background-color: white;">
                        </div>
                        <div class="col">
                            <label for="">SMS</label>
                            <input type="text" name="sms" class="form-control" value="<?= getConfig('link') ?>/update/<?= getData('pasta_att', $uid) ?>/sms" disabled style="background-color: white;">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" value="<?= getConfigUser('email', $uid) ?>" style="background-color: white;">
                        </div>
                        <div class="col">
                            <label for="">Contato</label>
                            <input type="text" name="contato" class="form-control" value="<?= getConfigUser('contato', $uid) ?>" style="background-color: white;">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Termos</label>
                            <input type="text" name="termos" class="form-control" value="<?= getConfigUser('termos', $uid) ?>" style="background-color: white;">
                        </div>
                        <div class="col">
                            <label for="">CheckUser</label>
                            <select name="checkuser" class="form-select" style="background-color: white;">
                                <option value="true">Ativado</option>
                                <option value="false">Desativado</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Notas</label>
                            <textarea name="notas" class="form-control" style="background-color: white;" rows="4"><?= getConfigUser('notas', $uid) ?></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="atualiza_config" style="color: white" class="btn btn-outline-danger">Editar</button></form>
                <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------>
<!-- MODAL SMS -->
<!------------------------------------------------------------------------------------>
<div class="modal fade" id="modal-sms" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: black;">
            <div class="modal-header">
                <h2 class="h6 modal-title">Enviar SMS</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                $sql = $conn->query("SELECT * FROM mensagens WHERE id_owner='$uid'");
                $dados = $sql->fetch(PDO::FETCH_ASSOC);  ?>

                <form action="editar.php?acao=sms" method="post">
                    <input type="hidden" name="id_owner" value="<?= getIdBySid($sid) ?>">


                    <label for=""><span style="color: white;">Mensagem</span></label>
                    <textarea name="sms" class="form-control" style="background-color: white;" rows="4"><?= $dados['msg'] ?></textarea>

            </div>
            <div class="modal-footer">
                <button type="submit" name="atualiza_sms" style="color: white" class="btn btn-outline-danger">Enviar</button></form>
                <button type="button" style="color: white" class="btn btn-outline-danger text-gray ms-auto" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>