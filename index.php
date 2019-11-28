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
        <a href="documento.php" class="verde">HELP</a>
        <a href="logout.php" class="vermelho">ENTRAR</a>
    </nav>
    <main class="principal">
        <div class="conteudo">
            <?php echo "    <center> Pós selecionar opção entrar deve ser inserida o e-mail e senha<br>
            suporte1@gmail.com.br <br>
            decisao#2507 <br>
            Obs: Sistema conta com um bloqueio caso tente acessar um arquivo antes de logar com um usuario será direcionado a pagina de login automaticamente
            <br>Sistema está com menu intuitivo sendo necessario somente clicar para executar as tarefas respectivas<br>
            
            Passo 1 CRIAR BANCO<br>
            Passo 2 CRIAR TABELA<br>
            Em seguida o sistema está pronto para uso conforme a necessidade do usuario <br>

            
            
            <br>
            
            <br><Center>RESUMO</center> <BR><center>TO do List (Lista para fazer) é um termo  que indica uma lista de tarefas a ser feita por alguém
           <center>  <center>TO DO LIST e uma ferramente em que o usuario gerencia sua tarefas atraves de listas<center> <br>
         <br>
            
      
      
      "; ?>
        </div>
    </main>
    <footer class="rodape">
        Cadu © <?= date('Y'); ?>
    </footer>
</body>
</html>