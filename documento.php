<?php 
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/estilo.css">
    <title>GoDev</title>
</head>
<body>
    <header class="cabecalho">
        <h1>GoDev</h1>
        <h2>^^</h2>
    </header>
    <nav class="navegacao">
        <span class="usuario">Usuário: <?= $_SESSION['usuario'] ?></span>
        <a href="index.php" class="verde">VOLTAR</a>
        <a href="logout.php" class="vermelho">ENTRAR</a>
    </nav>
    <main class="principal">
        <div class="conteudo">
            <?php echo "  <center> <h1>HELP</h1><br>
            
            È necessario criar uma lista para inserir a sub lista<br>
            Ao alterar a lista sera alterado a lista na tabela sub lista tambem <br>
            Ao excluir uma lista a sub lista não será excluida<br>
            Para consultar ou inserir uma sub lista e preciso informar a lista na qual está ou será vinculada<br>
            Para concluir uma sub-list, basta selecionar o botão concluir na tela de consulta, a barra de progresso sera apresentada corretamente<br>

            
   
            
      
      </center>
      "; ?>
        </div>
    </main>
    <footer class="rodape">
        Cadu © <?= date('Y'); ?>
    </footer>
</body>
</html>