<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/config/funcoes.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/modais.php");
isLogged($sid);
$uid = getIdBySid($sid);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_all'])) {
    $sql = "DELETE FROM payloads WHERE id_owner = '$uid'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Refresh:0");
}

?>
<body style="background: #000000;">
    <div class="container">
        <center>
            <a href="home.php"><img class="mt-5" src="<?= getConfig('logo') ?>" width="<?= getConfig('largura') ?>" height="<?= getConfig('altura') ?>"></a><br>
            Bem-vindo(a) <b><?= getNickById($uid) ?></b>!<br>

            <div <?php if (!$detect->isMobile()) : ?>style="max-width: 50%;" <?php endif; ?> class="mt-4 row justify-content-center">

                <div class="col-auto">
                    <div class="dropdown">
                        <button class="btn btn-primary d-inline-flex align-items-center me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: black; border-color: #FF6969; color: #FF6969;">
                            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Adicionar
                        </button>
                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#modal-add-servidor">
                                <i class="fa-solid fa-server"></i>&nbsp; Servidor
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#modal-add-payload">
                                <i class="fa-solid fa-file-lines"></i>&nbsp; Payload
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#modal-add-porta">
                                <i class="fa-solid fa-door-open"></i>&nbsp; Porta
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#modal-add-multi">
                                <i class="fa-solid fa-file-lines"></i>&nbsp; Multi Payloads
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-auto">
                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modal-excluir-todas-payloads" style="background-color: black; border-color: #FF6969; color: #FF6969;">
                        <i class="fa-solid fa-trash"></i> todas payloads
                    </button>
                </div>
            </div>
    <!-- Modal: Excluir todas as payloads -->
    <div class="modal fade" id="modal-excluir-todas-payloads" tabindex="-1" role="dialog" aria-labelledby="modal-excluir-todas-payloads-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-excluir-todas-payloads-label">Excluir todas as payloads</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja excluir todas as payloads? Essa ação não pode ser desfeita.</p>
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        <button type="submit" name="delete_all" class="btn btn-danger">Excluir todas</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
                
            <div class="row justify-content-center mt-4">
                <div class="col-auto">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-sms" style="background-color: black; border-color: #FF6969; color: #FF6969;">
                        <i class="fa-solid fa-sms"></i> Enviar SMS
                    </button>
                </div>

                <div class="col-auto">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-configuracoes" style="background-color: black; border-color: #FF6969; color: #FF6969;">
                        <i class="fa-solid fa-cog"></i> Configurações
                    </button>
                </div>
            </div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="mt-4 mb-3 text-center">
                <label class="my-1 me-2 text-white"><b><i class="fa-solid fa-arrow-right"></i> Selecione o servidor</b></label>
                <form action="" id="form_servidor" method="post">
                    <select class="form-select text-white" id="editar_servidor" name="editar_servidor">
                        <option value="">Selecione</option>
                        <?php
                        $sql = $conn->query("SELECT * FROM servidores WHERE id_owner='$uid'");
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) :
                            echo "<option value='" . $row['id'] . "'>" . $row['Name'] . "</option>";
                        endwhile;
                        ?>
                    </select>
                </form>
            </div>

            <div class="mb-3 text-center">
                <label class="my-1 me-2 text-white" for=""><b><i class="fa-solid fa-arrow-right"></i> Selecione a payload</b></label>
                <form action="" id="form_payload" method="post">
                    <select id="editar_payload" class="form-select text-white" name="editar_payload">
                        <option value="">Selecione</option>
                        <?php
                        $sql = $conn->query("SELECT * FROM payloads WHERE id_owner='$uid'");
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) :
                            echo "<option value='" . $row['id'] . "'>" . $row['Name'] . "</option>";
                        endwhile;
                        ?>
                    </select>
                </form>
            </div>

            <div class="mb-3 text-center">
                <label class="my-1 me-2 text-white" for=""><b><i class="fa-solid fa-arrow-right"></i> Selecione a porta</b></label>
                <form action="" id="form_porta" method="post">
                    <select class="form-select text-white" id="editar_porta" name="editar_porta">
                        <option value="">Selecione</option>
                        <?php
                        $sql = $conn->query("SELECT * FROM portas WHERE id_owner='$uid'");
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) :
                            echo "<option value='" . $row['id'] . "'>" . $row['Porta'] . "</option>";
                        endwhile;
                        ?>
                    </select>
                </form>
            </div>

            <form action="" method="post">
                <div class="mt-2 d-grid gap-2">
                    <button style="color: #FF6969; background-color: black; border-color: #FF6969; width: 100%;" name="btn_salvar" class="btn btn-success" type="submit">Salvar</button>
                </div>
            </form>

            <div id="alert" class="alert mt-2"></div>
        </div>
    </div>
