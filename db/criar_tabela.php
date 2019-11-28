<div class="titulo">Criar Tabela</div>

<?php

require_once "conexao.php";

$sql = "CREATE TABLE IF NOT EXISTS teste (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    estado CHAR(100),
    categoria CHAR(100),
    nome VARCHAR(100)
    
   
)";

$sql = "CREATE TABLE IF NOT EXISTS cadastro (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    categoria CHAR(100),
    nome VARCHAR(100)
   
)";










$conexao = novaConexao();
$resultado = $conexao->query($sql);

if($resultado) {
    echo "Sucesso :)";
} else {
    echo "Erro: " . $conexao->error;
}

$conexao->close();