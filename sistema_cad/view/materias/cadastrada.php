<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <title>Matérias Cadastradas</title>
</head>
<?php require_once '../cabecalho.php'; ?>

<body>
    <h1>Matéria cadastrada</h1>
    <div id="div-tabela">
        <table id="tabela">
            <thead id="thead">
                <tr id="titulos-thead">
                    <th width="250px">Matéria</th>
                    <th width="300px">Professor</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php
                require_once '../../controller/materias.php';
                ultimo_cad_materia(materias());
                ?>
            </tbody>
        </table>
        <div>
            <a href="./cadastrar.php"><input type="submit" value="CADASTRAR MATÉRIA" class="botao"></a>
            <a href="./lista.php"><input type="button" value="LISTA DE MATÉRIAS" class="botao"></a>
        </div>
    </div>
</body>

</html>