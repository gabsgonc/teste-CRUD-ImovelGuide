<?php 
    require_once 'inc/config.php';
    require_once 'inc/database.php';
    require_once 'inc/functionsCorretor.php';    

    if (isset($_POST['btn-submit'])) {
        if ($_POST['id-corretor']) {
            updateCorretor($_POST);
        } else {
            $result = cadCorretor($_POST);
            if($result == -1) {
                $errorMsg = "Cadastro nao realizado";
            }
        }
    }

    if (isset($_GET['updtaeId'])) {
        $corretor = findCorretor($_GET['updtaeId']);
        if($corretor == -1) {
            $errorMsg = "Atualizacao de cadastro nao realizada";
        }
    } 

    if (isset($_GET['deleteId'])) {
        $corretor = deleteCorretor($_GET['deleteId']);
        if($corretor == -1) {
            $errorMsg = "Remocao de cadastro nao realizada";
        }
    } 

    $listaCorretores = findCorretor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <script src="scripts/helper.js"></script>
    <title>Cadastro de Corretor</title>    
</head>
<body>
    <p id="mensagem-erro">
        <?php echo isset($errorMsg) ? $errorMsg : "" ?>
    </p>
    <div class="container">
        <form id="frm-cad-corretor" name="frm-cad-corretor" action="" method="post" onsubmit="return validateForm()">
            <h1 class="title">
                Cadastro de Corretor
            </h1>
            <input type="hidden" name="id-corretor" value="<?php echo isset($corretor) ? $corretor['id'] : "" ?>">
            <input name="txt-cpf-corretor" type="text" placeholder="Digite seu CPF" maxlenght="11" id="txt-cpf-corretor" required value="<?php echo isset($corretor) ? $corretor['cpf'] : "" ?>"/ class="input-cpf">
            <input name="txt-creci-corretor" type="text" placeholder="Digite seu Creci" id="txt-creci-corretor" required value="<?php echo isset($corretor) ? $corretor['creci'] : "" ?>"/ class="input-creci">
            <input name="txt-nome-corretor" type="text" placeholder="Digite seu nome" id="txt-nome-corretor" required value="<?php echo isset($corretor) ? $corretor['nome'] : "" ?>"/ class="input-name">
            <input name="btn-submit" type="submit" value="<?php echo isset($corretor['id']) ? "Salvar" : "Enviar" ?>" class="btn-submit">
        </form>
    </div>
    <?php if ($listaCorretores != -1) { ?>
            <table class="table">
                <tr>
                    <td>Nome</td>
                    <td>CPF</td>
                    <td>Creci</td>
                    <td colspan="2">Ações</td>
                </tr>
                <?php foreach ($listaCorretores as $corretor) { ?>
                    <tr>
                        <td><?php echo $corretor['nome'] ?></td>
                        <td><?php echo $corretor['cpf'] ?></td>
                        <td><?php echo $corretor['creci'] ?></td>
                        <td>
                            <a href='index.php?updtaeId=<?php echo $corretor['id'] ?>'>
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href='index.php?deleteId=<?php echo $corretor['id'] ?>'>
                                Deletar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
    <?php } else { ?>
        <p>Nenhum registro encontrado</p>
    <?php } ?>
</body>
</html>