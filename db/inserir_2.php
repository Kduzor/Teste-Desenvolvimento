<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="titulo">Inserir Task</div>

<?php 

    $nome = $_POST['nome'];
    $erros = [];
    
    
    if(trim($nome) === "") {
        $erros['nome'] = 'Nome é obrigatório';
    }

    if(!count($erros)) {
        require_once "conexao.php";

        $sql = "INSERT INTO cadastro 
        (nome)
        VALUES ('$nome')";

        $conexao = novaConexao();
$resultado = $conexao->query($sql);

if($resultado) {
    echo "Sucesso :)";

} else {
    echo "Erro: " . $conexao->error;
}

$conexao->close();

        
    
    }
?>

<?php foreach($erros as $erro): ?>
    <!-- <div class="alert alert-danger" role="alert"> -->
        <?= "" // $erro ?>
    <!-- </div> -->
<?php endforeach ?>

<form action="#" method="post">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="nome">Atividade</label>
            <input type="text" 
                class="form-control <?= $erros['nome'] ? 'is-invalid' : ''?>"
                id="nome" name="nome" placeholder="Nome"
                value="<?= $dados['nome'] ?>">
            <div class="invalid-feedback">
                <?= $erros['nome'] ?>
            </div>
        
        
        </div>
    </div>
    <button class="btn btn-primary btn-lg">Enviar</button>
</form>