<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="titulo">Consultar Sub atividade</div>

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

if(count($_POST) > 0) {
    $dados = $_POST;
    
    
    $erros = [];
    
    if(trim($dados['nome']) === "") {
        $erros['nome'] = 'Nome é obrigatório';
    }

    
    if(!count($erros)) {
        $nome=$dados['nome'];
        
        
        
        
        $codigo = $_GET['codigo'];
        
       
        $sql = "INSERT INTO teste 
        (nome ,categoria, estado) 
        values ('$pai', '$nome', 'PENDENTE')";

        $stmt = $conexao->prepare($sql);

        if($stmt) {
            echo "Sub Catergoria Registrada";
        } else {
            echo "Erro: " . $conexao->error;
        }
        if($stmt->execute()) {
            unset($dados);
        }
    }
}



?>

<?php foreach($erros as $erro): ?>
    
        <?= "" // $erro ?>
    
    
<?php endforeach ?>

<form action="exercicio.php" method="get">
    <input type="hidden" name="dir" value="db">
    <input type="hidden" name="file" value="inserirsub">
    <div class="form-group row">
        <div class="col-sm-10">
            <input type="texto" name="codigo"
                class="form-control"
                value="<?= $dados['codigo'] ?>"
                placeholder="Informe a lista para inserir Sub Lista">
        </div>
        <div class="col-sm-2">
            <button class="btn btn-success mb-4">Consultar</button>
        </div>
    </div>
</form>


   
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="nome">Atividade</label>
            <input type="text" 
                class="form-control <?= $erros['nome'] ? 'is-invalid' : ''?>"
                id="nome" name="nome" placeholder="Atividade"
                value="<?= $dados['nome'] ?>"> <?php  ?>
            <div class="invalid-feedback">
                <?= $erros['nome'] ?>
            </div>
        </div>
    </div>
    <form action="#" method="post">
    <input type="hidden" name="id" value="<?= $dados['id'] ?>">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="nome">Sub-Atividade a ser inserida</label>
            <input type="text" 
                class="form-control <?= $erros['nome'] ? 'is-invalid' : ''?>"
                id="nome" name="nome" placeholder="Atividade"
                >
            <div class="invalid-feedback">
                <?= $erros['nome'] ?>
            </div>
        </div>
    </div>
    <button class="btn btn-primary btn-lg">Enviar</button>
</form>