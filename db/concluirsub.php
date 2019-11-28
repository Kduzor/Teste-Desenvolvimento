<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="titulo">Consultar Registros</div>

<?php
require_once "conexao.php";
$conexao = novaConexao();
if($_GET['codigo']) {
    $var=$_GET['codigo'];
    $sql = "SELECT * FROM cadastro WHERE nome = '$var'";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $_GET['codigo']);
    
    if($stmt->execute()) {
        $resultado = $stmt->get_result();
        if($resultado->num_rows > 0) {
            $dados = $resultado->fetch_assoc();
            $pai=$dados['nome'];
            
        }
    }
}
$sql = "INSERT INTO teste 
(estado)
VALUES ('Concluido')";
$sql = "SELECT * FROM teste
WHERE nome ='$pai'";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

$registros = [];

if($resultado->num_rows > 0) {
    while($row = $resultado->fetch_assoc()) {
        $registros[] = $row;
    }
} elseif($conexao->error) {
    echo "Erro: " . $conexao->error;
}

$conexao->close();
?>
<form action="exercicio.php" method="get">
    <input type="hidden" name="dir" value="db">
    <input type="hidden" name="file" value="consultarsub">
    <div class="form-group row">
        <div class="col-sm-10">
            <input type="texto" name="codigo"
                class="form-control"
                value="<?= $dados['codigo'] ?>"
                placeholder="Informe a lista para consultar Sub Lista">
        </div>
        <div class="col-sm-2">
            <button class="btn btn-success mb-4">Consultar</button>
        </div>
    </div>
</form>
<table class="table table-hover table-striped table-bordered">
    <thead>
    
        <th>LIST</th>
        <th>SUB-LIST</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <?php foreach($registros as $registro):
            $cont++; ?>
            <tr>
            
                <td><?= $registro['nome'] ?></td>
                <td><?= $registro['categoria'] ?></td>
                <td>
                    <a href="exercicio.php?dir=db&file=concluirsub&excluir=<?= $registro['categoria'] ?>" 
                        class="btn btn-danger">
                        Concluir
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        <h2>Progresso</h2>
        <progress value="<?= $cont ?>" max="100">70 %</progress> 
    </tbody>
</table>

<style>
    table > * {
        font-size: 1.2rem;
    }
</style>