</div>



<?php

if (isset($_POST['btn_salvar'])) :

    addVersion($uid);

    $servidores = array();
    $payloads = array();
    $portas = array();

    $sql = $conn->query("SELECT Name, TYPE, FLAG, ServerIP, CheckUser, ServerPort, SSLPort, USER, PASS FROM servidores  WHERE id_owner='$uid'");

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {

        $servidores[] = $row;
    }

    $sql = $conn->query("SELECT Name, FLAG, Payload, SNI, TlsIP, ProxyIP, ProxyPort, Info FROM payloads  WHERE id_owner='$uid'");

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {

        $payloads[] = $row;
    }

    $sql = $conn->query("SELECT Porta FROM portas WHERE id_owner='$uid'");

    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {

        $portas[] = $row;
    }

    $dados = array(
        'Version' => getConfigUser('versao', $uid),
        'ReleaseNotes' => getConfigUser('notas', $uid),
        'Sms' => getConfigUser('sms', $uid),
        'UrlUpdate' => getConfigUser('att', $uid),
        'EmailFeedback' => getConfigUser('email', $uid),
        'UrlContato' => getConfigUser('contato', $uid),
        'UrlTermos' => getConfigUser('termos', $uid),
        'CheckUser' => getConfigUser('checkuser', $uid),
        'Udp' => $portas,
        'Servers' => $servidores,
        'Networks' => $payloads,
    );


    $dados = json_encode($dados, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    $pronto = str_replace('\\', '', $dados);

    $path = "update/" . getData('pasta_att', $uid) . "";
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }

    $config = "update/" . getData('pasta_att', $uid) . "/config";

    //verifica se já tem
    if (file_exists($config)) {
        unlink($config);
    }

    file_put_contents($config, $pronto);

    echo "<script>
$('#alert').html('Configurações salvas !')
$('#alert').addClass('alert-success')
";

endif;

?>

<script>
    $('#editar_payload').on('change', function() {
        document.getElementById("form_payload").submit();
    })
    $('#editar_servidor').on('change', function() {
        document.getElementById("form_servidor").submit();
    })
    $('#editar_porta').on('change', function() {
        document.getElementById("form_porta").submit();
    })
    $('#excluir-todas-payloads-btn').on('click', function() {
        var id_owner = $(this).data('id_owner');
        var confirmacao = confirm('Tem certeza que deseja excluir todas as payloads?');
        if (confirmacao) {
            $.ajax({
                url: 'excluir_payloads.php',
                method: 'POST',
                data: {id_owner: id_owner},
                success: function(response) {
                    location.reload();
                }
            });
        }
    });
    $('#excluir-todas-portas-btn').on('click', function() {
        var id_owner = $(this).data('id_owner');
        var confirmacao = confirm('Tem certeza que deseja excluir todas as portas?');
        if (confirmacao) {
            $.ajax({
                url: 'excluir_portas.php',
                method: 'POST',
                data: {id_owner: id_owner},
                success: function(response) {
                    location.reload();
                }
            });
        }
    });
    $('#excluir-todos-servidores-btn').on('click', function() {
        var id_owner = $(this).data('id_owner');
        var confirmacao = confirm('Tem certeza que deseja excluir todos os servidores?');
        if (confirmacao) {
            $.ajax({
                url: 'excluir_servidores.php',
                method: 'POST',
                data: {id_owner: id_owner},
                success: function(response) {
                    location.reload();
                }
            });
        }
    });   
</script>
</body>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/config/rodape.php"); ?>
