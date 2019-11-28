<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="titulo">Excluir Sub List</div>

<?php
require_once "conexao.php";

$registros = [];
$conexao = novaConexao();

if($_GET['excluir']) {
    $exlu=$_GET['excluir'];
    $excluirSQL = "DELETE FROM teste WHERE categoria = '$exlu' ";
    $stmt = $conexao->prepare($excluirSQL);
    $stmt->bind_param("i", $_GET['excluir']);
    $stmt->execute();
}

$sql = "SELECT nome, categoria FROM teste";
$resultado = $conexao->query($sql);
if($resultado->num_rows > 0) {
    while($row = $resultado->fetch_assoc()) {
        $registros[] = $row;
    }
} elseif($conexao->error) {
    echo "Erro: " . $conexao->error;   
}

$conexao->close;
?>

<table class="table table-hover table-striped table-bordered">
    <thead>
        <th>List</th>
        <th>Sub List</th>
        
        <th>Ações</th>
    </thead>
    <tbody>
        <?php foreach($registros as $registro) : ?>
            <tr>
                <td><?= $registro['nome'] ?></td>
                <td><?= $registro['categoria'] ?></td>
                
                <td>
                    <a href="exercicio.php?dir=db&file=excluir_2&excluir=<?= $registro['categoria'] ?>" 
                        class="btn btn-danger">
                        Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<style>
    table > * {
        font-size: 1.2rem;
    }
</style>